<!--  35. Write PHP script to calculate simple interest using form.  -->

<!DOCTYPE html>
<html>
<head>
    <title>Simple Interest Calculator</title>
</head>
<body>
<h2>Simple Interest Calculator</h2>

<form method="post" action="">
    <label>Principal (P):</label><br>
    <input type="number" name="principal" step="0.01" required><br><br>

    <label>Rate of Interest (R %):</label><br>
    <input type="number" name="rate" step="0.01" required><br><br>

    <label>Time (T in years):</label><br>
    <input type="number" name="time" step="0.01" required><br><br>

    <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p = $_POST['principal'];
    $r = $_POST['rate'];
    $t = $_POST['time'];

    // Calculate Simple Interest
    $si = ($p * $r * $t) / 100;

    echo "<h3>Result:</h3>";
    echo "Principal: $p <br>";
    echo "Rate: $r% <br>";
    echo "Time: $t years <br>";
    echo "<strong>Simple Interest = $si</strong>";
}
?>
</body>
</html>
