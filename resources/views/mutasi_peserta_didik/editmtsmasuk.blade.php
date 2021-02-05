@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Mutasi Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard3"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/mutasimasuk"></i>Daftar Mutasi Masuk</a></li>
      <li> Edit Data Mutasi Masuk</li>
    </ol>
  </section>

<section class="content">
  <form action="/mutasimasuk/update/{{ $mutasimasuks -> id_mut_msk }}" method="post" >
    @method('patch')
    {{csrf_field()}}

    <div class="box box-primary">
    <form role="form">
    <div class="box-header">
    <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-sign-in"></i> Edit Data Mutasi Masuk</h3> 
      <div style="float: right;">
      <div style="clear: both;"></div>
      <div align="right">
        <a href="/mutasimasuk" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left"></i></a>
      </div>
      </div>
    </div>

    <div class="box-body">    

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputsurat">No Surat Pindah</label>
      <input type="text" class="form-control" id="inputsurat" name="no_srt_pindah" value="{{$mutasimasuks->no_srt_pindah}}">
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">No Induk Siswa</label>
      <select id="inputNIS" class="form-control select2" name="nis">
        <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
        @foreach ($pesertadidik as $item)
        <option @if ($item->id_siswa == $mutasimasuks->id_siswa) selected @endif data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun_ajaran }}" value="{{$item->id_siswa}}">{{ $item->nis }} - {{ $item->nm_siswa }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputnama">Nama Lengkap Siswa</label>
      <input type="text" class="form-control" id="inputnamasiswa" name="nm_siswa" value="{{$mutasimasuks->pesertadidik->nm_siswa}}" readonly>
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputnama">Tahun Ajaran Siswa</label>
      <input type="text" class="form-control" id="inputtahun" name="tahun_ajaran" value="{{$mutasimasuks->pesertadidik->tahun_ajaran}}" readonly>
    </div>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputalamat">Alamat Siswa</label>
      <textarea type="text" class="form-control" id="inputalamat" rows="3" name="alamat_siswa"readonly>{{$mutasimasuks->pesertadidik->alamat_siswa}}</textarea>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputprovinsi">Provinsi</label>
      <input type="text" class="form-control" id="inputprovinsi" name="provinsi" value="{{$mutasimasuks->pesertadidik->provinsi}}" readonly>
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputkabupaten">Kabupaten</label>
      <input type="text" class="form-control" id="inputkabupaten" name="kabupaten" value="{{$mutasimasuks->pesertadidik->kabupaten}}" readonly>
    </div>
    </div>


    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputasalsekolah">Asal Sekolah</label>
      <input type="text" class="form-control" id="inputasalsekolah" name="asal_sekolah" value="{{$mutasimasuks->asal_sekolah}}">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputState">Tingkat Kelas</label>
      <select id="inputState" class="form-control" name="tingkat_kelas" value="{{$mutasimasuks->tingkat_kelas}}">
        <option selected>-- Pilih Tingkat Kelas --</option>
        <option value="X" @if($mutasimasuks->tingkat_kelas=='X') selected @endif>X</option>
        <option value="XI" @if($mutasimasuks->tingkat_kelas=='XI') selected @endif>XI</option>
        <option value="XII" @if($mutasimasuks->tingkat_kelas=='XII') selected @endif>XII</option>
      </select>
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="input_tglmasuk">Tanggal Masuk</label>
      <input type="date" class="form-control" id="input_tglmasuk" name="tgl_masuk" value="{{$mutasimasuks->tgl_masuk}}">
    </div>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputalasan">Alasan Pindah</label>
      <textarea class="form-control" id="inputalasan" rows="3" name="alasan_pindah">{{$mutasimasuks->alasan_pindah}}</textarea>
    </div>

     <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">Status Data</label>
      <select id="inputState" class="form-control" name="status_mutasi" value="{{$mutasimasuks->status_mutasi}}">
        <option selected>-- Status Data Mutasi --</option>
        <option value="1" @if($mutasimasuks->status_mutasi=='1') selected @endif>Aktif</option>
        <option value="0" @if($mutasimasuks->status_mutasi=='0') selected @endif>Non Aktif</option>
      </select>
    </div>

    <div>
    <button type="submit" class="btn btn-warning btn-primary">SIMPAN</button>
  </div>
</div>
</div>
</form>
</div>
</section>  
@endsection

@section('script')
<script src="{{asset('adminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $('.select2').select2();
  $('#inputNIS').change(function() {
    var nm_siswa = $('option:selected', this).data('nama');
    var tahun_ajaran = $('option:selected', this).data('tahun');
    var provinsi = $('option:selected', this).data('provinsi');
    var kabupaten = $('option:selected', this).data('kabupaten');
    var alamat_siswa = $('option:selected', this).data('alamat');
    $('#inputnamasiswa').val(nm_siswa);
    $('#inputtahun').val(tahun_ajaran);
    $('#inputprovinsi').val(provinsi);
    $('#inputkabupaten').val(kabupaten);
    $('#inputalamat').val(alamat_siswa);
  });
</script>
@endsection