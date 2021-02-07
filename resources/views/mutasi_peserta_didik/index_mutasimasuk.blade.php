@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Mutasi Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard3"><i class="fa fa-dashboard"></i>Dashboard</a></li>
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
              <button type="button" class="btn btn-success" align="right">
              <i class="fa fa-print"></i> Cetak
              </button>       
        </div>
        </div>
        </div>

              <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
              </div>
        
              <div class="row">
                <div class="col-sm-12">
                <table id='example1' class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No Surat Pindah</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIS</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Lengkap Siswa</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Masuk</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Asal Sekolah</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status Data</th>
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
                                <td>{{ Carbon\Carbon::parse($mutasimasuk->tgl_masuk)->format('d F Y')}}</td>
                                <td>{{ $mutasimasuk->asal_sekolah }}</td>
                                <td>
                                <?php if($mutasimasuk->status_mutasi == 0)
                                {
                                  echo "Non Aktif";
                                }
                                  elseif($mutasimasuk->status_mutasi == 1)
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
          <div class="modal fade" id="exampleModal" tabindex="5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-sign-in"></i> Masukan Data Mutasi Masuk</h4>
                </div>
                  <div class="box box-primary">
                  <div class="modal-body">
                    <form action="/mutasimasuk/store" method="post">{{csrf_field()}}

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputsurat">No Surat Pindah</label>
                      <input type="text" class="form-control" id="inputsurat" name="no_srt_pindah" required="required" autocomplete="off">
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">No Induk Siswa</label>
                      <select style="width: 100%;" id="inputNIS" class="form-control select2" name="nis" required="required" autocomplete="off">
                        <option selected="selected" disabled="" value="">-- No Induk Siswa --</option>
                        @foreach ($pesertadidik as $item)
                        <option data-nama="{{ $item->nm_siswa }}" data-tahun="{{ $item->tahun_ajaran }}" data-provinsi="{{ $item->provinsi }}" data-kabupaten="{{ $item->kabupaten }}" data-alamat="{{ $item->alamat_siswa }}" value="{{ $item->id_siswa }}">{{ $item->nis }} - {{ $item->nm_siswa }}</option>
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
                      <label for="inputalamat">Alamat Siswa</label>
                      <textarea type ="text" class="form-control" id="inputalamat" rows="3" name="alamat_siswa" readonly></textarea>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputprovinsi">Provinsi</label>
                      <input type="text" class="form-control" id="inputprovinsi" name="provinsi" readonly>
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputkabupaten">Kabupaten</label>
                      <input type="text" class="form-control" id="inputkabupaten" name="kabupaten" readonly>
                    </div>
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputasalsekolah">Asal Sekolah</label>
                      <input type="text" class="form-control" id="inputasalsekolah" name="asal_sekolah" required="required" autocomplete="off">
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Tingkat Kelas</label>
                      <select id="inputState" class="form-control" name="tingkat_kelas" required="required" autocomplete="off">
                        <option selected>-- Pilih Tingkat Kelas --</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                      </select>
                    </div> 
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="input_tglmasuk">Tanggal Masuk</label>
                      <input type="date" class="form-control" id="input_tglmasuk" name="tgl_masuk" required="required" autocomplete="off">
                    </div>
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputalasan">Alasan Pindah</label>
                      <textarea class="form-control" id="inputalasan" rows="3" name="alasan_pindah" required="required" autocomplete="off"></textarea>
                    </div>

                     <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Status Data</label>
                      <select id="inputState" class="form-control" name="status_mutasi" required="required" autocomplete="off">
                        <option selected>-- Status Data Mutasi --</option>
                        <option value="1">Aktif</option>
                        <option value="0">Non Aktif</option>
                      </select>
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
  </div>  
</section> 
@endsection