<!-- 5.Write a function that takes the base and height of a triangle and return its area.   -->

<!DOCTYPE html>
<html>
<head>
    <title>Triangle Area Calculator</title>
</head>
<body>
    <form method="post">
        Base: <input type="number" name="base" step="0.01" required><br><br>
        Height: <input type="number" name="height" step="0.01" required><br><br>
        <input type="submit" value="Calculate Area">
    </form>

<?php
function triangleArea($base, $height) {
    return 0.5 * $base * $height;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = $_POST['base'];
    $height = $_POST['height'];
    $area = triangleArea($base, $height);

    echo "<h3>Result</h3>";
    echo "Base: $base<br>";
    echo "Height: $height<br>";
    echo "Area of Triangle: $area";
}
?>
</body>
</html>
