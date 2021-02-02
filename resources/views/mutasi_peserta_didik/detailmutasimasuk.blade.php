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
            <li class="active"><a href="{{url('listmtsmasuk')}}"><i class="fa fa-circle-o"></i><span> Data Mutasi Masuk</span> </a></li>
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

@section('content-title','Data Mutasi Masuk')

@section('breadcrumb')
  <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
  <li> Kelola Mutasi</li>
  <li> Daftar Mutasi Masuk</li>
  <li> Detail Mutasi Masuk</li>
@endsection

@section('content')
<section class="content" style="padding-top: 0;" style="width: 200px">
	<div class="box box-primary">
        <div class="box-header with-border">
          <div class="col-md-3 col-sm-4"><h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-sign-in"></i> Detail Mutasi Masuk </h4>
          </div>
          <div align="right">
            <a href="/listmtsmasuk" class="btn btn-default"><i class="fa fa-long-arrow-left"></i></a>
          </div>
        </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <td width="200px">No Surat Pindah</td>
              <td width="5px">:</td>
              <td>{{$detailmutasimasuk->no_srt_pindah}}</td>
            </tr>
            <tr> 
              <td>No Induk Siswa</td>
              <td>:</td>
              <td>{{$detailmutasimasuk->pesertadidik->nis}}</td>
            </tr>
            <tr> 
              <td>Nama Lengkap Siswa</td>
              <td>:</td>
              <td>{{$detailmutasimasuk->pesertadidik->nm_siswa}}</td>
            </tr>
            <tr>
              <td>Tahun Ajaran</td>
              <td>:</td>
              <td>{{$detailmutasimasuk->pesertadidik->tahun_ajaran}}</td>
            </tr>
            <tr>
              <td>Alamat Siswa</td>
              <td>:</td>
              <td>{{$detailmutasimasuk->pesertadidik->alamat_siswa}}</td>
            </tr>
            <tr>
              <td>Provinsi</td>
              <td>:</td>
              <td>{{$detailmutasimasuk->pesertadidik->provinsi}}</td>
            </tr>
            <tr>
              <td>Kabupaten</td>
              <td>:</td>
              <td>{{$detailmutasimasuk->pesertadidik->kabupaten}}</td>
            </tr>
            <tr>
              <td>Status Peserta Didik</td>
              <td>:</td>
              <td>
                <?php if($detailmutasimasuk->pesertadidik->sts_siswa == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($detailmutasimasuk->pesertadidik->sts_siswa == 1)
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
              <td>Asal Sekolah</td>
              <td>:</td>
              <td>{{$detailmutasimasuk->asal_sekolah}}</td>
            </tr>
            <tr>
              <td>Tingkat Kelas</td>
              <td>:</td>
              <td>{{$detailmutasimasuk->tingkat_kelas}}</td>
            </tr>
            <tr>
              <td>Tanggal Masuk</td>
              <td>:</td>
              <td>{{$detailmutasimasuk->tgl_masuk}}</td>
            </tr>
            <tr>
              <td>Alasan Pindah</td>
              <td>:</td>
              <td>{{$detailmutasimasuk->alasan_pindah}}</td>
            </tr>
            <tr>
              <td>Status Data Mutasi</td>
              <td>:</td>
              <td>
                <?php if($detailmutasimasuk->status_mutasi == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($detailmutasimasuk->status_mutasi == 1)
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
              <td>Tanggal Dibuat</td>
              <td>:</td> 
              <td>{{$detailmutasimasuk->created_at}}</td>
            </tr>
            <tr>
              <td>Tanggal Diupdate</td>
              <td>:</td> 
              <td>{{$detailmutasimasuk->updated_at}}</td>
            </tr>
           </table>   
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
              <a href="#" class="btn btn-info btn-primary">
                  <i class="fa fa-print"></i> Cetak
              </a>
          </div>
      </div>
				
 
</section>	
@endsection

@section('content-footer')