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


if (isset($_POST["racenr"])) {
  // code...


  if ($_POST["racenr"] <= 6) {
    // code...
    $conn = connecttoDB();

    $myObj = new stdClass();
    $myObj->raceNr = $_POST["racenr"];
		$arrayRaceNr = array();
		$arrayLargeKart = array();
    $arraySmallKart = array();
    $arrayDoubleKart = array();

    $stmt = $conn->prepare("SELECT * FROM race WHERE 1 <= raceNr and raceNr <= ? and CURDATE() = date(raceDate)");
    $stmt->bind_param("i", $raceNrI);
    $raceNrI = getRaceLength();
		if ($raceNrI > 11) {
			// code...
			$raceNrI=11;
		}
    $stmt->execute();
    $result = $stmt->get_result();
    $i = 0;
     while ($row = $result->fetch_assoc()) {
			 array_push($arrayRaceNr,$i+1);
       array_push($arrayLargeKart,$row["largeKart"]);
       array_push($arraySmallKart,$row["smallKart"]);
       array_push($arrayDoubleKart,$row["doubleKart"]);



       $i=$i+1;
      }
    $stmt->close();

		$myObj->raceNrArray = $arrayRaceNr;
    $myObj->large = $arrayLargeKart;
    $myObj->small = $arraySmallKart;
    $myObj->double = $arrayDoubleKart;





    $myJSON = json_encode($myObj);
    echo $myJSON;


  }else{



		$conn = connecttoDB();

    $myObj = new stdClass();
    $myObj->raceNr = $_POST["racenr"];
		$arrayRaceNr = array();
    $arrayLargeKart = array();
    $arraySmallKart = array();
    $arrayDoubleKart = array();

    $stmt = $conn->prepare("SELECT * FROM race WHERE ? <= raceNr and raceNr <= ? and CURDATE() = date(raceDate)");
    $stmt->bind_param("ii", $raceNrF, $raceNrL);
    $raceNrF = $_POST["racenr"]-5;
		$raceNrL = $_POST["racenr"]+5;
    $stmt->execute();
    $result = $stmt->get_result();
    $i = $_POST["racenr"]-5;
     while ($row = $result->fetch_assoc()) {
			 array_push($arrayRaceNr,$i+1);
       array_push($arrayLargeKart,$row["largeKart"]);
       array_push($arraySmallKart,$row["smallKart"]);
       array_push($arrayDoubleKart,$row["doubleKart"]);



       $i=$i+1;
      }
    $stmt->close();

		$myObj->raceNrArray = $arrayRaceNr;
    $myObj->large = $arrayLargeKart;
    $myObj->small = $arraySmallKart;
    $myObj->double = $arrayDoubleKart;





    $myJSON = json_encode($myObj);
    echo $myJSON;


  }
}
