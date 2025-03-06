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

var m1 = 26.64;
var m2 = 22.47;
var m3 = 18.35;
var m4 = 23.68;
var m5 = 24.59;
var m6 = 18.11;
var m7 = 13.33;
var m8 = 12.24;
// Area Chart Example
var ctx = document.getElementById("myPeakChart");
var myPeakChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["8:00 AM", "9:00 AM", "10:00 AM", "11:00 AM", "1:00 PM", "2:00 PM", "3:00 PM", "4:00 PM"],
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
      data: [m1, m2, m3, m4, m5, m6, m7, m8],
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
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel, 2) + ' kwh';
        }
      }
    }
  }
});


// // AJAX Implementation
// function monthly(Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec) {
//   $.ajax({
//     url: 'server/monthLine.php',
//     dataType: 'json',
//     method: 'GET',
//     success: function(month) {
//       let maximum = Math.max(month.Jan, month.Feb, month.Mar, month.Apr, month.May, month.Jun, month.Jul, month.Aug, month.Sep, month.Oct, month.Nov, month.Dec);
//       maximum = parseInt(maximum);
//       var length = maximum.toString().length - 1;
//       var roundedUp = parseInt(maximum.toString().charAt(0)) + 1
//       myPeakChart.data.datasets[0].data[0] = month.Jan
//       myPeakChart.data.datasets[0].data[1] = month.Feb
//       myPeakChart.data.datasets[0].data[2] = month.Mar
//       myPeakChart.data.datasets[0].data[3] = month.Apr
//       myPeakChart.data.datasets[0].data[4] = month.May
//       myPeakChart.data.datasets[0].data[5] = month.Jun
//       myPeakChart.data.datasets[0].data[6] = month.Jul
//       myPeakChart.data.datasets[0].data[7] = month.Aug
//       myPeakChart.data.datasets[0].data[8] = month.Sep
//       myPeakChart.data.datasets[0].data[9] = month.Oct
//       myPeakChart.data.datasets[0].data[10] = month.Nov
//       myPeakChart.data.datasets[0].data[11] = month.Dec
//       myPeakChart.options.scales.yAxes.pop()
//       myPeakChart.options.scales.yAxes.push({
//         ticks: {
//           min: 0,
//           max: (roundedUp) * Math.pow(10, length),
//           maxTicksLimit: 10,
//           padding: 10,
//           // Include a dollar sign in the ticks
//           callback: function(value, index, values) {
//             return '₱' + number_format(value, 2);
//           }
//         },
//         gridLines: {
//           color: "rgb(234, 236, 244)",
//           zeroLineColor: "rgb(234, 236, 244)",
//           drawBorder: false,
//           borderDash: [2],
//           zeroLineBorderDash: [2]
//         }
//       })
//       myPeakChart.update()
//     },
//   });
// }
// monthly();
// setInterval(monthly, 1500); 