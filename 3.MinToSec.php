<!--3.Write a function that takes an integer minutes and converts it to seconds. -->

<!DOCTYPE html>
<html>
<head>
    <title>Minutes to Seconds Converter</title>
</head>
<body>
    <form method="post">
        Enter Time in Minutes: <input type="number" name="minutes" required>
        <input type="submit" value="Convert">
    </form>

<?php
function minutesToSeconds($minutes) {
    return $minutes * 60;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $minutes = $_POST['minutes'];
    $seconds = minutesToSeconds($minutes);

    echo "<h3>Result</h3>";
    echo "$minutes minutes = $seconds seconds";
}
?>
</body>
</html>

