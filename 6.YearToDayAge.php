<!-- 6.   Create a function that takes the age in years and returns the age in days.   -->

<!DOCTYPE html>
<html>
<head>
    <title>Age in Days Calculator</title>
</head>
<body>
    <form method="post">
        Enter Age in Years: <input type="number" name="years" required>
        <input type="submit" value="Convert">
    </form>

<?php
function yearsToDays($years) {
    return $years * 365; // simple conversion, no leap years considered
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $years = $_POST['years'];
    $days = yearsToDays($years);

    echo "<h3>Result</h3>";
    echo "$years years = $days days";
}
?>
</body>
</html>
