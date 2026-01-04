<!--  36. Write PHP script to calculate tax using form.

      Married
        annual income <= 450000   1% tax
        annual income > 450000 and  <= 550000   extra 10% tax for 100000   annual income > 550000 
        and  <= 750000   extra 20% tax for 200000   annual income > 750000 
        and  <= 1300000   extra 30% tax for 550000 annual income > 1300000    extra 35% tax for remaining amount

      Un-married
        annual income <= 400000   1% tax
        annual income > 400000 and  <= 500000   extra 10% tax for 100000   annual income > 500000 
        and  <= 750000   extra 20% tax for 250000   annual income > 750000 and  <= 1300000   extra 30% tax for 
        550000 annual income > 1300000    extra 35% tax for remaining amount
        If gender is female - 10% tax discount  
-->

<!DOCTYPE html>
<html>
<head>
    <title>Tax Calculator</title>
</head>
<body>
<h2>Income Tax Calculator</h2>

<form method="post" action="">
    <label>Annual Income:</label><br>
    <input type="number" name="income" required><br><br>

    <label>Marital Status:</label><br>
    <select name="status" required>
        <option value="married">Married</option>
        <option value="unmarried">Unmarried</option>
    </select><br><br>

    <label>Gender:</label><br>
    <select name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br><br>

    <input type="submit" value="Calculate Tax">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $income = (float)$_POST['income'];
    $status = $_POST['status'];
    $gender = $_POST['gender'];
    $tax = 0;

    // Tax calculation for Married
    if ($status == "married") {
        if ($income <= 450000) {
            $tax = $income * 0.01;
        } elseif ($income <= 550000) {
            $tax = 450000 * 0.01 + ($income - 450000) * 0.10;
        } elseif ($income <= 750000) {
            $tax = 450000 * 0.01 + 100000 * 0.10 + ($income - 550000) * 0.20;
        } elseif ($income <= 1300000) {
            $tax = 450000 * 0.01 + 100000 * 0.10 + 200000 * 0.20 + ($income - 750000) * 0.30;
        } else {
            $tax = 450000 * 0.01 + 100000 * 0.10 + 200000 * 0.20 + 550000 * 0.30 + ($income - 1300000) * 0.35;
        }
    }

    // Tax calculation for Unmarried
    if ($status == "unmarried") {
        if ($income <= 400000) {
            $tax = $income * 0.01;
        } elseif ($income <= 500000) {
            $tax = 400000 * 0.01 + ($income - 400000) * 0.10;
        } elseif ($income <= 750000) {
            $tax = 400000 * 0.01 + 100000 * 0.10 + ($income - 500000) * 0.20;
        } elseif ($income <= 1300000) {
            $tax = 400000 * 0.01 + 100000 * 0.10 + 250000 * 0.20 + ($income - 750000) * 0.30;
        } else {
            $tax = 400000 * 0.01 + 100000 * 0.10 + 250000 * 0.20 + 550000 * 0.30 + ($income - 1300000) * 0.35;
        }
    }

    // Female discount (10%)
    if ($gender == "female") {
        $tax = $tax - ($tax * 0.10);
    }

    echo "<h3>Result:</h3>";
    echo "Annual Income: Rs. " . number_format($income) . "<br>";
    echo "Marital Status: " . ucfirst($status) . "<br>";
    echo "Gender: " . ucfirst($gender) . "<br>";
    echo "<strong>Total Tax = Rs. " . number_format($tax, 2) . "</strong>";
}
?>
</body>
</html>
