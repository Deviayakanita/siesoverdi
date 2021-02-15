<!DOCTYPE html>
<html>
<head>
	<title>EXPORT PDF ORANG TUA PESERTA DIDIK SMAK SOVERDI</title>
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
		<p align="center"><b>DAFTAR ORANG TUA PESERTA DIDIK</b></p>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th align="center">No</th>
				<th align="center">NIS</th>
				<th align="center">Nama Lengkap Siswa</th>
				<th align="center">Nama Ayah</th>
				<th align="center">Penghasilan Ayah</th>
				<th align="center">Nama Ibu</th>
				<th align="center">Penghasilan Ibu</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1; @endphp @foreach($ortu as $o)
			<tr>
				<td>{{ $i }}</td>
				<td>{{$o->pesertadidik->nis}}</td>
				<td>{{$o->pesertadidik->nm_siswa}}</td>
				<td>{{$o->nm_ayah}}</td>
				<td>{{$o->penghasilan_ayah}}</td>
				<td>{{$o->nm_ibu}}</td>
				<td>{{$o->penghasilan_ibu}}</td>
			</tr>
			@php $i++; @endphp @endforeach
		</tbody>
	</table>
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