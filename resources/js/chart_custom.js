var Months = new Array();
var NumberBooks = new Array();
var m;

$.get('get-book-data-to-chart', function(response){
    /*console.log(response);*/
    response.forEach(function(data){
        switch(data.month){
        case 1: m = "January";
            break;
        case 2: m = "February";
            break;
        case 3: m = "March";
            break;
        case 4: m = "April";
            break;
        case 5: m = "May";
            break;
        case 6: m = "June";
            break;
        case 7: m = "July";
            break;
        case 8: m = "August";
            break;
        case 9: m = "September";
            break;
        case 10: m = "October";
            break;
        case 11: m = "November";
            break;
        case 12: m = "December";
            break;
        }
        Months.push(m);
        NumberBooks.push(data.numberBook);
    });
});

Chart.defaults.global.defaultFontColor = 'Red';
Chart.defaults.global.defaultFontFamily = 'Arial';
Chart.defaults.global.defaultFontSize = 15;
var lineChart = document.getElementById('line-chart').getContext("2d");
console.log(lineChart);
var myChart = new Chart(lineChart, {
    type: 'line',
    data: {
        labels:Months,
        datasets: [{
            label: 'books',
            data: NumberBooks
        }]
    },
    options: {
        scales: {
          yAxes: [{
              ticks: {
                  beginAtZero:true
              }
          }]
        }
    }
});


