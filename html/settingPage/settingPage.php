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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="../../plugins/alertifyjs/alertify.min.js"></script>
    <link rel="stylesheet" href="../../plugins/alertifyjs/css/alertify.css" />
    <link rel="stylesheet" href="../../plugins/alertifyjs/css/themes/default.min.css" />

    <script src="../../js/settingScript/settingScript.js"></script>
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
