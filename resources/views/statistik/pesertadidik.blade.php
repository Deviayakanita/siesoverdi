@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Statistik Peserta Didik
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Statistik Peserta Didik</li>
    </ol>
  </section>

<section class="content">
  <div class="row">
    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header">
          
          <div id="grafik1" class="box-body">

          </div>

        </div>
      </div>
    </div>

    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header">
          
          <div id="grafik2" class="box-body">


          </div>

        </div>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header">
          
          <div id="grafik3" class="box-body">


          </div>

        </div>
      </div>
    </div>

    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header">
          
          <div id="grafik4" class="box-body">


          </div>

        </div>
      </div>
    </div>
  </div>

</section>
@endsection

@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">

// Grafik 1 
Highcharts.chart('grafik1', {

    title: {
        text: 'Jumlah Peserta Didik Berdasarkan Tahun Ajaran'
    },

    yAxis: {
        title: {
            text: 'Jumlah (orang)'
        }
    },

    xAxis: {
        accessibility: {
            rangeDescription: 'Tahun Ajaran'
        }
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false,
                        color: 'black'
            },
            pointStart: 2016
        }
    },
    credits: {
    enabled: false
    },

    series: [{
        name: 'Peserta Didik',
        data: [100, 200, 300, 150, 600],
        color: 'black'
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

//Grafik 2
Highcharts.chart('grafik2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persentase Peserta Didik Berdasarkan Gender'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    credits: {
    enabled: false
    },
    series: [{
        name: 'Gender',
        colorByPoint: true,
        data: [{
            name: 'Laki-laki',
            y: 61.41,
            sliced: true,
            selected: true,
            color: '#B8C068'
        }, {
            name: 'Perempuan',
            y: 11.84,
            selected: true,
            color: '#9FC5AA'
        }]
    }]
});


// Grafik 3
Highcharts.chart('grafik3', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persentase Peserta Didik Berdasarkan Jurusan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    credits: {
    enabled: false
    },
    series: [{
        name: 'Jurusan',
        colorByPoint: true,
        data: [{
            name: 'IPA',
            y: 61.41,
            sliced: true,
            selected: true,
            color: '#00AB9E'
        }, {
            name: 'IPS',
            y: 11.84,
            selected: true,
            color: '#0075B5'
        }]
    }]
});


// Grafik 4
Highcharts.chart('grafik4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Orang Tua Berdasarkan Golongan Gaji'
    },
    xAxis: {
        categories: [
            'Kurang dari Rp.500,000',
            'Rp.500,000 - Rp.1,000,000',
            'Rp.1,000,000 - Rp.2,000,000',
            'Rp.2,000,000 - Rp.5,000,000',
            'Rp.5,000,000 - Rp.20,000,000',
            'Lebih dari Rp.20,000,000',
            'Tidak Penghasilan'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah (orang)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} orang</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    credits: {
    enabled: false
    },
    series: [{
        name: 'Ayah',
        data: [100, 200, 150, 200, 100, 50]

    }, {
        name: 'Ibu',
        data: [50, 60, 80, 20, 80, 100],
        color: 'pink'

    }]
});
</script>
@endsection