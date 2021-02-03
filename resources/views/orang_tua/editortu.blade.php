@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Orang Tua
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard3"><i class="fa fa-dashboard"></i>Dashboard</a></li>
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
                  <a href="/pesertadidik" class="btn btn-default"><i class="fa fa-long-arrow-left"></i></a>
                </div>
                </div>
              </div>

                  <div class="box-body">  
                  <div class="form-group" style="padding: 0; padding-right: 10px">
                    <label for="inputState">No Induk Siswa</label>
                    <select id="inputNIS" class="form-control select2" name="nis">
                      <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
                      @foreach ($pesertadidik as $item)
                      <option data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun_ajaran }}" value="{{$item->id_siswa}}">{{ $item->nis }} - {{ $item->nm_siswa }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputnama">Nama Lengkap Siswa</label>
                    <input type="text" class="form-control" id="inputnamasiswa" name="nm_siswa" readonly>
                  </div>
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputnama">Tahun Ajaran Siswa</label>
                    <input type="text" class="form-control" id="inputtahun" name="tahun_ajaran" readonly>
                  </div>
                </div>

                  <div class="form-group" style="padding: 0; padding-right: 10px">
                    <label for="inputnama">Nama Ayah</label>
                    <input type="text" class="form-control" id="inputnama" name="nm_ayah" value="{{$orangtuas->nm_ayah}}">
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputpekerjaan">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" id="inputpekerjaan" name="job_ayah" value="{{$orangtuas->job_ayah}}">
                  </div>
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputpendidikan">Pendidikan Terakhir</label>
                    <input type="text" class="form-control" id="inputpendidikan" name="pddk_ayah" value="{{$orangtuas->pddk_ayah}}">
                  </div>
                  </div>

                  <div class="form-group" style="padding: 0; padding-right: 10px">
                    <label for="inputState">Penghasilan Ayah</label>
                    <select id="inputState" class="form-control" name="penghasilan_ayah" value="{{$orangtuas->penghasilan_ayah}}">
                      <option selected>-- Pilih Penghasilan --</option>
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
                    <input type="text" class="form-control" id="inputnama" name="nm_ibu" value="{{$orangtuas->nm_ibu}}">
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputpekerjaan">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" id="inputpekerjaan" name="job_ibu" value="{{$orangtuas->job_ibu}}">
                  </div>
                  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                    <label for="inputpendidikan">Pendidikan Terakhir</label>
                    <input type="text" class="form-control" id="inputpendidikan" name="pddk_ibu" value="{{$orangtuas->pddk_ibu}}">
                  </div>
                  </div>

                  <div class="form-group" style="padding: 0; padding-right: 10px">
                    <label for="inputState">Penghasilan Ibu</label>
                    <select id="inputState" class="form-control" name="penghasilan_ibu" value="{{$orangtua->penghasilan_ibu}}">
                      <option selected>-- Pilih Penghasilan --</option>
                      <option value="Kurang dari Rp.500,000" @if($orangtuas->penghasilan_ibu=='Kurang dari Rp.500,000')selected @endif>Kurang dari Rp.500,000</option>
                      <option value="Rp.500,000 - Rp.1,000,000" @if($orangtuas->penghasilan_ibu=='Rp.500,000 - Rp.1,000,000')selected @endif>Rp.500,000 - Rp.1,000,000</option>
                      <option value="Rp.1,000,000 - Rp.2,000,000" @if($orangtuas->penghasilan_ibu=='Rp.1,000,000 - Rp.2,000,000')selected @endif>Rp.1,000,000 - Rp.2,000,000</option>
                      <option value="Rp.2,000,000 - Rp.5,000,000" @if($orangtuas->penghasilan_ibu=='Rp.2,000,000 - Rp.5,000,000')selected @endif>Rp.2,000,000 - Rp.5,000,000</option>
                      <option value="Rp.5,000,000 - Rp.20,000,000" @if($orangtuas->penghasilan_ibu=='Rp.5,000,000 - Rp.20,000,000')selected @endif>Rp.5,000,000 - Rp.20,000,000</option>
                      <option value="Lebih dari Rp.20,000,000" @if($orangtuas->penghasilan_ibu=='Lebih dari Rp.20,000,000')selected @endif>Lebih dari Rp.20,000,000</option>
                      <option value="Tidak Penghasilan" @if($orangtuas->penghasilan_ibu=='Tidak Penghasilan')selected @endif>Tidak Berpenghasilan</option>
                    </select>
                  </div>
                  
                  <div class="form-group" style="padding: 0; padding-right: 10px">
                    <label for="inputState">Status Data</label>
                    <select id="inputState" class="form-control" name="sts_orang_tua" value="{{$orangtuas->sts_orang_tua}}">
                      <option selected>-- Statut Data Orang Tua --</option>
                      <option value="1" @if($orangtuas->sts_orang_tua=='1') selected @endif>Aktif</option>
                      <option value="0" @if($orangtuas->sts_orang_tua=='0') selected @endif>Non Aktif</option>
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
<script src="{{asset('adminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $('.select2').select2();
  $('#inputNIS').change(function() {
    var nm_siswa = $('option:selected', this).data('nama');
    var tahun_ajaran = $('option:selected', this).data('tahun');
  $('#inputnamasiswa').val(nm_siswa);
  $('#inputtahun').val(tahun_ajaran);
  });
</script>
@endsection