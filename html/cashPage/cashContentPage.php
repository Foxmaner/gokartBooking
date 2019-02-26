<div id="loginBackground"></div>
<div class="section col-5 col-s-5" id="cashSection">
  <a href="../../index.php"> <div id="depotTitleIcon"></div> </a>

  <div id="weatherInputWindow" class="col-2 col-m-5">
    <h3>Väder</h3>
    <p id="weatherWindowText"></p><input type="number" id="tempInput" class="weatherTextInputs"> </input>
    <select id="weatherSelect">
      <option value=""></option>
      <option id="selectSun" value="Soligt">Sol</option>
      <option id="selectCloud" value="Molnigt">Moln</option>
      <option id="selectRain" value="Regn">Regn</option>
    </select>
    <br>
    <input type="text" id="weatherRemarkInput"> </input>



    <button onclick="updateWeather()" id="btn_updateWeather">Uppdatera vädret</button>
  </div>
  <h1 class="title col-12 col-m-12">Kassa</h1>


  <div id="raceNrWrapper" class="col-12 col-s-12">
  <h2 id="textEditLopp">Lopp: </h2> <h2 id="outputEditLopp">1</h2>
  </div>

  <div class="col-4 col-s-4 raceKartInputWrapper">
  <h3 class="kartInputTitle">Stora</h3> <input id="inputLargeKart" class="kartInputs" type="number" min="0" max="10" onchange="editRace();updateChart()" readonly>
  </div>

  <div class="col-4 col-s-4 raceKartInputWrapper">
  <h3 class="kartInputTitle">Små</h3> <input id="inputSmallKart" class="kartInputs" type="number" min="0" max="6" onchange="editRace();updateChart()" readonly>
  </div>

  <div class="col-4 col-s-4 raceKartInputWrapper">
  <h3 class="kartInputTitle">Dubbla</h3> <input id="inputDoubleKart" class="kartInputs" type="number" min="0" max="2" onchange="editRace();updateChart()" readonly>
  </div>

  <div id="outputTest"></div>
  <br>
  <button class="changeRaceButton" id="changeRaceButtonRecent" onclick="btnArrowLeftPressed()"> ◀ </button> <button id="changeRaceButtonNext" class="changeRaceButton" onclick="btnArrowRightPressed()"> ▶ </button>
</div>


<div id="myChart" class="col-5 col-s-5">

</div>
<button onclick="getRaceData()"> ▶ </button>

<?php
echo "<script>";
require "../../js/cashScript/cashChartScript.js";
require "../../js/cashScript/cashScript.js";
echo "</script>";
?>
