<div id="loginBackground"></div>
<div class="col-5 col-m-10" id="settingSection">
  <a href="../../index.php"> <div id="settingTitleIcon"></div> </a>
  <h1 class="title col-12 col-m-12">Inställningar</h1>

  <?php

    echo "<h2 id='outputCurrentEmail'>Aktuell Email: ";
    echo getEmail(connecttoDB());
    echo "</h2>";
    ?>



  <div class="settingCategory col-s-6 col-6">
    <h2 class="subTitle">Ändra login</h2>
    <input id="inputChangeUserPassword1" class="inputs col-s-10 col-10" type="password" placeholder="Nytt lösenord"></input>
    <br>

    <br>
    <input id="inputChangeUserPassword2" class="inputs col-s-10 col-10" type="password" placeholder="Repetera lösenord" onkeyup="checkSecondUserPassword()"></input>
    <div id="outputCheckPassword2"></div>
    <button class="buttons" onclick="validateChangeUserPassword()">Byt användar-lösenord</button>
    <div id="outputChangeUserPassword"></div>
  </div>




  <div class="settingCategory col-s-6 col-6" id="settingCategory2">
    <h2 class="subTitle">Ändra adminlösenord</h2>
    <input id="inputChangeAdminPassword1" class="inputs col-s-10 col-10" type="password" placeholder="Nytt lösenord"></input>
    <br>

    <br>
    <input id="inputChangeAdminPassword2" class="inputs col-s-10 col-10" type="password" placeholder="Repetera lösenord" onkeyup="checkSecondAdminPassword()"></input>
    <div id="outputCheckAdminPassword2"></div>
    <button class="buttons" onclick="validateChangeAdminPassword()">Byt admin-lösenord</button>
    <div id="outputChangeAdminPassword"></div>
  </div>



  <div class="settingCategory col-s-6 col-6" id="settingCategory3">
    <h2 class="subTitle">Ändra E-Mail</h2>
    <input id="inputChangeEmail1" class="inputs col-s-10 col-10" type="text" placeholder="Ny Email"></input>
    <br>

    <br>
    <input id="inputChangeEmail2" class="inputs col-s-10 col-10" type="text" placeholder="Repetera Email"></input>
    <div id="outputCheckAdminPassword2"></div>
    <button class="buttons" onclick="validateChangeEmail()">Byt E-Mail</button>
    <div id="outputChangeAdminPassword"></div>
  </div>



  <div class="settingCategory col-s-6 col-6" id="settingCategory4">
    <h2 class="subTitle">Rensa databas</h2>
    <button class="buttons" id="btnClearRace" onclick="validateActionClearRace()">Rensa alla races</button>
    <br>
    <button class="buttons" id="btnClearDB" onclick="validateActionClearAllData()">Rensa hela databasen</button>
    <div id="outputClearDB"></div>
  </div>
</div>
