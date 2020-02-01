<?php
// Matthew Yungbluth
// File MovieReport.php
//
// Read in a folder with movie data and generate a report
//
print ("Enter movie directory: ") ;
$folder = stream_get_line(STDIN, 20, PHP_EOL);
$movieDir = './' . $folder . '/';

title ($movieDir);
// Suggested functions
// overview ();
// reviews ();

// Print the first few lines
function title() {
   //prints the info.txt
  global $movieDir;
  // TODO:  Complete this method 
  $files = scandir ( $movieDir );
  for($i = 0; $i < sizeOf($files); $i ++) {
      if ( $files[$i] == "info.txt") {
          if (strlen(file_get_contents($movieDir . $files[$i])) > 65) {
              $needle = "";
              $position = strpos(file_get_contents($movieDir . $files[$i], $needle), 50);
              echo substr(file_get_contents($movieDir . $files[$i]), 0, $position);
              echo "\n";
              echo substr(file_get_contents($movieDir . $files[$i]), $position, strlen(file_get_contents($movieDir . $files[$i])));
          } else {
              echo file_get_contents($movieDir . $files[$i]);
          }
          break;
      }
  }
  echo "\n";
  overview();
}

function overview() {
    //prints the overview.txt
    global $movieDir;
    $files = scandir ( $movieDir );
    for($i = 0; $i < sizeOf($files); $i ++) {
        if ( $files[$i] == "overview.txt") {
            if (strlen(file_get_contents($movieDir . $files[$i])) > 65) {
                $needle = "";
                $position = strpos(file_get_contents($movieDir . $files[$i], $needle), 50);
                echo substr(file_get_contents($movieDir . $files[$i]), 0, $position);
                echo "\n";
                echo substr(file_get_contents($movieDir . $files[$i]), $position, strlen(file_get_contents($movieDir . $files[$i])));
            } else {
                echo file_get_contents($movieDir . $files[$i]);
            }
            break;
        }
    }
    echo "\n";
    reviews();
}

function reviews() {
    //prints all the reviews
    global $movieDir;
    $files = scandir ( $movieDir );
    for($i = 0; $i < sizeOf($files); $i ++) {
        if ( startsWith($files[$i], "review")) {
            if (strlen(file_get_contents($movieDir . $files[$i])) > 65) {
                $needle = "";
                $position = strpos(file_get_contents($movieDir . $files[$i], $needle), 50);
                echo substr(file_get_contents($movieDir . $files[$i]), 0, $position);
                echo "\n";
                echo substr(file_get_contents($movieDir . $files[$i]), $position, strlen(file_get_contents($movieDir . $files[$i])));
            } else {
                echo file_get_contents($movieDir . $files[$i]);
            }
            echo "\n";
        }
    }
}

function startsWith($fullString, $startString) {
    //checks if a string starts with another string
    $length = strlen($startString);
    return (substr($fullString, 0, $length) == $startString);
}

?>
