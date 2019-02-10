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
    <link rel="stylesheet" type="text/css" href="../../style/cashStyle/cashStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/cashScript/cashScript.js"></script>
    
    <script src="../../plugins/apexcharts/dist/apexcharts.min.js"></script>

  </head>
  <body onload="selectNextRace();loadChart();updateChart()">
    <noscript id="noscript">Sorry, your browser does not support JavaScript!</noscript>

      <?php
      if (isset($_SESSION["isLoggedIn"])) {
        if ($_SESSION["isLoggedIn"]==true) {
        require "cashContentPage.php";
        }else{
        require '../loginPage/loginErrorPage.php';
        }
      }else{
        require '../loginPage/loginErrorPage.php';
      }


      ?>
  </body>
</html>
