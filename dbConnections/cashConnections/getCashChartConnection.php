<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

//Generalla funktioner
require '../../html/topCode/top.php';

//Retunerar antalet race idag.
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
	mysqli_close($conn);
}


if (isset($_GET["racenr"])) {
  // code...


  if($_GET["racenr"] < 6) {
    //Grafen visar alla race mellan 1-11
    $conn = connecttoDB();

		$sql = "SELECT * FROM race WHERE 1 <= raceNr and raceNr <= 11 and CURDATE() = date(raceDate)";
		if ($conn->query($sql)) {
			$result = $conn->query($sql);
			$myJSON = $result->fetch_all(MYSQLI_ASSOC);

			$myJSON = json_encode($myJSON);
			echo $myJSON;

			} else {
					echo "error" . $conn->error;
		}


  }else{
    //Grafen visar raceNr +- 5 races
    $conn = connecttoDB();
    $raceNr = $_GET["racenr"];

    $sql = "SELECT * FROM race WHERE ('$raceNr'-5) <= raceNr and raceNr <= ('$raceNr'+5) and CURDATE() = date(raceDate)";
    if ($conn->query($sql)) {
      $result = $conn->query($sql);
      $myJSON = $result->fetch_all(MYSQLI_ASSOC);

      $myJSON = json_encode($myJSON);
      echo $myJSON;

      } else {
          echo "error" . $conn->error;
    }


  }
	mysqli_close($conn);
}
