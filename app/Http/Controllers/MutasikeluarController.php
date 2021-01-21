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
        $pesertadidik = Pesertadidik::all();
        return view('mutasi_peserta_didik.mutasikeluar', [
            'pesertadidik' => $pesertadidik,
        ]);
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
        // dd($request->all());
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
        // dd($pesertadidik);
        if($request->status_mutasi == 1){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }

        return redirect('listmtskeluar');
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
        $pesertadidik3 = Pesertadidik::all();
        $mutasikeluar = Mutasikeluar::find($id);
        return view('mutasi_peserta_didik/editmtskeluar', compact('mutasikeluar','pesertadidik3'));
    }

    public function editmutasikeluar (Request $request, $id)
    {

         DB::table('mutasi_keluar')->where('id_mut_klr', $id)
            -> update([
            'no_srt_pindah' => request('no_srt_pindah'),
            'id_siswa' => request('nis'),
            'sekolah_tujuan' => request('sekolah_tujuan'),
            'tingkat_kelas' => request('tingkat_kelas'),
            'tgl_pindah' => request('tgl_pindah'),
            'alasan_pindah' => request('alasan_pindah'),
            'status_mutasi' => request('status_mutasi'),
            ]);

        $pesertadidik = Pesertadidik::find($request->nis);
        // dd($pesertadidik);
        if($request->status_mutasi == 1){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }

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

    public function detailmutasikeluar($id)
    {
        $detailmutasikeluar = Mutasikeluar::find($id);
        return view ('mutasi_peserta_didik/detailmutasikeluar',['detailmutasikeluar' => $detailmutasikeluar]);
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
