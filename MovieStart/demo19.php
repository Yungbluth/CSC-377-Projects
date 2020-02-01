<?php



$directory = './princessbride/';

$reviews = scandir ( $directory );
for($i = 0; $i < sizeOf ( $reviews ); $i ++) {
  if ( endsWith ($reviews [$i], ".txt" )) {
    $str = file_get_contents ( $directory . $reviews [$i] );
    print ($str . "\n\n") ;
  }
}

function endsWith($string, $endString) {
  $len = strLen($string);
  $lenSub = strlen($endString);
  return (substr($string, $len - $lenSub) === $endString);
} 
?>