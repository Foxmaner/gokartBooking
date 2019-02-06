<div class="col-5 col-m-5" id="settingSection">
  <h1 class="title">Inställningar</h1>
  <h2 class="subTitle">Lösenord</h2>
  <p>Ändra userlösenord:</p>
  <input id="inputChangeUserPassword1" type="password" placeholder="Nytt lösenord"></input>
  <br>

  <br>
  <input id="inputChangeUserPassword2" type="password" placeholder="Repetera lösenord" onkeyup="checkSecondUserPassword()"></input>
  <div id="outputCheckPassword2"></div>
  <button onclick="validateChangeUserPassword()">Byt lösenord</button>
  <div id="outputChangeUserPassword"></div>


  <p>Ändra adminlösenord:</p>
  <input id="inputChangeAdminPassword1" type="password" placeholder="Nytt lösenord"></input>
  <br>

  <br>
  <input id="inputChangeAdminPassword2" type="password" placeholder="Repetera lösenord" onkeyup="checkSecondAdminPassword()"></input>
  <div id="outputCheckAdminPassword2"></div>
  <button onclick="validateChangeAdminPassword()">Byt lösenord</button>
  <div id="outputChangeAdminPassword"></div>


  <h2 class="subTitle">Rensa databas</h2>
  <button id="btnClearRace" onclick="validateActionClearRace()">Rensa alla races</button>
  <button id="btnClearDB" onclick="validateActionClearAllData()">Rensa hela databasen</button>
  <div id="outputClearDB"></div>
</div>
