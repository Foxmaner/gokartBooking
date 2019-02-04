<?php
require 'html/topCode/top.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Glabo Bokningssida</title>
    <link rel="stylesheet" type="text/css" href="style/indexStyle/indexStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>
    <noscript id="noscript">Sorry, your browser does not support JavaScript!</noscript>
    <div class="wrapper">
      <?php

      if (isset($_SESSION["isLoggedIn"])) {
        if ($_SESSION["isLoggedIn"]==true) {
          require 'html/menuPage/menuPage.php';
        }else{
          require 'html/loginPage/loginPage.php';
        }
      }else{
        require 'html/loginPage/loginPage.php';
      }


      ?>
    </div>
  </body>
</html>
