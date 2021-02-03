@extends('layouts.master')

@section('content')
	<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active"><a href="/dashboard"></i>Dashboard</a></li>
      </ol>
    </section> 

@if(Auth::user() && Auth::user()->level == 0)
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Data</h3>

              <p>Peserta Didik</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="pesertadidik" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Data</h3>

              <p>Mutasi Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-in"></i>
            </div>
            <a href="mutasimasuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Data</h3>

              <p>Mutasi Keluar</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-out"></i>
            </div>
            <a href="muatsikeluar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Data</h3>

              <p>Alumni</p>
            </div>
            <div class="icon">
              <i class="fa fa-files-o"></i>
            </div>
            <a href="Alumni" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div>
  <ul class="timeline">

           <li class="time-label">
                  <span class="bg-aqua">
                    Data Peserta Didik Terakhir
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-bell bg-blue"></i>

              <div class="timeline-item">
               
                <div class="timeline-body">
                  <table id="#" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th>No</th>
                        <th>No Surat Pindah</th>
                        <th>No Induk Siswa</th>
                        <th>Nama Lengkap Siswa</th>
                        <th>Tanggal Masuk</th>
                        <th>Asal Sekolah</th>
                        <th>Status</th>
                </tr>
                </tbody>
            </table>
                </div>
                              
              </div>
            </li>
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    Data Mutasi Masuk Terakhir
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-bell bg-blue"></i>

              <div class="timeline-item">
               
                <div class="timeline-body">
                  <table id="#" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th>No</th>
                        <th>No Surat Pindah</th>
                        <th>No Induk Siswa</th>
                        <th>Nama Lengkap Siswa</th>
                        <th>Tanggal Masuk</th>
                        <th>Asal Sekolah</th>
                        <th>Status</th>
                </tr>
                </tbody>
            </table>
                </div>
                              
              </div>
            </li>
          
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-yellow">
                    Data Mutasi keluar Terakhir
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-bell bg-blue"></i>

              <div class="timeline-item">
               
                <div class="timeline-body">
                  <table id="#" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th>No</th>
                        <th>No Surat Pindah</th>
                        <th>No Induk Siswa</th>
                        <th>Nama Lengkap Siswa</th>
                        <th>Tanggal Masuk</th>
                        <th>Asal Sekolah</th>
                        <th>Status</th>
                </tr>
                </tbody>
            </table>
                </div>
                              
              </div>
            </li>


            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Data Alumni Terakhir
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-bell bg-blue"></i>

              <div class="timeline-item">
               
                <div class="timeline-body">
                  <table id="#" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th>No</th>
                        <th>No Surat Pindah</th>
                        <th>No Induk Siswa</th>
                        <th>Nama Lengkap Siswa</th>
                        <th>Tanggal Masuk</th>
                        <th>Asal Sekolah</th>
                        <th>Status</th>
                </tr>
                </tbody>
            </table>
                </div>
                              
              </div>
            </li>
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
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Statistik<sup style="font-size: 20px"></sup></h3>

              <p>Orang Tua Peserta Didik</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Statistik<sup style="font-size: 20px"></sup></h3>

              <p>Mutasi Peserta Didik</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Statistik</h3>

              <p>Alumni Peseta Didik</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </section>
    @endif

</div>
@endsection
