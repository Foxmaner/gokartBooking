<div class="col-5 col-m-5" id="settingSection">
  <h1 class="title">Inställningar</h1>
  <h2 class="subTitle">Lösenord</h2>
  <p>Ändra lösenord:</p>
  <input id="inputChangePassword1" type="password" placeholder="Nytt lösenord"></input>
  <br>
  
  <br>
  <input id="inputChangePassword2" type="password" placeholder="Repetera lösenord" onkeyup="checkSecondPassword()"></input>
  <div id="outputCheckPassword2"></div>
  <button onclick="changePassword()">Byt lösenord</button>
  <div id="outputChangePassword"></div>

  <h2 class="subTitle">Rensa databas</h2>
  <button id="btnClearRace" onclick="validateActionClearRace()">Rensa alla races</button>
  <button id="btnClearDB" onclick="validateActionClearAllData()">Rensa hela databasen</button>
  <div id="outputClearDB"></div>
</div>
