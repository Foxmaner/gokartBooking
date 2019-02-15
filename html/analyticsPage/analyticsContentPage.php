<div id="analyticsBackground"></div>
<div class="section col-5 col-s-5" id="analyticsSection">
  <a href="../../index.php"> <div id="analyticsTitleIcon"></div> </a>
  <h1 class="title col-12 col-m-12">Analys</h1>
  <input type="date" id="inputStartDate">
  <input type="date" id="inputEndDate">
  <button onclick="getDateData()">GetDate</button>
  <div id="myChart" class="col-5 col-m-5"></div>
  <?php
  echo "<script>";
  require "../../js/analyticsScript/analyticsChartScript.js";
  echo "</script>";
  ?>
</div>
