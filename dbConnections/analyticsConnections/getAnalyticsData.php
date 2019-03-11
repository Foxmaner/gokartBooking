<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

//Topkod med generella metoder
require '../../html/topCode/top.php';

//Retunerar antalet race under dagen
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

  //Hämtar relevant data
  //Slår ihop 2 tabeller för att slippa flera SQL querys
  $stmt = $conn->prepare("SELECT DATE(raceDate) as raceDate,
SUM(largeKart) as 'largeKart',
SUM(smallKart) as 'smallKart',
SUM(doubleKart) as 'doubleKart',
(SUM(largeKart) + SUM(smallKart) + SUM(doubleKart)) as 'dayTotal',
DATE(dateStamp) as 'dateStamp',
dayTemp as 'dayTemp',
dayWeather as 'dayWeather' FROM race a
left join editdata b on date(a.raceDate) = date(b.datestamp)
WHERE ? <= date(raceDate) and ? >= date(raceDate)
GROUP BY DATE(raceDate),DATE(dateStamp)");

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
