@extends('layout.blank')
@section('title', 'Data Mutasi Masuk | Admin')
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
    <li class=" active treeview">
        <a href="#">
        <i class="fa fa-edit"></i><span> Kelola Mutasi</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{url('listmtsmasuk')}}"><i class="fa fa-circle-o"></i><span> Data Mutasi Masuk</span> </a></li>
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

@section('content-title','Edit Data Mutasi Masuk')

@section('breadcrumb')
  <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
  <li> Kelola Mutasi</li>
  <li> Data Mutasi Masuk</li>
  <li> Edit Mutasi Masuk</li>
@endsection

@section('content')
<section class="content" style="padding-top: 2;">
	<form action="{{url('mutasimasukedit/' .$mutasimasuk->id_mut_msk)}}" method="post" style="margin-left: 200px; margin-right: 200px">
		@method('patch')
    {{csrf_field()}}

    <div class="box box-primary">
      <form role="form">
      <div class="box-body">    

    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputsurat">No Surat Pindah</label>
      <input type="text" class="form-control" id="inputsurat" name="no_srt_pindah" value="{{$mutasimasuk->no_srt_pindah}}">
    </div>

    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputState">No Induk Siswa</label>
      <select id="inputNIS" class="form-control" name="nis">
        <option selected="" disabled="" value="">-- No Induk Siswa --</option>
        @foreach ($pesertadidik2 as $item)
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
      <label for="inputnama">Tahun Ajaran</label>
      <input type="text" class="form-control" id="inputtahun" name="tahun_ajaran" readonly>
    </div>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputasalsekolah">Asal Sekolah</label>
      <input type="text" class="form-control" id="inputasalsekolah" name="asal_sekolah" value="{{$mutasimasuk->asal_sekolah}}">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="inputState">Tingkat Kelas</label>
      <select id="inputState" class="form-control" name="tingkat_kelas" value="{{$mutasimasuk->tingkat_kelas}}">
        <option selected>-- Pilih Tingkat Kelas --</option>
        <option value="X">X</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
      </select>
    </div>
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="input_tglmasuk">Tanggal Masuk</label>
      <input type="date" class="form-control" id="input_tglmasuk" name="tgl_masuk" value="{{$mutasimasuk->tgl_masuk}}">
    </div>
    </div>

    <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputalasan">Alasan Pindah</label>
      <textarea class="form-control" id="keterangan" rows="3" name="alasan_pindah" value="{{$mutasimasuk->alasan_pindah}}"></textarea>
    </div>

     <div class="form-group" style="padding: 0; padding-right: 10px">
      <label for="inputState">Status Mutasi</label>
      <select id="inputState" class="form-control" name="status_mutasi" value="{{$mutasimasuk->status_mutasi}}">
        <option selected>-- Pilih Status Mutasi --</option>
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

@section('content-footer')