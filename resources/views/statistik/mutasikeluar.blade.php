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

    chart: {
        type: 'line'
    },
    title: {
        text: 'Jumlah Mutasi Masuk Berdasarkan Tahun Ajaran'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!},
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
        series: {
            color: '#1D79F2'
        },
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    credits: {
    enabled: false
    },

    series: {!! json_encode($series)!!}
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
        categories: {!!json_encode($categories1)!!},
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
        series: {
            color: '#DEB887'
        },
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    credits: {
    enabled: false
    },
    series: {!!json_encode($series1)!!}
});

</script>
@endsection