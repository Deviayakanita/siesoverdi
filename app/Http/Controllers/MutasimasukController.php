<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use PDF;

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

      public function filter(Request $request)
    {
        $mutasimasuks = Mutasimasuk::latest()->get();
        $pesertadidik = Mutasimasuk::orderBy('id_siswa')->get();
        $tahun_ajaran = Pesertadidik::orderBy('tahun_ajaran', 'ASC')->select('tahun_ajaran')->groupBy('tahun_ajaran')->get();
        if ($request->ajax()) {
            if (!$request->tahun_ajaran){
                $mutasimasuks = Mutasimasuk::with(['pesertadidik'])->latest()->get();   
            } else {
                $siswa = Pesertadidik::where('tahun_ajaran', $request->tahun_ajaran)->pluck('id_siswa')->toArray();
                $mtsmasuk = Mutasimasuk::with(['pesertadidik'])->whereIn('id_siswa', collect($siswa))->get();
            }
            $role = Auth::user()->level;
            return response()->json(['mtsmasuk'=>$mtsmasuk,'level'=>$role]);
        }
      
        return view('mutasi_peserta_didik/ctk_mutasimasuk', compact('mutasimasuks','tahun_ajaran'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {   
        $this->validate($request, [
            'nis' => 'required|unique:mutasi_masuk,id_siswa',
        ]);
        
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

    public function detail($id)
    {
        $mutasimasuks = Mutasimasuk::find($id);
        return view ('mutasi_peserta_didik/detailkepsekmutmasuk', compact('mutasimasuks'));
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
        $this->validate($request, [
            'nis' => 'required|unique:mutasi_masuk,id_siswa,'.$request->nis.',id_siswa',

        ]);

        $mutasimasuks = Mutasimasuk::where('id_mut_msk', $id)->first();
        $mutasimasuks->no_srt_pindah = $request->no_srt_pindah;
        $mutasimasuks->id_siswa = $request->nis;
        $mutasimasuks->asal_sekolah = $request->asal_sekolah;
        $mutasimasuks->tingkat_kelas = $request->tingkat_kelas;
        $mutasimasuks->tgl_masuk = $request->tgl_masuk;
        $mutasimasuks->alasan_pindah = $request->alasan_pindah;
        $mutasimasuks->save(); 

        return redirect('/mutasimasuk')->with('success', 'Data berhasil diupdate!');
    }

    public function export(Request $request)
    {   
        $mutasimasuk = DB::table('mutasi_masuk')
                    ->join('peserta_didik', 'peserta_didik.id_siswa','=','mutasi_masuk.id_siswa')->get();
        $pdf = PDF::loadview('mutasi_peserta_didik.exportmutasimasuk', ['mutasimasuk'=>$mutasimasuk]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function pdf($id)
    {
        $mutasimasuks = Mutasimasuk::find($id);
        $pesertadidik = Pesertadidik::all();
        $pdf = PDF::loadview('mutasi_peserta_didik.pdfmutasimasuk', ['mutasimasuks'=>$mutasimasuks, 'pesertadidik'=>$pesertadidik]);
        return $pdf->stream();
    }

    
        public function cetakfilter($tahun_ajaran)
    {   
        $mutasimasuk = DB::table('mutasi_masuk')
                    ->join('peserta_didik', 'peserta_didik.id_siswa','=','mutasi_masuk.id_siswa')
                    ->where('peserta_didik.tahun_ajaran','=', $tahun_ajaran)->get();
        $pdf = PDF::loadview('mutasi_peserta_didik.exportmutasimasuk', ['mutasimasuk'=>$mutasimasuk]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
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
