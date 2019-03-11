<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

//Generalla funktioner
require '../../html/topCode/top.php';

//Retunerar dagens aktiva race
function getActiveRace(){
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

function activeRaceNext(){
  $conn = connecttoDB();

  $stmt = $conn->prepare("UPDATE editdata SET activeRace = ? WHERE CURDATE() = date(dateStamp)");
  $stmt->bind_param("i", $activeRace);	//Bind ? till variabler. Bestäm format.


  $activeRace = (getActiveRace()+1);

  if ($activeRace > (getRaceLength()-1)) {
    // code...
    $activeRace = getRaceLength()-1;
  }

  $stmt->execute();		//Exekvera queryn

  $stmt->close();
  $conn->close();
}

function activeRacePrevius(){
  $conn = connecttoDB();

  $stmt = $conn->prepare("UPDATE editdata SET activeRace = ? WHERE CURDATE() = date(dateStamp)");
  $stmt->bind_param("i", $activeRace);	//Bind ? till variabler. Bestäm format.

  $activeRace = (getActiveRace()-1);

  if ($activeRace <= -1) {
    // code...
    $activeRace=0;
  }

  $stmt->execute();		//Exekvera queryn

  $stmt->close();
  $conn->close();
}

if ($_GET["input"] == "a") {
  // code...
  activeRaceNext();
}elseif ($_GET["input"] == "s") {
  // code...
  activeRacePrevius();
}

?>
