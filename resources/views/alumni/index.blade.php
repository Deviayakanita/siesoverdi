@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Alumni
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Daftar Alumni</li>
    </ol>
  </section>

<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-mortar-board"></i> Daftar Alumni</h3>  
        <div style="float: right;">
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
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIS</th>
                    <th width="150px" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Lengkap Siswa</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tahun Ajaran</th>
                    <th width="150px" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jenis Perguruan Tinggi</th>
                    <th width="170px" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Perguruan Tinggi</th>
                    <th  width="100px" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Fakultas</th>
                    <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($alumnis as $alumni)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $alumni->pesertadidik->nis }}</td>
                                <td>{{ $alumni->pesertadidik->nm_siswa }}</td>
                                <td>{{ $alumni->tahun->tahun_ajaran }}</td>
                                <td>{{ $alumni->jns_pt }}</td>
                                <td>{{ $alumni->nm_pt }}</td>
                                <td>{{ $alumni->nm_fak }}</td>
                                <td style="text-align: center;">
                                  @if(Auth::user() && Auth::user()->level == 0)
                                  <a href="/alumni/edit/{{ $alumni->id_alumni }}"><i class="fa fa-edit btn-warning btn-sm"></i></a>
                                  @endif
                                  <a href="/alumni/show/{{ $alumni->id_alumni }}" ><i class="fa fa-eye btn-info btn-sm"></i></a>
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
                  <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Masukan Data Alumni</h4>
                </div>
                  <div class="box box-primary">
                  <div class="modal-body">
                    <form action="/alumni/store" method="post">{{csrf_field()}}

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">No Induk Siswa</label>
                      <select style="width: 100%;" id="inputNIS" class="form-control select2" name="nis" required="required" autocomplete="off">
                        <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
                        @foreach ($pesertadidik as $item)
                        <option data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun_masuk }}" value="{{ $item->id_siswa }}"{{ old('nis')==$item->id_siswa ? 'selected':''}}>{{ $item->nis }} - {{ $item->nm_siswa }}</option>
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
                      <label for="inputtahun">Tahun Masuk Siswa</label>
                      <input type="text" class="form-control" id="inputthn" name="tahun_masuk" readonly value="{{ old('tahun_ajaran') }}">
                      <input type="hidden" id="inputid_ta" name="id_ta" readonly value="{{ old('id_ta') }}">
                    </div>
                    </div>

                     <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Tahun Ajaran</label>
                      <select style="width: 100%;" id="inputTahun" class="form-control select2" name="tahun_ajaran" required="required" autocomplete="off" >
                        <option selected="selected" disabled="" value="">-- Pilih Tahun Ajaran --</option>
                          @foreach ($tahunajarans as $item)
                          <option data-tahunajaran="{{ $item->tahun_ajaran }}" value="{{ $item->id_ta }}"{{ old('tahun_ajaran')==$item->id_ta ? 'selected':''}}>{{ $item->tahun_ajaran }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Jenis Perguruan Tinggi</label>
                      <select id="inputState" class="form-control" name="jns_pt" required="required" autocomplete="off">
                        <option selected disabled>-- Pilih Jenis Perguruan Tinggi --</option>
                        <option value="Negeri" {{ old('jns_pt')=='Negeri'? 'selected':''}}>Negeri</option>
                        <option value="Swasta"{{ old('jns_pt')=='Swasta'? 'selected':''}}>Swasta</option>
                        <option value="Tidak Kuliah"{{ old('jns_pt')=='Tidak Kuliah'? 'selected':''}}>Tidak Kuliah</option>
                      </select>
                      @error('jns_pt')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ "Tidak Boleh Kosong" }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputnama">Nama Perguruan Tinggi</label>
                      <input type="text" class="form-control" id="inputnama" name="nm_pt" required="required" placeholder="Masukan Nama Perguruan Tinggi" value="{{ old('nm_pt') }}">
                      @error('nm_pt')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ "Terdiri Dari 5 Sampai 50 Karakter" }}</strong>
                        </span>
                      @enderror
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputnamafk">Nama Fakultas</label>
                      <input type="text" class="form-control" id="inputnamafk" name="nm_fak" required="required" placeholder="Masukan Nama Fakultas" value="{{ old('nm_fak') }}">
                      @error('nm_fak')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ "Terdiri Dari 5 Sampai 50 Karakter" }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputnamajurus">Nama Jurusan</label>
                      <input type="text" class="form-control" id="inputnamajurus" name="nm_jurusan" required="required" placeholder="Masukan Nama Jurusan" value="{{ old('nm_jurusan') }}">
                      @error('nm_jurusan')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ "Terdiri Dari 5 Sampai 50 Karakter" }}</strong>
                        </span>
                      @enderror
                    </div>
                    </div>

                    <div>
                      <button type="submit" class="btn btn-primary">SIMPAN DATA</button>
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