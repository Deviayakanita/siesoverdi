@extends('layouts.master') @section('content')

<section class="content-header">
@if(Auth::user() && Auth::user()->level == 0)
    <h1>
        <i class="fa fa-file"></i> Laporan Orang Tua
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li>Laporan Peserta Didik</li>
    </ol>

@elseif (Auth::user() && Auth::user()->level == 1)
    <h1>
        <i class="fa fa-users"></i> Data Orang Tua
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li>Data Orang Tua</li>
    </ol>
@endif
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div style="clear: both;"></div>
                    <div class="form-group col-sm-3" style="padding: 0; padding-right: 10px;">
                        <select id="penghasilan_ayah" class="form-control select2" name="penghasilan_ayah" required="required" autocomplete="off">
                        <option disabled selected>-- Pilih Penghasilan Ayah --</option>
                        <option value="Kurang dari Rp.500,000">Kurang dari Rp.500,000</option>
                        <option value="Rp.500,000 - Rp.1,000,000">Rp.500,000 - Rp.1,000,000</option>
                        <option value="Rp.1,000,000 - Rp.2,000,000">Rp.1,000,000 - Rp.2,000,000</option>
                        <option value="Rp.2,000,000 - Rp.5,000,000">Rp.2,000,000 - Rp.5,000,000</option>
                        <option value="Rp.5,000,000 - Rp.20,000,000">Rp.5,000,000 - Rp.20,000,000</option>
                        <option value="Lebih dari Rp.20,000,000">Lebih dari Rp.20,000,000</option>
                        <option value="Tidak Penghasilan">Tidak Berpenghasilan</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3" style="padding: 0; padding-right: 10px;">
                        <select id="penghasilan_ibu" class="form-control select2" name="penghasilan_ibu" required="required" autocomplete="off">
                        <option disabled selected>-- Pilih Penghasilan Ibu --</option>
                        <option value="Kurang dari Rp.500,000">Kurang dari Rp.500,000</option>
                        <option value="Rp.500,000 - Rp.1,000,000">Rp.500,000 - Rp.1,000,000</option>
                        <option value="Rp.1,000,000 - Rp.2,000,000">Rp.1,000,000 - Rp.2,000,000</option>
                        <option value="Rp.2,000,000 - Rp.5,000,000">Rp.2,000,000 - Rp.5,000,000</option>
                        <option value="Rp.5,000,000 - Rp.20,000,000">Rp.5,000,000 - Rp.20,000,000</option>
                        <option value="Lebih dari Rp.20,000,000">Lebih dari Rp.20,000,000</option>
                        <option value="Tidak Penghasilan">Tidak Berpenghasilan</option>
                      </select>
                </div>
                <div>
                        <button type="button" class="btn btn-primary" id="filter"><i class=""></i> Filter</button>
                        <button type="button" class="btn btn-warning" id="refresh"><i class="fa fa-refresh"></i> Refresh</button>
                        <a href="/orangtua/export" id="cetak" class="btn btn-danger" style="margin-left:327px; margin-right: 0;" target="_blank"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
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
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIS</th>
                                    <th width="150px; class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Lengkap Siswa</th>
                                    <th width="150px; class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Ayah</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Penghasilan Ayah</th>
                                    <th width="150px; class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Ibu</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Penghasilan Ibu</th>
                                    <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @php $i=1; @endphp @foreach ($orangtuas as $orangtua)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $orangtua->nis }}</td>
                                    <td>{{ $orangtua->nm_siswa }}</td>
                                    <td>{{ $orangtua->nm_ayah }}</td>
                                    <td>
                                         <?php
                                          if($orangtua->penghasilan_ayah == 'Tidak Penghasilan')
                                          {
                                          echo "Tidak Berpenghasilan";
                                          }
                                          else
                                          {
                                          echo $orangtua->penghasilan_ayah;
                                          }
                                          ?>
                                    </td>
                                    <td>{{ $orangtua->nm_ibu }}</td>
                                    <td>
                                         <?php
                                          if($orangtua->penghasilan_ibu == 'Tidak Penghasilan')
                                          {
                                          echo "Tidak Berpenghasilan";
                                          }
                                          else
                                          {
                                          echo $orangtua->penghasilan_ibu;
                                          }
                                          ?>
                                    </td>
                                    <td style="text-align: center;">
                                        @if(Auth::user() && Auth::user()->level == 0)
                                        <a href="/orangtua/pdf/{{ $orangtua->id_orang_tua}}" target="_blank"><i class="fa fa-file-pdf-o btn-success btn-sm"></i></a>
                                        @elseif(Auth::user() && Auth::user()->level == 1)
                                        <a href="/orangtua/showkepsek/{{ $orangtua->id_orang_tua }}"><i class="fa fa-eye btn-info btn-sm"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @php $i++; @endphp @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $('.select2').select2();
    $('#filter').click(function(){
        let penghasilan_ayah = $('#penghasilan_ayah').val()
        let penghasilan_ibu = $('#penghasilan_ibu').val()
        let url = "{{url('/ctk_orangtua')}}"
        let data = {
            'penghasilan_ayah': penghasilan_ayah,
            'penghasilan_ibu': penghasilan_ibu,
        }
        
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

                let ids=[]
                for (var i = 0; i < data.orangtua.length; i++) { 
                    ids.push(data.orangtua[i].id_orang_tua)

                   html += '<tr>'
                   html += '<td>'+ (i + 1) +'</td>'
                   html += '<td>'+ data.orangtua[i].pesertadidik.nis+'</td>'
                   html += '<td>'+ data.orangtua[i].pesertadidik.nm_siswa+'</td>'
                   html += '<td>'+ data.orangtua[i].nm_ayah+'</td>'
                   html += '<td>'+ data.orangtua[i].penghasilan_ayah+'</td>'
                   html += '<td>'+ data.orangtua[i].nm_ibu+'</td>'
                   html += '<td>'+ data.orangtua[i].penghasilan_ibu+'</td>'
                   html += '<td style="text-align: center;">'
                   if (data.level==0) {
                   html += '<a href="/orangtua/pdf/'+data.orangtua[i].id_orang_tua+'"><i class="fa fa-file-pdf-o btn-success btn-sm"></i></a>'}
                   if (data.level==1){
                   html += ' <a href="/orangtua/showkepsek/'+data.orangtua[i].id_orang_tua+'"><i class="fa fa-eye btn-info btn-sm"></i></a>'}
                   html += '</td>'
                    html += '</tr>'
                }

                $('#tbody').html(html)
                $('#cetak').attr('href','/penghasilan/'+ids)
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
