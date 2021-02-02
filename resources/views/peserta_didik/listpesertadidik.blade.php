@extends('layout.blank')
@section('title', 'Data Peserta Didik | Admin')
@section('topbaraccount')
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{url('adminLTE/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
        <span class="hidden-xs">Alexander Pierce</span>
    </a>

    <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">
        <img src="{{url('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        <p>
        Alexander Pierce - Web Developer
        <small>Member since Nov. 2012</small>
        </p>
    </li>
    </ul>
</li>
@endsection

@section('sidemenu')
<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
    <li>
        <a href="{{url('/dashboard')}}">
            <i class="fa fa-home active"></i><span> Dashboard</span>
        </a>
    </li>
    <li class=" active treeview">
      <a href="#">
      <i class="fa fa-edit"></i><span> Kelola Peserta Didik</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="{{url('listpesertadidik')}}"><i class="fa fa-dot-circle-o text-aqua"></i> Data Peserta Didik</a></li>
        <li><a href="{{url('listortu')}}"><i class="fa fa-circle-o"></i> Data Orang Tua</a></li>
      </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-edit"></i><span> Kelola Mutasi</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('listmtsmasuk')}}"><i class="fa fa-circle-o"></i><span> Data Mutasi Masuk</span> </a></li>
            <li><a href="{{url('listmtskeluar')}}"><i class="fa fa-circle-o"></i> Data Mutasi Keluar</a></li>     
        </ul>
    </li>
    <li>
        <a href="{{url('listalumni')}}">
        <i class="fa fa-edit"></i><span> Kelola Alumni</span>
        </a>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', ' Data Peserta Didik')

@section('breadcrumb')
  <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
  <li> Kelola Peserta Didik</li>
  <li> Daftar Peserta Didik</li>
@endsection

@section('content')
<section class="content" style="padding-top:0;">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
          <div class="col-md-7 col-sm-8"><h4><i class="fa fa-users"></i> Daftar Peserta Didik </h4>
          </div>
            <div align= "right" class="box-body pad table-responsive" style="padding-right: 0px;">
              <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" align="right">
                  <i class="fa fa-pencil"></i> Tambah Data
                </button> 
                <button type="button" class="btn btn-success"align="right">
                  <i class="fa fa-print"></i> Cetak
                </button>
              </div>
          <div>
           <!--  <a href="/index"><button type="button" class="btn btn-primary" align="right"><i class="fa fa-pencil">Tambah Data</button></i></a> -->
            <!-- <a href="#"><button type="button" class="btn btn-primary" align="right"><i class="fa fa-print">Cetak</button></i></a> -->
          </div>
          </div>
          <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row"></div>
              </div>
          </div>
            <div class="row">
                <div class="col-sm-12">
                <table id='example1' class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIS</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Lengkap Siswa</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jenis Kelamin</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Lahir</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">No Telepon</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status Peserta Didik</th>
                    <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($pesertadidiks as $pesertadidik)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $pesertadidik->nis }}</td>
                                <td>{{ $pesertadidik->nm_siswa }}</td>
                                <td>{{ $pesertadidik->jns_kelamin }}</td>
                                <td>{{ $pesertadidik->tgl_lahir }}</td>
                                <td>{{ $pesertadidik->no_tlpn }}</td>
                                <td>
                                <?php if($pesertadidik->sts_siswa == 0)
                                {
                                  echo "Non Aktif";
                                }
                                  elseif($pesertadidik->sts_siswa == 1)
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
                                    <a href="/editpesertadidik/edit/{{ $pesertadidik->id_siswa }}"><i class="fa fa-edit btn-warning btn-sm"></i></a>
                                    <a href="/detailpesertadidik/detail/{{ $pesertadidik ->id_siswa }}"><i class="fa fa-eye btn-info btn-sm"></i></a>
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
                    <form action="{{route('pesertadidik.store')}}" method="post">{{csrf_field()}}

                      <div class="form-group" style="padding: 0; padding-right: 10px">
                        <label for="inputnis">No Induk Siswa</label>
                        <input type="nama" class="form-control" id="inputnis" name="nis">
                      </div>

                      <div class="form-group" style="padding: 0; padding-right: 10px">
                        <label for="inputnama">Nama Lengkap Siswa</label>
                        <input type="nama" class="form-control" id="inputnama" name="nm_siswa">
                      </div>
  
                      <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                          <label for="inputState">Jenis Kelamin</label>
                          <select id="inputState" class="form-control" name="jns_kelamin">
                            <option selected>-- Pilih Jenis Kelamin --</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                          <label for="inputState">Jurusan</label>
                          <select id="inputState" class="form-control" name="jurusan">
                            <option selected>-- Pilih Jurusan --</option>
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                          <label for="input_tmplahir">Tempat Lahir</label>
                          <input type="text" class="form-control" id="input_tmplahir" name="tmp_lahir">
                        </div>
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                          <label for="input_tgllahir">Tanggal Lahir</label>
                          <input type="date" class="form-control" id="input_tgllahir" name="tgl_lahir">
                        </div>
                      </div>

                      <div class="form-group" style="padding: 0; padding-right: 10px">
                        <label for="inputagama">Agama</label>
                        <input type="agama" class="form-control" id="inputagama" name="agama">
                      </div>

                      <div class="form-group" style="padding: 0; padding-right: 10px">
                        <label for="alamatsiswa">Alamat Siswa</label>
                        <textarea class="form-control" id="alamatsiswa" rows="3" name="alamat_siswa"></textarea>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                          <label for="inputprovinsi">Provinsi</label>
                          <input type="provinsi" class="form-control" id="inputprovinsi" name="provinsi">
                        </div>
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                          <label for="inputkabupaten">Kabupaten</label>
                          <input type="kabupaten" class="form-control" id="inputkabupaten" name="kabupaten">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                          <label for="inputnotlpn">No Telpon</label>
                          <input type="notelpon" class="form-control" id="inputnotlpn" name="no_tlpn">
                        </div>
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                          <label for="inputemail">Email</label>
                          <input type="email" class="form-control" id="inputemail" name="email">
                        </div>
                      </div>

                      <div class="form-row">
                         <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                           <label for="input_tahunajaran">Tahun Ajaran</label>
                           <input type="text" class="form-control" id="input_tahunajaran" name="tahun_ajaran"   >
                         </div>
                         <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                           <label for="inputState">Status Siswa</label>
                           <select id="inputState" class="form-control" name="sts_siswa">
                             <option selected>-- Pilih Status --</option>
                             <option value="1">AKTIF</option>
                             <option value="0">NON AKTIF</option>
                           </select>
                         </div>
                      </div>
            
                      <div class="form-group" style="padding: 0; padding-right: 10px">
                        <label for="keterangan">Keterangan Siswa</label>
                        <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                      </div>
                </div>
                      <div class="modal-footer">
                        <button type="submit" class=" btn btn-primary pull-left" data-dismiss="modal">Simpan Data</button>
                      </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
</section>
@endsection
@section('content-footer')