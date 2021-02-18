@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Statistik Mutasi Keluar
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Statistik Mutasi Keluar</li>
    </ol>
  </section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          
          <div id="grafik1" class="box-body">

          </div>

        </div>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          
          <div id="grafik2" class="box-body">


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
        text: 'Jumlah Mutasi Keluar Berdasarkan Tahun Ajaran'
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


// Grafik 2
Highcharts.chart('grafik2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Mutasi Keluar Berdasarkan Sekolah Tujuan Terbanyak'
    },
    xAxis: {
        categories: [
            'SMA Negeri 90 Jakarta',
            'SMA Santo Yoseph',
            'SMAK Harapan',
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
        name: 'Jumlah Peserta Didik',
        data: [30, 20, 15]

    }]
});

</script>
@endsection