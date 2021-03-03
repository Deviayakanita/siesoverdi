<!DOCTYPE html>
<html>
<head>
	<title>DATA  MUTASI MASUK PESERTA DIDIK SMAK SOVERDI</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" href="../asets/images/logo svd.png">
	<style type="text/css">
		.line-title{
			border:0;
			border-style: inset;
			border-top: 1px solid #000;
		}
	</style>
</head>
<body>
	<img src="asets/images/Logo Soverdi Warna.png" style="position: absolute; width: 115px; height: auto;">
	<table style="width: 100%;">
		<tr>
			<td align="center" style="line-height: 1.2; font-size: 15px;">YAYASAN SOVERDI<br>
          <span style="font-size: 20px; font-style: bold; letter-spacing: 2;"><b>SMA KATOLIK SOVERDI</b></span>
          <br>Status: Swasta Akreditasi A
          <br>NSS/NPSN:302220405003/50101682
          <br><small>Jl. Komplek Burung No.46 Tuban, Kuta, Badung, Bali  Tlp.(0361)9354379</small>
          <br><small>website : http://smakatoliksoverdi.com e-mail:@smakatoliksoverdi.com ext. smaksoverdi87@gmail.com</small>
      </td>
		</tr>
	</table>
	<hr class="line-title">
		<p align="center"><b>DATA MUTASI MASUK PESERTA DIDIK</b></p>
		<div class="box-body">
         <table class="table table-bordered">
         ($mutasimasuks as $mutasimasuks)
		<tr>
              <td>No Surat Pindah</td>
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
              <td>Tahun Masuk Siswa</td>
              <td>:</td>
              <td>{{$mutasimasuks->pesertadidik->tahun_masuk}}</td>
            </tr>
            <tr>
              <td>Tahun Ajaran</td>
              <td>:</td>
              <td>{{$mutasimasuks->tahun->tahun_ajaran}}</td>
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
              <td>{{$mutasimasuks->tgl_masuk->isoFormat('D MMMM Y')}}</td>
            </tr>
            <tr>
              <td>Alasan Pindah</td>
              <td>:</td>
              <td>{{$mutasimasuks->alasan_pindah}}</td>
            </tr>
           </table> 
        <!-- /.box-body -->
        <div class="box-footer"></div>
      </div>
      <br>
	<table border="0" width="100%">
		<tr>
			<td align="right" width="50%">
            Kuta, {{Carbon\Carbon::now()->isoFormat('D MMMM Y')}}
            <br>Kepala Sekolah SMA Katolik Soverdi
            <br>
            <br>
            <br>
            <br>
            <b><u>Dra. Magdelena Tin</u></b>
      </td>
		</tr>
	</table>

</body>
</html>