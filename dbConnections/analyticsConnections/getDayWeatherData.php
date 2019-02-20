<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly


require '../../html/topCode/top.php';





if (isset($_POST["weatherDate"])) {
  // code...

  $conn = connecttoDB();


  $stmt = $conn->prepare("SELECT DATE(dateStamp) as 'dateStamp',
  dayTemp as 'dayTemp',
  dayWeather as 'dayWeather',
	dayRemark as 'dayRemark'
  FROM editdata
  WHERE ? = date(dateStamp)");

  $stmt->bind_param("s", $dayDate);

	$dayDate = $_POST["weatherDate"];


  $stmt->execute();
  $result = $stmt->get_result();
  $myJSON = $result->fetch_all(MYSQLI_ASSOC);

  $myJSON = json_encode($myJSON);
  echo $myJSON;

  $stmt->close();
  $conn->close();





}
