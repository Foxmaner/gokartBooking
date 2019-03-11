//This shit is slow!
function getRaceData() {

  var raceNr = document.getElementById("outputEditLopp").innerHTML;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      var obj = JSON.parse(this.responseText);
      createDatasets(obj);
    }
  };
  xhttp.open("GET", "../../dbConnections/cashConnections/getCashChartConnection.php?racenr=" + raceNr, true);

  xhttp.send();
};


var options = {
  chart: {
    height: 350,
    type: 'bar',
    stacked: true,
    toolbar: {
      show: true
    },
  },
  responsive: [{
    breakpoint: 480,
    options: {
      legend: {
        position: 'bottom',
        offsetX: -10,
        offsetY: 0
      }
    }
  }],
  plotOptions: {
    bar: {
      horizontal: false,
    },
  },
  series: [{
    name: 'Stora',
    data: []
  }, {
    name: 'Små',
    data: []
  }, {
    name: 'Dubbla',
    data: []
  }],
  yaxis: {
    min: 0,
    max: 12,
    tickAmount: 6,
    labels: {
      show: false,
    },
  },
  annotations: {
    yaxis: [{
      y: 10,
      borderColor: "red",
      label: {
        borderColor: "black",
        style: {
          color: "#fff",
          background: "red"
        },
        text: "Maxgräns"
      }
    }]
  },
  legend: {
    show: false,
  },
  fill: {
    opacity: 1
  },
}

var chart = new ApexCharts(
  document.querySelector("#myChart"),
  options
);

function loadChart() {
  chart.render();
  updateChart();
}

function updateChart() {
  getRaceData();
}


function createDatasets(obj) {
  console.log("createDatasets() object V ");
  console.log(obj);

  dataPack1 = [];
  dataPack2 = [];
  dataPack3 = [];
  raceNr = [];

  for (var i = 0; i < obj.length; i++) {
    dataPack1[i] = obj[i].largeKart;
    dataPack2[i] = obj[i].smallKart;
    dataPack3[i] = obj[i].doubleKart;
    raceNr[i] = parseInt(obj[i].raceNr, 10);
  }

  if (obj.length < 11) {
    var startNr = +raceNr[obj.length - 1] + 1;
    for (var i = obj.length + 1; i <= 11; i++) {
      dataPack1.push(0);
      dataPack2.push(0);
      dataPack3.push(0);
      raceNr.push(startNr);
      startNr++;
    }
  }


  chart.updateOptions({
    xaxis: {
      categories: raceNr
    },
  })
  chart.updateSeries([{
    name: 'Stora',
    data: dataPack1
  }, {
    name: 'Små',
    data: dataPack2
  }, {
    name: 'Dubbla',
    data: dataPack3
  }]);
}

function setActiveRaceAnnotations(activeRace) {
  console.log("AktivtRace: " + activeRace);


  if (+activeRace > 0) {
    if (+(document.getElementById("outputEditLopp").innerHTML) >= 6 &&
      +activeRace < (+(document.getElementById("outputEditLopp").innerHTML) + 6) &&
      +activeRace > (+(document.getElementById("outputEditLopp").innerHTML) - 6)
    ) {
      chart.clearAnnotations();
      chart.addXaxisAnnotation({
        x: +activeRace,
        borderColor: "blue",
        label: {
          borderColor: "black",
          style: {
            color: "#fff",
            background: "blue"
          },
          text: 'Aktivt race'
        },
      });

      chart.addYaxisAnnotation({
        position: 'front',
        y: 10,
        borderColor: "red",
        label: {
          borderColor: "black",
          style: {
            color: "#fff",
            background: "red"
          },
          text: "Maxgräns"
        },
      });

    } else if (+(document.getElementById("outputEditLopp").innerHTML) < 6) {

        if (+activeRace <= 11) {
          chart.clearAnnotations();
          chart.addXaxisAnnotation({
            x: +activeRace,
            borderColor: "blue",
            label: {
              borderColor: "black",
              style: {
                color: "#fff",
                background: "blue"
              },
              text: 'Aktivt race'
            },
          });

          chart.addYaxisAnnotation({
            position: 'front',
            y: 10,
            borderColor: "red",
            label: {
              borderColor: "black",
              style: {
                color: "#fff",
                background: "red"
              },
              text: "Maxgräns"
            },
          });
        }


    }else{
      
    }


  }

}

function getActiveRace() {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      var obj = JSON.parse(this.responseText);
      setActiveRaceAnnotations(this.responseText);
    }
  };
  xhttp.open("GET", "../../dbConnections/cashConnections/getActiveRaceConnection.php", true);

  xhttp.send();
};
