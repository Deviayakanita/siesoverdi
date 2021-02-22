@extends('layouts.master') @section('content')

<section class="content-header">
@if(Auth::user() && Auth::user()->level == 0)
    <h1>
        <i class="fa fa-file"></i> Laporan Mutasi Keluar
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li>Laporan Mutasi Keluar</li>
    </ol>

@elseif (Auth::user() && Auth::user()->level == 1)
    <h1>
        <i class="fa fa-sign-out"></i> Data Mutasi Keluar
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li>Data Mutasi Keluar</li>
    </ol>
@endif
</section>

<section class="content">
    <div class="row">
        <form action="/ctk_pesertadidik">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div style="clear: both;"></div>
                    <div class="form-group col-md-4" style="padding: 0; padding-right: 10px;">
                        <select id="thn_ajaran" class="form-control select2" name="sts_siswa" required="required" autocomplete="off">
                            <option disabled selected>-- Pilih Tahun Ajaran --</option>
                            @foreach ($tahun_ajaran as $tahunajaran)
                            <option id="tahun_ajaran" value="{{$tahunajaran->id_ta}}">{{$tahunajaran->tahun_ajaran}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" id="filter"><i class=""></i> Filter</button>
                        <button type="button" class="btn btn-warning" id="refresh"><i class="fa fa-refresh"></i> Refresh</button>
                        <a href="/mutasikeluar/export" id="cetak" class="btn btn-danger" style="margin-left:518px; margin-right: 0px;" target="_blank"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
                    </div>
                </div>

                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row"></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12" style="overflow-x: auto;">
                            <table id="example1" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
				                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
				                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No Surat Pindah</th>
				                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIS</th>
				                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Lengkap Siswa</th>
				                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tahun Ajaran</th>
				                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Pindah</th>
				                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Sekolah Tujuan</th>
				                    <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
				                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @php
                                        $i=1;
                                        @endphp
                                        @foreach ($mutasikeluars as $mutasikeluar)
                                            <tr>
                                               <td>{{ $i }}</td>
				                                <td>{{ $mutasikeluar->no_srt_pindah }}</td>
				                                <td>{{ $mutasikeluar->pesertadidik->nis }}</td>
				                                <td>{{ $mutasikeluar->pesertadidik->nm_siswa }}</td>
				                                <td>{{ $mutasikeluar->pesertadidik->tahun->tahun_ajaran }}</td>
				                                <td>{{ $mutasikeluar->tgl_pindah->isoFormat('D MMMM Y') }}</td>
				                                <td>{{ $mutasikeluar->sekolah_tujuan }}</td>
				                                <td style="text-align: center;">
                                                @if(Auth::user() && Auth::user()->level == 0)
                                                <a href="/mutasikeluar/pdf/{{ $mutasikeluar->id_mut_klr}}" target="_blank"><i class="fa fa-file-pdf-o btn-success btn-sm"></i></a>
                                                @elseif(Auth::user() && Auth::user()->level == 1)
                                                <a href="/mutasikeluar/showkepsek/{{ $mutasikeluar ->id_mut_klr}}"><i class="fa fa-eye btn-info btn-sm"></i></a>
                                                @endif
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
    </form>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $('.select2').select2();
    $('#filter').click(function(){

        let tahun_ajaran = $('#thn_ajaran').val()
        let url = "{{url('/ctk_mutasikeluar')}}"
        let data = {
            'tahun_ajaran': tahun_ajaran
        }
        $('#cetak').attr('href','/cetakmutasiklr/'+ tahun_ajaran+'')
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "GET",
            url: url,
            data: data,
            dataType: "JSON",
            success: function (data) {     
                $('#tbody').html('')              
                let html = ''

                for (var i = 0; i < data.mtskeluar.length; i++) {
                    let tanggal = new Date(data.mtskeluar[i].tgl_pindah).getDate()
                    let bulan = new Date(data.mtskeluar[i].tgl_pindah).getMonth()
                    let tahun = new Date(data.mtskeluar[i].tgl_pindah).getFullYear()

                    let status = ''
                    switch (bulan) {
                            case 0:
                                bulan = "Januari";
                                break;
                            case 1:
                                bulan = "Februari";
                                break;
                            case 2:
                                bulan = "Maret";
                                break;
                            case 3:
                                bulan = "April";
                                break;
                            case 4:
                                bulan = "Mei";
                                break;
                            case 5:
                                bulan = "Juni";
                                break;
                            case 6:
                                bulan = "Juli";
                                break;
                            case 7:
                                bulan = "Agustus";
                                break;
                            case 8:
                                bulan = "September";
                                break;
                            case 9:
                                bulan = "Oktober";
                                break;
                            case 10:
                                bulan = "November";
                                break;
                            case 11:
                                bulan = "Desember";
                                break;
                        }

                   html += '<tr>'
                   html += '<td>'+ (i + 1) +'</td>'
                   html += '<td>'+ data.mtskeluar[i].no_srt_pindah+'</td>'
                   html += '<td>'+ data.mtskeluar[i].pesertadidik.nis+'</td>'
                   html += '<td>'+ data.mtskeluar[i].pesertadidik.nm_siswa+'</td>'
                   html += '<td>'+ data.mtskeluar[i].tahun.tahun_ajaran+'</td>'
                   html += '<td>'+ tanggal +' '+ bulan + ' ' + tahun+'</td>'
                   html += '<td>'+ data.mtskeluar[i].sekolah_tujuan+'</td>'
                   html += '<td style="text-align: center;">'
                   if (data.level==0) {
                   html += '<a href="/mutasikeluar/pdf/'+data.mtskeluar[i].id_mut_klr+'"><i class="fa fa-file-pdf-o btn-success btn-sm"></i></a>'}
                   if (data.level==1){
                   html += ' <a href="/mutasikeluar/showkepsek/'+data.mtskeluar[i].id_mut_klr+'"><i class="fa fa-eye btn-info btn-sm"></i></a>'}
                   html += '</td>'
                    html += '</tr>'
                }

                $('#tbody').html(html)
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('error')
            },
        });

    })

    $('#refresh').click(function(){
        location.reload()
    })

</script>
@endsection 