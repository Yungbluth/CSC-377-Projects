<!DOCTYPE html>
<html>
<head>
<Title>Purchase/Receipt Server</Title>
<meta charset="UTF-8">
<link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
<!--  author: Matthew Yungbluth -->
<body>
<div class="receipt">
<h3>Receipt</h3>
	
<?php
$howMany = intVal ( ($_POST ["quantity"]) );
$index = strrpos ( $_POST ["size"], ' ' );
$size = substr ( $_POST ['size'], 0, $index );
$cost = 1.0 * (substr ( $_POST ['size'], $index ));
$first = $_POST ["firstName"];
$last = $_POST ["lastName"];
$city = $_POST ["city"];
$state = $_POST ["state"];
$zip = $_POST ["zip"];
date_default_timezone_set('America/Phoenix');
$date = date ( "d-F-Y" );
echo "Purchase date: " . $date . "<br><br>";

// TODO: Complete the receipt to replace the purchase form.
// The following three echos represent a test that we can
// access the values of some of the the input fields.
echo "Purchased ". $howMany . " item(s) of size '" . $size . "' at " . $cost . " each<br>";
echo "Total Cost: $" . ($howMany * $cost) . "<br><br>";
echo "<fieldset><legend>Ship to</legend>" . $first . " " . $last . "<br>";
echo $city . ", " . $state . "<br>";
echo $zip . "</fieldset>"
?>

</div>
</body>
</html>