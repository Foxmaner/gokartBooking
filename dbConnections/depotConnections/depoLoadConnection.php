<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

//Generalla funktioner
require '../../html/topCode/top.php';

//Hämtar dagens aktiva race
function raceNr(){
	$conn = connecttoDB();

	$stmt = $conn->prepare("SELECT activeRace FROM editdata WHERE CURDATE() = date(dateStamp)");

	$stmt->execute();
	$result = $stmt->get_result();
	 while ($row = $result->fetch_assoc()) {
	        return $row['activeRace'];
		}
	$stmt->close();
	$conn->close();


}

//Hämtar längden på dagens races
function getRaceLength(){
  $conn = connecttoDB();

  $sql = "SELECT COUNT(*) as count FROM race WHERE CURDATE() = date(raceDate)";
  if ($conn->query($sql)) {
    $result = $conn->query($sql);
    $nRace = $result->fetch_assoc()["count"];

    } else {
        echo "error" . $conn->error;
  }
  return $nRace;

}




//Hämtar aktuell data för depon
function loadData(){

$conn = connecttoDB();
$inputLarge = 0;
$inputSmall = 0;
$inputDouble = 0;
$serverDate = 0;



$sql = "SELECT COUNT(*) as count FROM editdata WHERE CURDATE() = date(dateStamp)";
if ($conn->query($sql)) {
  $result = $conn->query($sql);
  $nRace = $result->fetch_assoc()["count"];

  } else {
      echo "error" . $conn->error;
}

if ($nRace==1) {
  // code...
	$conn = connecttoDB();

	$stmt = $conn->prepare("SELECT * FROM race WHERE raceNr = ? and CURDATE() = date(raceDate)");
	$stmt->bind_param("i", $raceNrI);
	$raceNrI = raceNr()+1;
	$stmt->execute();
	$result = $stmt->get_result();
	$myObj = new stdClass();
	 while ($row = $result->fetch_assoc()) {

		 $myObj->large = $row["largeKart"];
		 $myObj->small = $row["smallKart"];
		 $myObj->double = $row["doubleKart"];

		 $raceNr = raceNr();

		 $queueTime = (((getRaceLength()-$raceNr-1))*7);
		 if ($queueTime > 60) {
		 	// code...
			$queueTime = date('H:i', mktime(0,$queueTime))."h";
		}else{
			$queueTime=$queueTime."min";
		};

		 $myObj->nextRace = ($raceNr+1);
		 $myObj->racesLeft = (getRaceLength()-$raceNr)-1;
		 $myObj->queueTime = $queueTime;

		 $myJSON = json_encode($myObj);
		 echo $myJSON;
		 //print_r($myObj);

		}
	$stmt->close();
	$conn->close();

}else{
	//Skapar en ny instans i editdata, om en sådan inte finns
	$conn = connecttoDB();

	$stmt = $conn->prepare("INSERT INTO editdata (raceChange, activeRace) VALUES (?, ?)");
	$stmt->bind_param("ii", $raceChange, $activeRace);	//Bind ? till variabler. Bestäm format.

	$raceChange = 0;
	$activeRace = 0;
	$stmt->execute();		//Exekvera queryn

	$stmt->close();
	$conn->close();
	loadData();
	}
}
loadData();

?>
