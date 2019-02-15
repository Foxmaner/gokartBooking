function getChartData(startDate, endDate){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      console.log(this.responseText);
      var obj = JSON.parse(this.responseText);

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



function generateData(count, yrange) {
  var i = 0;
  var series = [];
  while (i < count) {
    var x = (i + 1).toString();
    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

    series.push({
      x: x,
      y: y
    });
    i++;
  }
  return series;
}


var options = {
  chart: {
    height: 350,
    type: 'heatmap',
  },
  plotOptions: {
    heatmap: {
      shadeIntensity: 0.5,

      colorScale: {
        ranges: [{
            from: 0,
            to: 250,
            name: 'low',
            color: '#00A100'
          },
          {
            from: 250,
            to: 350,
            name: 'medium',
            color: '#128FD9'
          },
          {
            from: 350,
            to: 450,
            name: 'high',
            color: '#FFB200'
          },
          {
            from: 450,
            to: 1000,
            name: 'extreme',
            color: '#FF0000'
          }
        ]
      }
    }
  },
  dataLabels: {
    enabled: false
  },
  series: [{
      name: 'Vecka1',
      data: generateData(7, {
        min: 0,
        max: 55
      })
    },
    {
      name: 'Vecka2',
      data: generateData(7, {
        min: 0,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: 0,
        max: 55
      })
    },
    {
      name: 'Vecka4',
      data: generateData(7, {
        min: 0,
        max: 55
      })
    },
    {
      name: 'Vecka5',
      data: generateData(7, {
        min: 0,
        max: 55
      })
    },
    {
      name: 'Vecka6',
      data: generateData(7, {
        min: 0,
        max: 55
      })
    },
    {
      name: 'Vecka7',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },
    {
      name: 'Vecka3',
      data: generateData(7, {
        min: -30,
        max: 55
      })
    },

  ],
  title: {
    text: 'HeatMap Chart with Color Range'
  },

}

var chart = new ApexCharts(
  document.querySelector("#myChart"),
  options
);

chart.render();
