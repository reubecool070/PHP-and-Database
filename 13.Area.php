<!-- 13. Write a function that accepts base (decimal), height (decimal) and shape ("triangle", "parallelogram")
  as input and calculates the area of that shape.  -->

<!DOCTYPE html>
<html>
<head>
    <title>Shape Area Calculator</title>
</head>
<body>
    <h2>Shape Area</h2>
    <form method="post">
        Base: <input type="number" name="base" step="0.01" required><br><br>
        Height: <input type="number" name="height" step="0.01" required><br><br>
        Shape: 
        <select name="shape" required>
            <option value="triangle">Triangle</option>
            <option value="parallelogram">Parallelogram</option>
        </select><br><br>
        <input type="submit" value="Calculate Area">
    </form>

<?php
// Function to calculate area based on shape
function calculateArea($base, $height, $shape) {
    if ($shape == "triangle") {
        return 0.5 * $base * $height;
    } elseif ($shape == "parallelogram") {
        return $base * $height;
    } else {
        return null; // Invalid shape
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = $_POST['base'];
    $height = $_POST['height'];
    $shape = $_POST['shape'];

    $area = calculateArea($base, $height, $shape);

    if ($area !== null) {
        echo "<h3>Result</h3>";
        echo "Shape: $shape<br>";
        echo "Base: $base<br>";
        echo "Height: $height<br>";
        echo "Area: " . number_format($area, 2);
    } else {
        echo "<p style='color:red;'>Invalid shape selected.</p>";
    }
}
?>
</body>
</html>
