<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly

//Generalla funktioner
require '../../html/topCode/top.php';

//Rensar datan på tabels

  $conn=connectToDB();
	$sql = "TRUNCATE TABLE editdata";
		if ($conn->query($sql)) {
			echo "[editdata],";

			} else {
					echo $conn->error;
	}

  $sql = "TRUNCATE TABLE race";
    if ($conn->query($sql)) {
      echo "[race],";

      } else {
          echo $conn->error;
  }

  $sql = "TRUNCATE TABLE user";
    if ($conn->query($sql)) {
      echo "[user] är nu borttaget från databasen!";

      } else {
          echo $conn->error;
  }



?>
