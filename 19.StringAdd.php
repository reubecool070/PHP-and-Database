<!-- 19. Write a PHP program to create a new string where 'if' is added to the front of a given string. If the string already begins with 'if', 
 return the string unchanged.
   Sample Input:
   "if else" 
   "else"    
   "if"
   Sample Output:
   if else 
   if else
   if 
    -->

<!DOCTYPE html>
<html>
<head>
    <title>Add "if" to String</title>
</head>
<body>
    <h2>Add "if" to the Front of a String</h2>
    <form method="post">
        <label>Enter a string:</label>
        <input type="text" name="text" required>
        <input type="submit" value="Submit">
    </form>

<?php
function addIfToFront($str) {
    // Check if the string starts with "if"
    if (substr($str, 0, 2) === "if") {
        return $str; // Unchanged
    } else {
        return "if " . $str; // Add "if" at the front
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['text'];
    $result = addIfToFront($input);

    echo "<h3>Result:</h3>";
    echo htmlspecialchars($result);
}
?>
</body>
</html>
