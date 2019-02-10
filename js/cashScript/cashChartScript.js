var dataPack1 = [];
var dataPack2 = [];
var dataPack3 = [];
var raceNr = [];

//This shit is slow!
function getRaceData() {

var raceNr = document.getElementById("outputEditLopp").innerHTML;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      console.log(this.responseText);
      var obj = JSON.parse(this.responseText);

      console.log(obj.double[2]);
      createDatasets(obj);
    }
  };
  xhttp.open("POST", "../../dbConnections/cashConnections/getCashChartConnection.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("racenr=" + raceNr);
};

function createDatasets(obj) {

  renderChart(obj.raceNrArray, obj.large, obj.small, obj.double)

}


function renderChart(raceNrDataset, largeKartDataset, smallKartDataset, doubleKartDataset) {

  dataPack1 = largeKartDataset;
  dataPack2 = smallKartDataset;
  dataPack3 = doubleKartDataset;
  raceNr = raceNrDataset;

  console.log(dataPack1);
  console.log(dataPack2);
  console.log(dataPack3);
  console.log(raceNr);



}



var options = {
    chart: {
        height: 350,
        type: 'bar',
        stacked: true,
        toolbar: {
            show: true
        },
        zoom: {
            enabled: true
        }
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
    },{
        name: 'Små',
        data: []
    },{
        name: 'Dubbla',
        data: []
    }],
    xaxis: {
        categories: raceNr,
    },
    legend: {
        position: 'right',
        offsetY: 40
    },
    fill: {
        opacity: 1
    },
}

var chart = new ApexCharts(
    document.querySelector("#myChart"),
    options
);

function loadChart(){
  getRaceData();
  chart.render();

}

function updateChart() {
  getRaceData();

  chart.updateSeries([{
      name: 'Stora',
      data: dataPack1
  },{
      name: 'Små',
      data: dataPack2
  },{
      name: 'Dubbla',
      data: dataPack3
  }]);
  chart.updateOptions({
  xaxis: {
    categories: raceNr,
    tickAmount: 1
  },
})

}
