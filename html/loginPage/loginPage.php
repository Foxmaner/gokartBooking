<div id="loginBackground"></div>
<div id="wrapperLogin" class="wrapper col-s-12 col-12">
  <div id="wrapperTransparentLoginWindow" class="wrapper col-s-12 col-3">
    <div id="loginTitleIcon"></div>
    <h1 class="title col-s-12 col-12">Glabo Gokart Bokningssytem</h1>

    <form id="loginForm" class="col-s-12 col-12" method="post" action="">
      <input id="inputPassword" class="col-s-10 col-7" type="password" placeholder="Lösenord" name="passwordData">
      <br>
        <!-- <a href="lool.php" class="col-s-12 col-12">Glömt lösenord?</a>-->
      <br>
      <input id="submitLogin" class="col-s-12 col-12" type="submit" value="Logga in">
    </form>
  </div>
    <div id="outputLoginError" class="col-s-12 col-12">

      <?php
      if (isset($_SESSION["error"])) {
        // code...
        // code...

        echo "<script> alertify.error('Misslyckat: " . $_SESSION["error"] . "'); </script>";
        unset($_SESSION["error"]);
        echo "</p>";
      }
       ?>
    </div>
