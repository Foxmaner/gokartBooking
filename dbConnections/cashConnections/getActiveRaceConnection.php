<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

//generella funktioner
require '../../html/topCode/top.php';



  // Hämtar dagens aktiva race
  $aRace;
  $conn = connecttoDB();
  $sql = "SELECT activeRace as activeRace FROM editdata WHERE CURDATE() = date(dateStamp)";
  if ($conn->query($sql)) {
    $result = $conn->query($sql);
    $aRace = $result->fetch_assoc()["activeRace"];
    } else {
        echo "error" . $conn->error;
  }
      echo $aRace;
