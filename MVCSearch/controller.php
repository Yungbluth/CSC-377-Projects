<?php
include "DatabaseAdaptor.php"; // Make theDBA available in this PHP file
$theDBA = new DatabaseAdaptor();
$text = $_GET['searchstr'];
$type = $_GET['But'];
if ($type == "Actors") {
    echo json_encode($theDBA->getActors($text));
} else if ($type == "Movies") {
    echo json_encode($theDBA->getMovies($text));
} else if ($type == "Roles") {
    echo json_encode($theDBA->getRoles($text));
}
?>