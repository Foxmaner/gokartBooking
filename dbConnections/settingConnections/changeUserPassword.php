<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

//Generalla funktioner
require '../../html/topCode/top.php';

//Rensar på eventuell skadlig kod
function sanatize_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


  // Ändrar inloggningslösenord
  $conn=connecttoDB();
  $inputPassword = $_GET["inputPassword"];
  $inputPassword = sanatize_input($inputPassword);
  $newPassword = password_hash($inputPassword, PASSWORD_BCRYPT);
  $sql = "UPDATE user SET userPassword = '$newPassword' WHERE userID = 1";
    if ($conn->query($sql)) {
      echo "Userlösenordet är nu ändrat";

      } else {
          echo $conn->error;
  }

$conn->close();



?>
