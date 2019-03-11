<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

//Generalla funktioner
require '../../html/topCode/top.php';

//Returnerar Adminlösenordet
function getAdminPassword(){
  $conn = connecttoDB();

  $sql = "SELECT adminPassword as adminPassword FROM user WHERE userID = 1";
  if ($conn->query($sql)) {
    $result = $conn->query($sql);
    $nRace = $result->fetch_assoc()["adminPassword"];

    } else {
        echo "error" . $conn->error;
  }
  return $nRace;

}
//Validerar Adminlösenordet
function validateAdminPassword($inputPassword){
  // code...
  $adminPassword =  getAdminPassword();

  if (password_verify($inputPassword, $adminPassword)) {
    echo "true";
    } else {
    echo "false";
  }
}


//Tilkallar funktionen med inputLösenord
validateAdminPassword($_POST["sentPassword"]);

?>
