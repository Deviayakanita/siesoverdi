<!DOCTYPE html>
<html>
<head>
	<title>EXPORT PDF MUTASI KELUAR PESERTA DIDIK SMAK SOVERDI</title>
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
	<img src="asets/images/Logo Soverdi Warna.png" style="position: absolute; width: 150px; height: auto;">
	<table style="width: 100%;">
		<tr>
			<td align="center" style="line-height: 1.2; font-size: 18px;">
				YAYASAN SOVERDI<br>
					<span style="font-size: 20px; font-style: bold; letter-spacing: 2;"><b>SMA KATOLIK SOVERDI</b></span>
					<br>Status: Swasta Akreditasi A
					<br>NSS/NPSN:302220405003/50101682
					<br><small>Jl. Komplek Burung No.46 Tuban, Kuta, Badung, Bali  Tlp.(0361)9354379</small>
					<br><small>website : http://smakatoliksoverdi.com e-mail:@smakatoliksoverdi.com ext. smaksoverdi87@gmail.com</small>
			</td>
		</tr>
	</table>
	<hr class="line-title">
		<p align="center" style="font-size: 20px:"><b>DAFTAR MUTASI KELUAR PESERTA DIDIK</b></p>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th align="center">No</th>
				<th align="center">No Surat Pindah</th>
				<th align="center">NIS</th>
				<th align="center">Nama Lengkap Siswa</th>
				<th align="center">Tahun Ajaran</th>
				<th align="center">Tanggal Pindah</th>
				<th align="center">Sekolah Tujuan</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1; @endphp @foreach($mutasikeluar as $mts)
			<tr>
				<td>{{ $i }}</td>
				<td>{{$mts->no_srt_pindah}}</td>
				<td>{{$mts->nis}}</td>
				<td>{{$mts->nm_siswa}}</td>
				<td>{{$mts->tahun_ajaran}}</td>
				<td>{{ Carbon\Carbon::parse($mts->tgl_pindah)->isoFormat('D MMMM Y') }}</td>
				<td>{{$mts->sekolah_tujuan}}</td>
			</tr>
			@php $i++; @endphp @endforeach
		</tbody>
	</table>
	<br>
	<table border="0" width="100%">
		<tr>
			<td align="right" width="50%">
				Tuban, {{Carbon\Carbon::now()->isoFormat('D MMMM Y')}}
		        <br>Kepala Sekolah
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