<div id="loginBackground"></div>
<div class="section col-5 col-s-5" id="cashSection">
  <a href="../../index.php"> <div id="settingTitleIcon"></div> </a>
  <h1 class="title col-12 col-m-12">Kassa</h1>

  <br>
  Stora <input id="inputLargeKart" class="kartInputs" type="number" min="0" max="10" onchange="editRace();updateChart()" readonly>
  <br>
  Små <input id="inputSmallKart" class="kartInputs" type="number" min="0" max="6" onchange="editRace();updateChart()" readonly>
  <br>
  Dubbla <input id="inputDoubleKart" class="kartInputs" type="number" min="0" max="2" onchange="editRace();updateChart()" readonly>

  <div id="outputTest"></div>
  <p id="textEditLopp">Lopp: </p> <div id="outputEditLopp">1</div>
  <br>
  <button class="changeRaceButton" id="changeRaceButtonRecent" onclick="outputEditRaceS();selectPreviusRace();updateChart()"> ◀ </button> <button id="changeRaceButtonNext" class="changeRaceButton" onclick="outputEditRaceA();selectNextRace();updateChart()"> ▶ </button>
</div>


<div id="myChart" class="col-5 col-s-5">

</div>
<button onclick="getRaceData()"> ▶ </button>

<?php
echo "<script>";
require "../../js/cashScript/cashChartScript.js";
echo "</script>";
?>
