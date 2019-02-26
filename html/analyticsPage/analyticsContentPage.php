<div id="analyticsBackground"></div>
<div class="section col-5 col-s-5" id="analyticsSection">
  <a href="../../index.php"> <div id="analyticsTitleIcon"></div> </a>
  <h1 class="title col-12 col-m-12">Analys</h1>

<!--
  <input type="date" id="inputStartDate">
  <input type="date" id="inputEndDate">
  <button onclick="getDateData()">GetDate</button>
-->

  <h2 id="dataSelectText">Hur mycket data vill du hämta?</h2>
  <button id="dataButtonAll" class="dataButton" onclick="selectData(1)">All data</button>
  <br>
  <button id="dataButtonSelected" class="dataButton" onclick="selectData(2)">Välj år</button>
  <div id="wrapper" class="sectionWindow">
    <div id="myChart" class="col-12 col-m-12"></div>
    <div id="tempChart" class="col-12 col-m-12"></div>
  </div>
  <div id="weatherForecastChart" class="col-4 col-m-4 sectionWindow"></div>
  <div id="getWeatherWindow" class="col-4 col-m-4 sectionWindow">
    <h2>Väder</h2>
    <p class="weatherText">Dag: </p> <div class="weatherOutput" id="outputWeatherDate"></div>
    <br>
    <p class="weatherText">Temperatur: </p> <div class="weatherOutput" id="outputWeatherTemp"></div>
    <br>
    <p class="weatherText">Väder: </p> <div class="weatherOutput" id="outputWeatherWeather"></div>
    <br>
    <p class="weatherText">Anmärkningar</p> <br><textarea readonly class="weatherOutput" id="outputWeatherRemark"></textarea>
    <br>
    <h2 class="weatherText">Välj dag</h2>
    <br>
    <input id="inputWeatherDate" type="date"></input>
    <br>
    <button id="getWeatherButton" onclick="getWeather()">Hämta väder</button>

  </div>
  <div id="kartPieChart" class="col-4 col-m-4 sectionWindow"></div>
  <div id="endFiller"></div>
  <?php
  echo "<script>";
  require "../../js/analyticsScript/analyticsChartScript.js";
  echo "</script>";
  ?>
</div>
