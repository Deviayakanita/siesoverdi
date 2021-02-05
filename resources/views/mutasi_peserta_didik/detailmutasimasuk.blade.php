@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Mutasi Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard3"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/mutasimasuk"></i>Daftar Mutasi Masuk</a></li>
      <li> Detail Data Mutasi Masuk</li>
    </ol>
  </section>


<section class="content">
  <div class="box box-primary">
      <div class="box-header with-border">
      <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-sign-in"></i> Detail Mutasi Masuk</h3> 
      <div style="float: right;">
      <div style="clear: both;"></div>
      <div align="right">
        <a href="/mutasimasuk" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left"></i></a>
      </div>
      </div>
    </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <td width="200px">No Surat Pindah</td>
              <td width="5px">:</td>
              <td>{{$mutasimasuks->no_srt_pindah}}</td>
            </tr>
            <tr> 
              <td>No Induk Siswa</td>
              <td>:</td>
              <td>{{$mutasimasuks->pesertadidik->nis}}</td>
            </tr>
            <tr> 
              <td>Nama Lengkap Siswa</td>
              <td>:</td>
              <td>{{$mutasimasuks->pesertadidik->nm_siswa}}</td>
            </tr>
            <tr>
              <td>Tahun Ajaran</td>
              <td>:</td>
              <td>{{$mutasimasuks->pesertadidik->tahun_ajaran}}</td>
            </tr>
            <tr>
              <td>Alamat Siswa</td>
              <td>:</td>
              <td>{{$mutasimasuks->pesertadidik->alamat_siswa}}</td>
            </tr>
            <tr>
              <td>Provinsi</td>
              <td>:</td>
              <td>{{$mutasimasuks->pesertadidik->provinsi}}</td>
            </tr>
            <tr>
              <td>Kabupaten</td>
              <td>:</td>
              <td>{{$mutasimasuks->pesertadidik->kabupaten}}</td>
            </tr>
            <tr>
              <td>Status Peserta Didik</td>
              <td>:</td>
              <td>
                <?php if($mutasimasuks->pesertadidik->sts_siswa == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($mutasimasuks->pesertadidik->sts_siswa == 1)
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
              <td>{{$mutasimasuks->asal_sekolah}}</td>
            </tr>
            <tr>
              <td>Tingkat Kelas</td>
              <td>:</td>
              <td>{{$mutasimasuks->tingkat_kelas}}</td>
            </tr>
            <tr>
              <td>Tanggal Masuk</td>
              <td>:</td>
              <td>{{$mutasimasuks->tgl_masuk}}</td>
            </tr>
            <tr>
              <td>Alasan Pindah</td>
              <td>:</td>
              <td>{{$mutasimasuks->alasan_pindah}}</td>
            </tr>
            <tr>
              <td>Status Data Mutasi</td>
              <td>:</td>
              <td>
                <?php if($mutasimasuks->status_mutasi == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($mutasimasuks->status_mutasi == 1)
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
              <td>{{$mutasimasuks->created_at}}</td>
            </tr>
            <tr>
              <td>Tanggal Diupdate</td>
              <td>:</td> 
              <td>{{$mutasimasuks->updated_at}}</td>
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