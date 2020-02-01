<?php
include "database.php"; // Make theDBA available in this PHP file
$theDBA = new database();
$text = htmlspecialchars($_GET['searchstr']);
$type = htmlspecialchars($_GET['But']);
$user = htmlspecialchars($_GET['user']);
$pass = htmlspecialchars($_GET['pass']);
if ($type == "Name") {
    echo json_encode($theDBA->getName($text));
} else if ($type == "Genre") {
    echo json_encode($theDBA->getGenre($text));
} else if ($type == "Director") {
    echo json_encode($theDBA->getDirector($text));
} else if ($type == "All") {
    echo json_encode($theDBA->getAll());
} else if ($type == "Register") {
    echo json_encode($theDBA->register($user, $pass));
} else if ($type == "logIn") {
    echo json_encode($theDBA->logIn($user, $pass));
} else if ($type == "registerCheck") {
    echo json_encode($theDBA->registerCheck($user));
}
?>