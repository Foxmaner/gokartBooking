<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

require '../../html/topCode/top.php';


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


  if($_GET["racenr"] < 11) {
    // code...
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


  }
	mysqli_close($conn);
}
