@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Peserta Didik
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/pesertadidik"></i>Daftar Peserta Didik</a></li>
      <li> Edit Data Peserta Didik</li>
    </ol>
  </section>

<section class="content">
	<form action="/pesertadidik/update/{{ $pesertadidiks -> id_siswa }}" method="post" >
		@method('patch')
		{{csrf_field()}}

		<div class="box box-primary">
    <form role="form">
    <div class="box-header">
    <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-user"></i> Edit Data Peserta Didik</h3> 
      <div style="float: right;">
      <div style="clear: both;"></div>
      <div align="right">
        <a href="/pesertadidik" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left"></i></a>
      </div>
      </div>
    </div>

         <div class="box-body">
          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="inputnisn">No Induk Siswa</label>
            <input type="nisn" class="form-control" id="inputnisn" name="nis" required="required" autocomplete="off" value="{{$pesertadidiks->nis}}">
          </div>

          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="inputnama">Nama Lengkap Siswa</label>
            <input type="nama" class="form-control" id="inputnama" name="nm_siswa" required="required" autocomplete="off" value="{{$pesertadidiks->nm_siswa}}">
          </div>

          <div class="form-row">
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="inputState">Jenis Kelamin</label>
            <select id="inputState" class="form-control" name="jns_kelamin" required="required" autocomplete="off" value="{{$pesertadidiks->jns_kelamin}}">
              <option selected>-- Pilih Jenis Kelamin --</option>
              <option value="Laki - Laki" @if($pesertadidiks->jns_kelamin=='Laki - Laki') selected @endif>Laki - Laki</option>
              <option value="Perempuan" @if($pesertadidiks->jns_kelamin=='Perempuan') selected @endif>Perempuan</option>
            </select>
          </div>
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="inputState">Jurusan</label>
            <select id="inputState" class="form-control" name="jurusan" required="required" autocomplete="off" value="{{$pesertadidiks->jurusan}}">
              <option selected>-- Pilih Jurusan --</option>
              <option value="IPA" @if($pesertadidiks->jurusan=='IPA') selected @endif>IPA</option>
              <option value="IPS" @if($pesertadidiks->jurusan=='IPS') selected @endif>IPS</option>
            </select>
          </div>
          </div>

        <div class="form-row">
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="input_tmplahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="input_tmplahir" name="tmp_lahir" required="required" autocomplete="off" value="{{$pesertadidiks->tmp_lahir}}">
          </div>
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="input_tgllahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="input_tgllahir" name="tgl_lahir" required="required" autocomplete="off" value="{{$pesertadidiks->tgl_lahir->format('Y-m-d')}}">
          </div>
        </div>

          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="inputagama">Agama</label>
            <input type="agama" class="form-control" id="inputagama" name="agama" required="required" autocomplete="off" value="{{$pesertadidiks->agama}}">
          </div>

          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="alamatsiswa">Alamat Siswa</label>
            <textarea class="form-control" id="alamatsiswa" rows="3" name="alamat_siswa" required="required" autocomplete="off">{{$pesertadidiks->alamat_siswa}}</textarea>
          </div>

        <div class="form-row">
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="inputprovinsi">Provinsi</label>
            <input type="provinsi" class="form-control" id="inputprovinsi" name="provinsi" required="required" autocomplete="off" value="{{$pesertadidiks->provinsi}}">
          </div>
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="inputkabupaten">Kabupaten</label>
            <input type="kabupaten" class="form-control" id="inputkabupaten" name="kabupaten" required="required" autocomplete="off" value="{{$pesertadidiks->kabupaten}}">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="inputnotlpn">No Telepon</label>
            <input type="notelpon" class="form-control" id="inputnotlpn" name="no_tlpn" required="required" autocomplete="off" value="{{$pesertadidiks->no_tlpn}}">
          </div>
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="inputemail">Email</label>
            <input type="email" class="form-control" id="inputemail" name="email" required="required" autocomplete="off" value="{{$pesertadidiks->email}}">
          </div>
        </div>

        <div>
          <div class="form-row">
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="input_tahunajaran">Tahun Ajaran</label>
            <input type="text" class="form-control" id="input_tahunajaran" name="tahun_ajaran" required="required" autocomplete="off" value="{{$pesertadidiks->tahun_ajaran}}">
          </div>
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="inputState">Status Siswa</label>
            <select id="inputState" class="form-control" name="sts_siswa" required="required" autocomplete="off" value="{{$pesertadidiks->sts_siswa}}">
              <option selected>-- Pilih Status --</option>
              <option value="1" @if($pesertadidiks->sts_siswa=='1') selected @endif>Aktif</option>
              <option value="0" @if($pesertadidiks->sts_siswa=='0') selected @endif>Non Aktif</option>
            </select>
          </div>
          </div>
        </div>
         	
          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="keterangan">Keterangan Siswa</label>
            <textarea class="form-control" id="keterangan" rows="3" name="keterangan" required="required" autocomplete="off">{{$pesertadidiks->keterangan}}</textarea>
          </div>

          <div>
      		<button type="submit" class="btn btn-warning btn-primary" style= "margin-left: 1px" "padding: 0; padding-right: 10px">SIMPAN</button>
      	 </div>

</div>
</div>
</form>
</div>
</section>	
@endsection