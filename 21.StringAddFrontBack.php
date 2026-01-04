<!-- 21. Write a PHP program to create a new string with the last char added at the front and back of a given string of length 1 or more.

Sample Input:
"Red"
"Green" 
"1"

Sample Output:
dRedd
nGreenn 
111
 -->

<!DOCTYPE html>
<html>
<head>
    <title>Add Last Char Front and Back</title>
</head>
<body>
    <h2>Add Last Character to Front and Back</h2>
    <form method="post">
        Enter a string: <input type="text" name="inputString" required><br><br>
        <input type="submit" value="Generate">
    </form>

<?php
function addLastCharFrontBack($str) {
    $lastChar = substr($str, -1); // get last character
    return $lastChar . $str . $lastChar;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];
    
    // Ensure string length is at least 1
    if (strlen($inputString) >= 1) {
        $result = addLastCharFrontBack($inputString);
        echo "<h3>Result</h3>";
        echo "Input String: \"$inputString\"<br>";
        echo "Output String: \"$result\"";
    } else {
        echo "<p style='color:red;'>Please enter a string of length 1 or more.</p>";
    }
}
?>
</body>
</html>
