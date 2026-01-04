<!-- 20. Write a PHP program to create a new string which is 4 copies of the 2 front characters of
a given string. If the given string length is less than 2 return the original string.

    Sample Input:
    "C Sharp"
    "JS"
    "a"

    Sample Output:
    C C C C
    JSJSJSJS 
    a
 -->

<!DOCTYPE html>
<html>
<head>
    <title>Repeat Front Characters</title>
</head>
<body>
    <h2>Repeat Front Characters</h2>
    <form method="post">
        Enter a string: <input type="text" name="inputString" required><br><br>
        <input type="submit" value="Generate">
    </form>

<?php
function repeatFrontChars($str) {
    if (strlen($str) < 2) {
        return $str;
    } else {
        $front = substr($str, 0, 2);
        return str_repeat($front, 4);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];
    $result = repeatFrontChars($inputString);

    echo "<h3>Result</h3>";
    echo "Input String: \"$inputString\"<br>";
    echo "Output String: \"$result\"";
}
?>
</body>
</html>
