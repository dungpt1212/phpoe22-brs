var Months = new Array();
var NumberBooks = new Array();
var m;
var currentTime = new Date();
var year = currentTime.getFullYear();

$.ajax({
    url: 'get-book-data-to-chart',
    method: "POST",
    data:{
        _token : $('meta[name="csrf-token"]').attr('content'),
        year : year

    },
    success:function(response){
        console.log(response);
        for(i = 1; i <= 12; i++){
            switch(response[i].month){
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
            NumberBooks.push(response[i].numberBook);
        };

        Chart.defaults.global.defaultFontColor = 'Red';
        Chart.defaults.global.defaultFontFamily = 'Arial';
        Chart.defaults.global.defaultFontSize = 15;
        var lineChart = document.getElementById('line-chart').getContext("2d");
        /*console.log(lineChart);*/
        var myChart = new Chart(lineChart, {
            type: 'line',
            data: {
                labels:Months,
                datasets: [{
                    label: 'books',
                    data: NumberBooks,
                    borderColor: 'Red',
                    pointBackgroundColor: 'green',
                    borderWidth: 1,
                    pointHoverBackgroundColor: 'violet',
                    backgroundColor: '#009688'
                }]
            },
            options: {
                scales: {
                  yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            steps:10
                        }
                    }]
                }
            }
        });
        /*function getRandomColorHex() {
            var hex = "0123456789ABCDEF",
            color = "#";
            for (var i = 1; i <= 6; i++) {
                color += hex[Math.floor(Math.random() * 16)];
            }
            return color;
        }*/
    }
});


$('#selMonth').change(function(event) {
    var Months = new Array();
    var NumberBooks = new Array();
    var m;
    year = $(this).val();
    console.log(year);
    $.ajax({
        url: 'get-book-data-to-chart',
        method: "POST",
        data:{
            _token : $('meta[name="csrf-token"]').attr('content'),
            year : year

        },
        success:function(response){
            $('#title_month').text(year);
            console.log(response);
            for(i = 1; i <= 12; i++){
                switch(response[i].month){
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
                NumberBooks.push(response[i].numberBook);
            };

            Chart.defaults.global.defaultFontColor = 'Red';
            Chart.defaults.global.defaultFontFamily = 'Arial';
            Chart.defaults.global.defaultFontSize = 15;
            /*$('.panel-body').html('');*/
            $('.panel-body').html('<canvas id="line-chart"></canvas>');
            var lineChart = document.getElementById('line-chart').getContext("2d");
            console.log(lineChart);
            var myChart = new Chart(lineChart, {
                type: 'line',
                data: {
                    labels:Months,
                    datasets: [{
                        label: 'books',
                        data: NumberBooks,
                        borderColor: 'Red',
                        pointBackgroundColor: 'green',
                        borderWidth: 1,
                        pointHoverBackgroundColor: 'violet',
                        backgroundColor: '#009688',
                    }]
                },
                options: {
                    scales: {
                      yAxes: [{
                          ticks: {
                                beginAtZero:true,
                                callback: function(value) {
                                    if (value % 1 === 0) {
                                        return value;
                                    }
                                }

                            }
                        }]
                    }
                }
            });
            $('.panel-body').hide();
            $('.panel-body').slideDown('slow');
            /*function getRandomColorHex() {
                var hex = "0123456789ABCDEF",
                color = "#";
                for (var i = 1; i <= 6; i++) {
                    color += hex[Math.floor(Math.random() * 16)];
                }
                return color;
            }*/
        }
    });
});
