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
         $pesertadidik1 = Pesertadidik::all();
        return view('mutasi_peserta_didik.mutasimasuk',[
            'pesertadidik1' => $pesertadidik1,
        ]);
    }

    public function list()
    {
        $mutasimasuks = Mutasimasuk::all();
        return view('mutasi_peserta_didik/listmtsmasuk', compact('mutasimasuks'));
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
        Mutasimasuk::create([
            'no_srt_pindah' => request('no_srt_pindah'),
            'id_siswa' => request('nis'),
            'asal_sekolah' => request('asal_sekolah'),
            'tingkat_kelas' => request('tingkat_kelas'),
            'tgl_masuk' => request('tgl_masuk'),
            'alasan_pindah' => request('alasan_pindah'),
            'status_mutasi' => request('status_mutasi'),
        ]);

        return redirect('listmtsmasuk');
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
        $pesertadidik2 = Pesertadidik::all();
        $mutasimasuk = Mutasimasuk::find($id);
        return view('mutasi_peserta_didik/editmtsmasuk', compact('mutasimasuk','pesertadidik2'));
    }

    public function editmutasimasuk (Request $request, $id)
    {
         DB::table('mutasi_masuk')->where('id_mts_msk', $id)
            -> update([
            'no_srt_pindah' => request('no_srt_pindah'),
            'id_siswa' => request('nis'),
            'asal_sekolah' => request('asal_sekolah'),
            'tingkat_kelas' => request('tingkat_kelas'),
            'tgl_masuk' => request('tgl_masuk'),
            'alasan_pindah' => request('alasan_pindah'),
            'status_mutasi' => request('status_mutasi'),
            ]);

        return redirect('listmtsmasuk');

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
