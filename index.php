<?php
require 'top.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Glabo Bokningssida</title>
    <link rel="stylesheet" type="text/css" href="style/myStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="wrapper">
      <?php

      if (isset($_SESSION["isLoggedIn"])) {
        if ($_SESSION["isLoggedIn"]==true) {
          require 'html/menuPage.php';
        }else{
          require 'html/loginPage.php';
        }
      }else{
        require 'html/loginPage.php';
      }


      ?>
    </div>
  </body>
</html>
