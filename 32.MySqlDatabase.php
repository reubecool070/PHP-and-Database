<!-- 32. Write a PHP Script to validate, store, list, 
 and update and delete record from database using MySQL database with following fields.
     a. id,name,rank,status,image,created_by,updated_by,created_at,updated_at 
-->

<?php
// ------------------ DATABASE CONNECTION ------------------
$host = "localhost";
$user = "root"; 
$pass = "";
$dbname = "crud_db";

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Create table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    rank VARCHAR(50) NOT NULL,
    status ENUM('active','inactive') DEFAULT 'active',
    image VARCHAR(255),
    created_by VARCHAR(50),
    updated_by VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)");


// ------------------ HANDLE CREATE ------------------
if (isset($_POST['create'])) {
    $name = trim($_POST['name']);
    $rank = trim($_POST['rank']);
    $status = $_POST['status'];
    $created_by = trim($_POST['created_by']);

    $errors = [];

    // Basic validations
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($rank)) $errors[] = "Rank is required.";

    // Handle image upload
    $imagePath = "";
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir);
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO records (name, rank, status, image, created_by) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $name, $rank, $status, $imagePath, $created_by);
        $stmt->execute();
        $stmt->close();
        echo "<p style='color:green;'>Record created successfully!</p>";
    } else {
        foreach ($errors as $err) echo "<p style='color:red;'>$err</p>";
    }
}


// ------------------ HANDLE UPDATE ------------------
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $rank = trim($_POST['rank']);
    $status = $_POST['status'];
    $updated_by = trim($_POST['updated_by']);

    // Handle image update
    $imagePath = $_POST['old_image'];
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir);
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    $stmt = $conn->prepare("UPDATE records SET name=?, rank=?, status=?, image=?, updated_by=? WHERE id=?");
    $stmt->bind_param("sssssi", $name, $rank, $status, $imagePath, $updated_by, $id);
    $stmt->execute();
    $stmt->close();
    echo "<p style='color:blue;'>Record updated successfully!</p>";
}


// ------------------ HANDLE DELETE ------------------
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM records WHERE id=$id");
    echo "<p style='color:red;'>Record deleted successfully!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD Example</title>
</head>
<body>
<h2>Create Record</h2>
<form method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name" required><br><br>
    Rank: <input type="text" name="rank" required><br><br>
    Status: 
    <select name="status">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select><br><br>
    Image: <input type="file" name="image"><br><br>
    Created By: <input type="text" name="created_by"><br><br>
    <input type="submit" name="create" value="Create">
</form>

<hr>
<h2>Records List</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Name</th><th>Rank</th><th>Status</th><th>Image</th>
        <th>Created By</th><th>Updated By</th><th>Created At</th><th>Updated At</th><th>Actions</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM records");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['rank']}</td>
            <td>{$row['status']}</td>
            <td><img src='{$row['image']}' width='50'></td>
            <td>{$row['created_by']}</td>
            <td>{$row['updated_by']}</td>
            <td>{$row['created_at']}</td>
            <td>{$row['updated_at']}</td>
            <td>
                <a href='?edit={$row['id']}'>Edit</a> | 
                <a href='?delete={$row['id']}' onclick='return confirm(\"Delete this record?\")'>Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>

<?php
// ------------------ SHOW EDIT FORM ------------------
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM records WHERE id=$id");
    $row = $result->fetch_assoc();
?>
<hr>
<h2>Edit Record</h2>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <input type="hidden" name="old_image" value="<?= $row['image'] ?>">

    Name: <input type="text" name="name" value="<?= $row['name'] ?>" required><br><br>
    Rank: <input type="text" name="rank" value="<?= $row['rank'] ?>" required><br><br>
    Status: 
    <select name="status">
        <option value="active" <?= $row['status']=="active"?"selected":"" ?>>Active</option>
        <option value="inactive" <?= $row['status']=="inactive"?"selected":"" ?>>Inactive</option>
    </select><br><br>
    Current Image: <img src="<?= $row['image'] ?>" width="50"><br>
    New Image: <input type="file" name="image"><br><br>
    Updated By: <input type="text" name="updated_by"><br><br>
    <input type="submit" name="update" value="Update">
</form>
<?php } ?>
</body>
</html>
