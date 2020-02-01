<?php
$movieArray = glob ( './movies/*' );
echo json_encode ( $movieArray );
?>