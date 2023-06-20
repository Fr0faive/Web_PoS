<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/11.0.1/css/highcharts.min.css" integrity="sha512-/WPjwCqRHyh1ZjYVY4kbfwQog690qITBV/IlAoshySBusRi+KJUC+zNRGkE1Qf7vB8Zpj6sVzwm54idfpPzTKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/11.0.1/highcharts.min.js" integrity="sha512-XC3Yk00lu4YeJueUiJ2dhW1feASV0F7rCWlIKbPDSl5nLULRBzieHsDujma6SKpQHOlL1b/Vx89T4VSkq89wtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="bg-dashboard bg-auto sm:bg-cover">
    @include('partials.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="flex justify-center items-center bg-white mx-96 rounded-full backdrop-filter backdrop-blur-md bg-opacity-60">
            <span class="font-bold text-4xl my-3 uppercase text-center">Laporan <br> Penjualan</span>
        </div>
        <div class="mt-3 bg-white bg-cover rounded-lg backdrop-filter backdrop-blur-md bg-opacity-40 h-auto">
            <div class="flex flex-row justify-center items-center">
                <div class="flex-none w-98 p-2" id="column_chart">
                </div>
                <div class="flex-auto w-80 p-2" id="pie_chart">
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function name(params) {
            
            Highcharts.chart('column_chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Omzet tahun {{ $year }}'
                },
                subtitle: {
                    // text: 'Source: WorldClimate.com'
                },
                xAxis: {
                    categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'Mei',
                    'Jun',
                    'Jul',
                    'Agu',
                    'Sep',
                    'Okt',
                    'Nov',
                    'Des'
                    ],
                    // crosshair: false
                },
                yAxis: {
                    min: 0,
                    title: {
                    text: 'Pendapatan (Rp)'
                    }
                },
                plotOptions: {
                    column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                    }
                },
                series: [{
                    name: 'Omzet',
                    // data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                    data: JSON.parse(`{!! json_encode($omzet_arr) !!}`)
    
                }]
            });
    
            Highcharts.chart('pie_chart', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Transaksi tahun {{ $year }}',
                    align: 'center'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>'
                },
                accessibility: {
                    point: {
                    valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                    }
                },
                series: [{
                    name: 'Jumlah',
                    colorByPoint: true,
                    /* data: [{
                        name: 'Chrome',
                        y: 100,
                    }, {
                        name: 'Edge',
                        y: 14.77
                    },  {
                        name: 'Firefox',
                        y: 4.86
                    }, {
                        name: 'Safari',
                        y: 2.63
                    }, {
                        name: 'Internet Explorer',
                        y: 1.53
                    },  {
                        name: 'Opera',
                        y: 1.40
                    }, {
                        name: 'Sogou Explorer',
                        y: 0.84
                    }, {
                        name: 'QQ',
                        y: 0.51
                    }, {
                        name: 'Other',
                        y: 2.6
                    }] */
                    data: JSON.parse(`{!! json_encode($penjualan_arr) !!}`)
                }]
            });
        })
    </script>
</body>

</html>
