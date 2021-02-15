<!DOCTYPE html>
<html>
<head>
	<title>DATA ORANG TUA PESERTA DIDIK SMAK SOVERDI</title>
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
		<p align="center"><b>DATA ORANG TUA PESERTA DIDIK</b></p>
		<div class="box-body">
         <table class="table table-bordered">
         ($orangtuas as $orangtuas)
		<tr>
              <td>No Induk Siswa</td>
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