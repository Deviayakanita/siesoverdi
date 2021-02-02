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
        <li class="active"><a href="{{url('listortu')}}"><i class="fa fa-circle-o"></i> Data Orang Tua</a></li>
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
  <li> Detail Orang Tua</li>
@endsection

@section('content')
<section class="content" style="padding-top: 0;" style="width: 200px">
	<div class="box box-primary">
        <div class="box-header with-border">
          <div class="col-md-3 col-sm-4"><h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Detail Orang Tua </h4>
          </div>
          <div align="right">
            <a href="/listortu" class="btn btn-default"><i class="fa fa-long-arrow-left"></i></a>
          </div>
        </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <td width="200px">No Induk Siswa</td>
              <td width="5px">:</td>
              <td>{{$detailorangtua->pesertadidik->nis}}</td>
            </tr>
            <tr> 
              <td>Nama Lengkap Siswa</td>
              <td>:</td>
              <td>{{$detailorangtua->pesertadidik->nm_siswa}}</td>
            </tr>
            <tr>
              <td>Tahun Ajaran Siswa</td>
              <td>:</td>
              <td>{{$detailorangtua->pesertadidik->tahun_ajaran}}</td>
            </tr>
            <tr>
              <td>Status Peserta Didik</td>
              <td>:</td>
              <td>
                <?php if($detailorangtua->pesertadidik->sts_siswa == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($detailorangtua->pesertadidik->sts_siswa == 1)
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
              <td>Nama Ayah</td>
              <td>:</td>
              <td>{{$detailorangtua->nm_ayah}}</td>
            </tr>
            <tr>
              <td>Pendidikan Ayah</td>
              <td>:</td>
              <td>{{$detailorangtua->pddk_ayah}}</td>
            </tr>
            <tr>
              <td>Pekerjaan Ayah</td>
              <td>:</td>
              <td>{{$detailorangtua->job_ayah}}</td>
            </tr>
            <tr>
              <td>Penghasilan Ayah</td>
              <td>:</td>
              <td>{{$detailorangtua->penghasilan_ayah}}</td>
            </tr>
            <tr>
              <td>Nama Ibu</td>
              <td>:</td>
              <td>{{$detailorangtua->nm_ibu}}</td>
            </tr>
            <tr>
              <td>Pendidikan Ibu</td>
              <td>:</td>
              <td>{{$detailorangtua->pddk_ibu}}</td>
            </tr>
            <tr>
              <td>Pekerjaan Ibu</td>
              <td>:</td>
              <td>{{$detailorangtua->job_ibu}}</td>
            </tr>
            <tr>
              <td>Penghasilan Ibu</td>
              <td>:</td>
              <td>{{$detailorangtua->penghasilan_ibu}}</td>
            </tr>
            <tr>
              <td>Status Data Orang Tua</td>
              <td>:</td>
              <td>
                <?php if($detailorangtua->sts_orang_tua == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($detailorangtua->sts_orang_tua == 1)
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
              <td>{{$detailorangtua->created_at}}</td>
            </tr>
            <tr>
              <td>Tanggal Diupdate</td>
              <td>:</td> 
              <td>{{$detailorangtua->updated_at}}</td>
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