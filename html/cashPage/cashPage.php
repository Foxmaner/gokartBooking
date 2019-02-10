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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

  </head>
  <body onload="selectNextRace();loadChart()">
    <noscript id="noscript">Sorry, your browser does not support JavaScript!</noscript>
    <div class="wrapper">
      <?php
      require '../headerPage/staticHeader.php';
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
    </div>
  </body>
</html>
