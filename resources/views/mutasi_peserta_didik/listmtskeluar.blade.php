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
            <li class="active"><a href="{{url('listmtskeluar')}}"><i class="fa fa-circle-o text-aqua"></i> Data Mutasi Keluar</a></li>     
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

@section('content-title','Data Mutasi Keluar')

@section('breadcrumb')
  <li><a href="dashboard_admin"><i class="fa fa-home"></i> Menu</a></li>
  <li> Kelola Mutasi</li>
@endsection

@section('content')
<section class="content" style="padding-top: 5;">
  <div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                Daftar Mutasi Keluar Peserta Didik
            </div>
            <div class="box-body pad table-responsive" style="width: 200px">
          <td>
            <a href="mutasikeluar"><button type="button" class="btn btn-block btn-primary">Tambah Mutasi Keluar</button></a>
          </td>
        </div>
            <div class="box-body">
                <table id='listusers' class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>No Surat Pindah</th>
                        <th>NIS</th>
                        <th>Nama Lengkap Siswa</th>
                        <th>Tanggal Pindah</th>
                        <th>Sekolah Tujuan</th>
                        <th>Status</th>
                        <th style="text-align: center">Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($mutasikeluars as $mutasikeluar)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $mutasikeluar->no_srt_pindah }}</td>
                                <td>{{ $mutasikeluar->pesertadidik->nis }}</td>
                                <td>{{ $mutasikeluar->pesertadidik->nm_siswa }}</td>
                                <td>{{ $mutasikeluar->tgl_pindah }}</td>
                                <td>{{ $mutasikeluar->sekolah_tujuan }}</td>
                                <td>{{ $mutasikeluar->status_mutasi }}</td>
                                <td style="text-align: center;">
                                  <a href="/detailmutasikeluar/detail/{{ $mutasikeluar ->id_mutasi_klr }}" class="btn btn-primary">View</a>
                                  <a href="editmutasikeluar/edit/{{ $mutasikeluar->id_mut_klr }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                   </tbody>
                </table>
            </div>
    <!-- /.box-body -->
   </div>
  </div>
</div>
@endsection

@section('content-footer')