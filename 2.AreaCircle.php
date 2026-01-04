<!-- 2.Calculate area of circle taking radius input and defining value of PI as constant value. -->
 
<!DOCTYPE html>
<html>
<head>
    <title>Area of Circle</title>
</head>
<body>
    <h2>Area of Circle</h2>
    <form method="post">
        <label for="Circle">Enter Radius: </label>
        <input type="number" name="radius" step="0.01" required><br>
        <input type="submit" value="Calculate">
    </form>

<?php
define("PI", 3.14159);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $radius = $_POST['radius'];
    $area = PI * $radius * $radius;
    echo "<h3>Result</h3>";
    echo "Radius: $radius<br>";
    echo "Area of Circle: " . number_format($area, 2);
}
?>
</body>
</html>
