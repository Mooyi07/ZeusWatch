  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

var v1 = 0;
var v2 = 0;
var v3 = 0;

var ctx = document.getElementById("myDailyChart");

var myDailyChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["ECL", "MTB", "R19"],
    datasets: [{
      label: "Revenue",
      backgroundColor: ['#df4e66', '#4e73df', '#4edf8d'],
      hoverBackgroundColor: "#dfac4e",      
      borderColor: "#4e73df",
      data: [v1, v2, v3],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'day'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1000,
          maxTicksLimit: 10,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '₱' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel, 2);
        }
      }
    },
  }
});

// AJAX Implementation
function daily(r1, r2, r3) {
  $.ajax({
    url: 'server/roomBar.php',
    dataType: 'json',
    method: 'GET',
    success: function(room) {
      let maximum = Math.max(room.r1, room.r2, room.r3);
      maximum = parseInt(maximum);
      var length = maximum.toString().length - 1;
      var roundedUp = parseInt(maximum.toString().charAt(0)) + 1
      myDailyChart.data.datasets[0].data[0] = room.r1
      myDailyChart.data.datasets[0].data[1] = room.r2
      myDailyChart.data.datasets[0].data[2] = room.r3
      myDailyChart.options.scales.yAxes.pop()
      myDailyChart.options.scales.yAxes.push({
        ticks: {
          min: 0,
          max: (roundedUp) * Math.pow(10, length),
          maxTicksLimit: 10,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '₱' + number_format(value, 2);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      })
      myDailyChart.update()
      if (document.getElementById("dailyCons") != null){
        document.getElementById("dailyCons").innerHTML = "₱ " + number_format(room.r1 + room.r2 + room.r3, 2);
      }
    },
  });
}
daily();
setInterval(daily, 1500); 