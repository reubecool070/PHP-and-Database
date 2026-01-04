<!-- 15. Given an index and an array, return the value of the array with the given index.  -->

<!DOCTYPE html>
<html>
<head>
    <title>Get Value by Index</title>
</head>
<body>
    <h2>Find Value at Given Index</h2>
    <form method="post">
        Enter items (comma(,)): <input type="text" name="arrayItems" required><br><br>
        Enter index: <input type="number" name="index" required><br><br>
        <input type="submit" value="Get Value">
    </form>

<?php
// Function to get value by index
function getValueByIndex($array, $index) {
    return isset($array[$index]) ? $array[$index] : "Index out of range";
}

// Process form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arrayItems = explode(",", $_POST['arrayItems']); // Convert to array
    $arrayItems = array_map('trim', $arrayItems); // Remove spaces
    $index = (int) $_POST['index'];

    $value = getValueByIndex($arrayItems, $index);

    echo "<h3>Result</h3>";
    echo "Array: [" . implode(", ", $arrayItems) . "]<br>";
    echo "Index: $index<br>";
    echo "Value: $value";
}
?>
</body>
</html>
