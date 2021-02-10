@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Mutasi Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard3"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/alumni"></i>Daftar Alumni</a></li>
      <li> Detail Data Alumni</li>
    </ol>
  </section>


<section class="content">
  <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-user"></i> Detail Alumni</h3> 
      <div style="float: right;">
      <div style="clear: both;"></div>
      <div align="right">
        <a href="/alumni" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left"></i></a>
      </div>
      </div>
    </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <td width="200px">No Induk Siswa</td>
              <td width="5px">:</td>
              <td>{{$alumnis->pesertadidik->nis}}</td>
            </tr>
            <tr> 
              <td>Nama Lengkap Siswa</td>
              <td>:</td>
              <td>{{$alumnis->pesertadidik->nm_siswa}}</td>
            </tr>
            <tr>
              <td>Status Peserta Didik</td>
              <td>:</td>
              <td>
                <?php if($alumnis->pesertadidik->sts_siswa == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($alumnis->pesertadidik->sts_siswa == 1)
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
              <td>Jenis Perguruan Tinggi</td>
              <td>:</td>
              <td>{{$alumnis->jns_pt}}</td>
            </tr>
            <tr> 
              <td>Nama Perguruan Tinggi</td>
              <td>:</td>
              <td>{{$alumnis->nm_pt}}</td>
            </tr>
            <tr>
              <td>Nama Fakultas</td>
              <td>:</td>
              <td>{{$alumnis->nm_fak}}</td>
            </tr>
            <tr>
              <td>Nama Jurusan</td>
              <td>:</td>
              <td>{{$alumnis->nm_jurusan}}</td>
            </tr>
            <tr>
              <td>Tanggal Dibuat</td>
              <td>:</td> 
              <td>{{$alumnis->created_at}}</td>
            </tr>
            <tr>
              <td>Tanggal Diupdate</td>
              <td>:</td> 
              <td>{{$alumnis->updated_at}}</td>
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
			</div>
 
</section>	
@endsection