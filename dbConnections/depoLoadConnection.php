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

function raceNr(){
	$conn = connecttoDB();

	$stmt = $conn->prepare("SELECT activeRace FROM editdata WHERE CURDATE() = date(dateStamp)");

	$stmt->execute();
	$result = $stmt->get_result();
	 while ($row = $result->fetch_assoc()) {
	        return $row['activeRace'];
		}
	$stmt->close();


}

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
	$raceNrI = raceNr();
	$stmt->execute();
	$result = $stmt->get_result();
	$myObj = new stdClass();
	 while ($row = $result->fetch_assoc()) {

		 $myObj->large = $row["largeKart"];
		 $myObj->small = $row["smallKart"];
		 $myObj->double = $row["doubleKart"];

		 $raceNr = raceNr();
	

		 $myObj->nextRace = ($raceNr+1);
		 $myObj->racesLeft = getRaceLength()-$raceNr;
		 $myObj->queueTime = (getRaceLength()-$raceNr)*7;

		 $myJSON = json_encode($myObj);
		 echo $myJSON;
		 //print_r($myObj);

		}
	$stmt->close();

}else{

	$conn = connecttoDB();

	$stmt = $conn->prepare("INSERT INTO editdata (raceChange, activeRace) VALUES (?, ?)");
	$stmt->bind_param("ii", $raceChange, $activeRace);	//Bind ? till variabler. Bestäm format.

	$raceChange = 1;
	$activeRace = 1;
	$stmt->execute();		//Exekvera queryn

	$stmt->close();
	loadData();
	}
}
loadData();

?>
