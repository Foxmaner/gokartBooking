

function loadChart() {
  var raceChart = {
    raceNr: [],
    largeKarts: [],
    smallKarts: [],
    doubleKarts: []
  };

  var raceNr = document.getElementById("outputEditLopp").innerHTML;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
      var obj = JSON.parse(this.responseText);
      console.log(obj.double[2]);

    }
  };
  xhttp.open("POST", "../../dbConnections/cashConnections/getCashChartConnection.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("racenr=" + raceNr);
}

var dataPack1 = [5, 4, 3, 2, 1, 5, 0, 1, 5, 2, 5];
var dataPack2 = [5, 4, 3, 2, 1, 7, 1, 1, 2, 5, 5];
var dataPack3 = [5, 4, 3, 2, 1, 5, 0, 1, 5, 7, 5];
var dates = ["Race1", "Race2", "Race3", "Race4", "Race5", "Race6", "Race7", "Race8", "Race9", "Race10", "Race11"];

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
    scales:{
      xAxes:[{
        stacked:true
      }],
      yAxes:[{
        stacked:true
      }]

    }
  }
});
