@extends('layout.blank')
@section('title', 'Data Mutasi Keluar | Admin')
@section('topbaraccount')
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{url('adminLTE/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
        <span class="hidden-xs">Alexander Pierce</span>
    </a>

    <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">
        <img src="{{url('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        <p>
        Alexander Pierce - Web Developer
        <small>Member since Nov. 2012</small>
        </p>
    </li>
    </ul>
</li>
@endsection

@section('sidemenu')
<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
    <li>
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
    <li class=" active treeview">
        <a href="#">
        <i class="fa fa-edit"></i><span> Kelola Mutasi</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('listmtsmasuk')}}"><i class="fa fa-circle-o"></i><span> Data Mutasi Masuk</span> </a></li>
            <li class="active"><a href="{{url('listmtskeluar')}}"><i class="fa fa-circle-o"></i> Data Mutasi Keluar</a></li>     
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

@section('content-title','Tambah Data Mutasi Keluar')

@section('breadcrumb')
  <li><a href="dashboard_admin"><i class="fa fa-home"></i> Dashboard</a></li>
  <li> Kelola Mutasi</li>
@endsection

@section('content')
<section class="content" style="padding-top: 5;">
  <form action="{{route('mutasikeluar.store')}}" method="post" style="margin-left: 200px; margin-right: 200px">
    {{csrf_field()}}

     <div class="box box-primary">
      <form role="form">
      <div class="box-body">

    <div class="form-group">
      <label for="inputsurat">No Surat Pindah</label>
      <input type="text" class="form-control" id="inputsurat" name="no_srt_pindah">
    </div>

    <!-- <div class="form-group col-md-6">
      <label for="inputnisn">NIS</label>
      <input type="nisn" class="form-control" id="inputnisn" name="nis">
    </div> -->

    <div class="form-group">
      <label for="inputasalsekolah">Sekolah Tujuan</label>
      <input type="text" class="form-control" id="inputasalsekolah" name="sekolah_tujuan">
    </div>

    <div class="form-group">
      <label for="inputState">Tingkat Kelas</label>
      <select id="inputState" class="form-control" name="tingkat_kelas">
        <option selected>pilih</option>
        <option value="X">X</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
      </select>
    </div>
        
    <div class="form-group">
      <label for="input_tglmasuk">Tanggal pindah</label>
      <input type="date" class="form-control" id="input_tglmasuk" name="tgl_pindah">
    </div>

    <div class="form-group">
      <label for="inputalasan">Alasan Pindah</label>
      <input type="text" class="form-control" id="inputalasan" name="alasan_pindah">
    </div>

     <div class="form-group">
      <label for="inputState">Status Mutasi</label>
      <select id="inputState" class="form-control" name="status_mutasi">
        <option selected>pilih</option>
        <option value="1">AKTIF</option>
        <option value="0">NON AKTIF</option>
      </select>
    </div>
   <div>
      <button type="submit" class="btn btn-primary" style="margin-left: 2px">SIMPAN DATA</button>
    </div>

</div>
</form>
</div>
</section>  
@endsection

@section('content-footer')