@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Mutasi Keluar
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/mutasikeluar"></i>Daftar Mutasi Keluar</a></li>
      <li> Edit Data Mutasi Keluar</li>
    </ol>
  </section>

<section class="content">
  <form action="/mutasikeluar/update/{{ $mutasikeluars -> id_mut_klr }}" method="post" >
    @method('patch')
    {{csrf_field()}}

    <div class="box box-primary">
    <form role="form">
    <div class="box-header">
    <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-user"></i> Edit Data Mutasi Keluar</h3> 
      <div style="float: right;">
      <div style="clear: both;"></div>
      <div align="right">
        <a href="/mutasikeluar" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left"></i></a>
      </div>
      </div>
    </div>

    <div class="box-body">

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputsurat">No Surat Pindah</label>
      <input type="text" class="form-control" id="inputsurat" name="no_srt_pindah" value="{{$mutasikeluars->no_srt_pindah}}" required="required" autocomplete="off">
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">No Induk Siswa</label>
      <select id="inputNIS" class="form-control select2" name="nis" required="required" autocomplete="off">
        <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
        @foreach ($pesertadidik as $item)
        <option @if ($item->id_siswa == $mutasikeluars->id_siswa) selected @endif data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun_ajaran }}" value="{{$item->id_siswa}}">{{ $item->nis }} - {{ $item->nm_siswa }}</option>
        @endforeach
      </select>
      @error('nis')
      <span class="invalid-feedback text-danger" role="alert">
          <strong>{{ "Nis Sudah Tersedia" }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputnama">Nama Lengkap Siswa</label>
      <input type="text" class="form-control" id="inputnamasiswa" name="nm_siswa" value="{{$mutasikeluars->pesertadidik->nm_siswa}}" readonly>
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputtahun">Tahun Ajaran</label>
      <input type="text" class="form-control" id="inputtahunajaran" name="tahun_ajaran" value="{{$mutasikeluars->pesertadidik->tahun_ajaran}}" readonly>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputasalsekolah">Sekolah Tujuan</label>
      <input type="text" class="form-control" id="inputasalsekolah" name="sekolah_tujuan" value="{{$mutasikeluars->sekolah_tujuan}}" required="required" autocomplete="off">
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">Tingkat Kelas</label>
      <select id="inputState" class="form-control" name="tingkat_kelas" value="{{$mutasikeluars->tingkat_kelas}}" required="required" autocomplete="off">
        <option selected>-- Pilih Tingkat Kelas --</option>
        <option value="X" @if($mutasikeluars->tingkat_kelas=='X') selected @endif>X</option>
        <option value="XI" @if($mutasikeluars->tingkat_kelas=='XI') selected @endif>XI</option>
        <option value="XII" @if($mutasikeluars->tingkat_kelas=='XII') selected @endif>XII</option>
      </select>
    </div>
        
    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="input_tglmasuk">Tanggal pindah</label>
      <input type="date" class="form-control" id="input_tglmasuk" name="tgl_pindah" value="{{$mutasikeluars->tgl_pindah->format('Y-m-d')}}" required="required" autocomplete="off">
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputalasan">Alasan Pindah</label>
      <textarea class="form-control" id="inputalasan" rows="3" name="alasan_pindah" required="required" autocomplete="off">{{$mutasikeluars->alasan_pindah}}</textarea> 
    </div>

   <div>
    <button type="submit" class="btn btn-warning btn-primary">SIMPAN</button>
   </div>

</div>
</div>
</div>
</form>
</div>
</section>  
@endsection
@section('script')
<script type="text/javascript">
  $('.select2').select2();
    @if($errors->any())
      $('#exampleModal').modal();
    @endif
  $('#inputNIS').change(function() {
    var nm_siswa = $('option:selected', this).attr('data-nama');
    var tahun_ajaran = $('option:selected', this).attr('data-tahun');
    $('#inputnamasiswa').val(nm_siswa);
    $('#inputtahun').val(tahun_ajaran);
  });
</script>
@endsection