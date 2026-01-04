<!-- 1.Write a PHP program to create variable with different datatypes,
a.   Print all the data using echo and print
b.   Display content of array using print_r and var_dump
c.   Display result of checking data types. -->

<?php
$integer = 6;      
$float = 27.66;         
$string = "BIMAL ACHARYA"; 
$boolean = true;   
$array = array("BUS", "TRUCK", "MOTORCYCLE"); 
$null = null;  

// a. Print all the data using echo and print
echo "<h3>Using echo:</h3>";
echo "Integer: $integer<br>";
echo "Float: $float<br>";
echo "String: $string<br>";
echo "Boolean: " . ($boolean ? "true" : "false") . "<br>";
echo "Null: " . ($null === null ? "NULL" : $null) . "<br>";

print "<h3>Using print:</h3>";
print "Integer: $integer<br>";
print "Float: $float<br>";
print "String: $string<br>";
print "Boolean: " . ($boolean ? "true" : "false") . "<br>";
print "Null: " . ($null === null ? "NULL" : $null) . "<br>";

// b. Display content of array using print_r and var_dump
echo "<h3>Array using print_r:</h3>";
print_r($array);
echo "<br>";

echo "<h3>Array using var_dump:</h3>";
var_dump($array);
echo "<br>";

// c. Display result of checking data types
echo "<h3>Data Type Checking:</h3>";
echo "Is $integer integer? " . (is_int($integer) ? "Yes" : "No") . "<br>";
echo "Is $float float? " . (is_float($float) ? "Yes" : "No") . "<br>";
echo "Is $string string? " . (is_string($string) ? "Yes" : "No") . "<br>";
echo "Is \$boolean boolean? " . (is_bool($boolean) ? "Yes" : "No") . "<br>";
echo "Is \$array array? " . (is_array($array) ? "Yes" : "No") . "<br>";
echo "Is $null null? " . (is_null($null) ? "Yes" : "No") . "<br>";
?>