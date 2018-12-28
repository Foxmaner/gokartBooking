<?php
//Felhantering
error_reporting(-1); // Report all type of errors
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 0); // Do not buffer outputs, write directly
?>

<?php

session_start();

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

function sanatize_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function loginUser($inputPassword,$conn){
$sql = "SELECT userPassword FROM user WHERE userID = 1";
	if ($conn->query($sql)) {
		$result = $conn->query($sql);
		$userPassword = $result->fetch_assoc()["userPassword"];

    } else {
        echo $conn->error;
}


	if ($userPassword == $inputPassword) {
		# code...
		$_SESSION["isLoggedIn"] = true;
		$_SESSION["error"]="";
	}else{
		$_SESSION["isLoggedIn"] = false;
		$_SESSION["error"]="Fel lösenord";
	}

}

function logout(){
	session_destroy();
}

if (isset($_POST["passwordData"])) {
  // code...
  loginUser(sanatize_input($_POST["passwordData"]),connecttoDB());
}

if (isset($_POST["btn_logout"])) {
	# code...
	logout();
}

?>
