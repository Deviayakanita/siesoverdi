@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Statistik Alumni
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Statistik Alumni</li>
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
        type: 'column'
    },
    title: {
        text: 'Jumlah Peserta Didik Berdasarkan Perguruan Tinggi Terbanyak'
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
            color: '#F9AF1F'
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
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persentase Peserta Didik Berdasarkan Jenis Perguruan Tinggi'
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
            name: 'Negeri',
            y: {!! json_encode($persen_negeri) !!},
            selected: true,
            color: '#ACE7FF'
        }, {
            name: 'Swasta',
            y: {!! json_encode($persen_swasta) !!},
            selected: true,
            color: '#408247'
        }, {
            name: 'Tidak Kuliah',
            y: {!! json_encode($persen_tdk_kuliah) !!},
            selected: true,
            color: '#FFF5BA'
        }]
    }]
});

</script>
@endsection