<!-- 7.   Create a function that takes voltage and current and returns the calculated power.   -->

<!DOCTYPE html>
<html>
<head>
    <title>Power Calculator</title>
</head>
<body>
    <form method="post">
        Enter Voltage: <input type="number" name="voltage" step="0.01" required><br><br>
        Enter Current: <input type="number" name="current" step="0.01" required><br><br>
        <input type="submit" value="Calculate Power">
    </form>

<?php
function calculatePower($voltage, $current) {
    return $voltage * $current;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voltage = $_POST['voltage'];
    $current = $_POST['current'];
    $power = calculatePower($voltage, $current);

    echo "<h3>Result</h3>";
    echo "Voltage: $voltage V<br>";
    echo "Current: $current A<br>";
    echo "Power: $power Watts";
}
?>
</body>
</html>
