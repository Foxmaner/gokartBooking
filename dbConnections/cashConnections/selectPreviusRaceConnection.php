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
$serverDate = 0;



$sql = "SELECT COUNT(*) as count FROM race WHERE CURDATE() = date(raceDate)";
if ($conn->query($sql)) {
  $result = $conn->query($sql);
  $nRace = $result->fetch_assoc()["count"];

  } else {
      echo "error" . $conn->error;
}
loadRace($_GET["racenr"]);







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
		 //print_r($myObj);

		}
	$stmt->close();

}




?>
