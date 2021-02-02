@extends('layout.blank')
@section('title', 'Data Orang Tua | Admin')
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
    <li class=" active treeview">
      <a href="#">
      <i class="fa fa-edit"></i><span> Kelola Peserta Didik</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('listpesertadidik')}}"><i class="fa fa-circle-o"></i> Data Peserta Didik</a></li>
        <li class="active"><a href="{{url('listortu')}}"><i class="fa fa-dot-circle-o text-aqua"></i> Data Orang Tua</a></li>
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
            <li><a href="{{url('listmtsmasuk')}}"><i class="fa fa-circle-o"></i><span> Data Mutasi Masuk</span> </a></li>
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

@section('content-title','Data Orang Tua')

@section('breadcrumb')
  <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
  <li> Kelola Peserta Didik</li>
  <li> Daftar Orang Tua</li>
@endsection

@section('content')
<section class="content" style="padding-top:0;">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
          <div class="col-md-7 col-sm-8"><h4><i class="fa fa-users"></i> Daftar Orang Tua</h4>
          </div>
         <div align= "right" class="box-body pad table-responsive" style="padding-right: 0px;">
            <div>
              <a href="/orangtua" class="btn btn-primary" type="button">
                  <i class="fa fa-pencil"></i> Tambah Data
              </a>
              <a href="/orangtua" class="btn btn-success" type="button">
                  <i class="fa fa-print"></i> Cetak
              </a>
            </div> 
             <!--  <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" align="right">
                  <i class="fa fa-pencil"></i> Tambah Mutasi Keluar
                </button> 
              </div> -->
          </div>
          <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
             </div>
         </div>
        </div>
            <div class="row">
                <div class="col-sm-12">
                <table id='example1' class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIS</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Lengkap Siswa</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Ayah</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Penghasilan Ayah</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Ibu</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Penghasilan Ibu</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status Data</th>
                    <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($ortus as $orangtua)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $orangtua->pesertadidik->nis }}</td>
                                <td>{{ $orangtua->pesertadidik->nm_siswa }}</td>
                                <td>{{ $orangtua->nm_ayah }}</td>
                                <td>{{ $orangtua->penghasilan_ayah }}</td> 
                                <td>{{ $orangtua->nm_ibu }}</td>
                                <td>{{ $orangtua->penghasilan_ibu }}</td>
                                <td>
                                <?php if($orangtua->sts_orang_tua == 0)
                                {
                                  echo "Non Aktif";
                                }
                                  elseif($orangtua->sts_orang_tua == 1)
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
                                    <a href="editortu/edit/{{ $orangtua->id_orang_tua }}"><i class="fa fa-edit btn-warning btn-sm"></i></a>
                                    <a href="/detailorangtua/detail/{{ $orangtua->id_orang_tua }}"><i class="fa fa-eye btn-info btn-sm"></i></a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                      </tbody>
                </table>
            </div>
        </div>
    <!-- /.box-body -->
   </div>
  </div>
</div>
</div>
@endsection

@section('content-footer')