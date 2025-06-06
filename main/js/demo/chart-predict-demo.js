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

var d1 = 0;
var d2 = 0;
var d3 = 0;
var d4 = 0;
var d5 = 0;

// Bar Chart Weekly
var ctx = document.getElementById("predictedChart");

var myPredictChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Mon", "Tue", "Wed", "Thu", "Fri"],
    datasets: [{
      label: "Revenue",
      backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue'],
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [d1, d2, d3, d4, d5],
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
          unit: 'week'
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
          max: 200,
          maxTicksLimit: 10,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value, 2) + ' kwh';
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
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel, 2) + ' kwh';
        }
      }
    },
  }
});

// AJAX Implementation
function predict(MO, TU, WE, TH, FR)  {
  $.ajax({
    url: 'server/predictedBar.php',
    dataType: 'json',
    method: 'GET',
    success: function(predicted) {
      let maximum = Math.max(predicted.MO, predicted.TU, predicted.WE, predicted.TH, predicted.FR);
      maximum = parseInt(maximum);
      var length = maximum.toString().length - 1;
      var roundedUp = parseInt(maximum.toString().charAt(0)) + 1
      myPredictChart.options.scales.yAxes.pop()
      myPredictChart.options.scales.yAxes.push({
        ticks: {
          min: 0,
          max: (roundedUp) * Math.pow(10, length),
          maxTicksLimit: 10,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value, 2) + ' kwh';
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
      myPredictChart.update()
      setTimeout(function(){
        myPredictChart.data.datasets[0].data[0] = predicted.MO,
        myPredictChart.update()
      }, 1000)
      setTimeout(function(){
        myPredictChart.data.datasets[0].data[1] = predicted.TU
        myPredictChart.update()
      }, 2000)
      setTimeout(function(){
        myPredictChart.data.datasets[0].data[2] = predicted.WE
        myPredictChart.update()
      }, 3000)
      setTimeout(function(){
        myPredictChart.data.datasets[0].data[3] = predicted.TH
        myPredictChart.update()
      }, 4000)
      setTimeout(function(){
        myPredictChart.data.datasets[0].data[4] = predicted.FR
        myPredictChart.update()
      }, 5000)
    }
  })
}
 