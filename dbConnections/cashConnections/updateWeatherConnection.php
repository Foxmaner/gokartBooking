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

if (isset($_POST["inputTemp"]) && isset($_POST["inputWeather"])) {
	// code...
$conn = connecttoDB();


$stmt = $conn->prepare("UPDATE editdata SET dayTemp = ?, dayWeather = ? WHERE CURDATE() = date(dateStamp)");
$stmt->bind_param("is", $inputTemp, $inputWeather);	//Bind ? till variabler. Bestäm format.


$inputTemp = $_POST["inputTemp"];
$inputWeather = $_POST["inputWeather"];

$stmt->execute();		//Exekvera queryn

$stmt->close();

echo "Vädret ändrat";
}



?>
