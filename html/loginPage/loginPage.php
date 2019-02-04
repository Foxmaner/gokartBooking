
<div id="wrapperLogin" class="wrapper">
  <div id="wrapperLoginWindow" class="wrapper col-s-4 col-4">
    <h1 class="title">Glabo Gokart Bokningsssytem</h1>
    <form method="post" action="">
      <input id="inputPassword" class="col-s-10 col-10" type="password" placeholder="Lösenord" name="passwordData">
      <br>
        <a href="lool.php">Glömt lösenord?</a>
      <br>
      <input id="submitLogin" class="col-s-10 col-10" type="submit" value="Logga in">
    </form>
    <div id="outputLoginError" class="col-s-12 col-12">

      <?php
      if (isset($_SESSION["error"])) {
        // code...
        // code...
        echo "<p id='errorText'>";
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
        echo "</p>";
      }
       ?>
    </div>
