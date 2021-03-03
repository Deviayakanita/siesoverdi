@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Peserta Didik
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/pesertadidik">Daftar Peserta Didik</a></li>
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
            <input type="nisn" class="form-control" id="inputnisn" name="nis" required="required" autocomplete="off" value="{{$pesertadidiks->nis}}" onkeypress="return hanyaAngka(event)">
            @error('nis')
              <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ "Nis Harus Terdiri Dari 4 Karakter Dan Nis Tidak Boleh Sama" }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="inputnama">Nama Lengkap Siswa</label>
            <input type="nama" class="form-control" id="inputnama" name="nm_siswa" required="required" autocomplete="off" value="{{$pesertadidiks->nm_siswa}}" onkeypress="return hanyaHuruf(event)">
            @error('nm_siswa')
              <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ "Terdidri Dari 8 Sampai 50 Karakter" }}</strong>
              </span>
            @enderror
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

          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="input_tmplahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="input_tmplahir" name="tmp_lahir" required="required" autocomplete="off" value="{{$pesertadidiks->tmp_lahir}}">
            @error('tmp_lahir')
              <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ " Terdidri Dari 3 Sampai 20 Karakter " }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group" style="padding: 0; padding-right: 10px;">
            <label for="input_tgllahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="input_tgllahir" name="tgl_lahir" required="required" autocomplete="off" value="{{$pesertadidiks->tgl_lahir->format('Y-m-d')}}">
          </div>

          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="inputagama">Agama</label>
            <input type="agama" class="form-control" id="inputagama" name="agama" required="required" autocomplete="off" value="{{$pesertadidiks->agama}}">
            @error('agama')
              <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ " Terdidri Dari 5 Sampai 20 Karakter " }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="alamatsiswa">Alamat Siswa</label>
            <textarea class="form-control" id="alamatsiswa" rows="3" name="alamat_siswa" required="required" autocomplete="off">{{$pesertadidiks->alamat_siswa}}</textarea>
          </div>

          <div class="form-row">
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="inputkabupaten">Kabupaten</label>
            <select name="kabupaten" class="form-control select2" id="kabupaten" required autocomplete="off">
            <option selected>-- Pilih Kabupaten/Kota --</option>
            <option value="Kota Denpasar" @if($pesertadidiks -> kabupaten == "Kota Denpasar") selected @endif>Kota Denpasar</option>
            <option value="Badung" @if($pesertadidiks -> kabupaten == "Badung") selected @endif>Badung</option>
            <option value="Gianyar" @if($pesertadidiks -> kabupaten == "Gianyar") selected @endif>Gianyar</option>
            <option value="Bangli" @if($pesertadidiks -> kabupaten == "Bangli") selected @endif>Bangli</option>
            <option value="Tabanan" @if($pesertadidiks -> kabupaten == "Tabanan") selected @endif>Tabanan</option>
            <option value="Jembrana" @if($pesertadidiks -> kabupaten == "Jembrana") selected @endif>Jembrana</option>
            <option value="Buleleng" @if($pesertadidiks -> kabupaten == "Buleleng") selected @endif>Buleleng</option>
            <option value="Klungkung" @if($pesertadidiks -> kabupaten == "Klungkung") selected @endif>Klungkung</option>
            <option value="Karangasem" @if($pesertadidiks -> kabupaten == "Karangasem") selected @endif>Karangasem</option>
          </select>
          </div>
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
          <label for="inputsmp">Asal Sekolah (SMP)</label>
          <input type="text" class="form-control" id="inputsmp" name="asal_smp" required="required" autocomplete="off" placeholder="Masukan Asal Sekolah" value="{{$pesertadidiks->asal_smp}}">
           @error('asal_smp')
              <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ " Terdidri Dari 5 Sampai 20 Karakter " }}</strong>
              </span>
            @enderror
        </div>
      </div>

        <div class="form-row">
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="inputtahunmasuk">Tahun Masuk</label>
            <input type="input" class="form-control" id="inputtahunmasuk" name="tahun_masuk" required="required" autocomplete="off" placeholder="Masukan Tahun Masuk" onkeypress="return hanyaAngka(event)" value="{{$pesertadidiks->tahun_masuk}}">
             @error('tahun_masuk')
              <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ " Terdidri Dari 4 Sampai 5 Karakter " }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
            <label for="inputState">Tahun Ajaran</label>
            <select style="width: 100%;" id="inputTahun" class="form-control select2" name="tahun_ajaran" required="required" autocomplete="off" >
              <option selected="selected" disabled="" value="">-- Pilih Tahun Ajaran --</option>
              @foreach ($tahunajarans as $item)
              <option @if ($item->id_ta == $pesertadidiks->id_ta) selected @endif data-tahun="{{ $item->tahun_ajaran }}" value="{{$item->id_ta}}">{{ $item->tahun_ajaran }}</option>
              @endforeach
            </select>
          </div>
        </div>

          <div class="form-row">
            <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
              <label for="inputnotlpn">No Telepon</label>
              <input type="notelpon" class="form-control" id="inputnotlpn" name="no_tlpn" required="      required" autocomplete="off" value="{{$pesertadidiks->no_tlpn}}" onkeypress="return hanyaAngka(event)">
                  @error('no_tlpn')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ " Terdidri Dari 7 Sampai 12 Karakter " }}</strong>
                    </span>
                  @enderror
            </div>
            <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
              <label for="inputemail">Email</label>
              <input type="email" class="form-control" id="inputemail" name="email" required="required" autocomplete="off" value="{{$pesertadidiks->email}}">
            </div>
          </div>


          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="inputState">Status Siswa</label>
            <select id="inputState" class="form-control" name="sts_siswa" required="required" autocomplete="off" value="{{$pesertadidiks->sts_siswa}}">
              <option selected>-- Pilih Status --</option>
              <option value="1" @if($pesertadidiks->sts_siswa=='1') selected @endif>Aktif</option>
              <option value="0" @if($pesertadidiks->sts_siswa=='0') selected @endif>Non Aktif</option>
            </select>
          </div>
          
          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="keterangan">Keterangan Siswa</label>
            <textarea class="form-control" id="keterangan" rows="3" name="keterangan" autocomplete="off">{{$pesertadidiks->keterangan}}</textarea>
          </div>

          <div>
            <button type="submit" class="btn btn-warning btn-primary" style= "margin-left: 1px;" " padding: 0;" "padding-right: 10px;">SIMPAN</button>
         </div>

</div>
</div>
</form>
</section>  
@endsection
@section('script')
<script type="text/javascript">
    @if($errors->any())
      $('#exampleModal').modal();
    @endif

    $('.select2').select2();
    $('#inputTahun').change(function() {
      var tahun_ajaran = $('option:selected', this).attr('data-tahun');
      $('#inputtahun').val(tahun_ajaran);
    });

    function hanyaAngka(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
    }

    function hanyaHuruf(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return true;
    return false;
    }
</script>
@endsection