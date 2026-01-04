<!-- 18. Write a PHP program to get the absolute difference between n and 51. If n is greater than
51 return triple the absolute difference.  -->

<!DOCTYPE html>
<html>
<head>
    <title>Absolute Difference Calculator</title>
</head>
<body>
    <h2>Absolute Difference from 51</h2>
    <form method="post">
        Enter a number (n): <input type="number" name="n" required><br><br>
        <input type="submit" value="Calculate">
    </form>

<?php
function diff51($n) {
    $diff = abs($n - 51); // absolute difference
    if ($n > 51) {
        return 3 * $diff; // triple if n is greater than 51
    } else {
        return $diff;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = (int) $_POST['n'];
    $result = diff51($n);

    echo "<h3>Result</h3>";
    echo "Number entered: $n<br>";
    echo "Calculated value: $result";
}
?>
</body>
</html>
