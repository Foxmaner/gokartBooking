<?php
require '../topCode/top.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Glabo Bokningssida</title>
    <link rel="stylesheet" type="text/css" href="../../style/settingStyle/settingStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/settingScript/settingScript.js"></script>
    <script src="../../plugins/alertify.js-0.3.11/lib/alertify.min.js"></script>
  </head>
  <body>
    <noscript id="noscript">Sorry, your browser does not support JavaScript!</noscript>
    <div class="wrapper" id="settingPageWrapper">
      <?php
      require '../headerPage/staticHeader.php';
      if (isset($_SESSION["isLoggedIn"])) {
        if ($_SESSION["isLoggedIn"]==true) {
        require "settingContentPage.php";
        }else{
        require 'loginErrorPage.php';
        }
      }else{
        require 'loginErrorPage.php';
      }


      ?>
    </div>
  </body>
</html>
