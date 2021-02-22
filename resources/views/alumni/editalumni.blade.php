@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Mutasi Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/alumni">Daftar Alumni</a></li>
      <li> Edit Data Alumni</li>
    </ol>
  </section>

<section class="content">
  <form action="/alumni/update/{{ $alumnis -> id_alumni }}" method="post">
    @method('patch')
    {{csrf_field()}}

    <div class="box box-primary">
    <form role="form">
      <div class="box-header">
        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-user"></i> Edit Data Alumni</h3> 
          <div style="float: right;">
          <div style="clear: both;"></div>
            <div align="right">
              <a href="/alumni" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left"></i></a>
            </div>
          </div>
      </div>

      <div class="box-body">
    
        <div class="form-group" style="padding: 0; padding-right: 10px">
          <label for="inputState">No Induk Siswa</label>
          <select id="inputNIS" class="form-control select2" name="nis" required="required" autocomplete="off">
            <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
            @foreach ($pesertadidik as $item)
            <option @if ($item->id_siswa == $alumnis->id_siswa) selected @endif data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun->tahun_ajaran }}" data-id="{{ $item->id_ta}}" value="{{$item->id_siswa}}">{{ $item->nis }} - {{ $item->nm_siswa }}</option>
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
          <input type="text" class="form-control" id="inputnamasiswa" name="nm_siswa" value="{{$alumnis->pesertadidik->nm_siswa}}" readonly>
        </div>
        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
          <label for="inputtahun">Tahun Ajaran</label>
          <input type="text" class="form-control" id="inputtahunajaran" name="tahun_ajaran" value="{{$alumnis->pesertadidik->tahun->tahun_ajaran}}" readonly>
          <input type="hidden" id="inputid_ta" name="id_ta" value="{{$alumnis->tahun->id_ta}}" readonly>
        </div>

        <div class="form-group" style="padding: 0; padding-right: 10px">
          <label for="inputState">Jenis Perguruan Tinggi</label>
          <select id="inputState" class="form-control" name="jns_pt" value="{{$alumnis->jns_pt}}" required="required" autocomplete="off">
            <option selected disabled>-- Pilih Perguruan Tinggi --</option>
            <option value="Negeri" @if($alumnis->jns_pt=='Negeri') selected @endif>Negeri</option>
            <option value="Swasta" @if($alumnis->jns_pt=='Swasta') selected @endif>Swasta</option>
          </select>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
          <label for="inputnama">Nama Perguruan Tinggi</label>
          <input type="text" class="form-control" id="inputnama" name="nm_pt" value="{{$alumnis->nm_pt}}" required="required" autocomplete="off">
          @error('nm_pt')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ "Terdiri Dari 5 Sampai 50 Karakter" }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
          <label for="inputnamafk">Nama Fakultas</label>
          <input type="text" class="form-control" id="inputnamafk" name="nm_fak" value="{{$alumnis->nm_fak}}" required="required" autocomplete="off">
          @error('nm_fak')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ "Terdiri Dari 10 Sampai 50 Karakter" }}</strong>
            </span>
          @enderror
        </div>
        </div>

       
        <div class="form-group" style="padding: 0; padding-right: 10px">
          <label for="inputnamajurus">Nama Jurusan</label>
          <input type="text" class="form-control" id="inputnamajurus" name="nm_jurusan" value="{{$alumnis->nm_jurusan}}" required="required" autocomplete="off">
          @error('nm_jurusan')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ "Terdiri Dari 10 Sampai 50 Karakter" }}</strong>
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
    var tahun_ajaran = $('option:selected', this).attr('data-tahun');
    var id_ta = $('option:selected', this).attr('data-id');
    $('#inputnamasiswa').val(nm_siswa);
    $('#inputtahun').val(tahun_ajaran);
    $('#inputid_ta').val(id_ta);
  });
</script>
@endsection