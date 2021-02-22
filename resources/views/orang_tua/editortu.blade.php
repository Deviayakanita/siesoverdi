@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Orang Tua
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/orangtua"></i>Daftar Orangtua</a></li>
      <li> Edit Data Orang Tua</li>
    </ol>
  </section>

<section class="content">
  <form action="/orangtua/update/{{ $orangtuas -> id_orang_tua }}" method="post" >
    @method('patch')
    {{csrf_field()}}
              <div class="box box-primary">
              <form role="form">
              <div class="box-header">
              <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-users"></i> Edit Data Peserta Didik</h3> 
                <div style="float: right;">
                <div style="clear: both;"></div>
                <div align="right">
                  <a href="/orangtua" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left"></i></a>
                </div>
                </div>
              </div>

                  <div class="box-body">  
                  <div class="form-group" style="padding: 0; padding-right: 10px">
                    <label for="inputState">No Induk Siswa</label>
                    <select id="inputNIS" class="form-control select2" name="nis" required="required" autocomplete="off">
                      <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
                      @foreach ($pesertadidik as $item)
                      <option @if ($item->id_siswa == $orangtuas->id_siswa) selected @endif data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun->tahun_ajaran }}" data-id="{{ $item->id_ta }}" value="{{$item->id_siswa}}">{{ $item->nis }} - {{ $item->nm_siswa }}</option>
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
                    <input type="text" class="form-control" id="inputnamasiswa" name="nm_siswa" value="{{$orangtuas->pesertadidik->nm_siswa}}"readonly>
                  </div>
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputnama">Tahun Ajaran Siswa</label>
                    <input type="text" class="form-control" id="inputtahun" name="tahun_ajaran" value="{{$orangtuas->pesertadidik->tahun->tahun_ajaran}}" readonly>
                    <input type="hidden" id="inputid_ta" name="id_ta" value="{{$orangtuas->tahun->id_ta}}"readonly>
                  </div>
                </div>

                  <div class="form-group" style="padding: 0; padding-right: 10px">
                    <label for="inputnama">Nama Ayah</label>
                    <input type="text" class="form-control" id="inputnama" name="nm_ayah" value="{{$orangtuas->nm_ayah}}" required="required" autocomplete="off">
                    @error('nm_ayah')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ "Terdiri Dari 5 Sampai 50 Karakter" }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputpekerjaan">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" id="inputpekerjaan" name="job_ayah" value="{{$orangtuas->job_ayah}}" required="required" autocomplete="off">
                  </div>
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputpendidikan">Pendidikan Terakhir</label>
                    <input type="text" class="form-control" id="inputpendidikan" name="pddk_ayah" value="{{$orangtuas->pddk_ayah}}" required="required" autocomplete="off">
                  </div>
                  </div>

                  <div class="form-group" style="padding: 0; padding-right: 10px">
                    <label for="inputState">Penghasilan Ayah</label>
                    <select id="inputState" class="form-control select2" name="penghasilan_ayah" value="{{$orangtuas->penghasilan_ayah}}" required="required" autocomplete="off">
                      <option selected="selected" disabled="">-- Pilih Penghasilan --</option>
                      <option value="Kurang dari Rp.500,000" @if($orangtuas->penghasilan_ayah=='Kurang dari Rp.500,000')selected @endif>Kurang dari Rp.500,000</option>
                      <option value="Rp.500,000 - Rp.1,000,000" @if($orangtuas->penghasilan_ayah=='Rp.500,000 - Rp.1,000,000')selected @endif>Rp.500,000 - Rp.1,000,000</option>
                      <option value="Rp.1,000,000 - Rp.2,000,000" @if($orangtuas->penghasilan_ayah=='Rp.1,000,000 - Rp.2,000,000')selected @endif>Rp.1,000,000 - Rp.2,000,000</option>
                      <option value="Rp.2,000,000 - Rp.5,000,000" @if($orangtuas->penghasilan_ayah=='Rp.2,000,000 - Rp.5,000,000')selected @endif>Rp.2,000,000 - Rp.5,000,000</option>
                      <option value="Rp.5,000,000 - Rp.20,000,000" @if($orangtuas->penghasilan_ayah=='Rp.5,000,000 - Rp.20,000,000')selected @endif>Rp.5,000,000 - Rp.20,000,000</option>
                      <option value="Lebih dari Rp.20,000,000" @if($orangtuas->penghasilan_ayah=='Lebih dari Rp.20,000,000')selected @endif>Lebih dari Rp.20,000,000</option>
                      <option value="Tidak Penghasilan" @if($orangtuas->penghasilan_ayah=='Tidak Berpenghasilan')selected @endif>Tidak Berpenghasilan</option>
                    </select>
                  </div>

                  <div class="form-group" style="padding: 0; padding-right: 10px">
                    <label for="inputnama">Nama Ibu</label>
                    <input type="text" class="form-control" id="inputnama" name="nm_ibu" value="{{$orangtuas->nm_ibu}}" required="required" autocomplete="off">
                    @error('nm_ibu')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ "Terdiri Dari 5 Samapi 50 Karakter" }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputpekerjaan">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" id="inputpekerjaan" name="job_ibu" value="{{$orangtuas->job_ibu}}" required="required" autocomplete="off">
                  </div>
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputpendidikan">Pendidikan Terakhir</label>
                    <input type="text" class="form-control" id="inputpendidikan" name="pddk_ibu" value="{{$orangtuas->pddk_ibu}}" required="required" autocomplete="off">
                  </div>
                  </div>

                  <div class="form-group" style="padding: 0; padding-right: 10px">
                    <label for="inputState">Penghasilan Ibu</label>
                    <select id="inputState" class="form-control select2" name="penghasilan_ibu" value="{{$orangtuas->penghasilan_ibu}}" required="required" autocomplete="off">
                      <option selected="selected" disabled="">-- Pilih Penghasilan --</option>
                      <option value="Kurang dari Rp.500,000" @if($orangtuas->penghasilan_ibu=='Kurang dari Rp.500,000')selected @endif>Kurang dari Rp.500,000</option>
                      <option value="Rp.500,000 - Rp.1,000,000" @if($orangtuas->penghasilan_ibu=='Rp.500,000 - Rp.1,000,000')selected @endif>Rp.500,000 - Rp.1,000,000</option>
                      <option value="Rp.1,000,000 - Rp.2,000,000" @if($orangtuas->penghasilan_ibu=='Rp.1,000,000 - Rp.2,000,000')selected @endif>Rp.1,000,000 - Rp.2,000,000</option>
                      <option value="Rp.2,000,000 - Rp.5,000,000" @if($orangtuas->penghasilan_ibu=='Rp.2,000,000 - Rp.5,000,000')selected @endif>Rp.2,000,000 - Rp.5,000,000</option>
                      <option value="Rp.5,000,000 - Rp.20,000,000" @if($orangtuas->penghasilan_ibu=='Rp.5,000,000 - Rp.20,000,000')selected @endif>Rp.5,000,000 - Rp.20,000,000</option>
                      <option value="Lebih dari Rp.20,000,000" @if($orangtuas->penghasilan_ibu=='Lebih dari Rp.20,000,000')selected @endif>Lebih dari Rp.20,000,000</option>
                      <option value="Tidak Penghasilan" @if($orangtuas->penghasilan_ibu=='Tidak Penghasilan')selected @endif>Tidak Berpenghasilan</option>
                    </select>
                  </div>
                  
                  <div>
                    <button type="submit" class="btn btn-warning btn-primary">SIMPAN</button>
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
    var id_ta = $('option:selected', this).attr('data-id');
    $('#inputnamasiswa').val(nm_siswa);
    $('#inputtahun').val(tahun_ajaran);
    $('#inputid_ta').val(id_ta);
  });
</script>
@endsection