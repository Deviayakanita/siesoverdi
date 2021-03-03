@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Tahun Ajaran
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="/pesertadidik"></i>Daftar Tahun Ajaran</a></li>
      <li> Edit Data Tahun Ajaran</li>
    </ol>
  </section>

<section class="content">
	<form action="/tahunajaran/update/{{ $tahunajarans -> id_ta }}" method="post" >
		@method('patch')
		{{csrf_field()}}

		<div class="box box-primary">
    <form role="form">
    <div class="box-header">
    <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-calendar"></i> Edit Data Tahun Ajaran</h3> 
      <div style="float: right;">
      <div style="clear: both;"></div>
      <div align="right">
        <a href="/tahunajaran" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left"></i></a>
      </div>
    </div>
      </div>

        <div class="box-body">
          <div class="form-group" style="padding: 0; padding-right: 10px">
            <label for="input_tahunajaran">Tahun Ajaran</label>
            <input type="text" class="form-control" id="input_tahunajaran" name="tahun_ajaran" required="required" autocomplete="off" value="{{$tahunajarans->tahun_ajaran}}">
            @error('tahun_ajaran')
              <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ " Minimal 9 Sampai 12 Karakter Dan Tahun Ajaran Tidak Boleh Sama " }}</strong>
              </span>
            @enderror
          </div>

          <div>
      		<button type="submit" class="btn btn-warning btn-primary" style= "margin-left: 1px" "padding: 0; padding-right: 10px">SIMPAN</button>
      	 </div>

</div>
</div>
</form>
</section>	
@endsection