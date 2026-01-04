<!-- 4.   Create a function that takes two numbers as arguments and returns their sum.  -->


<!DOCTYPE html>
<html>
<head>
    <title>Add Two Numbers</title>
</head>
<body>
    <form method="post">
        Enter 1st Number: <input type="number" name="num1" required><br><br>
        Enter 2nd Number: <input type="number" name="num2" required><br><br>
        <input type="submit" value="Add">
    </form>

<?php
function addNumbers($num1, $num2) {
    return $num1 + $num2;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $sum = addNumbers($num1, $num2);

    echo "<h3>Result</h3>";
    echo "Num1: $num1 <br>";
    echo "Num2: $num2 <br>";
    echo "Total Sum: $sum";
}
?>
</body>
</html>
