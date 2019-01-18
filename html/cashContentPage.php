<div class="section col-2 col-s-5" id="section1">




  <br>
  Stora <input id="inputLargeKart" class="kartInputs" type="number" min="0" max="25" oninput="editRace()">
  <br>
  Små <input id="inputSmallKart" class="kartInputs" type="number" min="0" max="25" oninput="editRace()">
  <br>
  Dubbla <input id="inputDoubleKart" class="kartInputs" type="number" min="0" max="25" oninput="editRace()">

  <div id="outputTest"></div>
  <p id="textEditLopp">Lopp: </p> <div id="outputEditLopp">1</div>
  <br>
  <button class="changeRaceButton" id="changeRaceButtonRecent" onclick="outputEditRaceS();selectPreviusRace()"> ◀ </button> <button id="changeRaceButtonNext" class="changeRaceButton" onclick="outputEditRaceA();selectNextRace();"> ▶ </button>
</div>

<div class="section col-11 col-s-5" id="section2">Div2 </div>
