<!-- 12. Write a function that returns the length of a string. Make your function recursive.  -->

<!DOCTYPE html>
<html>
<head>
    <title>Recursive String Length</title>
</head>
<body>
    <h2>Recursive String Length</h2>
    <form method="post">
        Enter a String: <input type="text" name="inputString" required>
        <input type="submit" value="Calculate Length">
    </form>

<?php
// Recursive function to find string length
function stringLength($str) {
    if ($str === "") {
        return 0; // Base case: empty string
    } else {
        return 1 + stringLength(substr($str, 1)); // Count first char + rest
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];
    $length = stringLength($inputString);

    echo "<h3>Result</h3>";
    echo "String: \"$inputString\"<br>";
    echo "Length: $length";
}
?>
</body>
</html>
