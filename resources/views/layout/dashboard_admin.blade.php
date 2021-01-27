@extends('layout.master')
@section('title', 'Dashboard | Admin')
@section('topbaraccount')
@section('sidemenu')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
    <li class="header" style="font-size: 12px">DASHBOARD</li>
    <li class="active">
        <a href="{{url('/dashboard')}}">
            <i class="fa fa-home"></i><span> Dashboard</span>
        </a>
    </li>
    <li class="header" style="font-size: 12px" >DATA PESERTA DIDIK</li>
    <li class="treeview">
    	<a href="#">
   		<i class="fa fa-edit"></i><span> Kelola Peserta Didik</span>
    		<span class="pull-right-container">
    		<i class="fa fa-angle-left pull-right"></i>
    		</span>
    	</a>
    	<ul class="treeview-menu">
    		<li><a href="{{url('listpesertadidik')}}"><i class="fa fa-circle-o"></i> Data Peserta Didik</a></li>
    		<li><a href="{{url('listortu')}}"><i class="fa fa-circle-o"></i> Data Orang Tua</a></li>
    	</ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-edit"></i><span> Kelola Mutasi</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('listmtsmasuk')}}"><i class="fa fa-circle-o"></i> Data Mutasi Masuk</a></li>
            <li><a href="{{url('listmtskeluar')}}"><i class="fa fa-circle-o"></i> Data Mutasi Keluar</a></li>     
        </ul>
    </li>
    <li>
        <a href="{{url('listalumni')}}">
        <i class="fa fa-edit"></i><span> Kelola Alumni</span>
        </a>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Selamat Datang,')

@section('breadcrumb')
	<li><i class="fa fa-home"></i> Home</li>
	<li class="active">Dashboard</li>
@endsection

@section('content')
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
            <a href="/listpesertadidik" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Data<sup style="font-size: 20px"></sup></h3>

              <p>Mutasi Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-in"></i>
            </div>
            <a href="/listmtsmasuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="/listmtskeluar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="/listalumni" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
@endsection

 