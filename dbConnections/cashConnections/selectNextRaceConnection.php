<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

//Generalla funktioner
require '../../html/topCode/top.php';


$conn = connecttoDB();
$inputLarge = 0;
$inputSmall = 0;
$inputDouble = 0;
$serverDate = 0;


//Hämtar antalet race idag
$sql = "SELECT COUNT(*) as count FROM race WHERE CURDATE() = date(raceDate)";
if ($conn->query($sql)) {
  $result = $conn->query($sql);
  $nRace = $result->fetch_assoc()["count"];

  } else {
      echo "error" . $conn->error;
}

//Skapar nya race om man väljer ett race som inte än skapats
if ($nRace<$_GET["racenr"]) {
  // code...
  $conn = connecttoDB();

  for ($i=$nRace+1; $i <= $_GET["racenr"]; $i++) {
    // code...
    $stmt = $conn->prepare("INSERT INTO race (raceNr, largeKart, smallKart, doubleKart) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiii", $inputRaceNr, $inputLarge, $inputSmall, $inputDouble);	//Bind ? till variabler. Bestäm format.


    $inputLarge = 0;	//Sätt värden på variablerna
    $inputSmall = 0;	//Sätt värden på variablerna
    $inputDouble = 0;	//Sätt värden på variablerna
    $inputRaceNr = $i;	//Sätt värden på variablerna
    $stmt->execute();		//Exekvera queryn

    $stmt->close();

  }

  $conn->close();

}
loadRace($_GET["racenr"]);






//Hämtar/Retunerar aktuellt race
function loadRace($raceNr){
	// code...
	$conn = connecttoDB();

	$stmt = $conn->prepare("SELECT * FROM race WHERE raceNr = ? and CURDATE() = date(raceDate)");
	$stmt->bind_param("i", $raceNrI);
	$raceNrI = $raceNr;
	$stmt->execute();
	$result = $stmt->get_result();
	$myObj = new stdClass();
	 while ($row = $result->fetch_assoc()) {

		 $myObj->large = $row["largeKart"];
		 $myObj->small = $row["smallKart"];
		 $myObj->double = $row["doubleKart"];
    
		 $myJSON = json_encode($myObj);
		 echo $myJSON;
		 print_r($myObj);
     
		}
	$stmt->close();
  $conn->close();

}




?>
