<?php
$servername = "213.180.89.87";
$username = "eskilbrannerud";
$password = "pH0v0r!4";

$conn = new mysqli($servername, $username , $password);

if ($conn->connect_error) {
  die();
}

$dbname = "eskilbranneruddb";


  mysqli_select_db($conn, $dbname);

  $sql = "CREATE TABLE `editdata` (
    `raceDataID` int(11) NOT NULL,
    `raceChange` int(11) NOT NULL,
    `activeRace` int(11) NOT NULL,
    `dateStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `dayTemp` int(11) NOT NULL,
    `dayWeather` varchar(255) NOT NULL,
    `dayRemark` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

  $sql .= "CREATE TABLE `race` (
    `raceID` int(11) NOT NULL,
    `raceNr` int(11) NOT NULL,
    `largeKart` int(11) NOT NULL,
    `smallKart` int(11) NOT NULL,
    `doubleKart` int(11) NOT NULL,
    `raceDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

  $sql .= "CREATE TABLE `user` (
    `userID` int(10) NOT NULL,
    `userPassword` varchar(255) NOT NULL,
    `adminPassword` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

  if (mysqli_multi_query($conn,$sql)){
    echo "YE BOI";
  } else {
    echo "ERROR";
  }


 ?>
