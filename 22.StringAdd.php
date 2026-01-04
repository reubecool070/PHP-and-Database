<!-- 22. Write a PHP program to create a new string taking the first 3 characters of a given string and return the string with 
 the 3 characters added at both the front and back. If the given   string length is less than 3, use whatever characters are there.

Sample Input:
"Python" 
"JS"
"Code"

Sample Output:
PytPythonPyt 
JSJSJS
CodCodeCod
 -->

<!DOCTYPE html>
<html>
<head>
    <title>Repeat Front 3 Characters</title>
</head>
<body>
    <h2>Add First 3 Characters Front and Back</h2>
    <form method="post">
        Enter a string: <input type="text" name="inputString" required><br><br>
        <input type="submit" value="Generate">
    </form>

<?php
function addFirstThreeCharsFrontBack($str) {
    $front = substr($str, 0, 3);  // first 3 chars or fewer
    return $front . $str . $front;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];
    $result = addFirstThreeCharsFrontBack($inputString);

    echo "<h3>Result</h3>";
    echo "Input String: \"$inputString\"<br>";
    echo "Output String: \"$result\"";
}
?>
</body>
</html>
