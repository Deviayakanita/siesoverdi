@extends('layout.master')
@section('title', 'Dashboard | Admin')
@section('topbaraccount')
@section('sidemenu')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
    <li class="active">
        <a href="{{url('layout/dashboard_admin')}}">
            <i class="fa fa-home"></i><span> Dashboard</span>
        </a>
    </li>
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
    <li class="treeview">
        <a href="#">
        <i class="fa fa-bar-chart-o"></i><span> Statistik</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Peserta Didik</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Mutasi Peserta Didik</a></li>
             <li><a href="#"><i class="fa fa-circle-o"></i> Alumni Peserta Didik</a></li>        
        </ul>
</ul>
</section>


<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Selamat Datang,')

@section('breadcrumb')
	<li><a href="master"><i class="fa fa-home"></i> Home</a></li>
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
          <div class="small-box bg-yellow">
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
@endsection