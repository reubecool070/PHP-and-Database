<!-- 25. Write PHP Script to display following array into HTML table.
$info = [ 'name' => 'Ram Bahadur', 'address' => 'Lalitpur','email' => 'info@ram.com', 'phone' => 98454545,'website' =>  'www.ram.com'];

Name	Ram Bahadur
Address	Lalitpur
Email	info@ram.com
Phone	98454545
Website	www.ram.com
-->


<?php
$info = [
    'name'    => 'Prem Bahadur Thapa',
    'address' => 'Bhaktapur',
    'email'   => 'info@prem.com',
    'phone'   => 98454545,
    'website' => 'www.prem.com'
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Array in Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>User Information</h2>

<table>
   
    <?php foreach ($info as $key => $value): ?>
        <tr>
            <td><?php echo ucfirst($key); ?></td>
            <td><?php echo $value; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
