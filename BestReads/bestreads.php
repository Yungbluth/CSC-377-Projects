<?php
  // File name: bestreads.css
  $bookArray = glob ( './books/*' );
  // print_r($bookArray);
  echo json_encode ( $bookArray );
?>