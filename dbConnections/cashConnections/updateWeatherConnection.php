<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly
//Generalla funktioner
require '../../html/topCode/top.php';

//Kollar så att alla parametrar finns
if (isset($_POST["inputTemp"]) && isset($_POST["inputWeather"])) {
	// code...
$conn = connecttoDB();

//Sätter bestämt väder i databasen
$stmt = $conn->prepare("UPDATE editdata SET dayTemp = ?, dayWeather = ?, dayRemark = ? WHERE CURDATE() = date(dateStamp)");
$stmt->bind_param("iss", $inputTemp, $inputWeather, $inputRemark);	//Bind ? till variabler. Bestäm format.


$inputTemp = $_POST["inputTemp"];
$inputWeather = $_POST["inputWeather"];
$inputRemark = $_POST["inputRemark"];

$stmt->execute();		//Exekvera queryn

$stmt->close();
$conn->close();

echo "Vädret ändrat";
}



?>
