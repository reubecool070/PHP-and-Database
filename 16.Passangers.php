<!-- 16. A typical car can hold four passengers and one driver, allowing five people to travel around.
  Given n number of people, return how many cars are needed to seat everyone  comfortably.  -->

<!DOCTYPE html>
<html>
<head>
    <title>Cars Needed Calculator</title>
</head>
<body>
    <h2>Calculate Number of Cars Needed</h2>
    <form method="post">
        Enter number of Passanger: <input type="number" name="people" min="1" required><br><br>
        <input type="submit" value="Calculate">
    </form>

<?php
// Function to calculate number of cars
function carsNeeded($people) {
    $capacity = 5; // 4 passengers + 1 driver
    return ceil($people / $capacity);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $people = (int) $_POST['people'];
    $cars = carsNeeded($people);

    echo "<h3>Result</h3>";
    echo "Number of people: $people<br>";
    echo "Cars needed: $cars";
}
?>
</body>
</html>
