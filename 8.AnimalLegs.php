<!-- 8.   A farmer is asking you to tell him how many legs can be counted among all his animals. The farmer breeds three species:
chickens = 2 legs 
cows = 4 legs
pigs = 4 legs 
Write PHP program to calculate total number of legs of all the animals asking input from user using form.  -->

<!DOCTYPE html>
<html>
<head>
    <title>Animal Legs Calculator</title>
</head>
<body>
    <h2>Animal Legs Calculator</h2>
    <form method="post">
        Chickens: <input type="number" name="chickens" min="0" required><br><br>
        Cows: <input type="number" name="cows" min="0" required><br><br>
        Pigs: <input type="number" name="pigs" min="0" required><br><br>
        <input type="submit" value="Calculate Total Legs">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $chickens = $_POST['chickens'];
    $cows = $_POST['cows'];
    $pigs = $_POST['pigs'];

    // Constants for legs
    $CHICKEN_LEGS = 2;
    $COW_LEGS = 4;
    $PIG_LEGS = 4;

    // Calculate total legs
    $totalLegs = ($chickens * $CHICKEN_LEGS) + ($cows * $COW_LEGS) + ($pigs * $PIG_LEGS);

    // Display result
    echo "<h3>Result:</h3>";
    echo "Chickens: $chickens × $CHICKEN_LEGS = " . ($chickens * $CHICKEN_LEGS) . " legs<br>";
    echo "Cows: $cows × $COW_LEGS = " . ($cows * $COW_LEGS) . " legs<br>";
    echo "Pigs: $pigs × $PIG_LEGS = " . ($pigs * $PIG_LEGS) . " legs<br>";
    echo "<strong>Total Legs: $totalLegs</strong>";
}
?>
</body>
</html>
