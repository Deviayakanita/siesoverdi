@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Alumni
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard3"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Daftar Alumni</li>
    </ol>
  </section>

<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-files-o"></i> Daftar Alumni</h3>  
        <div style="float: right;">
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
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIS</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Lengkap Siswa</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jenis Perguruan Tinggi</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Perguruan Tinggi</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status Data</th>
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
                                <td>{{ $alumni->jns_pt }}</td>
                                <td>{{ $alumni->nm_pt }}</td>
                               <td>
                                <?php if($alumni->status_alumni == 0)
                                {
                                  echo "Non Aktif";
                                }
                                  elseif($alumni->status_alumni == 1)
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
          <div class="modal fade" id="exampleModal" tabindex="5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-files-o"></i> Masukan Data Alumni</h4>
                </div>
                  <div class="box box-primary">
                  <div class="modal-body">
                    <form action="/alumni/store" method="post">{{csrf_field()}}

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">No Induk Siswa</label>
                      <select style="width: 100%;" id="inputNIS" class="form-control select2" name="nis" required="required" autocomplete="off">
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
                      <label for="inputtahun">Tahun Ajaran</label>
                      <input type="text" class="form-control" id="inputtahunajaran" name="tahun_ajaran" readonly>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Jenis Perguruan Tinggi</label>
                      <select id="inputState" class="form-control" name="jns_pt" required="required" autocomplete="off">
                        <option selected>-- Pilih Jenis Perguruan Tinggi --</option>
                        <option value="Negri">Negri</option>
                        <option value="Swasta">Swasta</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputnama">Nama Perguruan Tinggi</label>
                      <input type="text" class="form-control" id="inputnama" name="nm_pt" required="required" autocomplete="off">
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputnamafk">Nama Fakultas</label>
                      <input type="text" class="form-control" id="inputnamafk" name="nm_fak" required="required" autocomplete="off">
                    </div>
                    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputnamajurus">Nama Jurusan</label>
                      <input type="text" class="form-control" id="inputnamajurus" name="nm_jurusan" required="required" autocomplete="off">
                    </div>
                    </div>

                    <div class="form-group" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Status Alumni</label>
                      <select id="inputState" class="form-control" name="status_alumni" required="required" autocomplete="off">
                        <option selected>-- Status Alumni --</option>
                        <option value="1">Aktif</option>
                        <option value="0">Non Aktif</option>
                      </select>
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
</div>
</section>  
@endsection