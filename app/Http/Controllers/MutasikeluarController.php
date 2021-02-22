<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use PDF;

use App\Models\Mutasikeluar;
use App\Models\Pesertadidik;
use App\Models\Tahun;

class MutasikeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mutasikeluars = Mutasikeluar::latest()->get();
        $pesertadidik = Pesertadidik::all();
       
        return view('mutasi_peserta_didik/index_mutasikeluar', compact('mutasikeluars','pesertadidik'));

    }

    public function filter(Request $request)
    {
        $mutasikeluars = Mutasikeluar::latest()->get();
        $pesertadidik = Mutasikeluar::orderBy('id_siswa')->get();
        $tahun_ajaran = Tahun::orderBy('id_ta')->get();
        if ($request->ajax()) {
            if (!$request->tahun_ajaran){
                $mutasikeluars = Mutasikeluar::with(['pesertadidik'])->latest()->get();   
            } else {
                $siswa = Pesertadidik::where('id_ta', $request->tahun_ajaran)->pluck('id_siswa')->toArray();
                $mtskeluar = Mutasikeluar::with(['pesertadidik','tahun'])->whereIn('id_siswa', collect($siswa))->get();
            }
            $role = Auth::user()->level;
            return response()->json(['mtskeluar'=>$mtskeluar,'level'=>$role]);
        }
      
        return view('mutasi_peserta_didik/ctk_mutasikeluar', compact('mutasikeluars','tahun_ajaran'));
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
            'nis' => 'required|unique:mutasi_keluar,id_siswa',
            'no_srt_pindah' => 'required|min:4|max:20',
            'sekolah_tujuan' => 'required|min:8|max:30',
            'tingkat_kelas' => 'required',
            'alasan_pindah' => 'required|min:5|max:50', 
        ]);

        Mutasikeluar::create([
            'no_srt_pindah' => request('no_srt_pindah'),
            'id_siswa' => request('nis'),
            'id_ta' => request('id_ta'),
            'sekolah_tujuan' => request('sekolah_tujuan'),
            'tingkat_kelas' => request('tingkat_kelas'),
            'tgl_pindah' => request('tgl_pindah'),
            'alasan_pindah' => request('alasan_pindah'),
        ]);

        $pesertadidik = Pesertadidik::find($request->nis);
        if($request->nis){
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

    public function detail($id)
    {
        $mutasikeluars = Mutasikeluar::find($id);
        return view ('mutasi_peserta_didik/detailkepsekmutkeluar', compact('mutasikeluars'));
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
        $this->validate($request, [
            'nis' => 'required|unique:mutasi_keluar,id_siswa,'.$request->nis.',id_siswa',
            'no_srt_pindah' => 'required|min:4|max:20',
            'sekolah_tujuan' => 'required|min:8|max:30',
            'alasan_pindah' => 'required|min:5|max:50', 

        ]);

        $mutasikeluars = Mutasikeluar::where('id_mut_klr', $id)->first();
        $pesertadidik = Pesertadidik::find($mutasikeluars->id_siswa);
        $pesertadidik_baru = Pesertadidik::find($request->nis);
        if($request->nis != $pesertadidik){
            $pesertadidik->sts_siswa = 1;
            $pesertadidik->save();
        }
        $mutasikeluars->no_srt_pindah = $request->no_srt_pindah;
        $mutasikeluars->id_siswa = $request->nis;
        $mutasikeluars->id_ta = $request->id_ta;
        $mutasikeluars->sekolah_tujuan = $request->sekolah_tujuan;
        $mutasikeluars->tingkat_kelas = $request->tingkat_kelas;
        $mutasikeluars->tgl_pindah = $request->tgl_pindah;
        $mutasikeluars->alasan_pindah = $request->alasan_pindah;
        $mutasikeluars->save(); 

        $pesertadidik = Pesertadidik::find($request->nis);
        if($request->nis){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }

        return redirect('/mutasikeluar')->with('success', 'Data berhasil diupdate!');
    }

    public function export(Request $request)
    {   
        $mutasikeluar = DB::table('mutasi_keluar')
                    ->join('peserta_didik', 'peserta_didik.id_siswa','=','mutasi_keluar.id_siswa')
                    ->join('tahun_ajaran','tahun_ajaran.id_ta','=','mutasi_keluar.id_ta')->get();
        $pdf = PDF::loadview('mutasi_peserta_didik.exportmutasikeluar', ['mutasikeluar'=>$mutasikeluar]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function pdf($id)
    {
        $mutasikeluars = Mutasikeluar::find($id);
        $pesertadidik = Pesertadidik::all();
        $pdf = PDF::loadview('mutasi_peserta_didik.pdfmutasikeluar', ['mutasikeluars'=>$mutasikeluars, 'pesertadidik'=>$pesertadidik]);
        return $pdf->stream();
    }

    
        public function cetakfilter($tahun_ajaran)
    {   
        $mutasikeluar = DB::table('mutasi_keluar')
                    ->join('peserta_didik', 'peserta_didik.id_siswa','=','mutasi_keluar.id_siswa')
                     ->join('tahun_ajaran','tahun_ajaran.id_ta','=','mutasi_keluar.id_ta')
                    ->where('peserta_didik.id_ta','=', $tahun_ajaran)->get();
        $pdf = PDF::loadview('mutasi_peserta_didik.exportmutasikeluar', ['mutasikeluar'=>$mutasikeluar]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function statistik()
    {
        $mutasikeluars = Mutasikeluar::latest()->get();
        $pesertadidik = Pesertadidik::all();
       
        return view('statistik/mutasikeluar', compact('mutasikeluars','pesertadidik'));

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
