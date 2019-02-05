

function loadChart() {

  var raceNr = document.getElementById("outputEditLopp").innerHTML;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
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

  var dataPack1 = largeKartDataset;
  var dataPack2 = smallKartDataset;
  var dataPack3 = doubleKartDataset;
  var dates = raceNrDataset;

  console.log(dataPack1);




  var myChart = document.getElementById('myChart').getContext('2d');



  var raceChart = new Chart(myChart, {

    type:'bar',
    data: {
            labels: dates,
            datasets: [
            {
                label: 'Stora',
                data: dataPack1,
                backgroundColor: "green",
                hoverBackgroundColor: "darkgreen",
                hoverBorderWidth: 0
            },
            {
                label: 'Små',
                data: dataPack2,
                backgroundColor: "yellow",
                hoverBackgroundColor: "darkkhaki",
                hoverBorderWidth: 0
            },
            {
                label: 'Dubbla',
                data: dataPack3,
                backgroundColor: "red",
                hoverBackgroundColor: "darkred",
                hoverBorderWidth: 0
            },
            ]
        },
    options:{
      animation:{
        duration: 0
      },
      scales:{
        xAxes:[{
          stacked:true
        }],
        yAxes:[{
          stacked:true,
          ticks: {
            min: 0,
            max: 12,
            stepSize: 1
          }
        }]

      }


    }

  });

}
