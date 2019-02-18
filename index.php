<!--
This site is made by Eskil Brännerud aka Foxmaner.
It was created as a schoolproject for my secondary work.
Github: https://github.com/Foxmaner
Gmail: eskil.brann@gmail.com
-->
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
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One" rel="stylesheet">

    <script src="plugins/alertifyjs/alertify.min.js"></script>
    <link rel="stylesheet" href="plugins/alertifyjs/css/alertify.css" />
    <link rel="stylesheet" href="plugins/alertifyjs/css/themes/default.min.css" />
  </head>
  <body>
    <noscript id="noscript">Sorry, your browser does not support JavaScript!</noscript>

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

  </body>
</html>
