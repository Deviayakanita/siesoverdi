@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Mutasi Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/mutasimasuk">Daftar Mutasi Masuk</a></li>
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
    <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-user"></i> Edit Data Mutasi Masuk</h3> 
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
      <input type="text" class="form-control" id="inputsurat" name="no_srt_pindah" value="{{$mutasimasuks->no_srt_pindah}}" required="required" autocomplete="off">
      @error('no_srt_pindah')
      <span class="invalid-feedback text-danger" role="alert">
          <strong>{{ " Terdiri Dari 4 Samapai 30 Karakter  " }}</strong>
      </span>
      @enderror
    </div>

     <div class="form-group" style="padding: 0; padding-right: 10px">
        <label for="inputState">No Induk Siswa</label>
        <select id="inputNIS" class="form-control select2" name="nis" required="required" autocomplete="off">
          <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
          @foreach ($pesertadidik as $item)
          <option @if ($item->id_siswa == $mutasimasuks->id_siswa) selected @endif data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun_masuk }}"
          value="{{$item->id_siswa}}">{{ $item->nis }} - {{ $item->nm_siswa }}</option>
          @endforeach
        </select>
          @error('nis')
          <span class="invalid-feedback text-danger" role="alert">
              <strong>{{ " Nis Sudah Tersedia " }}</strong>
          </span>
          @enderror
      </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputnama">Nama Lengkap Siswa</label>
      <input type="text" class="form-control" id="inputnamasiswa" name="nm_siswa" value="{{$mutasimasuks->pesertadidik->nm_siswa}}" readonly>
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputnama">Tahun Masuk Siswa</label>
      <input type="text" class="form-control" id="inputthn" name="tahun_masuk" value="{{$mutasimasuks->pesertadidik->tahun_masuk}}" readonly>
    </div>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">Tahun Ajaran</label>
      <select style="width: 100%;" id="inputTahun" class="form-control select2" name="tahun_ajaran" required="required" autocomplete="off" >
        <option selected="selected" disabled="" value="">-- Pilih Tahun Ajaran --</option>
        @foreach ($tahunajarans as $item)
        <option @if ($item->id_ta == $mutasimasuks->id_ta) selected @endif data-tahunajaran="{{ $item->tahun_ajaran }}" value="{{$item->id_ta}}">{{ $item->tahun_ajaran }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputasalsekolah">Asal Sekolah</label>
      <input type="text" class="form-control" id="inputasalsekolah" name="asal_sekolah" value="{{$mutasimasuks->asal_sekolah}}" required="required" autocomplete="off">
      @error('asal_sekolah')
      <span class="invalid-feedback text-danger" role="alert">
          <strong>{{" Terdiri Dari 8 Sampai 30 "}}</strong>
      </span>
      @enderror
    </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputState">Tingkat Kelas</label>
      <select id="inputState" class="form-control" name="tingkat_kelas" value="{{$mutasimasuks->tingkat_kelas}}" required="required" autocomplete="off">
        <option selected disabled>-- Pilih Tingkat Kelas --</option>
        <option value="X" @if($mutasimasuks->tingkat_kelas=='X') selected @endif>X</option>
        <option value="XI" @if($mutasimasuks->tingkat_kelas=='XI') selected @endif>XI</option>
        <option value="XII" @if($mutasimasuks->tingkat_kelas=='XII') selected @endif>XII</option>
      </select>
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="input_tglmasuk">Tanggal Masuk</label>
      <input type="date" class="form-control" id="input_tglmasuk" name="tgl_masuk" value="{{$mutasimasuks->tgl_masuk->format('Y-m-d')}}" required="required" autocomplete="off">
    </div>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputalasan">Alasan Pindah</label>
      <textarea class="form-control" id="inputalasan" rows="3" name="alasan_pindah" required="required" autocomplete="off">{{$mutasimasuks->alasan_pindah}}</textarea>
      @error('alasan_pindah')
      <span class="invalid-feedback text-danger" role="alert">
          <strong>{{" Terdiri Dari 5 Sampai 50 "}}</strong>
      </span>
      @enderror
    </div>

    <div>
    <button type="submit" class="btn btn-warning btn-primary">SIMPAN</button>
  </div>
</div>
</div>
</form>
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
    var tahun_masuk = $('option:selected', this).attr('data-tahun');
    $('#inputnamasiswa').val(nm_siswa);
    $('#inputthn').val(tahun_masuk);
  });

  $('#inputTahun').change(function() {
      var tahun_ajaran = $('option:selected', this).attr('data-tahunajaran');
      $('#inputtahun').val(tahun_ajaran);
  });
</script>
@endsection