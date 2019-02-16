function getChartData(startDate, endDate){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);

      generateData(this.responseText);
      //var obj = JSON.parse(this.responseText);
    }
  };
  xhttp.open("POST", "../../dbConnections/analyticsConnections/getAnalyticsData.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("startDate=" + startDate + "&endDate=" + endDate);

}

function getDateData() {
var startDate = document.getElementById("inputStartDate").value;
var endDate = document.getElementById("inputEndDate").value;

getChartData(startDate, endDate);

}


var series = [];



var options = {
  chart: {
    height: 380,
    width: "100%",
    type: "area",
    animations: {
      initialAnimation: {
        enabled: false
      }
    }
  },
  colors: ['#0015ff', '#e9ff00'],
  series: [
    {
      name: "Antalet karts",
      data: series
    },
    {
      name: "Temperatur",
      data: [1]
    }
  ],
  xaxis: {
    type: 'datetime'
  }
};


var chart = new ApexCharts(
  document.querySelector("#myChart"),
  options
);

chart.render();

function generateData(inputObj) {
  object = JSON.parse(inputObj);
  var i = 0;
  for (var i = 0; i < Object.keys(object).length; i++) {
    console.log(i);
    series.push({
      x: object[i].raceDate,
      y: object[i].dayTotal
    })
  }
  console.log(series);
  chart.updateSeries([{
  data: series
  }])
}
