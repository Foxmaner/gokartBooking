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
$serverDate = 0;



$sql = "SELECT COUNT(*) as count FROM race WHERE CURDATE() = date(raceDate)";
if ($conn->query($sql)) {
  $result = $conn->query($sql);
  $nRace = $result->fetch_assoc()["count"];

  } else {
      echo "error" . $conn->error;
}

if ($nRace<=$_GET["racenr"]) {
  // code...
  $conn = connecttoDB();
  $stmt = $conn->prepare("INSERT INTO race (raceNr, largeKart, smallKart, doubleKart) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("iiii", $inputRaceNr, $inputLarge, $inputSmall, $inputDouble);	//Bind ? till variabler. Bestäm format.


  $inputLarge = 0;	//Sätt värden på variablerna
  $inputSmall = 0;	//Sätt värden på variablerna
  $inputDouble = 0;	//Sätt värden på variablerna
  $inputRaceNr = $_GET["racenr"];	//Sätt värden på variablerna
  $stmt->execute();		//Exekvera queryn

  $stmt->close();

}
echo "AntalRace:";
echo $nRace;
echo "<br>";
echo "Valt:";
echo $_GET["racenr"];
?>
