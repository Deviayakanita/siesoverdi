<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Models\Mutasikeluar;
use App\Models\Pesertadidik;

class MutasikeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mutasi_peserta_didik.mutasikeluar');
    }

    public function list()
    {
        $mutasikeluars = Mutasikeluar::all();
        return view('mutasi_peserta_didik/listmtskeluar', compact('mutasikeluars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mutasikeluar::create([
            'no_srt_pindah' => request('no_srt_pindah'),
            // 'nis' => request('nis'),
            'id_siswa' => auth()->id_siswa(),
            'sekolah_tujuan' => request('sekolah_tujuan'),
            'tingkat_kelas' => request('tingkat_kelas'),
            'tgl_pindah' => request('tgl_pindah'),
            'alasan_pindah' => request('alasan_pindah'),
            'status_mutasi' => request('status_mutasi'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mutasikeluar = Mutasikeluar::find($id);
        return view('mutasi_peserta_didik/editmtskeluar', compact('mutasimasuk'));
    }

    public function editmutasikeluae (Request $request, $id)
    {

         DB::table('mutasi_keluar')->where('id_mts_klr', $id)
            -> update([
            'no_srt_pindah' => request('no_srt_pindah'),
            // 'nis' => request('nis'),
            'id_siswa' => auth()->id_siswa(),
            'sekolah_tujuan' => request('sekolah_tujuan'),
            'tingkat_kelas' => request('tingkat_kelas'),
            'tgl_pindah' => request('tgl_pindah'),
            'alasan_pindah' => request('alasan_pindah'),
            'status_mutasi' => request('status_mutasi'),
            ]);

        return redirect('listmtskeluar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
