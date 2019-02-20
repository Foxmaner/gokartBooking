<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

require '../../html/topCode/top.php';


$conn = connecttoDB();
$inputLarge = 0;
$inputSmall = 0;
$inputDouble = 0;
$inputRaceNr = $_GET["racenr"];	//Sätt värden på variablerna
$serverDate = 0;

$stmt = $conn->prepare("UPDATE race SET largeKart = ?, smallKart = ?, doubleKart = ? WHERE raceNr = ? and ? = date(raceDate)");
$stmt->bind_param("iiiis", $inputLarge, $inputSmall, $inputDouble, $inputRaceNr, $serverDate);	//Bind ? till variabler. Bestäm format.


$inputLarge = $_GET["large"];	//Sätt värden på variablerna
$inputSmall = $_GET["small"];	//Sätt värden på variablerna
$inputDouble = $_GET["double"];	//Sätt värden på variablerna
$inputRaceNr = $_GET["racenr"];	//Sätt värden på variablerna
$serverDate = date("Y-m-d");

$stmt->execute();		//Exekvera queryn

$stmt->close();
$conn->close();
//echo $inputLarge;
//echo $inputSmall;
//echo $inputDouble;

//echo "raceNR";
//echo $inputRaceNr;
//echo "<br>";
//echo "serverdate";
//echo $serverDate;



//echo "lyckat mannen"
?>
