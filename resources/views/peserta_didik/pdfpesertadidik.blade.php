<!DOCTYPE html>
<html>
<head>
	<title>DATA PESERTA DIDIK SMAK SOVERDI</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" href="../asets/images/Logo Soverdi Warna.png">
	<style type="text/css">
		.line-title{
			border:0;
			border-style: inset;
			border-top: 1px solid #000;
		}
	</style>
</head>
<body>
	<img src="asets/images/Logo Soverdi Warna.png" style="position: absolute; width: 130px; height: auto;">
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
		<p align="center">DATA PESERTA DIDIK</p>
		<div class="box-body">
         <table class="table">
         ($pesertadidiks as $pesertadidik)
		<tr>
              <td>No Induk Siswa</td>
              <td width="4px">:</td>
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
           </table> 
        <!-- /.box-body -->
        <div class="box-footer"></div>
      </div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<table border="0" width="100%">
		<tr>
			<td align="left" width="50%">
				Mengetahui,<br>Kepala Sekolah
				<br>
				<br>
				<br>
				<br>
				<b><u>Dra. Magdelena Tin</u></b>
			</td>
			<td align="right" width="50%">
				Denpasar, <br>
				Sekretaris
				<br>
				<br>
				<br>
				<br>
				<b><u>Devia Yakanita</u></b>
			</td>
		</tr>
	</table>

</body>
</html>