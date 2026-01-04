<!-- 11. Create a function that returns true if an integer is evenly divisible by 5, and false otherwise.  -->


<!DOCTYPE html>
<html>
<head>
    <title>Check Divisibility by 5</title>
</head>
<body>
    <h3>Given Number is Divisibility by 5?</h3>
    <form method="post">
        Enter a Number: <input type="number" name="number" required>
        <input type="submit" value="Check">
    </form>

<?php
function isDivisibleByFive($number) {
    return $number % 5 === 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $result = isDivisibleByFive($number);

    echo "<h3>Result</h3>";
    echo "Number: $number<br>";
    echo "Is divisible by 5? " . ($result ? "true" : "false");
}
?>
</body>
</html>
