<!-- 10. Create a function that takes two strings as arguments and return
either true or false depending on whether the total number of characters in the first string is equal to the total number of characters in the second string. 
 -->

<!DOCTYPE html>
<html>
<head>
    <title>Compare String Lengths</title>
</head>
<body>
    <h3>Compare String Lengths</h3>
    <form method="post">
        First String: <input type="text" name="str1" required><br><br>
        Second String: <input type="text" name="str2" required><br><br>
        <input type="submit" value="Compare">
    </form>

<?php
function compareStringLengths($str1, $str2) {
    return strlen($str1) === strlen($str2);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $str1 = $_POST['str1'];
    $str2 = $_POST['str2'];

    $result = compareStringLengths($str1, $str2);

    echo "<h3>Result</h3>";
    echo "First String: $str1 (Length: " . strlen($str1) . ")<br>";
    echo "Second String: $str2 (Length: " . strlen($str2) . ")<br>";
    echo "Are lengths equal?  " . ($result ? "true" : "false");
}
?>
</body>
</html>
