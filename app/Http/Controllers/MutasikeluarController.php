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
        $mutasikeluars = Mutasikeluar::all();
        $pesertadidik = Pesertadidik::all();
       
        return view('mutasi_peserta_didik/index_mutasikeluar', compact('mutasikeluars','pesertadidik'));

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
            'id_siswa' => request('nis'),
            'sekolah_tujuan' => request('sekolah_tujuan'),
            'tingkat_kelas' => request('tingkat_kelas'),
            'tgl_pindah' => request('tgl_pindah'),
            'alasan_pindah' => request('alasan_pindah'),
            'status_mutasi' => request('status_mutasi'),
        ]);

        $pesertadidik = Pesertadidik::find($request->nis);
        if($request->status_mutasi == 1){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }

        return redirect('/mutasikeluar')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mutasikeluars = Mutasikeluar::find($id);
        return view ('mutasi_peserta_didik/detailmutasikeluar', compact('mutasikeluars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesertadidik = Pesertadidik::all();
        $mutasikeluars = Mutasikeluar::find($id);
        return view('mutasi_peserta_didik/editmtskeluar', compact('mutasikeluars','pesertadidik'));
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
        $mutasikeluars = Mutasikeluar::find($id);

        $pesertadidik = Pesertadidik::find($mutasikeluars->id_siswa);
        $pesertadidik_baru = Pesertadidik::find($request->nis);
        if($request->nis != $pesertadidik){
            $pesertadidik->sts_siswa = 1;
            $pesertadidik->save();
        }


        $mutasikeluars->no_srt_pindah = $request->no_srt_pindah;
        $mutasikeluars->id_siswa = $request->nis;
        $mutasikeluars->sekolah_tujuan = $request->sekolah_tujuan;
        $mutasikeluars->tingkat_kelas = $request->tingkat_kelas;
        $mutasikeluars->tgl_pindah = $request->tgl_pindah;
        $mutasikeluars->alasan_pindah = $request->alasan_pindah;
        $mutasikeluars->status_mutasi = $request->status_mutasi;
        $mutasikeluars->save(); 

        $pesertadidik = Pesertadidik::find($request->nis);
        if($request->nis){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }

        return redirect('/mutasikeluar')->with('success', 'Data berhasil diupdate!');
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
