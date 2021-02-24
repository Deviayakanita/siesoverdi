@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Mutasi Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Daftar Mutasi Masuk</li>
    </ol>
  </section>

<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
      <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-sign-in"></i> Daftar Mutasi Masuk</h3>  <div style="float: right;">
        <div style="clear: both;"></div>
          <div>
          @if(Auth::user() && Auth::user()->level == 0)
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" align="right">
              <i class="fa fa-pencil"></i> Tambah Data
              </button>
          @endif    
        </div>
        </div>
        </div>

              <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
              </div>
        
              <div class="row">
                <div class="col-sm-12" style="overflow-x: auto;">
                <table id='example1' class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No Surat Pindah</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIS</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Lengkap Siswa</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tahun Ajaran</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Masuk</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Asal Sekolah</th>
                    <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($mutasimasuks as $mutasimasuk)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $mutasimasuk->no_srt_pindah }}</td>
                                <td>{{ $mutasimasuk->pesertadidik->nis }}</td>
                                <td>{{ $mutasimasuk->pesertadidik->nm_siswa }}</td>
                                <td>{{ $mutasimasuk->pesertadidik->tahun->tahun_ajaran }}</td>
                                <td>{{ $mutasimasuk->tgl_masuk->isoFormat('D MMMM Y') }}</td>
                                <td>{{ $mutasimasuk->asal_sekolah }}</td>
                                <td style="text-align: center;">
                                  @if(Auth::user() && Auth::user()->level == 0)
                                  <a href="mutasimasuk/edit/{{ $mutasimasuk->id_mut_msk }}"><i class="fa fa-edit btn-warning btn-sm"></i></a>
                                  @endif
                                  <a href="/mutasimasuk/show/{{ $mutasimasuk->id_mut_msk }}"><i class="fa fa-eye btn-info btn-sm"></i></a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                       </tbody>
                </table>
            </div>
        </div>
    <!-- /.box-body -->
   </div>
  </div>
</div>
</div>

<!-- Modal -->
          <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Masukan Data Mutasi Masuk</h4>
                </div>
                  <div class="box box-primary">
                  <div class="modal-body">
                    <form action="/mutasimasuk/store" method="post">{{csrf_field()}}

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputsurat">No Surat Pindah</label>
                      <input type="text" class="form-control" id="inputsurat" name="no_srt_pindah" required="required" autocomplete="off" placeholder="Masukan No Surat" value="{{ old('no_srt_pindah') }}">
                      @error('no_srt_pindah')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{" Terdiri Dari 4 Samapai 30 Karakter "}}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">No Induk Siswa</label>
                      <select style="width: 100%;" id="inputNIS" class="form-control select2" name="nis" required="required" autocomplete="off">
                        <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
                        @foreach ($pesertadidik as $item)
                        <option data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun->tahun_ajaran}}" data-id="{{ $item->id_ta}}"  data-kabupaten="{{ $item->kabupaten }}" data-alamat="{{ $item->alamat_siswa }}" value="{{ $item->id_siswa }}" {{ old('nis')==$item->id_siswa ? 'selected':''}}>{{ $item->nis }} - {{ $item->nm_siswa }}</option>
                        @endforeach
                      </select>
                      @error('nis')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{" Nis Sudah Tersedia"}}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputnama">Nama Lengkap Siswa</label>
                      <input type="text" class="form-control" id="inputnamasiswa" name="nm_siswa" readonly value="{{ old('nm_siswa') }}">
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputnama">Tahun Ajaran Siswa</label>
                      <input type="text" class="form-control" id="inputtahun" name="tahun_ajaran" readonly value="{{ old('tahun_ajaran') }}">
                      <input type="hidden" id="inputid_ta" name="id_ta" value="{{ old('id_ta') }}">
                    </div>
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputalamat">Alamat Siswa</label>
                      <textarea type ="text" class="form-control" id="inputalamat" rows="3" name="alamat_siswa" readonly>{{ old('alamat_siswa') }}</textarea>
                    </div>
                    
                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputkabupaten">Kabupaten</label>
                      <input type="text" class="form-control" id="inputkabupaten" name="kabupaten" readonly value="{{ old('kabupaten') }}">
                    </div>
                 

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputasalsekolah">Asal Sekolah</label>
                      <input type="text" class="form-control" id="inputasalsekolah" name="asal_sekolah" required="required" autocomplete="off" placeholder="Masukan Asal Sekolah" value="{{ old('asal_sekolah') }}">
                      @error('asal_sekolah')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{" Terdiri Dari 8 Sampai 30 "}}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Tingkat Kelas</label>
                      <select id="inputState" class="form-control" name="tingkat_kelas" required="required" autocomplete="off">
                        <option selected disabled>-- Pilih Tingkat Kelas --</option>
                        <option value="X" {{ old('tingkat_kelas')=='X'? 'selected':''}}>X</option>
                        <option value="XI" {{ old('tingkat_kelas')=='XI'? 'selected':''}}>XI</option>
                        <option value="XII" {{ old('tingkat_kelas')=='XII'? 'selected':''}}>XII</option>
                      </select>
                      @error('tingkat_kelas')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{" Tidak Boleh Kosong "}}</strong>
                      </span>
                      @enderror
                    </div> 

                    <div class="form-group" style="padding: 0; padding-right: 10px;">
                      <label for="input_tglmasuk">Tanggal Masuk</label>
                      <input type="date" class="form-control" id="input_tglmasuk" name="tgl_masuk" required="required" autocomplete="off" placeholder="Masukan Tanggal Masuk" value="{{ old('tgl_masuk') }}">
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputalasan">Alasan Pindah</label>
                      <textarea class="form-control" id="inputalasan" rows="3" name="alasan_pindah" required="required" autocomplete="off" placeholder="Masukan Alasan">{{ old('alasan_pindah') }}</textarea>
                      @error('alasan_pindah')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{" Terdiri Dari 5 Sampai 50 "}}</strong>
                      </span>
                      @enderror
                    </div>

                     <div>
                      <button type="submit" class="btn btn-primary" style="margin-left: 2px">SIMPAN DATA</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
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
    var kabupaten = $('option:selected', this).attr('data-kabupaten');
    var alamat_siswa = $('option:selected', this).attr('data-alamat');
    $('#inputnamasiswa').val(nm_siswa);
    $('#inputtahun').val(tahun_ajaran);
    $('#inputid_ta').val(id_ta);
    $('#inputkabupaten').val(kabupaten);
    $('#inputalamat').val(alamat_siswa);
  });
</script>
@endsection