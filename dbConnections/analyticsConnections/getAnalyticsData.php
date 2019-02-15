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

function getRaceLength(){
  // code...
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



if (isset($_POST["startDate"]) && isset($_POST["endDate"])) {
  // code...

  $conn = connecttoDB();


  $stmt = $conn->prepare("SELECT * FROM race WHERE ? <= date(raceDate) and ? >= date(raceDate)");
  $stmt->bind_param("ss", $startDate, $endDate);

	$startDate = $_POST["startDate"];
	$endDate = $_POST["endDate"];

  $stmt->execute();
  $result = $stmt->get_result();
  $myJSON = $result->fetch_all(MYSQLI_ASSOC);

  $myJSON = json_encode($myJSON);
  echo $myJSON;

  $stmt->close();
  $conn->close();





}
