@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Orang Tua
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard3"><i class="fa fa-dashboard"></i>Dashboard</a></li>
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
          @if(Auth::user() && Auth::user()->level == 0)
          <div>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" align="right">
              <i class="fa fa-pencil"></i> Tambah Data
              </button>
          @endif 
              <button type="button" class="btn btn-success" align="right">
              <i class="fa fa-print"></i> Cetak
              </button>
          </div>
        </div>
        </div>

            <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row"></div>
            </div>

            <div class="row">
                <div class="col-sm-12">
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
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status Data</th>
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
                                <td>
                                <?php if($orangtua->sts_orang_tua == 0)
                                {
                                  echo "Non Aktif";
                                }
                                  elseif($orangtua->sts_orang_tua == 1)
                                {
                                  echo "Aktif";
                                }
                                else
                                {
                                  echo "Non Aktif";
                                }
                                ?>
                                </td>
                                <td style="text-align: center;">
                                    @if(Auth::user() && Auth::user()->level == 0)
                                    <a href="editortu/edit/{{ $orangtua->id_orang_tua }}"><i class="fa fa-edit btn-warning btn-sm"></i></a>
                                    @endif
                                    <a href="/detailorangtua/detail/{{ $orangtua->id_orang_tua }}"><i class="fa fa-eye btn-info btn-sm"></i></a>
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
          <div class="modal fade" id="exampleModal" tabindex="5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Masukan Data Peserta Didik</h4>
                </div>
                  <div class="box box-primary">
                  <div class="modal-body">
                    <form action="/orangtua/store" method="post">{{csrf_field()}}

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">No Induk Siswa</label>
                      <select id="inputNIS" class="form-control select2" name="nis">
                        <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
                        @foreach ($pesertadidik as $item)
                        <option data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun_ajaran }}" value="{{ $item->id_siswa }}">{{ $item->nis }} - {{ $item->nm_siswa }}</option>
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
                      <input type="text" class="form-control" id="inputnama" name="nm_ayah">
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputpekerjaan">Pekerjaan Ayah</label>
                      <input type="text" class="form-control" id="inputpekerjaan" name="job_ayah">
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputpendidikan">Pendidikan Terakhir</label>
                      <input type="text" class="form-control" id="inputpendidikan" name="pddk_ayah">
                    </div>
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Penghasilan Ayah</label>
                      <select id="inputState" class="form-control" name="penghasilan_ayah">
                        <option selected>-- Pilih Penghasilan --</option>
                        <option value="Kurang dari Rp.500,000">Kurang dari Rp.500,000</option>
                        <option value="Rp.500,000 - Rp.1,000,000">Rp.500,000 - Rp.1,000,000</option>
                        <option value="Rp.1,000,000 - Rp.2,000,000">Rp.1,000,000 - Rp.2,000,000</option>
                        <option value="Rp.2,000,000 - Rp.5,000,000">Rp.2,000,000 - Rp.5,000,000</option>
                        <option value="Rp.5,000,000 - Rp.20,000,000">Rp.5,000,000 - Rp.20,000,000</option>
                        <option value="Lebih dari Rp.20,000,000">Lebih dari Rp.20,000,000</option>
                        <option value="Tidak Penghasilan">Tidak Berpenghasilan</option>
                      </select>
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputnama">Nama Ibu</label>
                      <input type="text" class="form-control" id="inputnama" name="nm_ibu">
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputpekerjaan">Pekerjaan Ibu</label>
                      <input type="text" class="form-control" id="inputpekerjaan" name="job_ibu">
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputpendidikan">Pendidikan Terakhir</label>
                      <input type="text" class="form-control" id="inputpendidikan" name="pddk_ibu">
                    </div>
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Penghasilan Ibu</label>
                      <select id="inputState" class="form-control" name="penghasilan_ibu">
                        <option selected>-- Pilih Penghasilan --</option>
                        <option value="Kurang dari Rp.500,000">Kurang dari Rp.500,000</option>
                        <option value="Rp.500,000 - Rp.1,000,000">Rp.500,000 - Rp.1,000,000</option>
                        <option value="Rp.1,000,000 - Rp.2,000,000">Rp.1,000,000 - Rp.2,000,000</option>
                        <option value="Rp.2,000,000 - Rp.5,000,000">Rp.2,000,000 - Rp.5,000,000</option>
                        <option value="Rp.5,000,000 - Rp.20,000,000">Rp.5,000,000 - Rp.20,000,000</option>
                        <option value="Lebih dari Rp.20,000,000">Lebih dari Rp.20,000,000</option>
                        <option value="Tidak Penghasilan">Tidak Berpenghasilan</option>
                      </select>
                    </div>
                    
                    <div class="form-group"style="padding: 0; padding-right: 10px">
                      <label for="inputState">Status Data</label>
                      <select id="inputState" class="form-control" name="sts_orang_tua">
                        <option selected>-- Status Data Orang Tua --</option>
                        <option value="1">AKTIF</option>
                        <option value="0">NON AKTIF</option>
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