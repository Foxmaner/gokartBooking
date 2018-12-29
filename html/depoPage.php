<?php
require 'top.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Glabo Bokningssida</title>
    <link rel="stylesheet" type="text/css" href="../style/depoStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/depoScript.js"></script>

  </head>
  <body>
    <noscript id="noscript">Sorry, your browser does not support JavaScript!</noscript>
    <div class="wrapper">
      <?php

      if (isset($_SESSION["isLoggedIn"])) {
        if ($_SESSION["isLoggedIn"]==true) {
        require "depoContentPage.php";
        }else{
        echo "Hörru logga in FFS!";
        }
      }else{
        echo "Hörru logga in FFS!";
      }


      ?>
    </div>
  </body>
</html>
