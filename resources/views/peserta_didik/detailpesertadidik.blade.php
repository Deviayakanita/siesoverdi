@extends('layout.blank')
@section('title', 'Data Peserta Didik | Admin')
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
        <li class="active"><a href="{{url('listpesertadidik')}}"><i class="fa fa-circle-o"></i> Data Peserta Didik</a></li>
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

@section('content-title','Detail Peserta Didik')

@section('breadcrumb')
  <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
  <li> Kelola Peserta Didik</li>
  <li> Data Peserta Didik</li>
  <li> Detail Peserta Didik</li>
@endsection

@section('content')
<section class="content" style="padding-top: 2px;" style="width: 200px">
	<div class="box box-primary">
        <div class="box-header with-border">
          <div class="col-md-3 col-sm-4"><i class="fa fa-calendar"></i> Detail Peserta Didik
          </div>
        </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <td width="200px">No Induk Siswa</td>
              <td width="5px">:</td>
              <td>{{$detailpesertadidik->nis}}</td>
            </tr>
            <tr> 
              <td>Nama Lengkap Siswa</td>
              <td>:</td>
              <td>{{$detailpesertadidik->nm_siswa}}</td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td>{{$detailpesertadidik->jns_kelamin}}</td>
            </tr>
            <tr>
              <td>Tempat lahir</td>
              <td>:</td>
              <td>{{$detailpesertadidik->tmp_lahir}}</td>
            </tr>
            <tr>
              <td>Tanggal lahir</td>
              <td>:</td>
              <td>{{$detailpesertadidik->tgl_lahir}}</td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>:</td>
              <td>{{$detailpesertadidik->agama}}</td>
            </tr>
            <tr>
              <td>Alamat Siswa</td>
              <td>:</td>
              <td>{{$detailpesertadidik->alamat_siswa}}</td>
            </tr>
            <tr>
              <td>Provinsi</td>
              <td>:</td>
              <td>{{$detailpesertadidik->provinsi}}</td>
            </tr>
            <tr>
              <td>Kabupaten</td>
              <td>:</td>
              <td>{{$detailpesertadidik->kabupaten}}</td>
            </tr>
            <tr>
              <td>No Telpon</td>
              <td>:</td>
              <td>{{$detailpesertadidik->no_tlpn}}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td>{{$detailpesertadidik->email}}</td>
            </tr>
            <tr>
              <td>Tahun Ajaran</td>
              <td>:</td>
              <td>{{$detailpesertadidik->tahun_ajaran}}</td>
            </tr>
            <tr>
              <td>Jurusan</td>
              <td>:</td>
              <td>{{$detailpesertadidik->jurusan}}</td>
            </tr>
            <tr>
              <td>Status Siswa</td>
              <td>:</td>
              <td>
                <?php if($detailpesertadidik->sts_siswa == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($detailpesertadidik->sts_siswa == 1)
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
            <tr>
              <td>Keterangan</td>
              <td>:</td> 
              <td>{{$detailpesertadidik->keterangan}}</td>
            </tr>
            <tr>
              <td>Tanggal Dibuat</td>
              <td>:</td> 
              <td>{{$detailpesertadidik->created_at}}</td>
            </tr>
            <tr>
              <td>Tanggal Diupdate</td>
              <td>:</td> 
              <td>{{$detailpesertadidik->updated_at}}</td>
            </tr>
           </table> 
           
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
          <a href="/listpesertadidik" class="btn btn-primary">KEMBALI</a>
        </div>
      </div>
				
 
</section>	
@endsection

@section('content-footer')