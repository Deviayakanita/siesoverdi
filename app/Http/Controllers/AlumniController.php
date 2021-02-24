<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use PDF;

use App\Models\Pesertadidik;
use App\Models\Alumni;
use App\Models\Tahun;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnis = Alumni::latest()->get();
       $pesertadidik = Pesertadidik::all();
       
        return view('alumni/index', compact('alumnis','pesertadidik'));
    }

    public function filter(Request $request)
    {
        $alumnis = Alumni::latest()->get();
        $pesertadidik = Alumni::orderBy('id_siswa')->get();
        $tahun_ajaran = Tahun::orderBy('id_ta')->get();
        if ($request->ajax()) {
            if (!$request->tahun_ajaran){
                $alumnis = Alumni::with(['pesertadidik'])->latest()->get();   
            } else {
                $siswa = Pesertadidik::where('id_ta', $request->tahun_ajaran)->pluck('id_siswa')->toArray();
                $alumni = Alumni::with(['pesertadidik','tahun'])->whereIn('id_siswa', collect($siswa))->get();
            }
            $role = Auth::user()->level;
            return response()->json(['alumni'=>$alumni,'level'=>$role]);
        }
      
        return view('alumni/ctk_alumni', compact('alumnis','tahun_ajaran'));
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
            'nis' => 'required|unique:alumni_siswa,id_siswa',
            'nm_pt' => 'required|min:5|max:50',
            'nm_fak' => 'required|min:5|max:50',
            'nm_jurusan' => 'required|min:5|max:50',
            'jns_pt' => 'required', 
        ]);

         Alumni::create([
            'nm_pt' => request('nm_pt'),
            'id_siswa' => request('nis'),
            'id_ta' => request('id_ta'),
            'jns_pt' => request('jns_pt'),
            'nm_fak' => request('nm_fak'),
            'nm_jurusan' => request('nm_jurusan'),
        ]);

        $pesertadidik = Pesertadidik::find($request->nis);
        if($request->nis){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }

        return redirect('/alumni')->with('success', 'Data berhasil ditambahkan!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnis = Alumni::find($id);
        return view ('alumni/detailalumni', compact('alumnis'));
    }

    public function detail($id)
    {
        $alumnis = Alumni::find($id);
        return view ('alumni/detailkepsek', compact('alumnis'));
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
        $alumnis = Alumni::find($id);
        return view('alumni/editalumni', compact('alumnis','pesertadidik'));
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
            'nis' => 'required|unique:alumni_siswa,id_siswa,'.$id.',id_alumni',
            'nm_pt' => 'required|min:5|max:50',
            'nm_fak' => 'required|min:5|max:50',
            'nm_jurusan' => 'required|min:5|max:50', 

        ]);

        $alumnis = Alumni::where('id_alumni', $id)->first();
        $pesertadidik = Pesertadidik::find($alumnis->id_siswa);
        $pesertadidik_baru = Pesertadidik::find($request->nis);
        if($request->nis != $pesertadidik){
            $pesertadidik->sts_siswa = 1;
            $pesertadidik->save();
        }

        $alumnis->nm_pt = $request->nm_pt;
        $alumnis->id_siswa = $request->nis;
        $alumnis->id_ta = $request->id_ta;
        $alumnis->jns_pt = $request->jns_pt;
        $alumnis->nm_fak = $request->nm_fak;
        $alumnis->nm_jurusan = $request->nm_jurusan;
        $alumnis->save(); 

        $pesertadidik = Pesertadidik::find($request->nis);
        if($request->nis){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }
        return redirect('/alumni')->with('success', 'Data berhasil diupdate!');
    }

    public function export(Request $request)
    {   
        $alumni = DB::table('alumni_siswa')
                    ->join('peserta_didik', 'peserta_didik.id_siswa','=','alumni_siswa.id_siswa')
                    ->join('tahun_ajaran','tahun_ajaran.id_ta','=','alumni_siswa.id_ta')->get();
        $pdf = PDF::loadview('alumni.export', ['alumni'=>$alumni]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function pdf($id)
    {
        $alumnis = Alumni::find($id);
        $pesertadidik = Pesertadidik::all();
        $pdf = PDF::loadview('alumni.pdfalumni', ['alumnis'=>$alumnis, 'pesertadidik'=>$pesertadidik]);
        return $pdf->stream();
    }

    
        public function cetakfilter($tahun_ajaran)
    {   
        $alumni = DB::table('alumni_siswa')
                    ->join('peserta_didik', 'peserta_didik.id_siswa','=','alumni_siswa.id_siswa')
                    ->join('tahun_ajaran','tahun_ajaran.id_ta','=','alumni_siswa.id_ta')
                    ->where('peserta_didik.id_ta','=', $tahun_ajaran)->get();
        $pdf = PDF::loadview('alumni.export', ['alumni'=>$alumni]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
    

    public function statistik()
    {
        $perguruan_tinggi = DB::table('alumni_siswa')
                      ->select('nm_pt', DB::raw('count(*) as total'))
                      ->groupBy('nm_pt')->orderBy('total','desc')->limit(3)->get();
        $categories= [];
        $series = [
            (object)[
                'name'=>'Jumlah Peserta Didik',
                'data'=>[]
            ]
        ];
   
        for ($i=0; $i < count($perguruan_tinggi); $i++) { 
          $categories[] = $perguruan_tinggi[$i]->nm_pt;
          $series[0]->data[] = $perguruan_tinggi[$i]->total;
        }

        $negeri = Alumni::where('jns_pt', 'negeri')->count();
        $swasta = Alumni::where('jns_pt', 'swasta')->count();
        $total = Alumni::all()->count();

        $persen_negeri = $negeri/$total*100;
        $persen_swasta = $swasta/$total*100;

       
        return view('statistik/alumni', compact('categories','series','persen_swasta','persen_negeri'));
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
