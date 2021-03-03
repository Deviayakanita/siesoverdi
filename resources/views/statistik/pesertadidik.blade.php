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
    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header">
          
          <div id="grafik2" class="box-body"></div>

        </div>
      </div>
    </div>
  
    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header">
          
          <div id="grafik3" class="box-body">


          </div>

        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header">
          
          <div id="grafik4" class="box-body"></div>

        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header">
          
          <div id="grafik5" class="box-body"></div>

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
        text: 'Jumlah Peserta Didik Berdasarkan Tahun'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Peserta Didik (orang)'
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
            label:{
                connectorAllowed: false
        },
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

//Grafik2
Highcharts.chart('grafik2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persentase Peserta Didik Berdasarkan Gender Pada Tahun '+{!! json_encode($tahun) !!}
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
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Perempuan',
            y: {!! json_encode($persen_perempuan) !!},
            selected: true,
            color: '#F1C40F'
        }, {
            name: 'Laki-Laki',
            y: {!! json_encode($persen_laki) !!},
            color: '#27AE60'
        
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
        text: 'Persentase Peserta Didik Berdasarkan Jurusan Pada Tahun '+{!! json_encode($tahun) !!}
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
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'IPA',
            y: {!! json_encode($persen_ipa) !!},
            selected: true,
            color: '#00AB9E'
        }, {
            name: 'IPS',
            y: {!! json_encode($persen_ips) !!},
            color: '#0075B5'
        
       }]    
    
    }]
});

//Grafik 4
Highcharts.chart('grafik4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Peserta Didik Berdasarkan Asal Sekolah'
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
            color: '#EB8C80'
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

// Grafik 5
Highcharts.chart('grafik5', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Orang Tua Berdasarkan Golongan Gaji'
    },
    xAxis: {
        categories: {!! json_encode($categories4) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Orang Tua (orang)'
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
            series: {
            colorByPoint:true
        },
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    credits: {
    enabled: false
    },
    series: {!! json_encode($series4) !!}
});

</script>
@endsection