<!DOCTYPE html>  <!-- File: numbers.php -->
<html>
<head>
<meta charset="UTF-8">
<title>Sum the numbers</title>
<!-- By: Matthew Yungbluth -->
</head>
<body> 
<b>Contents of 'one', 'two', or 'three'</b>
<hr>
<?php
$file = $_GET["file"];
$numbers = file($file);
$sum = 0;
echo "<i>Contents of $file</i><br>";
echo "<ul>";
foreach($numbers as $line) {
    echo "<li>";
    echo $line;
    echo "</li>";
    $sum += $line;
}
echo "</ul>";
echo "<b>Sum = $sum</b>";
?> 

</body>
</html>