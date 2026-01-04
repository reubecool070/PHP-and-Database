<!--  26. Write PHP Script	to display student mark sheet into table, store data into PHP
multidimensional	array.
-->

<?php
$students = [ ["name" => "Ram Kumar","Roll"=>102, "marks" =>
     [
            "DBMS" => 75,
            "Scripting Language" => 62,
            "Numerical Method" => 55,
            "Software Engineering" => 48,
            "Operating System" => 55
        ]
    ],
    [
        "name" => "Sanu Thapa","Roll"=>101,
        "marks" => [
            "DBMS" => 55,
            "Scripting Language" =>45,
            "Numerical Method" => 35,
            "Software Engineering" => 56,
            "Operting System" => 67
        ]
    ],
    ["name" => "Gita Rana","Roll"=>89, "marks" =>
     [
            "DBMS" => 75,
            "Scripting Language" => 62,
            "Numerical Method" => 55,
            "Software Engineering" => 48,
            "Operting System" => 65
        ]
    ],
    ["name" => "Raju","Roll"=>109, "marks" =>
     [
            "DBMS" => 55,
            "Scripting Language" => 62,
            "Numerical Method" => 90,
            "Software Engineering" => 48,
            "Operting System" => 38
        ]
    ],
    [
        "name" => "Manish Brown","Roll"=>111,
        "marks" => [
            "DBMS" => 90,
            "Scripting Language" => 88,
            "Numerical Method" => 92,
            "Software Engineering" => 85,
            "Operting System" => 78
        ]
    ]
];

$passing_marks = 40;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Mark Sheet</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .fail {
            color:white;
            background-color:black; 
        }
       
    </style>
</head>
<body>

<h2 style="text-align:center;">Student Mark Sheet</h2>

<table>
    <tr>
        <th>SN</th>
        <th>Student Name</th>
        <th>Roll no</th>
        <th>DBMS</th>
        <th>Scripting Language</th>
        <th>Numerical Method</th>
        <th>Software Engineering</th>
        <th>Operting System</th>
        <th>Total</th>
        <th>Result</th>
    </tr>

    <?php 
    $sn = 1; // Serial number start
    foreach ($students as $student): 
        $total = array_sum($student['marks']);
        $status = (min($student['marks']) < $passing_marks) ? "Fail" : "Pass";
        $row_class = ($status == "Fail") ? "fail" : "pass";
    ?>
    <tr class="<?php echo $row_class; ?>">
        <td><?php echo $sn++; ?></td>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['Roll']; ?></td>
        <?php foreach ($student['marks'] as $mark): ?>
            <td><?php echo $mark; ?></td>
        <?php endforeach; ?>
        <td><?php echo $total; ?></td>
        <td><?php echo $status; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
