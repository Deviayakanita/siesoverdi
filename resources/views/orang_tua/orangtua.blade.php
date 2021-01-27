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

@section('content-title','Tambah Data Orang Tua')

@section('breadcrumb')
  <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
  <li> Kelola Peserta Didik</li>
  <li> Data Orang Tua</li>
  <li> Tambah Orang Tua</li>
@endsection

@section('content')
<section class="content" style="padding-top: 0;">
	<form action="{{route('orangtua.store')}}" method="post">
		{{csrf_field()}}
    
    <div class="box box-primary">
      <form role="form">
        <div class="box-body">
    <div>
      <a href="/listortu" class="btn btn-primary" style="float: right;">KEMBALI</a>
    </div>
    <div style="clear: both;"></div>

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
      <button type="submit" class="btn btn-primary" style="margin-left: 2px">SIMPAN DATA</button>
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