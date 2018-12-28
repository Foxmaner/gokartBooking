<header>
	<title>Logout</title>
	<link rel="stylesheet" type="text/css" href="../style/logoutStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

</header>

<div id="wrapperLogout" class="wrapper">
<?php
require "top.php";
session_destroy();
echo "<h1 class='col-12 actionReply'>Du är nu utloggad. <br> Återvänd till loginsidan: <a href='../index.php'>Startsida</a></h1>";

  ?>
</div>
