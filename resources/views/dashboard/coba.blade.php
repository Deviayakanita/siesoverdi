@extends('layouts.master')

@section('content')
@if(Auth::user() && Auth::user()->level == 0)
	<section class="content-header">
      <h1>
        Dashboard Administrator
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active"><a href="/dashboard"></i>Dashboard</a></li>
      </ol>
    </section> 
@elseif(Auth::user() && Auth::user()->level == 1)
  <section class="content-header">
      <h1>
        Dashboard Kepala Sekolah
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active"><a href="/dashboard"></i>Dashboard</a></li>
      </ol>
    </section> 
@endif

@if(Auth::user() && Auth::user()->level == 0)
    <section class="content" style="overflow-x: auto;">
      <!-- Small boxes (Stat box) -->
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a href="/pesertadidik"><span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span></a>

            <div class="info-box-content">
              <span class="info-box-text">Data Peserta Didik</span>
              <span class="info-box-number">{{$pesertadidik = App\Models\Pesertadidik::count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- ./col -->

        <!-- Info boxes -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a href="/mutasimasuk"><span class="info-box-icon bg-green"><i class="fa fa-sign-in"></i></span></a>
            <div class="info-box-content">
              <span class="info-box-text">Data  Mutasi Masuk</span>
              <span class="info-box-number">{{$mutasimasuk = App\Models\Mutasimasuk::count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
        <!-- Info boxes -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a href="/mutasikeluar"><span class="info-box-icon bg-yellow"><i class="fa fa-sign-out"></i></span></a>
            <div class="info-box-content">
              <span class="info-box-text">Data  Mutasi Keluar</span>
              <span class="info-box-number">{{$mutasikeluar = App\Models\Mutasikeluar::count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- Info boxes -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a href="/alumni"><span class="info-box-icon bg-red"><i class="fa fa-mortar-board"></i></span></a>
            <div class="info-box-content">
             <span class="info-box-text">Data  Alumni</span>
              <span class="info-box-number">{{$alumni = App\Models\Alumni::count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>

      <div>
      <ul class="timeline">

            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-aqua">
                    Data Peserta Didik Terakhir
                  </span>
            </li>
            <!-- /.timeline-label -->
            
            <!-- timeline item -->
            <li>
              <i class="fa fa-bell bg-aqua"></i>
              <div class="timeline-item">
                <div class="timeline-body">
                <table id="#" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama Lengkap Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Tanggal Lahir</th>
                      <th>Tahun Ajaran</th>
                      <th>Status Peserta Didik</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;?>
                    @foreach($pesertadidik_terakhir as $pt)
                    <?php $no++ ;?>
                    <?php $pesertadidik_terakhir = App\Models\Pesertadidik::latest()->limit(3)->get();?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $pt->nis }}</td>
                      <td>{{ $pt->nm_siswa }}</td>
                      <td>{{ $pt->jns_kelamin }}</td>
                      <td>{{ $pt->tmp_lahir }}, {{$pt->tgl_lahir->isoFormat('D MMMM Y') }}</td>
                      <td>{{ $pt->tahun->tahun_ajaran }}</td>
                      <td>
                        <?php
                        if($pt->sts_siswa == 0)
                        {
                          echo "Non Aktif";
                        }
                        elseif($pt->sts_siswa == 1)
                        {  
                          echo "Aktif";
                        }
                        else
                        {
                          echo "Non Aktif";
                        }
                        ?>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                </div>               
              </div>
            </li>
            <!-- END timeline item -->

            <!-- timeline time label -->
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    Data Mutasi Masuk Terakhir
                  </span>
            </li>
            <!-- /.timeline-label -->
            
            <!-- timeline item -->
            <li>
              <i class="fa fa-bell bg-green"></i>
              <div class="timeline-item">
                <div class="timeline-body">
                <table id="#" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>No. Surat Pindah</th>
                      <th>NIS</th>
                      <th>Nama Lengkap Siswa</th>
                      <th>Tahun Ajaran</th>
                      <th>Tanggal Masuk</th>
                      <th>Asal Sekolah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;?>
                    @foreach($mtsmasuk_terakhir as $mtm)
                    <?php $no++ ;?>
                    <?php $mtsmasuk_terakhir = App\Models\Mutasimasuk::latest()->limit(3)->get();?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $mtm->no_srt_pindah }}</td>
                      <td>{{ $mtm->pesertadidik->nis }}</td>
                      <td>{{ $mtm->pesertadidik->nm_siswa }}</td>
                      <td>{{ $mtm->pesertadidik->tahun->tahun_ajaran }}</td>
                      <td>{{ $mtm->tgl_masuk->isoFormat('D MMMM Y')}}</td>
                      <td>{{ $mtm->asal_sekolah }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                </div>               
              </div>
            </li>
            <!-- END timeline item -->
          
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-yellow">
                    Data Mutasi Keluar Terakhir
                  </span>
            </li>
            <!-- /.timeline-label -->
            
            <!-- timeline item -->
            <li>
              <i class="fa fa-bell bg-yellow"></i>
              <div class="timeline-item">
                <div class="timeline-body">
                <table id="#" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>No. Surat Pindah</th>
                      <th>NIS</th>
                      <th>Nama Lengkap Siswa</th>
                      <th>Tahun Ajaran</th>
                      <th>Tanggal Pindah</th>
                      <th>Sekolah Tujuan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;?>
                    @foreach($mtskeluar_terakhir as $mtk)
                    <?php $no++ ;?>
                    <?php $mtskeluar_terakhir = App\Models\Mutasikeluar::latest()->limit(3)->get();?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $mtk->no_srt_pindah }}</td>
                      <td>{{ $mtk->pesertadidik->nis }}</td>
                      <td>{{ $mtk->pesertadidik->nm_siswa }}</td>
                      <td>{{ $mtk->pesertadidik->tahun->tahun_ajaran }}</td>
                      <td>{{ $mtk->tgl_pindah->isoFormat('D MMMM Y')}}</td>
                      <td>{{ $mtk->sekolah_tujuan }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                </div>               
              </div>
            </li>
            <!-- END timeline item -->

            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Data Alumni Peserta Didik
                  </span>
            </li>
            <!-- /.timeline-label -->
            
            <!-- timeline item -->
            <li>
              <i class="fa fa-bell bg-red"></i>
              <div class="timeline-item">
                <div class="timeline-body">
                <table id="#" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama Lengkap Siswa</th>
                      <th>Tahun Ajaran</th>
                      <th>Jenis Perguruan Tinggi</th>
                      <th>Nama Perguruan Tinggi</th>
                      <th>Nama Fakultas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;?>
                    @foreach($alumni_terakhir as $al)
                    <?php $no++ ;?>
                    <?php $alumni_terakhir = App\Models\Alumni::latest()->limit(3)->get();?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $al->pesertadidik->nis }}</td>
                      <td>{{ $al->pesertadidik->nm_siswa }}</td>
                      <td>{{ $al->pesertadidik->tahun->tahun_ajaran }}</td>
                      <td>{{ $al->jns_pt }}</td>
                      <td>{{ $al->nm_pt }}</td>
                      <td>{{ $al->nm_fak }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                </div>               
              </div>
            </li>
            <!-- END timeline item -->
          </ul>
        </div>
     </section>

 @elseif(Auth::user() && Auth::user()->level == 1)
 <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Statistik</h3>

              <p>Peserta Didik</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <a href="/statistikpesertadidik" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Statistik<sup style="font-size: 20px"></sup></h3>

              <p>Mutasi Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <a href="/statistikmtsmasuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Statistik<sup style="font-size: 20px"></sup></h3>

              <p>Mutasi Keluar</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <a href="/statistikmtskeluar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Statistik</h3>

              <p>Alumni</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <a href="/statistikalumni" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </section>
    @endif

@endsection
