<!-- 14. Create a function that takes an array and a string as arguments and returns the index of the string.  -->

<!DOCTYPE html>
<html>
<head>
    <title>Find String Index in Array</title>
</head>
<body>
    <h2>Find Index of a String</h2>
    <form method="post">
        Enter items (comma(,)): <input type="text" name="arrayItems" required><br><br>
        Enter string to find: <input type="text" name="searchString" required><br><br>
        <input type="submit" value="Find Index">
    </form>

<?php
// Function to find index of a string in array
function findStringIndex($array, $string) {
    $index = array_search($string, $array);
    return ($index !== false) ? $index : -1;
}

// Process form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arrayItems = explode(",", $_POST['arrayItems']); // Convert comma-separated to array
    $arrayItems = array_map('trim', $arrayItems); // Remove extra spaces
    $searchString = trim($_POST['searchString']);

    $index = findStringIndex($arrayItems, $searchString);

    echo "<h3>Result</h3>";
    echo "Array: [" . implode(", ", $arrayItems) . "]<br>";
    echo "String to find: \"$searchString\"<br>";
    echo "Index: $index";
}
?>
</body>
</html>
