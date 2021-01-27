@extends('layout.blank')
@section('title', 'Data Mutasi Masuk | Admin')
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
        <a href="{{url('/dashboard')}}">
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
  <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
  <li> Kelola Mutasi</li>
  <li> Data Mutasi Keluar</li>

@endsection

@section('content')
<section class="content" style="padding-top: 2;">
  <div class="row">
    <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-body pad table-responsive" style="width: 200px">
          <td>
            <a href="mutasikeluar"><button type="button" class="btn btn-primary">Tambah Mutasi Keluar</button></a>
          </td>
        </div>
        <form action="/listmtskeluar" method="GET" style="padding-left: 12px">
        <div class="input-group">
          <input type="text" name="cari" class="form-control" placeholder="Search...">
        </div>
        </form>
            <div class="box-body">
                <table id='listusers' class="table table-bordered table-striped table-hover">
                    <thead>
                        <th>No</th>
                        <th>No Surat Pindah</th>
                        <th>NIS</th>
                        <th>Nama Lengkap Siswa</th>
                        <th>Tanggal Pindah</th>
                        <th>Sekolah Tujuan</th>
                        <th>Status Data</th>
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
                                <td>
                                <?php if($mutasikeluar->status_mutasi == 0)
                                {
                                  echo "Non Aktif";
                                }
                                  elseif($mutasikeluar->status_mutasi == 1)
                                {
                                  echo "Aktif";
                                }
                                else
                                {
                                  echo "Non Aktif";
                                }
                                ?>
                                </td>
                                <td style="text-align: center;">
                                 <a href="/detailmutasikeluar/detail/{{ $mutasikeluar->id_mut_klr }}"><i class="fa fa-eye btn-info btn-sm"></i></a>
                                 <a href="editmtskeluar/edit/{{ $mutasikeluar->id_mut_klr }}"><i class="fa fa-edit btn-warning btn-sm""></i></a>
                                 <a href=""><i class="fa fa-print btn-primary btn-sm""></i></a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
    <!-- /.box-body -->
   </div>
  </div>
</div>
@endsection

@section('content-footer')