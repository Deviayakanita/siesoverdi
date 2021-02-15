<!DOCTYPE html>
<html>
<head>
	<title>DATA  MUTASI KELUAR PESERTA DIDIK SMAK SOVERDI</title>
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
	<img src="asets/images/Logo Soverdi Warna.png" style="position: absolute; width: 140px; height: auto;">
	<table style="width: 100%;">
		<tr>
			<td align="center">
				<span style="line-height: 1.4;">
					YAYASAN SOVERDI<br> <b>SMA KATOLIK SOVERDI</b><br> Status: Swasta Akreditasi A <br> NSS/NPSN:302220405003/50101682
					<br><small>Jl. Komplek Burung No.46 Tuban, Kuta, Badung, Bali  Tlp.(0361)9354379</small>
					<br><small>website : http://smakatoliksoverdi.com e-mail:@smakatoliksoverdi.com ext. smaksoverdi87@gmail.com</small>
				</span>
			</td>
		</tr>
	</table>
	<hr class="line-title">
		<p align="center"><b>DATA MUTASI KELUAR PESERTA DIDIK</b></p>
		<div class="box-body">
         <table class="table table-bordered">
         ($mutasikeluars as $mutasikeluars)
		<tr>
             <td>No Surat Pindah</td>
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
              <td>Tahun Ajaran</td>
              <td>:</td>
              <td>{{$mutasikeluars->pesertadidik->tahun_ajaran}}</td>
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
        <!-- /.box-body -->
        <div class="box-footer"></div>
      </div>
	<br>
	<br>
	<table border="0" width="100%">
		<tr>
			<td align="right" width="50%">
				Mengetahui,<br>Kepala Sekolah
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