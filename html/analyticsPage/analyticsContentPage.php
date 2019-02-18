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
  <div id="wrapper">
    <div id="myChart" class="col-12 col-m-12"></div>
    <div id="tempChart" class="col-12 col-m-12"></div>
  </div>
  <div id="weatherForecastChart" class="col-6 col-m-6"></div>
  <?php
  echo "<script>";
  require "../../js/analyticsScript/analyticsChartScript.js";
  echo "</script>";
  ?>
</div>
