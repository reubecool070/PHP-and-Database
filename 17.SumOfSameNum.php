<!-- 17. Write a PHP program to compute the sum of the two given integer values. 
 If the two values are the same, then returns triple their sum.  -->

<!DOCTYPE html>
<html>
<head>
    <title>Sum or Triple Sum</title>
</head>
<body>
    <h2>Sum Calculator</h2>
    <form method="post">
        Enter first number: <input type="number" name="num1" required><br><br>
        Enter second number: <input type="number" name="num2" required><br><br>
        <input type="submit" value="Calculate">
    </form>

<?php
function computeSum($a, $b) {
    if ($a === $b) {
        return 3 * ($a + $b); // triple the sum if numbers are equal
    } else {
        return $a + $b; // normal sum otherwise
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = (int) $_POST['num1'];
    $num2 = (int) $_POST['num2'];

    $result = computeSum($num1, $num2);

    echo "<h3>Result</h3>";
    echo "First number: $num1<br>";
    echo "Second number: $num2<br>";
    echo "Computed value: $result";
}
?>
</body>
</html>
