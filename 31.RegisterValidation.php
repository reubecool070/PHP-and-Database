<!-- 31. Write a PHP script to validate and register (store) user with following data.
           a.   Username with minimum 8 character
           b.   Valid email Address    
           c.   Validate Date ofBirth 
           d.   Valid phone length
-->

<?php
$host = "localhost";
$user = "root"; 
$pass = "";       
$dbname = "registration_db";

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

$table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    dob DATE NOT NULL,
    phone VARCHAR(15) NOT NULL
)";
$conn->query($table);

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $dob      = trim($_POST['dob']);
    $phone    = trim($_POST['phone']);

    // Validate Username
    if (strlen($username) < 8) {
        $errors[] = "Username must be at least 8 characters long.";
    }

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate Date of Birth (must be valid date and above 16 years)
    if (strtotime($dob) === false) {
        $errors[] = "Invalid Date of Birth.";
    } else {
        $dobDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($dobDate)->y;
        if ($age < 16) {
            $errors[] = "You must be at least 16 years old.";
        }
    }

    // Validate Phone
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone must be 10 digits long.";
    }

    // If no errors, insert into DB
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO users (username, email, dob, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $dob, $phone);

        if ($stmt->execute()) {
            $success = "User registered successfully!";
        } else {
            $errors[] = "Error: " . $conn->error;
        }

        $stmt->close();
    }
}
?>

<!-- ---------------- HTML FORM ---------------- -->
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
<h2>Register User</h2>

<?php
if (!empty($errors)) {
    echo "<ul style='color:red;'>";
    foreach ($errors as $err) {
        echo "<li>$err</li>";
    }
    echo "</ul>";
}

if ($success) {
    echo "<p style='color:green;'>$success</p>";
}
?>

<form method="post" action="">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Date of Birth:</label><br>
    <input type="date" name="dob" required><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" required><br><br>

    <input type="submit" value="Register">
</form>
</body>
</html>
