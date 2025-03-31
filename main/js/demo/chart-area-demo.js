// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals = 0, dec_point = '.', thousands_sep = ',') {
  number = parseFloat(number) || 0;
  const fixedNumber = number.toFixed(decimals);

  let [integerPart, decimalPart] = fixedNumber.split('.');
  integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);

  return decimalPart ? integerPart + dec_point + decimalPart : integerPart;
}

var m1 = m2 = m3 = m4 = m5 = m6 = 0;
var m7 = m8 = m9 = m10 = m11 = m12 = 0;

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Consumptions",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12],
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
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
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
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel, 2);
        }
      }
    }
  }
});


// AJAX Implementation
function monthly(Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec) {
  $.ajax({
    url: 'server/monthLine.php',
    dataType: 'json',
    method: 'GET',
    success: function(month) {
      let maximum = Math.max(month.Jan, month.Feb, month.Mar, month.Apr, month.May, month.Jun, month.Jul, month.Aug, month.Sep, month.Oct, month.Nov, month.Dec);
      maximum = parseInt(maximum);
      var length = maximum.toString().length - 1;
      var roundedUp = parseInt(maximum.toString().charAt(0)) + 1
      myLineChart.data.datasets[0].data[0] = month.Jan
      myLineChart.data.datasets[0].data[1] = month.Feb
      myLineChart.data.datasets[0].data[2] = month.Mar
      myLineChart.data.datasets[0].data[3] = month.Apr
      myLineChart.data.datasets[0].data[4] = month.May
      myLineChart.data.datasets[0].data[5] = month.Jun
      myLineChart.data.datasets[0].data[6] = month.Jul
      myLineChart.data.datasets[0].data[7] = month.Aug
      myLineChart.data.datasets[0].data[8] = month.Sep
      myLineChart.data.datasets[0].data[9] = month.Oct
      myLineChart.data.datasets[0].data[10] = month.Nov
      myLineChart.data.datasets[0].data[11] = month.Dec
      myLineChart.options.scales.yAxes.pop()
      myLineChart.options.scales.yAxes.push({
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
      myLineChart.update()
    },
  });
}
monthly();
setInterval(monthly, 1500); 