<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;

use App\Models\Pesertadidik;
use App\Models\Alumni;

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
        $tahun_ajaran = Pesertadidik::orderBy('tahun_ajaran', 'ASC')->select('tahun_ajaran')->groupBy('tahun_ajaran')->get();
        if ($request->ajax()) {
            if (!$request->tahun_ajaran){
                $alumnis = Alumni::with(['pesertadidik'])->latest()->get();   
            } else {
                $siswa = Pesertadidik::where('tahun_ajaran', $request->tahun_ajaran)->pluck('id_siswa')->toArray();
                $alumni = Alumni::with(['pesertadidik'])->whereIn('id_siswa', collect($siswa))->get();
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
         Alumni::create([
            'nm_pt' => request('nm_pt'),
            'id_siswa' => request('nis'),
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
        $alumnis = Alumni::find($id);
        $pesertadidik = Pesertadidik::find($alumnis->id_siswa);
        $pesertadidik_baru = Pesertadidik::find($request->nis);
        if($request->nis != $pesertadidik){
            $pesertadidik->sts_siswa = 1;
            $pesertadidik->save();
        }

        $alumnis->nm_pt = $request->nm_pt;
        $alumnis->id_siswa = $request->nis;
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
