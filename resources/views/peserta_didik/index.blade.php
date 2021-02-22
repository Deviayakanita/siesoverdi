@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Peserta Didik
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Daftar Peserta Didik</li>
    </ol>
  </section>

<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-users"></i> Daftar Peserta Didik</h3>
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
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIS</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Lengkap Siswa</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jenis Kelamin</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tempat Tanggal Lahir</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tahun Ajaran</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status Siswa</th>
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
                                <td>{{ $pesertadidik->tmp_lahir }}, {{$pesertadidik->tgl_lahir->isoFormat('D MMMM Y') }}</td>
                                <td>{{ $pesertadidik->tahun->tahun_ajaran }}</td>
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
                                  @if(Auth::user() && Auth::user()->level == 0)
                                    <a href="/pesertadidik/edit/{{ $pesertadidik->id_siswa }}"><i class="fa fa-edit btn-warning btn-sm"></i></a>
                                  @endif
                                    <a href="/pesertadidik/show/{{ $pesertadidik ->id_siswa }}"><i class="fa fa-eye btn-info btn-sm"></i></a>
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
                    <form action="/pesertadidik/store" method="post">{{csrf_field()}}

                      <div class="form-group" style="padding: 0; padding-right: 10px;">
                        <label for="inputnis">No Induk Siswa</label>
                        <input type="nama" class="form-control" id="inputnis" name="nis" required="required" autocomplete="off" placeholder="Masukan No Induk Siswa" onkeypress="return hanyaAngka(event)" value="{{ old('nis') }}">
                          @error('nis')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ "Nis Sudah Tersedia" }}</strong>
                            </span>
                          @enderror
                      </div>

                      <div class="form-group" style="padding: 0; padding-right: 10px;">
                        <label for="inputnama">Nama Lengkap Siswa</label>
                        <input type="nama" class="form-control" id="inputnama" name="nm_siswa" required="required" autocomplete="off" placeholder="Masukan Nama Lengkap" value="{{ old('nm_siswa') }}" onkeypress="return hanyaHuruf(event)">
                         @error('nm_siswa')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ "Terdidri Dari 8 Sampai 50 Karakter" }}</strong>
                            </span>
                          @enderror
                      </div>
  
                      <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                          <label for="inputState">Jenis Kelamin</label>
                          <select id="inputjeniskelamin" class="form-control" name="jns_kelamin" required="required" autocomplete="off">
                            <option disabled selected>-- Pilih Jenis Kelamin --</option>
                            <option value="Laki - Laki" {{ old('jns_kelamin')=='Laki - Laki'? 'selected':''}}>Laki - Laki</option>
                            <option value="Perempuan" {{ old('jns_kelamin')=='Perempuan'? 'selected':''}}>Perempuan</option>
                          </select>
                           @error('jns_kelamin')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ "Tidak Boleh Kosong" }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                          <label for="inputState">Jurusan</label>
                          <select id="inputjurusan" class="form-control" name="jurusan" required="required" autocomplete="off">
                            <option disabled selected>-- Pilih Jurusan --</option>
                            <option value="IPA" {{ old('jurusan')=='IPA'? 'selected':''}}>IPA</option>
                            <option value="IPS" {{ old('jurusan')=='IPS'? 'selected':''}}>IPS</option>
                          </select>
                           @error('jurusan')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ "Tidak Boleh Kosong" }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>

                        <div class="form-group" style="padding: 0; padding-right: 10px">
                          <label for="input_tmplahir">Tempat Lahir</label>
                          <input type="text" class="form-control" id="input_tmplahir" name="tmp_lahir" required="required" autocomplete="off" placeholder="Masukan Tempat Lahir" value="{{ old('tmp_lahir') }}">
                          @error('tmp_lahir')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ " Terdidri Dari 3 Sampai 20 Karakter " }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-group"style="padding: 0; padding-right: 10px;">
                          <label for="input_tgllahir">Tanggal Lahir</label>
                          <input type="date" class="form-control" id="input_tgllahir" name="tgl_lahir" required="required" autocomplete="off" placeholder="Masukan Tanggal Lahir" value="{{ old('tgl_lahir') }}">
                        </div>

                      <div class="form-group" style="padding: 0; padding-right: 10px">
                        <label for="inputagama">Agama</label>
                        <input type="agama" class="form-control" id="inputagama" name="agama" required="required" autocomplete="off" placeholder="Masukan Agama" value="{{ old('agama') }}">
                         @error('agama')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ " Terdidri Dari 5 Sampai 20 Karakter " }}</strong>
                            </span>
                          @enderror
                      </div>

                      <div class="form-group" style="padding: 0; padding-right: 10px;">
                        <label for="alamat_siswa">Alamat Siswa</label>
                        <textarea type = "text" class="form-control" id="alamat_siswa" rows="3" name="alamat_siswa" autocomplete="off" placeholder="Masukan Alamat Siswa">{{ old('alamat_siswa')}}</textarea>
                      </div>

                      <div class="form-group" style="padding: 0; padding-right: 10px;">
                        <label for="form_kabupaten">Kabupaten/Kota</label>
                        <select style="width: 100%;" name="kabupaten" class="form-control select2" id="input_kabupaten" required autocomplete="off">
                            <option selected disabled>-- Pilih Kabupaten/Kota --</option>
                            <option value="Kota Denpasar"{{ old('kabupaten') == 'Kota Denpasar' ? 'selected' : '' }}>Kota Denpasar</option>
                            <option value="Badung"{{ old('kabupaten') == 'Badung' ? 'selected' : '' }}>Badung</option>
                            <option value="Gianyar"{{ old('kabupaten') == 'Giayar' ? 'selected' : '' }}>Gianyar</option>
                            <option value="Bangli"{{ old('kabupaten') == 'Bangli' ? 'selected' : '' }}>Bangli</option>
                            <option value="Tabanan"{{ old('kabupaten') == 'Tabanan' ? 'selected' : '' }}>Tabanan</option>
                            <option value="Jembrana"{{ old('kabupaten') == 'Jembrana' ? 'selected' : '' }}>Jembrana</option>
                            <option value="Buleleng"{{ old('kabupaten') == 'Buleleng' ? 'selected' : '' }}>Buleleng</option>
                            <option value="Klungkung"{{ old('kabupaten') == 'Klungkung' ? 'selected' : '' }}>Klungkung</option>
                            <option value="Karangasem"{{ old('kabupaten') == 'Karangasem' ? 'selected' : '' }}>Karangasem</option>
                        </select>
                        @error('kabupaten')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ "Tidak Boleh Kosong" }}</strong>
                            </span>
                        @enderror
                      </div>
                     
                    <div class="form-row">
                       <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control" id="inputemail" name="email" required="required" autocomplete="off" placeholder="Masukan Email" value="{{ old('email') }}">
                        </div>
                      <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                      <label for="inputState">Tahun Ajaran</label>
                      <select style="width: 100%;" id="inputTahun" class="form-control select2" name="tahun_ajaran" required="required" autocomplete="off" >
                        <option selected="selected" disabled="" value="">-- Pilih Tahun Ajaran --</option>
                        @foreach ($tahunajarans as $item)
                        <option data-tahun="{{ $item->tahun_ajaran }}" value="{{ $item->id_ta }}"{{ old('tahun_ajaran')==$item->id_ta ? 'selected':''}}>{{ $item->tahun_ajaran }}</option>
                        @endforeach
                        </select>
                        @error('tahun_ajaran')
                              <span class="invalid-feedback text-danger" role="alert">
                                  <strong>{{ "Tidak Boleh Kosong" }}</strong>
                              </span>
                        @enderror
                      </div>
                      </div>

                      <div class="form-row">
                      <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                          <label for="inputnotlpn">No Telepon</label>
                          <input type="notelpon" class="form-control" id="inputnotlpn" name="no_tlpn" required="required" autocomplete="off" placeholder="Masukan No Telepon" onkeypress="return hanyaAngka(event)" value="{{ old('no_tlpn') }}">
                           @error('no_tlpn')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ " Terdidri Dari 7 Sampai 12 Karakter " }}</strong>
                            </span>
                          @enderror
                        </div>
                      <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;" >
                        <label for="inputState">Status Siswa</label>
                           <select id="inputstatus" class="form-control" name="sts_siswa" required="required" autocomplete="off">
                             <option disabled selected>-- Pilih Status -- {{ old('sts_siswa') }}</option>
                             <option value="1" {{ old('sts_siswa')=='1'? 'selected':''}}>Aktif</option>
                             <option value="0" {{ old('sts_siswa')=='0'? 'selected':''}}>Non Aktif</option>
                           </select>
                           @error('sts_siswa')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ "Tidak Boleh Kosong" }}</strong>
                            </span>
                          @enderror
                         </div>
                      </div>

                      <div class="form-group" style="padding: 0; padding-right: 10px;">
                        <label for="keterangan">Keterangan Siswa</label>
                        <textarea type = "text" class="form-control" id="keterangan" rows="3" name="keterangan" autocomplete="off" placeholder="Masukan Keterangan">{{ old('keterangan')}}</textarea>
                      </div>
                
                      <div>
                        <button type="submit" class=" btn btn-primary">Simpan Data</button>
                      </div>

                </form>
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

    function hanyaAngka(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
    }

    function hanyaHuruf(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return true;
    return false;
    }

    $('.select2').select2();
    $('#inputTahun').change(function() {
      var tahun_ajaran = $('option:selected', this).attr('data-tahun');
      $('#inputtahun').val(tahun_ajaran);
    });

</script>
@endsection