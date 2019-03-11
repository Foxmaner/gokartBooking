<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

//Generalla funktioner
require '../../html/topCode/top.php';

//Renar texten på eventuell skadlig kod
function sanatize_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


  // Ändrar sätter en ny emailadress
  $conn=connecttoDB();
  $inputEmail = $_GET["inputEmail"];
  $inputEmail = sanatize_input($inputEmail);

  $sql = "UPDATE user SET email = '$inputEmail' WHERE userID = 1";
    if ($conn->query($sql)) {
      echo "Emailen är nu ändrat";

      } else {
          echo $conn->error;
  }


$conn->close();


?>
