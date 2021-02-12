@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Peserta Didik
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/pesertadidik"></i>Daftar Peserta Didik</a></li>
      <li> Detail Data Peserta Didik</li>
    </ol>
  </section>


<section class="content">
	<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-user"></i> Detail Data Peserta Didik</h3> 
      <div style="float: right;">
      <div style="clear: both;"></div>
      <div align="right">
        <a href="/pesertadidik" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left"></i></a>
      </div>
      </div>
    </div>

        <div class="box-body">
          <table class="table">
            <tr>
              <td width="200px">No Induk Siswa</td>
              <td width="5px">:</td>
              <td>{{$pesertadidiks->nis}}</td>
            </tr>
            <tr> 
              <td>Nama Lengkap Siswa</td>
              <td>:</td>
              <td>{{$pesertadidiks->nm_siswa}}</td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td>{{$pesertadidiks->jns_kelamin}}</td>
            </tr>
            <tr>
              <td>Tempat lahir</td>
              <td>:</td>
              <td>{{$pesertadidiks->tmp_lahir}}</td>
            </tr>
            <tr>
              <td>Tanggal lahir</td>
              <td>:</td>
              <td>{{$pesertadidiks->tgl_lahir->isoFormat('D MMMM Y')}}</td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>:</td>
              <td>{{$pesertadidiks->agama}}</td>
            </tr>
            <tr>
              <td>Alamat Siswa</td>
              <td>:</td>
              <td>{{$pesertadidiks->alamat_siswa}}</td>
            </tr>
            <tr>
              <td>Provinsi</td>
              <td>:</td>
              <td>{{$pesertadidiks->provinsi}}</td>
            </tr>
            <tr>
              <td>Kabupaten</td>
              <td>:</td>
              <td>{{$pesertadidiks->kabupaten}}</td>
            </tr>
            <tr>
              <td>No Telepon</td>
              <td>:</td>
              <td>{{$pesertadidiks->no_tlpn}}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td>{{$pesertadidiks->email}}</td>
            </tr>
            <tr>
              <td>Tahun Ajaran</td>
              <td>:</td>
              <td>{{$pesertadidiks->tahun_ajaran}}</td>
            </tr>
            <tr>
              <td>Jurusan</td>
              <td>:</td>
              <td>{{$pesertadidiks->jurusan}}</td>
            </tr>
            <tr>
              <td>Status Siswa</td>
              <td>:</td>
              <td>
                <?php if($pesertadidiks->sts_siswa == 0)
                     {
                        echo "Non Aktif";
                     }
                      elseif($pesertadidiks->sts_siswa == 1)
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
              <td>{{$pesertadidiks->created_at->isoFormat('D MMMM Y')}}</td>
            </tr>
            <tr>
              <td>Tanggal Diupdate</td>
              <td>:</td> 
              <td>{{$pesertadidiks->updated_at->isoFormat('D MMMM Y')}}</td>
            </tr>
           </table> 
           
        </div>

        <!-- /.box-body -->
        <div class="box-footer"></div>
      </div>
</div>
</section>	
@endsection