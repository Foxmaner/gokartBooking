<div id="wrapperLogin" class="wrapper">
  <div id="wrapperLoginWindow" class="wrapper col-s-4 col-4">
    <form method="post" action="">
      <input id="inputPassword" class="col-s-10 col-10" type="password" placeholder="Lösenord" name="passwordData">
      <br>
      <input id="submitLogin" class="col-s-10 col-10" type="submit">
    </form>
    <div id="outputLoginError" class="col-s-12 col-12">

      <?php
      if (isset($_SESSION["error"])) {
        // code...
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
      }
       ?>
    </div>
