<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly


require '../../html/topCode/top.php';

  $conn=connectToDB();
	$sql = "TRUNCATE TABLE race";
		if ($conn->query($sql)) {
			echo "Racen är nu borttagna från databasen!";

			} else {
					echo $conn->error;
	}



?>
