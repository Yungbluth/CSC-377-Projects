<?php
include "database.php"; // Make theDBA available in this PHP file
$theDBA = new database();
$text = $_GET['searchstr'];
$type = $_GET['But'];
$user = $_GET['user'];
$pass = $_GET['pass'];
$first = $_GET['first'];
$last = $_GET['last'];
$address = $_GET['address'];
if ($type == "Name") {
    echo json_encode($theDBA->getName($text));
} else if ($type == "Genre") {
    echo json_encode($theDBA->getGenre($text));
} else if ($type == "Director") {
    echo json_encode($theDBA->getDirector($text));
} else if ($type == "All") {
    echo json_encode($theDBA->getAll());
} else if ($type == "Register") {
    echo json_encode($theDBA->register($user, $pass, $first, $last, $address));
} else if ($type == "logIn") {
    echo json_encode($theDBA->logIn($user, $pass));
}
?>