//Hämtar data för grafen
function getChartData(startDate, endDate) {

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

//Hämtar datum för grafen
function getDateData() {
  var startDate = document.getElementById("inputStartDate").value;
  var endDate = document.getElementById("inputEndDate").value;

  getChartData(startDate, endDate);

}

//Frågar vilken data du vill Hämta
//Inom vilket tidsspann
function selectData(action) {
  //"Knappen 'all data' hämtar för 100 år"
  if (action == 1) {
    document.getElementById("dataButtonAll").style.display = "none";
    document.getElementById("dataButtonSelected").style.display = "none";
    document.getElementById("dataSelectText").style.display = "none";


    loadChart("2018-01-01", "3018-01-01");

  } else {
    var startYear;
    var finishYear;

    //Prompts för att hämta start/Slutår
    alertify.prompt("Skriv in vilket år grafen ska börja", "",
      function(evt, value) {
        //2 = radera race data
        startYear = value;

        setTimeout(function() {
          alertify.prompt("Skriv in vilket år grafen ska sluta", "",
            function(evt, value) {
              //2 = radera race data
              finishYear = value;
              //Sätter första/Sista datumet på året
              startDate = startYear + "-01-01"
              finishDate = finishYear + "-12-31"

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
var kartPieSeries = [];



//Inställningar för kartGrafen
var options = {
  chart: {
    height: 350,
    id: 'kartChart',
    group: 'social',
    width: "100%",
    type: "line",
    animations: {
      initialAnimation: {
        enabled: false
      }
    }
  },
  colors: ['#0015ff', '#14c611', '#f90233', '#fbff35'],
  stroke: {
    curve: 'straight',
    dashArray: [0, 5, 5, 5]
  },
  series: [{
      name: "Totala antalet karts",
      data: totalSeries
    },
    {
      name: "Stora karts",
      data: largeKartSeries
    },
    {
      name: "Små karts",
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
    labels:{
      minWidth:0,
    }
  },
  title: {
    text: "Antal karts",
    align: 'left',
  }

};

//Inställningar för tempGrafen
var tempChartoptions = {
  chart: {
    height: 200,
    id: 'tempChart',
    group: 'social',
    width: "100%",
    type: "line",
    toolbar: {
      show: false,
    },
    animations: {
      initialAnimation: {
        enabled: false
      }
    }
  },
  colors: ['#0015ff'],
  stroke: {
    curve: 'straight',
    dashArray: [0, 5, 5, 5]
  },
  series: [{
    name: "Temperatur",
    data: weatherTempSeries
  }],
  xaxis: {
    type: 'datetime'
  },
  yaxis: {
    min: 0,
    labels:{
      minWidth:0,
    }
  },
  title: {
    text: "Temperatur",
    align: 'left',
  },

};

//Inställningar för väderGrafen
var forecastChartoptions = {
  chart: {
    width: "100%",
    type: "pie",
  },
  labels: ['Soligt', 'Molnigt', 'Regnigt'],
  colors: ['#ff8121', '#777777', '#3025f9'],
  series: [0, 0, 0],
  title: {
    text: "Vädret",
    align: 'center',
  }

};

//Inställningar för kartPajGrafen
var kartPieOptions = {
  chart: {
    width: "100%",
    type: "pie",
  },
  labels: ['Stora', 'Små', 'Dubbla'],
  colors: ['#14c611', '#f90233', '#ff8121'],
  series: [0, 0, 0],
  title: {
    text: "Gokart uppdelning",
    align: 'center',
  }

};

//Skapar alla 4 grafer
//Kopplar dom till en div och inställningar
var chart = new ApexCharts(
  document.querySelector("#myChart"), options
);
var tempChart = new ApexCharts(
  document.querySelector("#tempChart"), tempChartoptions
);
var forecastChart = new ApexCharts(
  document.querySelector("#weatherForecastChart"), forecastChartoptions
);
var kartPieChart = new ApexCharts(
  document.querySelector("#kartPieChart"), kartPieOptions
);

//Renderar alla grafer och hämtar sedan datan
function loadChart(startDate, endDate) {
  chart.render();
  tempChart.render();
  forecastChart.render();
  document.getElementById("getWeatherWindow").style.display = "block";
  kartPieChart.render();
  getChartData(startDate, endDate)
}

//Omvandlar all rådata till arrays aka datasets som graferna kan använda
function generateData(inputObj) {

  var maxAllTime = 0;

  object = JSON.parse(inputObj);
  console.log("object V");
  console.log(object);

  var countCloud = 0;
  var countSun = 0;
  var countRain = 0;

  var totalLargeKart = 0;
  var totalSmallKart = 0;
  var totalDoubleKart = 0;

  //Skapar datasets
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

    if (object[i].dayWeather == "Soligt") {
      countSun++;
    } else if (object[i].dayWeather == "Molnigt") {
      countCloud++;
    } else if (object[i].dayWeather == "Regn") {
      countRain++;
    }
    console.log("maxallTime");
    console.log(object[i].dayTotal + ">" + maxAllTime);

    //Hittar dagen med flest karts
    if (object[i].dayTotal > maxAllTime) {
      console.log("lool");
      maxAllTime = object[i].dayTotal;
    }
    var totalLargeKart = +totalLargeKart + +object[i].largeKart;
    var totalSmallKart = +totalSmallKart + +object[i].smallKart;
    var totalDoubleKart = +totalDoubleKart + +object[i].doubleKart;

  }
  weatherForecastSeries.push(countSun, countCloud, countRain);
  kartPieSeries.push(totalLargeKart, totalSmallKart, totalDoubleKart);
  console.log("serie");
  console.log(weatherForecastSeries);

  console.log("serie");
  console.log(kartPieSeries);

  console.log(countCloud);
  console.log(totalSeries);
  console.log(totalSeries, largeKartSeries, smallKartSeries, doubleKartSeries)
  chart.updateSeries([{
      data: totalSeries
    }, {
      data: largeKartSeries
    }, {
      data: smallKartSeries
    }, {
      data: doubleKartSeries
    }]),
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
    });
    tempChart.updateSeries([{
      data: weatherTempSeries
    }]);
    forecastChart.updateSeries(weatherForecastSeries);
//  console.log("-");
//  console.log(totalSeries);
//  console.log(weatherTempSeries);
  //console.log("-");
  console.log("ball");
  console.log(kartPieSeries);
  kartPieChart.updateSeries(kartPieSeries);
}


//Hämtar vädret på bestämd dag
function getWeather() {
  var datum = document.getElementById("inputWeatherDate").value;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      console.log(this.responseText);
      obj = JSON.parse(this.responseText);

      if (Object.entries(obj).length > 0) {
        document.getElementById("outputWeatherDate").innerHTML = obj[0].dateStamp;
        document.getElementById("outputWeatherTemp").innerHTML = obj[0].dayTemp + "°C";
        document.getElementById("outputWeatherWeather").innerHTML = obj[0].dayWeather;
        document.getElementById("outputWeatherRemark").innerHTML = obj[0].dayRemark;
      } else {
        document.getElementById("outputWeatherDate").innerHTML = "N/A";
        document.getElementById("outputWeatherTemp").innerHTML = "N/A" + "°C";
        document.getElementById("outputWeatherWeather").innerHTML = "N/A";
        document.getElementById("outputWeatherRemark").innerHTML = "Inget väder registrerat";
      }
    }
  };
  xhttp.open("POST", "../../dbConnections/analyticsConnections/getDayWeatherData.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("weatherDate=" + datum);

}
