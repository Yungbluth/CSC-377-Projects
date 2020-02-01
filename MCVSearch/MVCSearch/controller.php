<?php
// Kevin Sutton
// File name controller.php
// Acts as the go between the view and the model
include "DatabaseAdapter.php"; // Make theDBA available in this PHP file
$theDBA = new DatabaseAdaptor();
$type = $_GET["type"];
$string = $_GET["string"];
if($type === "actors")
    echo json_encode($theDBA->getAllActors($string));
if($type === "roles")
    echo json_encode($theDBA->getAllRoles($string));
if($type === "movies")
    echo json_encode($theDBA->getAllMovies($string));
?>