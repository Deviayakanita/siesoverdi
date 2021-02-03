@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Orang Tua
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard3"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/pesertadidik"></i>Daftar Orangtua</a></li>
      <li> Detail Data Orang Tua</li>
    </ol>
  </section>


<section class="content" style="padding-top:0;">
  <div class="box box-primary">
      <div class="box-header with-border">
      <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-users"></i> Detail Data Orang Tua</h3> 
      <div style="float: right;">
      <div style="clear: both;"></div>
      <div align="right">
        <a href="/pesertadidik" class="btn btn-default"><i class="fa fa-long-arrow-left"></i></a>
      </div>
      </div>
    </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <td width="200px">No Induk Siswa</td>
              <td width="5px">:</td>
              <td>{{$orangtuas->pesertadidik->nis}}</td>
            </tr>
            <tr> 
              <td>Nama Lengkap Siswa</td>
              <td>:</td>
              <td>{{$orangtuas->pesertadidik->nm_siswa}}</td>
            </tr>
            <tr>
              <td>Tahun Ajaran Siswa</td>
              <td>:</td>
              <td>{{$orangtuas->pesertadidik->tahun_ajaran}}</td>
            </tr>
            <tr>
              <td>Status Peserta Didik</td>
              <td>:</td>
              <td>
                <?php if($orangtuas->pesertadidik->sts_siswa == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($orangtuas->pesertadidik->sts_siswa == 1)
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
              <td>{{$orangtuas->nm_ayah}}</td>
            </tr>
            <tr>
              <td>Pendidikan Ayah</td>
              <td>:</td>
              <td>{{$orangtuas->pddk_ayah}}</td>
            </tr>
            <tr>
              <td>Pekerjaan Ayah</td>
              <td>:</td>
              <td>{{$orangtuas->job_ayah}}</td>
            </tr>
            <tr>
              <td>Penghasilan Ayah</td>
              <td>:</td>
              <td>{{$orangtuas->penghasilan_ayah}}</td>
            </tr>
            <tr>
              <td>Nama Ibu</td>
              <td>:</td>
              <td>{{$orangtuas->nm_ibu}}</td>
            </tr>
            <tr>
              <td>Pendidikan Ibu</td>
              <td>:</td>
              <td>{{$orangtuas->pddk_ibu}}</td>
            </tr>
            <tr>
              <td>Pekerjaan Ibu</td>
              <td>:</td>
              <td>{{$orangtuas->job_ibu}}</td>
            </tr>
            <tr>
              <td>Penghasilan Ibu</td>
              <td>:</td>
              <td>{{$orangtuas->penghasilan_ibu}}</td>
            </tr>
            <tr>
              <td>Status Data Orang Tua</td>
              <td>:</td>
              <td>
                <?php if($orangtuas->sts_orang_tua == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($orangtuas->sts_orang_tua == 1)
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
              <td>{{$orangtuas->created_at}}</td>
            </tr>
            <tr>
              <td>Tanggal Diupdate</td>
              <td>:</td> 
              <td>{{$orangtuas->updated_at}}</td>
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