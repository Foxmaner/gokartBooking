<div class="section col-2 col-s-5" id="section1">




  <br>
  Stora <input id="inputLargeKart" class="kartInputs" type="number" min="0" max="10" oninput="editRace()">
  <br>
  Små <input id="inputSmallKart" class="kartInputs" type="number" min="0" max="6" oninput="editRace()">
  <br>
  Dubbla <input id="inputDoubleKart" class="kartInputs" type="number" min="0" max="2" oninput="editRace()">

  <div id="outputTest"></div>
  <p id="textEditLopp">Lopp: </p> <div id="outputEditLopp">1</div>
  <br>
  <button class="changeRaceButton" id="changeRaceButtonRecent" onclick="outputEditRaceS();selectPreviusRace()"> ◀ </button> <button id="changeRaceButtonNext" class="changeRaceButton" onclick="outputEditRaceA();selectNextRace();"> ▶ </button>
</div>

<div  id="section2">
  <canvas class="section col-12 col-s-12" id="myChart"></canvas>
</div>
<?php
echo "<script>";
require "../../js/cashScript/cashChartScript.js";
echo "</script>";
?>
