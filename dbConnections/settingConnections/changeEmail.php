<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly


function connecttoDB(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$minDB = "glabo_bokningar";
	$conn = new mysqli($servername, $username, $password, $minDB);


	if ($conn->connect_error) {
		# code...
		die("Connection failed" . $conn->connect_error);
		return null;
	}else{
		return $conn;
	}

}

function sanatize_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


  // code...
  $conn=connecttoDB();
  $inputEmail = $_GET["inputEmail"];
  $inputEmail = sanatize_input($inputEmail);

  $sql = "UPDATE user SET email = '$inputEmail' WHERE userID = 1";
    if ($conn->query($sql)) {
      echo "Adminlösenordet är nu ändrat";

      } else {
          echo $conn->error;
  }





?>
