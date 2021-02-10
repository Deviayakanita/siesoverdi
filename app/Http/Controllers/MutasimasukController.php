<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Models\Mutasimasuk;
use App\Models\Pesertadidik;

class MutasimasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mutasimasuks = Mutasimasuk::latest()->get();
        $pesertadidik = Pesertadidik::all();
       
        return view('mutasi_peserta_didik/index_mutasimasuk', compact('mutasimasuks','pesertadidik'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        Mutasimasuk::create([
            'no_srt_pindah' => request('no_srt_pindah'),
            'id_siswa' => request('nis'),
            'asal_sekolah' => request('asal_sekolah'),
            'tingkat_kelas' => request('tingkat_kelas'),
            'tgl_masuk' => request('tgl_masuk'),
            'alasan_pindah' => request('alasan_pindah'),
        ]);

        return redirect('/mutasimasuk')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mutasimasuks = Mutasimasuk::find($id);
        return view ('mutasi_peserta_didik/detailmutasimasuk', compact('mutasimasuks'));
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
        $mutasimasuks = Mutasimasuk::find($id);
        return view('mutasi_peserta_didik/editmtsmasuk', compact('mutasimasuks','pesertadidik'));
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
        $mutasimasuks = Mutasimasuk::find($id);
        $mutasimasuks->no_srt_pindah = $request->no_srt_pindah;
        $mutasimasuks->id_siswa = $request->nis;
        $mutasimasuks->asal_sekolah = $request->asal_sekolah;
        $mutasimasuks->tingkat_kelas = $request->tingkat_kelas;
        $mutasimasuks->tgl_masuk = $request->tgl_masuk;
        $mutasimasuks->alasan_pindah = $request->alasan_pindah;
        $mutasimasuks->save(); 

        return redirect('/mutasimasuk')->with('success', 'Data berhasil diupdate!');
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
