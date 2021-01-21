@extends('layout.blank')
@section('title', 'Data Alumni | Admin')
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
    <li class="treeview">
      <a href="#">
      <i class="fa fa-edit"></i><span> Kelola Peserta Didik</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('listpesertadidik')}}"><i class="fa fa-circle-o"></i> Data Peserta Didik</a></li>
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
    <li class="active">
        <a href="{{url('listalumni')}}">
        <i class="fa fa-edit"></i><span> Kelola Alumni</span>
        </a>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title','Edit Data Alumni')

@section('breadcrumb')
  <li><a href="\dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
  <li> Kelola Alumni</li>
  <li> Data Alumni</li>
  <li> Edit Data Alumni</li>
@endsection

@section('content')
<section class="content" style="padding-top: 2;">
	<form action="{{url('alumniedit/' .$alumni->alumni)}}" method="post">
    @method('patch')
    {{csrf_field()}}

    <div class="box box-primary">
    <form role="form">
    <div class="box-body">

      <div>
      <a href="/listalumni" class="btn btn-primary" style="float: right;">KEMBALI</a>
      </div>
      <div style="clear: both;"></div>
    
    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">No Induk Siswa</label>
      <select id="inputNIS" class="form-control" name="nis">
        <option selected="" disabled="" value="">-- No Induk Siswa --</option>
        @foreach ($pesertadidik4 as $item)
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

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">Jenis Perguruan Tinggi</label>
      <select id="inputState" class="form-control" name="jns_pt" value="{{$alumni->jns_pt}}">
        <option selected>-- Pilih Perguruan Tinggi --</option>
        <option value="Negri">Negri</option>
        <option value="Swasta">Swasta</option>
      </select>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputnama">Nama Perguruan Tinggi</label>
      <input type="text" class="form-control" id="inputnama" name="nm_pt" value="{{$alumni->nm_pt}}">
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputnamafk">Nama Fakultas</label>
      <input type="text" class="form-control" id="inputnamafk" name="nm_fak" value="{{$alumni->nm_fak}}">
    </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputnamajurus">Nama Jurusan</label>
      <input type="text" class="form-control" id="inputnamajurus" name="nm_jurusan" value="{{$alumni->nm_jurusan}}">
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputState">Melanjutkan</label>
      <select id="inputState" class="form-control" name="melanjutkan" value="{{$alumni->melanjutkan}}">
        <option selected>-- Pilih Melanjutkan --</option>
        <option value="Bekerja">Bekerja</option>
        <option value="Belum Bekerja">Kuliah</option>
      </select>
    </div>
    </div>

     <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">Status Alumni</label>
      <select id="inputState" class="form-control" name="status_alumni" value="{{$alumni->status_alumni}}">
        <option selected>-- Status Alumni --</option>
        <option value="1">AKTIF</option>
        <option value="0">NON AKTIF</option>
      </select>
    </div>

  <div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
  </div>

</div>
</form>
</div>
</section>  
@endsection

@section('script')
<script type="text/javascript">
  $('#inputNIS').change(function() {
    var nm_siswa = $('option:selected', this).data('nama');
    var tahun_ajaran = $('option:selected', this).data('tahun');
  
    $('#inputnamasiswa').val(nm_siswa);
    $('#inputtahunajaran').val(tahun_ajaran);

  });
</script>
@endsection

@section('content-footer')