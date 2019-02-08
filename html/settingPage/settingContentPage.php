<div id="loginBackground"></div>
<div class="col-5 col-m-10" id="settingSection">
  <div id="settingTitleIcon"></div>
  <h1 class="title col-12 col-m-12">Inställningar</h1>

  <div class="settingCategory">
    <p>Ändra userlösenord:</p>
    <input id="inputChangeUserPassword1" class="inputs" type="password" placeholder="Nytt lösenord"></input>
    <br>

    <br>
    <input id="inputChangeUserPassword2" class="inputs" type="password" placeholder="Repetera lösenord" onkeyup="checkSecondUserPassword()"></input>
    <div id="outputCheckPassword2"></div>
    <button class="buttons" onclick="validateChangeUserPassword()">Byt lösenord</button>
    <div id="outputChangeUserPassword"></div>
  </div>


  <div class="settingCategory" id="settingCategory2">
    <p>Ändra adminlösenord:</p>
    <input id="inputChangeAdminPassword1" class="inputs" type="password" placeholder="Nytt lösenord"></input>
    <br>

    <br>
    <input id="inputChangeAdminPassword2" class="inputs" type="password" placeholder="Repetera lösenord" onkeyup="checkSecondAdminPassword()"></input>
    <div id="outputCheckAdminPassword2"></div>
    <button class="buttons" onclick="validateChangeAdminPassword()">Byt lösenord</button>
    <div id="outputChangeAdminPassword"></div>
  </div>

  <div class="settingCategory" id="settingCategory3">
    <h2 class="subTitle">Rensa databas</h2>
    <button class="buttons" id="btnClearRace" onclick="validateActionClearRace()">Rensa alla races</button>
    <br>
    <button class="buttons" id="btnClearDB" onclick="validateActionClearAllData()">Rensa hela databasen</button>
    <div id="outputClearDB"></div>
  </div>
</div>
