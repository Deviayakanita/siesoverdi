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
use App\Models\Tahun;

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
        $pesertadidik = Pesertadidik::where('sts_siswa', 1)->get();
        $tahunajarans = Tahun::all();
       
        return view('mutasi_peserta_didik/index_mutasimasuk', compact('mutasimasuks','pesertadidik','tahunajarans'));

    }

      public function filter(Request $request)
    {
        $mutasimasuks = Mutasimasuk::latest()->get();
        $pesertadidik = Mutasimasuk::orderBy('id_siswa')->get();
        $tahun_ajaran = Tahun::orderBy('id_ta')->get();
        if ($request->ajax()) {
            if (!$request->tahun_ajaran){
                $mtsmasuk = Mutasimasuk::with(['pesertadidik'])->latest()->get();   
            } else {
                $siswa = Pesertadidik::where('id_ta', $request->tahun_ajaran)->pluck('id_ta')->toArray();
                $mtsmasuk = Mutasimasuk::with(['pesertadidik','tahun'])->whereIn('id_ta',collect($siswa))->get();
            }
            $role = Auth::user()->level;
            return response()->json(['mtsmasuk'=>$mtsmasuk,'level'=>$role]);
        }
      
        return view('mutasi_peserta_didik/ctk_mutasimasuk', compact('mutasimasuks','pesertadidik','tahun_ajaran'));
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
            'no_srt_pindah' => 'required|min:4|max:30',
            'asal_sekolah' => 'required|min:8|max:30',
            'alasan_pindah' => 'required|min:5|max:50', 
            'tingkat_kelas' => 'required', 
        ]);

        Mutasimasuk::create([
            'no_srt_pindah' => request('no_srt_pindah'),
            'id_siswa' => request('nis'),
            'id_ta' => request('tahun_ajaran'),
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
        $tahunajarans = Tahun::all();
        $mutasimasuks = Mutasimasuk::find($id);
        return view('mutasi_peserta_didik/editmtsmasuk', compact('mutasimasuks','pesertadidik','tahunajarans'));
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
            'nis' => 'required|unique:mutasi_masuk,id_siswa,'.$id.',id_mut_msk',
            'no_srt_pindah' => 'required|min:4|max:30',
            'asal_sekolah' => 'required|min:8|max:30',
            'alasan_pindah' => 'required|min:5|max:50', 

        ]);

        $mutasimasuks = Mutasimasuk::where('id_mut_msk', $id)->first();
        $mutasimasuks->no_srt_pindah = $request->no_srt_pindah;
        $mutasimasuks->id_siswa = $request->nis;
        $mutasimasuks->id_ta= $request->tahun_ajaran;
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
                    ->join('peserta_didik', 'peserta_didik.id_siswa','=','mutasi_masuk.id_siswa')
                    ->join('tahun_ajaran','tahun_ajaran.id_ta','=','mutasi_masuk.id_ta')->get();
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
                    ->join('tahun_ajaran','tahun_ajaran.id_ta','=','mutasi_masuk.id_ta')
                    ->where('tahun_ajaran.id_ta','=', $tahun_ajaran)->get();
        $pdf = PDF::loadview('mutasi_peserta_didik.exportmutasimasuk', ['mutasimasuk'=>$mutasimasuk]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function statistik()
    {
        $categories = [];
        $ta = Mutasimasuk::groupBy('id_ta')->get();

        $series = [
            (object)[
                'name'=>'Jumlah Peserta Didik',
                'data'=>[]
            ]
        ];
        foreach ($ta as $tahun_ajaran) {
          $categories[]= $tahun_ajaran->tahun->tahun_ajaran;
          $siswa = Mutasimasuk::where('id_ta', $tahun_ajaran->id_ta)->count();
          $series[0]->data[]= $siswa;

        }

        $asal_sekolah = DB::table('mutasi_masuk')
                      ->select('asal_sekolah', DB::raw('count(*) as total'))
                      ->groupBy('asal_sekolah')->orderBy('total','desc')->limit(5)->get();
        $categories1= [];
        $series1 = [
            (object)[
                'name'=>'Jumlah Peserta Didik',
                'data'=>[]
            ]
        ];
   
        for ($i=0; $i < count($asal_sekolah); $i++) { 
          $categories1[] = $asal_sekolah[$i]->asal_sekolah;
          $series1[0]->data[] = $asal_sekolah[$i]->total;
        }
 
        return view('statistik/mutasimasuk', compact('categories','series','categories1','series1'));

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
