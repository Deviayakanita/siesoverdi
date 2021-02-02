@extends('layout.blank')
@section('title', 'Data Orang Tua | Admin')
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
            <i class="fa fa-home"></i><span> Dashboard</span>
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
        <li><a href="{{url('listpesertadidik')}}"><i class="fa fa-circle-o"></i> Data Peserta Didik</a></li>
        <li class="active"><a href="{{url('listortu')}}"><i class="fa fa-circle-o"></i> Data Orang Tua</a></li>
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

@section('content-title','Data Orang Tua')

@section('breadcrumb')
  <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
  <li> Kelola Peserta Didik</li>
  <li> Daftar Orang Tua</li>
  <li> Edit Data Orang Tua</li>
@endsection

@section('content')
<section class="content" style="padding-top: 0;">
	<form action="{{url('ortuedit/' .$orangtua->id_orang_tua)}}" method="post">
		@method('patch')
		{{csrf_field()}}

    <div class="box box-primary">
    <form role="form">
      <div class="box-header">
         <div class="col-md-3 col-sm-4"><h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Edit Data Orang Tua</h4>
          </div>
          <div align="right">
            <a href="/listortu" class="btn btn-default"><i class="fa fa-long-arrow-left"></i></a>
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
      <input type="text" class="form-control" id="inputnama" name="nm_ayah" value="{{$orangtua->nm_ayah}}">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputpekerjaan">Pekerjaan Ayah</label>
      <input type="text" class="form-control" id="inputpekerjaan" name="job_ayah" value="{{$orangtua->job_ayah}}">
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputpendidikan">Pendidikan Terakhir</label>
      <input type="text" class="form-control" id="inputpendidikan" name="pddk_ayah" value="{{$orangtua->pddk_ayah}}">
    </div>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">Penghasilan Ayah</label>
      <select id="inputState" class="form-control" name="penghasilan_ayah" value="{{$orangtua->penghasilan_ayah}}">
        <option selected>-- Pilih Penghasilan --</option>
        <option value="Kurang dari Rp.500,000" @if($orangtua->penghasilan_ayah=='Kurang dari Rp.500,000')selected @endif>Kurang dari Rp.500,000</option>
        <option value="Rp.500,000 - Rp.1,000,000" @if($orangtua->penghasilan_ayah=='Rp.500,000 - Rp.1,000,000')selected @endif>Rp.500,000 - Rp.1,000,000</option>
        <option value="Rp.1,000,000 - Rp.2,000,000" @if($orangtua->penghasilan_ayah=='Rp.1,000,000 - Rp.2,000,000')selected @endif>Rp.1,000,000 - Rp.2,000,000</option>
        <option value="Rp.2,000,000 - Rp.5,000,000" @if($orangtua->penghasilan_ayah=='Rp.2,000,000 - Rp.5,000,000')selected @endif>Rp.2,000,000 - Rp.5,000,000</option>
        <option value="Rp.5,000,000 - Rp.20,000,000" @if($orangtua->penghasilan_ayah=='Rp.5,000,000 - Rp.20,000,000')selected @endif>Rp.5,000,000 - Rp.20,000,000</option>
        <option value="Lebih dari Rp.20,000,000" @if($orangtua->penghasilan_ayah=='Lebih dari Rp.20,000,000')selected @endif>Lebih dari Rp.20,000,000</option>
        <option value="Tidak Penghasilan" @if($orangtua->penghasilan_ayah=='Tidak Berpenghasilan')selected @endif>Tidak Berpenghasilan</option>
      </select>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputnama">Nama Ibu</label>
      <input type="text" class="form-control" id="inputnama" name="nm_ibu" value="{{$orangtua->nm_ibu}}">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputpekerjaan">Pekerjaan Ibu</label>
      <input type="text" class="form-control" id="inputpekerjaan" name="job_ibu" value="{{$orangtua->job_ibu}}">
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputpendidikan">Pendidikan Terakhir</label>
      <input type="text" class="form-control" id="inputpendidikan" name="pddk_ibu" value="{{$orangtua->pddk_ibu}}">
    </div>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">Penghasilan Ibu</label>
      <select id="inputState" class="form-control" name="penghasilan_ibu" value="{{$orangtua->penghasilan_ibu}}">
        <option selected>-- Pilih Penghasilan --</option>
        <option value="Kurang dari Rp.500,000" @if($orangtua->penghasilan_ibu=='Kurang dari Rp.500,000')selected @endif>Kurang dari Rp.500,000</option>
        <option value="Rp.500,000 - Rp.1,000,000" @if($orangtua->penghasilan_ibu=='Rp.500,000 - Rp.1,000,000')selected @endif>Rp.500,000 - Rp.1,000,000</option>
        <option value="Rp.1,000,000 - Rp.2,000,000" @if($orangtua->penghasilan_ibu=='Rp.1,000,000 - Rp.2,000,000')selected @endif>Rp.1,000,000 - Rp.2,000,000</option>
        <option value="Rp.2,000,000 - Rp.5,000,000" @if($orangtua->penghasilan_ibu=='Rp.2,000,000 - Rp.5,000,000')selected @endif>Rp.2,000,000 - Rp.5,000,000</option>
        <option value="Rp.5,000,000 - Rp.20,000,000" @if($orangtua->penghasilan_ibu=='Rp.5,000,000 - Rp.20,000,000')selected @endif>Rp.5,000,000 - Rp.20,000,000</option>
        <option value="Lebih dari Rp.20,000,000" @if($orangtua->penghasilan_ibu=='Lebih dari Rp.20,000,000')selected @endif>Lebih dari Rp.20,000,000</option>
        <option value="Tidak Penghasilan" @if($orangtua->penghasilan_ibu=='Tidak Penghasilan')selected @endif>Tidak Berpenghasilan</option>
      </select>
    </div>
    
    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">Status Data</label>
      <select id="inputState" class="form-control" name="sts_orang_tua" value="{{$orangtua->sts_orang_tua}}">
        <option selected>-- Statut Data Orang Tua --</option>
        <option value="1" @if($orangtua->sts_orang_tua=='1') selected @endif>Aktif</option>
        <option value="0" @if($orangtua->sts_orang_tua=='0') selected @endif>Non Aktif</option>
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

@section('content-footer')