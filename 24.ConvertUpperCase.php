<!-- 24. Write a PHP program to convert the last 3 characters of a given string in upper case. If
the length of the string has less than 3 then uppercase all the characters.

   Sample Input:
   Nepal
   Npl
   Bca
   Bachelor

   Sample Output:
   NePAL NPL
   BCA
   BacheLOR 
-->

<!DOCTYPE html>
<html>
<head>
    <title>Uppercase Last 3 Characters</title>
</head>
<body>
    <h2>Convert Last 3 Characters to Uppercase</h2>
    <form method="post">
        Enter a string: <input type="text" name="inputString" required><br><br>
        <input type="submit" value="Convert">
    </form>

<?php
function uppercaseLastThree($str) {
    $len = strlen($str);
    if ($len < 3) {
        return strtoupper($str);
    } else {
        $start = substr($str, 0, $len - 3);
        $lastThree = substr($str, -3);
        return $start . strtoupper($lastThree);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];
    $result = uppercaseLastThree($inputString);

    echo "<h3>Result</h3>";
    echo "Original String: \"$inputString\"<br>";
    echo "Modified String: \"$result\"";
}
?>
</body>
</html>
