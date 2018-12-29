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

$conn = connecttoDB();
$inputLarge = 0;
$inputSmall = 0;
$inputDouble = 0;
$inputRaceNr = $_GET["racenr"];	//Sätt värden på variablerna

$stmt = $conn->prepare("INSERT INTO race (largeKart, smallKart, doubleKart) VALUES (?, ?, ?) where raceNr = ? and date = ?");
$stmt->bind_param("iiiis", $inputLarge, $inputSmall, $inputDouble, $inputraceNr, $serverDate);	//Bind ? till variabler. Bestäm format.


$inputLarge = $_GET["large"];	//Sätt värden på variablerna
$inputSmall = $_GET["small"];	//Sätt värden på variablerna
$inputDouble = $_GET["double"];	//Sätt värden på variablerna
$inputRaceNr = $_GET["racenr"];	//Sätt värden på variablerna
$serverDate = GETDATE();	//Sätt värden på variablerna
$stmt->execute();		//Exekvera queryn

$stmt->close();




echo "lyckat mannen"
?>
