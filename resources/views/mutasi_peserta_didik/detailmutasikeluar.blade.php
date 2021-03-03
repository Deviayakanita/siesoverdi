@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Mutasi Keluar
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/mutasikeluar"></i>Daftar Mutasi Keluar</a></li>
      <li> Detail Data Mutasi Keluar</li>
    </ol>
  </section>


<section class="content">
  <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-sign-out"></i> Detail Mutasi Keluar</h3> 
      <div style="float: right;">
      <div style="clear: both;"></div>
      <div align="right">
        <a href="/mutasikeluar" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left"></i></a>
      </div>
      </div>
    </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <td width="200px">No Surat Pindah</td>
              <td width="5px">:</td>
              <td>{{$mutasikeluars->no_srt_pindah}}</td>
            </tr>
            <tr> 
              <td>No Induk Siswa</td>
              <td>:</td>
              <td>{{$mutasikeluars->pesertadidik->nis}}</td>
            </tr>
            <tr> 
              <td>Nama Legkap Siswa</td>
              <td>:</td>
              <td>{{$mutasikeluars->pesertadidik->nm_siswa}}</td>
            </tr>
            <tr>
              <td>Tahun Masuk Siswa</td>
              <td>:</td>
              <td>{{$mutasikeluars->pesertadidik->tahun_masuk}}</td>
            </tr>
            <tr>
              <td>Tahun Ajaran</td>
              <td>:</td>
              <td>{{$mutasikeluars->tahun->tahun_ajaran}}</td>
            </tr>
            <tr>
              <td>Status Peserta Didik</td>
              <td>:</td>
              <td>
                <?php if($mutasikeluars->pesertadidik->sts_siswa == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($mutasikeluars->pesertadidik->sts_siswa == 1)
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
              <td>Sekolah Tujuan</td>
              <td>:</td>
              <td>{{$mutasikeluars->sekolah_tujuan}}</td>
            </tr>
            <tr>
              <td>Tingkat Kelas</td>
              <td>:</td>
              <td>{{$mutasikeluars->tingkat_kelas}}</td>
            </tr>
            <tr>
              <td>Tanggal Pindah</td>
              <td>:</td>
              <td>{{$mutasikeluars->tgl_pindah->isoFormat('D MMMM Y')}}</td>
            </tr>
            <tr>
              <td>Alasan Pindah</td>
              <td>:</td>
              <td>{{$mutasikeluars->alasan_pindah}}</td>
            </tr>
           </table>   
        </div>

        <!-- /.box-body -->
        <div class="box-footer"></div>
      </div>
		
 
</section>	
@endsection