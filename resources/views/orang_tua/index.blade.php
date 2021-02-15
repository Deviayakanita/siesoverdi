@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Orang Tua
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Daftar Orang Tua</li>
    </ol>
  </section>

<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-users"></i> Daftar Orang Tua</h3>  <div style="float: right;">
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
              <div class="row"></div>
            </div>

            <div class="row">
                <div class="col-sm-12" style="overflow-x: auto;">
                <table id='example1' class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIS</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Lengkap Siswa</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Ayah</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Penghasilan Ayah</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Ibu</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Penghasilan Ibu</th>
                    <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($orangtuas as $orangtua)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $orangtua->pesertadidik->nis }}</td>
                                <td>{{ $orangtua->pesertadidik->nm_siswa }}</td>
                                <td>{{ $orangtua->nm_ayah }}</td>
                                <td>{{ $orangtua->penghasilan_ayah }}</td> 
                                <td>{{ $orangtua->nm_ibu }}</td>
                                <td>{{ $orangtua->penghasilan_ibu }}</td>
                                <td style="text-align: center;">
                                    @if(Auth::user() && Auth::user()->level == 0)
                                    <a href="/orangtua/edit/{{ $orangtua->id_orang_tua }}"><i class="fa fa-edit btn-warning btn-sm"></i></a>
                                    @endif
                                    <a href="/orangtua/show/{{ $orangtua->id_orang_tua }}"><i class="fa fa-eye btn-info btn-sm"></i></a>
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
                  <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Masukan Data Orang Tua</h4>
                </div>
                  <div class="box box-primary">
                  <div class="modal-body">
                  
                    <form action="/orangtua/store" method="post">{{csrf_field()}}

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">No Induk Siswa</label>
                      <select style="width: 100%;" id="inputNIS" class="form-control select2" name="nis" required="required" autocomplete="off" >
                        <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
                        @foreach ($pesertadidik as $item)
                        <option data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun_ajaran }}" value="{{ $item->id_siswa }}"{{ old('nis')==$item->id_siswa ? 'selected':''}}>{{ $item->nis }} - {{ $item->nm_siswa }}</option>
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
                      <input type="text" class="form-control" id="inputnamasiswa" name="nm_siswa" readonly value="{{ old('nm_siswa') }}">
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputnama">Tahun Ajaran Siswa</label>
                      <input type="text" class="form-control" id="inputtahun" name="tahun_ajaran" readonly value="{{ old('tahun_ajaran') }}">
                    </div>
                  </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputnama">Nama Ayah</label>
                      <input type="text" class="form-control" id="inputnama" name="nm_ayah" required="required" autocomplete="off" placeholder="Masukan Nama" value="{{ old('nm_ayah') }}">
                      @error('nm_ayah')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputpekerjaan">Pekerjaan Ayah</label>
                      <input type="text" class="form-control" id="inputpekerjaan" name="job_ayah" required="required" autocomplete="off" placeholder="Masukan Pekerjaan" value="{{ old('job_ayah') }}">
                      @error('job_ayah')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputpendidikan">Pendidikan Terakhir</label>
                      <input type="text" class="form-control" id="inputpendidikan" name="pddk_ayah" required="required" autocomplete="off" placeholder="Masukan Pendidikan Terakhir" value="{{ old('pddk_ayah') }}">
                    </div>
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Penghasilan Ayah</label>
                      <select style="width: 100%;" id="inputState" class="form-control select2" name="penghasilan_ayah" required="required" autocomplete="off">
                        <option selected="selected" disabled>-- Pilih Penghasilan --</option>
                        <option value="Kurang dari Rp.500,000" {{ old('penghasilan_ayah')=='Kurang dari Rp.500,000'? 'selected':''}}>Kurang dari Rp.500,000</option>
                        <option value="Rp.500,000 - Rp.1,000,000" {{ old('penghasilan_ayah')=='Rp.500,000 - Rp.1,000,000'? 'selected':''}}>Rp.500,000 - Rp.1,000,000</option>
                        <option value="Rp.1,000,000 - Rp.2,000,000" {{ old('penghasilan_ayah')=='Rp.1,000,000 - Rp.2,000,000'? 'selected':''}}>Rp.1,000,000 - Rp.2,000,000</option>
                        <option value="Rp.2,000,000 - Rp.5,000,000" {{ old('penghasilan_ayah')=='Rp.2,000,000 - Rp.5,000,000'? 'selected':''}}>Rp.2,000,000 - Rp.5,000,000</option>
                        <option value="Rp.5,000,000 - Rp.20,000,000" {{ old('penghasilan_ayah')=='Rp.5,000,000 - Rp.20,000,000'? 'selected':''}}>Rp.5,000,000 - Rp.20,000,000</option>
                        <option value="Lebih dari Rp.20,000,000" {{ old('penghasilan_ayah')=='Lebih dari Rp.20,000,000'? 'selected':''}}>Lebih dari Rp.20,000,000</option>
                        <option value="Tidak Penghasilan" {{ old('penghasilan_ayah')=='Tidak Penghasilan'? 'selected':''}}>Tidak Berpenghasilan</option>
                      </select>
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputnama">Nama Ibu</label>
                      <input type="text" class="form-control" id="inputnama" name="nm_ibu" required="required" autocomplete="off" placeholder="Masukan Nama" value="{{ old('nm_ibu') }}">
                      @error('nm_ibu')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputpekerjaan">Pekerjaan Ibu</label>
                      <input type="text" class="form-control" id="inputpekerjaan" name="job_ibu" required="required" autocomplete="off" placeholder="Masukan Pekerjaan" value="{{ old('job_ibu') }}">
                      @error('job_ibu')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputpendidikan">Pendidikan Terakhir</label>
                      <input type="text" class="form-control" id="inputpendidikan" name="pddk_ibu" required="required" autocomplete="off" placeholder="Masukan Pendidikan Terakhir" value="{{ old('pddk_ibu') }}">
                    </div>
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Penghasilan Ibu</label>
                      <select style="width: 100%;" id="inputState" class="form-control select2" name="penghasilan_ibu" required="required" autocomplete="off">
                        <option selected="selected" disabled>-- Pilih Penghasilan --</option>
                        <option value="Kurang dari Rp.500,000" {{ old('penghasilan_ibu')=='Kurang dari Rp.500,000'? 'selected':''}}>Kurang dari Rp.500,000</option>
                        <option value="Rp.500,000 - Rp.1,000,000" {{ old('penghasilan_ibu')=='Rp.500,000 - Rp.1,000,000'? 'selected':''}}>Rp.500,000 - Rp.1,000,000</option>
                        <option value="Rp.1,000,000 - Rp.2,000,000" {{ old('penghasilan_ibu')=='Rp.1,000,000 - Rp.2,000,000'? 'selected':''}}>Rp.1,000,000 - Rp.2,000,000</option>
                        <option value="Rp.2,000,000 - Rp.5,000,000" {{ old('penghasilan_ibu')=='Rp.2,000,000 - Rp.5,000,000'? 'selected':''}}>Rp.2,000,000 - Rp.5,000,000</option>
                        <option value="Rp.5,000,000 - Rp.20,000,000" {{ old('penghasilan_ibu')=='Rp.5,000,000 - Rp.20,000,000'? 'selected':''}}>Rp.5,000,000 - Rp.20,000,000</option>
                        <option value="Lebih dari Rp.20,000,000" {{ old('penghasilan_ibu')=='Lebih dari Rp.20,000,000'? 'selected':''}}>Lebih dari Rp.20,000,000</option>
                        <option value="Tidak Penghasilan" {{ old('penghasilan_ibu')=='Tidak Penghasilan'? 'selected':''}}>Tidak Berpenghasilan</option>
                      </select>
                    </div>
                    
                    <div>
                      <button type="submit" class=" btn btn-primary">Simpan Data</button>
                    </div>
              </form>
            </div>
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
    $('#inputnamasiswa').val(nm_siswa);
    $('#inputtahun').val(tahun_ajaran);
  });
</script>
@endsection