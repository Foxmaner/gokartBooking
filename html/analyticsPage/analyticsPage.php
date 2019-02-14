<!--
This site is made by Eskil Brännerud aka Foxmaner.
It was created as a schoolproject for my secondary work.
Github: https://github.com/Foxmaner
Gmail: eskil.brann@gmail.com
-->
<?php
require '../topCode/top.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Glabo Bokningssida</title>
    <link rel="stylesheet" type="text/css" href="../../style/analyticsStyle/analyticsStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="../../plugins/alertifyjs/alertify.min.js"></script>
    <link rel="stylesheet" href="../../plugins/alertifyjs/css/alertify.css" />
    <link rel="stylesheet" href="../../plugins/alertifyjs/css/themes/default.min.css" />

    <script src="../../plugins/apexcharts/dist/apexcharts.min.js"></script>

  </head>
  <body onload="getStartWeekData()">
    <noscript id="noscript">Sorry, your browser does not support JavaScript!</noscript>

      <?php
      if (isset($_SESSION["isLoggedIn"])) {
        if ($_SESSION["isLoggedIn"]==true) {
        require "analyticsContentPage.php";
        }else{
        require '../loginPage/loginErrorPage.php';
        }
      }else{
        require '../loginPage/loginErrorPage.php';
      }


      ?>
  </body>
</html>
