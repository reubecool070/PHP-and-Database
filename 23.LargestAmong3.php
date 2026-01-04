<!-- 23. Write a PHP program to check the largest number among three given integers. -->

<!DOCTYPE html>
<html>
<head>
    <title>Find Largest Number</title>
</head>
<body>
    <h2>Largest Number Finder</h2>
    <form method="post">
        Enter first number: <input type="number" name="num1" required><br><br>
        Enter second number: <input type="number" name="num2" required><br><br>
        Enter third number: <input type="number" name="num3" required><br><br>
        <input type="submit" value="Find Largest">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = (int) $_POST['num1'];
    $num2 = (int) $_POST['num2'];
    $num3 = (int) $_POST['num3'];

    // Find largest using max()
    $largest = max($num1, $num2, $num3);

    echo "<h3>Result</h3>";
    echo "Numbers: $num1, $num2, $num3<br>";
    echo "Largest number is: $largest";
}
?>
</body>
</html>
