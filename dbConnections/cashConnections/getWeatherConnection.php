<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly
//Generalla funktioner
require '../../html/topCode/top.php';



// Häntar dagens väder
$conn = connecttoDB();
$sql = "SELECT dayTemp,dayWeather,dayRemark FROM editdata WHERE CURDATE() = date(dateStamp)";
if ($conn->query($sql)) {
  $result = $conn->query($sql);
  $myJSON = $result->fetch_all(MYSQLI_ASSOC);
  $myJSON = json_encode($myJSON);
  echo $myJSON;

  } else {
      echo "error" . $conn->error;
}
$conn->close();



?>
