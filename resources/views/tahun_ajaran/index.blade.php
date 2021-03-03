@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Tahun Ajaran
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Daftar Tahun Ajaran</li>
    </ol>
  </section>

<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-calendar"></i> Daftar Tahun Ajaran</h3>
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
                <div class="row"></div>
              </div>
            
              <div class="row">
                <div class="col-sm-12" style="overflow-x: auto;">
                <table id='example1' class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tahun Ajaran</th>
                    <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($tahunajarans as $tahunajaran)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $tahunajaran->tahun_ajaran }}</td>
                                <td style="text-align: center;">
                                    <a href="/tahunajaran/edit/{{ $tahunajaran->id_ta }}"><i class="fa fa-edit btn-warning btn-sm"></i></a>
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
                  <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-calendar"></i> Masukan Data Tahun Ajaran</h4>
                </div>
                  <div class="box box-primary">
                  <div class="modal-body">
                    <form action="/tahunajaran/store" method="post">{{csrf_field()}}

                         <div class="form-group">
                           <label for="input_tahunajaran">Tahun Ajaran</label>
                           <input type="text" class="form-control" id="input_tahunajaran" name="tahun_ajaran" required="required" autocomplete="off" placeholder="Masukan Tahun Ajaran" value="{{ old('tahun_ajaran') }}">
                           @error('tahun_ajaran')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ " Minimal 9 Sampai 12 Karakter Dan Tahun Ajaran Tidak Boleh Sama" }}</strong>
                            </span>
                          @enderror
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
</section>
@endsection

@section('script')
<script type="text/javascript">
    @if($errors->any())
      $('#exampleModal').modal();
    @endif
</script>
@endsection