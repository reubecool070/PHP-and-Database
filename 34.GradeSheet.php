<!--  34. Write PHP Script to take user marks using form and generate mark sheet when user input all data. 
  (Please look at last page for mark sheet format)
-->

<!DOCTYPE html>
<html>
<head>
    <title>Student Mark Sheet</title>
    <style>
        table { 
            border-collapse: collapse; 
            width: 60%; 
            margin-top: 20px; }
        th, td { 
            border: 1px solid black; 
            padding: 8px; 
            text-align: center; }
        th { 
            background: white; }
    </style>
</head>
<body>
<h2>Enter Student Details and Marks</h2>

<form method="post" action="">
    <label>Student Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Roll Number:</label>
    <input type="text" name="roll" required><br><br>

    <h3>Enter Obtained Marks in GPA</h3>
    <label>C Programming</label> <input type="number" name="sub1" min="0" max="4"  step="any" required><br><br>
    <label>Financial Accounting</label> <input type="number" name="sub2" min="0" max="4" step="any"  required><br><br>
    <label>English I</label> <input type="number" name="sub3" min="0" max="4" step="any"  required><br><br>
    <label>Mathematics II</label> <input type="number" name="sub4" min="0" max="4" step="any"  required><br><br>
    <label>Microprocessor & Computer Architecture</label> <input type="number" name="sub5" min="0" max="4" step="any"  required><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
function getGrade($marks) {
    if ($marks >= 4) return "A";
    elseif ($marks >= 3.7 ) return "A-";
    elseif ($marks >= 3.5) return "B+";
    elseif ($marks >= 3) return "B";
    elseif ($marks >= 2.7) return "B-";
    elseif ($marks >= 2.5) return "C+";
    elseif ($marks >= 2.3) return "C";
    else return "F";
}

if (isset($_POST['submit'])) {
    $name  = $_POST['name'];
    $roll  = $_POST['roll'];

    $subjects = [
        "C Programming" => $_POST['sub1'],
        "Financial Accounting" => $_POST['sub2'],
        "English I" => $_POST['sub3'],
        "Mathematics II" => $_POST['sub4'],
        "Microprocessor & Computer Architecture" => $_POST['sub5']
    ];
    $total = array_sum($subjects);
    $percentage = $total / 5;

    $overallGrade = getGrade($percentage);

    echo "<h2>Grade Sheet</h2>";
    echo "<p><strong>Name:</strong> $name<br>";
    echo "<strong>Roll No:</strong> $roll<br>";
    echo "<strong>Program:</strong>BCA<br>";
     echo "<strong>Semister:</strong>Second <br></p>";

    // Display Grade Sheet
    echo "<table>
            <tr><th>Subject</th><th>Grade Point</th><th>Grade</th></tr>";

    foreach ($subjects as $sub => $marks) {
        echo "<tr><td>$sub</td><td>$marks</td><td>" . getGrade($marks) . "</td></tr>";
    }

    echo "
          <tr><th>SGPA</th><th>$percentage</th><th>$overallGrade</th></tr>
          </table>";
}
?>
</body>
</html>
