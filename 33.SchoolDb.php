<!-- 33. Write PHP program to perform CRUD operation for the following tables.

           courses
                id
                title
                duration
                status
                created_at  updated_at

            students
                id
                name
                course_id (use foreign key) fee
                rollno
                phone
                address
                dob
                status
                created_at
                updated_at 
-->

<?php
// ---------------- DB CONNECTION ----------------
$host = "localhost";
$user = "root";  // change if needed
$pass = "";
$dbname = "school";

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Create Courses table
$conn->query("CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    duration VARCHAR(50),
    status TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)");

// Create Students table
$conn->query("CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    course_id INT,
    fee DECIMAL(10,2),
    rollno VARCHAR(20),
    phone VARCHAR(15),
    address VARCHAR(255),
    dob DATE,
    status TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
)");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Operations with Edit/Update</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 10px 0; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
        form { margin: 10px 0; }
    </style>
</head>
<body>
<h2>Course Management</h2>

<?php
// ------------------- Add or Update Course -------------------
if (isset($_POST['add_course'])) {
    $title = $_POST['course_title'];
    $duration = $_POST['course_duration'];
    $stmt = $conn->prepare("INSERT INTO courses (title, duration) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $duration);
    $stmt->execute();
    echo "<p style='color:green;'>Course Added Successfully!</p>";
}

if (isset($_POST['update_course'])) {
    $id = $_POST['course_id'];
    $title = $_POST['course_title'];
    $duration = $_POST['course_duration'];
    $stmt = $conn->prepare("UPDATE courses SET title=?, duration=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $duration, $id);
    $stmt->execute();
    echo "<p style='color:blue;'>Course Updated Successfully!</p>";
}

// Handle Delete Course
if (isset($_GET['delete_course'])) {
    $id = $_GET['delete_course'];
    $conn->query("DELETE FROM courses WHERE id=$id");
    echo "<p style='color:red;'>Course Deleted!</p>";
}

// Edit Course
if (isset($_GET['edit_course'])) {
    $id = $_GET['edit_course'];
    $course = $conn->query("SELECT * FROM courses WHERE id=$id")->fetch_assoc();
    ?>
    <form method="post" action="">
        <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
        <label>Course Title:</label>
        <input type="text" name="course_title" value="<?php echo $course['title']; ?>" required>
        <label>Duration:</label>
        <input type="text" name="course_duration" value="<?php echo $course['duration']; ?>" required>
        <input type="submit" name="update_course" value="Update Course">
    </form>
    <?php
} else {
    ?>
    <!-- Add Course Form -->
    <form method="post" action="">
        <label>Course Title:</label>
        <input type="text" name="course_title" required>
        <label>Duration:</label>
        <input type="text" name="course_duration" required>
        <input type="submit" name="add_course" value="Add Course">
    </form>
    <?php
}

// Display Courses
echo "<table>
        <tr><th>ID</th><th>Title</th><th>Duration</th><th>Status</th><th>Actions</th></tr>";
$res = $conn->query("SELECT * FROM courses");
while ($row = $res->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['title']}</td>
            <td>{$row['duration']}</td>
            <td>{$row['status']}</td>
            <td>
                <a href='?edit_course={$row['id']}'>Edit</a> | 
                <a href='?delete_course={$row['id']}'>Delete</a>
            </td>
          </tr>";
}
echo "</table>";
?>

<hr>
<h2>Student Management</h2>

<?php
// ------------------- Add or Update Student -------------------
if (isset($_POST['add_student'])) {
    $stmt = $conn->prepare("INSERT INTO students (name, course_id, fee, rollno, phone, address, dob) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sidssss", $_POST['student_name'], $_POST['course_id'], $_POST['fee'], $_POST['rollno'], $_POST['phone'], $_POST['address'], $_POST['dob']);
    $stmt->execute();
    echo "<p style='color:green;'>Student Added Successfully!</p>";
}

if (isset($_POST['update_student'])) {
    $id = $_POST['student_id'];
    $stmt = $conn->prepare("UPDATE students SET name=?, course_id=?, fee=?, rollno=?, phone=?, address=?, dob=? WHERE id=?");
    $stmt->bind_param("sidssssi", $_POST['student_name'], $_POST['course_id'], $_POST['fee'], $_POST['rollno'], $_POST['phone'], $_POST['address'], $_POST['dob'], $id);
    $stmt->execute();
    echo "<p style='color:blue;'>Student Updated Successfully!</p>";
}

// Handle Delete Student
if (isset($_GET['delete_student'])) {
    $id = $_GET['delete_student'];
    $conn->query("DELETE FROM students WHERE id=$id");
    echo "<p style='color:red;'>Student Deleted!</p>";
}

// Edit Student
if (isset($_GET['edit_student'])) {
    $id = $_GET['edit_student'];
    $student = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();
    ?>
    <form method="post" action="">
        <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
        <label>Name:</label>
        <input type="text" name="student_name" value="<?php echo $student['name']; ?>" required>
        
        <label>Course:</label>
        <select name="course_id" required>
            <?php
            $courses = $conn->query("SELECT * FROM courses");
            while ($c = $courses->fetch_assoc()) {
                $selected = ($c['id'] == $student['course_id']) ? "selected" : "";
                echo "<option value='{$c['id']}' $selected>{$c['title']}</option>";
            }
            ?>
        </select>
        
        <label>Fee:</label>
        <input type="number" step="0.01" name="fee" value="<?php echo $student['fee']; ?>" required>
        
        <label>Roll No:</label>
        <input type="text" name="rollno" value="<?php echo $student['rollno']; ?>" required>
        
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo $student['phone']; ?>" required>
        
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $student['address']; ?>" required>
        
        <label>DOB:</label>
        <input type="date" name="dob" value="<?php echo $student['dob']; ?>" required>
        
        <input type="submit" name="update_student" value="Update Student">
    </form>
    <?php
} else {
    ?>
    <!-- Add Student Form -->
    <form method="post" action="">
        <label>Name:</label>
        <input type="text" name="student_name" required>
        
        <label>Course:</label>
        <select name="course_id" required>
            <?php
            $courses = $conn->query("SELECT * FROM courses");
            while ($c = $courses->fetch_assoc()) {
                echo "<option value='{$c['id']}'>{$c['title']}</option>";
            }
            ?>
        </select>
        
        <label>Fee:</label>
        <input type="number" step="0.01" name="fee" required>
        
        <label>Roll No:</label>
        <input type="text" name="rollno" required>
        
        <label>Phone:</label>
        <input type="text" name="phone" required>
        
        <label>Address:</label>
        <input type="text" name="address" required>
        
        <label>DOB:</label>
        <input type="date" name="dob" required>
        
        <input type="submit" name="add_student" value="Add Student">
    </form>
    <?php
}

// Display Students
echo "<table>
        <tr><th>ID</th><th>Name</th><th>Course</th><th>Fee</th><th>Roll No</th><th>Phone</th><th>Address</th><th>DOB</th><th>Status</th><th>Actions</th></tr>";
$res = $conn->query("SELECT students.*, courses.title AS course_title FROM students 
                     LEFT JOIN courses ON students.course_id = courses.id");
while ($row = $res->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['course_title']}</td>
            <td>{$row['fee']}</td>
            <td>{$row['rollno']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['address']}</td>
            <td>{$row['dob']}</td>
            <td>{$row['status']}</td>
            <td>
                <a href='?edit_student={$row['id']}'>Edit</a> | 
                <a href='?delete_student={$row['id']}'>Delete</a>
            </td>
          </tr>";
}
echo "</table>";
?>

</body>
</html>
