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


// code...
$conn = connecttoDB();
$sql = "SELECT dayTemp,dayWeather FROM editdata WHERE CURDATE() = date(dateStamp)";
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
