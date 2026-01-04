<!-- 9.   Create a function that takes the number of wins, draws and losses and calculates the number of points a footballteam has obtained so far.
 wins get 3 points   
 draws get 1 point  
 losses get 0 points
Write PHP program to calculate total number of point of all the games asking input from user using form.   -->

<!DOCTYPE html>
<html>
<head>
    <title>Football Points</title>
</head>
<body>
    <h2>Football Points</h2>
    <form method="post">
        Wins: <input type="number" name="Wins" min="0" required><br><br>
        Draws: <input type="number" name="Draws" min="0" required><br><br>
        Losses: <input type="number" name="Losses" min="0" required><br><br>
        <input type="submit" value="Calculate Total Points">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $Wins = $_POST['Wins'];
    $Draws = $_POST['Draws'];
    $Losses = $_POST['Losses'];

    // Constants for points
    $Wins_points = 3;
    $Draws_points = 1;
    $Losses_points = 0;

    // Calculate total points
    $totalPoints = ($Wins * $Wins_points) + ($Draws * $Draws_points) + ($Losses * $Losses_points);

    // Display result
    echo "<h3>Result:</h3>";
    echo "Wins: $Wins × $Wins_points = " . ($Wins * $Wins_points) . " Points<br>";
    echo "Draws: $Draws × $Draws_points = " . ($Draws * $Draws_points) . " Points<br>";
    echo "Losses: $Losses × $Losses_points = " . ($Losses * $Losses_points) . " Points<br>";
    echo "<strong>Total Points: $totalPoints</strong>";
}
?>
</body>
</html>
