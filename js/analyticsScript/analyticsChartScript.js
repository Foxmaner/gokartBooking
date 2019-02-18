function getChartData(startDate, endDate){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);

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

function selectData(action){
  if (action == 1) {
    document.getElementById("dataButtonAll").style.display = "none";
    document.getElementById("dataButtonSelected").style.display = "none";
    document.getElementById("dataSelectText").style.display = "none";


    loadChart("2018-01-01", "3018-01-01");

  }else {
    var startYear;
    var finishYear;

    alertify.prompt("Skriv in vilket år grafen ska börja", "",
      function(evt, value) {
        //2 = radera race data
        startYear=value;

        setTimeout(function () {
          alertify.prompt("Skriv in vilket år grafen ska sluta", "",
            function(evt, value) {
              //2 = radera race data
              finishYear=value;

              startDate = startYear+"-01-01"
              finishDate = finishYear+"-12-31"

              document.getElementById("dataButtonAll").style.display = "none";
              document.getElementById("dataButtonSelected").style.display = "none";

              loadChart(startDate, finishDate);
            },
            function() {
              alertify.error('Misslyckat: Handligen avbröts');
            }).setHeader('<em> Välj data </em> ').set('type', 'number');
        }, 10);


      },
      function() {
        alertify.error('Misslyckat: Handligen avbröts');
      }).setHeader('<em> Välj data </em> ').set('type', 'number');





  }
}


var totalSeries = [];
var largeKartSeries = [];
var smallKartSeries = [];
var doubleKartSeries = [];
var weatherTempSeries = [];
var weatherForecastSeries = [];


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
  colors: ['#0015ff', '#008FFB','#00E396','#FEB019'],
  stroke: {
  curve: 'straight',
  dashArray: [0, 5, 5, 5]
  },
  series: [
    {
      name: "Totala antalet karts",
      data: totalSeries
    },
    {
      name: "Stora karts: ",
      data: largeKartSeries
    },
    {
      name: "Små karts: ",
      data: smallKartSeries
    },
    {
      name: "Dubbla karts",
      data: doubleKartSeries
    },
  ],
  xaxis: {
    type: 'datetime'
  },
  yaxis: {
    min: 0,
    max: 700,
    tickAmount: 14,
  },
  title: {
    text: "Antal karts",
    align: 'left',
  }

};

var forecastChartoptions = {
  chart: {
    width: "100%",
    type: "pie",
    animations: {
      initialAnimation: {
        enabled: false
      }
    }
  },
  labels: ['Soligt', 'Molnigt', 'Regnigt'],
  colors: ['#ebf442', '#b4bab5','#3025f9'],
  series: [0,0,0],
  title: {
    text: "Vädret",
    align: 'left',
  }

};


var chart = new ApexCharts(
  document.querySelector("#myChart"),options
);
var forecastChart = new ApexCharts(
  document.querySelector("#weatherForecastChart"),forecastChartoptions
);

function loadChart(startDate, endDate) {
  chart.render();
  forecastChart.render();
  getChartData(startDate, endDate)
}

function generateData(inputObj) {

    var maxAllTime = 0;

  object = JSON.parse(inputObj);
  console.log("object V");
  console.log(object);

  var countCloud = 0;
  var countSun = 0;
  var countRain = 0;

  for (var i = 0; i < Object.keys(object).length; i++) {
    console.log(i);
    totalSeries.push({
      x: object[i].raceDate,
      y: object[i].dayTotal
    });
    largeKartSeries.push({
      x: object[i].raceDate,
      y: object[i].largeKart
    });
    smallKartSeries.push({
      x: object[i].raceDate,
      y: object[i].smallKart
    });
    doubleKartSeries.push({
      x: object[i].raceDate,
      y: object[i].doubleKart
    });
    weatherTempSeries.push({
      x: object[i].raceDate,
      y: object[i].dayTemp
    });

    if (object[i].dayWeather=="sun") {
      countSun++;
    }else if (object[i].dayWeather=="cloud") {
      countCloud++;
    }else if (object[i].dayWeather=="rain") {
      countRain++;
    }

    if (object[i].dayTotal>maxAllTime) {
      maxAllTime=object[i].dayTotal;
    }
  }
  weatherForecastSeries.push(countSun,countCloud,countRain);
  console.log("serie");
  console.log(weatherForecastSeries);

  console.log(countCloud);
  console.log(totalSeries);
  console.log(totalSeries, largeKartSeries, smallKartSeries, doubleKartSeries)
  chart.updateSeries([{
  data: totalSeries
  },{
  data: largeKartSeries
  },{
  data: smallKartSeries
  },{
  data: doubleKartSeries
  }
  ]),
  chart.addYaxisAnnotation({
    y: maxAllTime,
    borderColor: "red",
    label: {
      borderColor: "black",
      style: {
        color: "#fff",
        background: "red"
      },
      text: "Rekord"
    }
  }),
  forecastChart.updateSeries(weatherForecastSeries);
}
