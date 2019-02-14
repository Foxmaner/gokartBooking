function validateWeekData() {
  return true;
}

function getStartWeekData() {
var startDate = 0;
var endDate = 0;


  alertify.prompt("Skriv startvecka. <br> Använd enbart nummer!", "",
    function(evt, value) {
      //2 = radera race data
      if (true) {

      };
      validateWeekData(value, 1);
    },
    function() {
      alertify.error('Misslyckat: Handligen avbröts');
    }).setHeader('<em> Välj data </em> ').set('type', 'number');

    return [startDate, endDate];
}

function getEndWeekData() {


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
