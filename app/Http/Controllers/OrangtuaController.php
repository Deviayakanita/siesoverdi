<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use PDF;

use App\Models\Orangtua;
use App\Models\Pesertadidik;
use App\Models\Tahun;

class OrangtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orangtuas = Orangtua::latest()->get();
        $pesertadidik = Pesertadidik::all();

        return view('orang_tua/index', compact('orangtuas','pesertadidik'));
    }

    public function filter(Request $request)
    {
        $orangtuas = Orangtua::latest()->get();
        if ($request->ajax()) {
            if (!$request->penghasilan_ayah && !$request->penghasilan_ibu) {
               $orangtua = Orangtua::with(['pesertadidik'])->all();
            }elseif (!empty($request->penghasilan_ayah) && !empty($request->penghasilan_ibu )){
                $orangtua = Orangtua::with(['pesertadidik'])->where('penghasilan_ayah',$request->penghasilan_ayah)->where('penghasilan_ibu',$request->penghasilan_ibu)->get();
            }elseif (empty($request->penghasilan_ayah) && !empty($request->penghasilan_ibu)) {
               $orangtua = Orangtua::with(['pesertadidik'])->where('penghasilan_ibu',$request->penghasilan_ibu)->get();
            }else{
                $orangtua = Orangtua::with(['pesertadidik'])->where('penghasilan_ayah',$request->penghasilan_ayah)->get();
            }
             $role = Auth::user()->level;
            return response()->json(['orangtua'=>$orangtua,'level'=>$role]);

        }

        return view('orang_tua/ctk_orangtua', compact('orangtuas'));
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
            'nis' => 'required|unique:orang_tua,id_siswa',
            'nm_ayah' => 'required|min:5|max:50',
            'nm_ibu' => 'required|min:5|max:50',
        ]);

        Orangtua::create([
            'nm_ayah' => request('nm_ayah'),
            'id_siswa' => request('nis'),
            'job_ayah' => request('job_ayah'),
            'pddk_ayah' => request('pddk_ayah'),
            'penghasilan_ayah' => request('penghasilan_ayah'),
            'nm_ibu' => request('nm_ibu'),
            'job_ibu' => request('job_ibu'),
            'pddk_ibu' => request('pddk_ibu'),
            'penghasilan_ibu' => request('penghasilan_ibu'),
        ]);
        return redirect('/orangtua')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orangtuas = Orangtua::find($id);
        return view ('orang_tua/detailorangtua', compact('orangtuas'));
    }

    public function detail($id)
    {
        $orangtuas = Orangtua::find($id);
        return view ('orang_tua/detailkepsek', compact('orangtuas'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tahunajarans = Tahun::all();
        $pesertadidik = Pesertadidik::all();
        $orangtuas = Orangtua::find($id);
        return view('orang_tua/editortu', compact('orangtuas','pesertadidik', 'tahunajarans'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nis' => 'required|unique:orang_tua,id_siswa,'.$request->nis.',id_siswa',
            'nm_ayah' => 'required|min:5|max:50',
            'nm_ibu' => 'required|min:5|max:50',
        ]);

        $orangtuas = Orangtua::where('id_orang_tua', $id)->first();
        $orangtuas->id_siswa = $request->nis;
        $orangtuas->nm_ayah = $request->nm_ayah;
        $orangtuas->job_ayah = $request->job_ayah;
        $orangtuas->pddk_ayah = $request->pddk_ayah;
        $orangtuas->penghasilan_ayah = $request->penghasilan_ayah;
        $orangtuas->nm_ibu = $request->nm_ibu;
        $orangtuas->job_ibu = $request->job_ibu;
        $orangtuas->pddk_ibu = $request->pddk_ibu;
        $orangtuas->penghasilan_ibu = $request->penghasilan_ibu;
        $orangtuas->save(); 

        return redirect('/orangtua')->with('success', 'Data berhasil diupdate!');
    }

    public function export(Request $request)
    {
        $ortu = Orangtua::all();
        $pesertadidik = Pesertadidik::all();
        $pdf = PDF::loadview('orang_tua.export', ['ortu'=>$ortu, 'pesertadidik'=>$pesertadidik]);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function pdf($id)
    {
        $orangtuas = Orangtua::find($id);
        $pesertadidik = Pesertadidik::all();
        $pdf = PDF::loadview('orang_tua.pdforangtua', ['orangtuas'=>$orangtuas, 'pesertadidik'=>$pesertadidik]);
        return $pdf->stream();
    }

    public function cetakfilter($ids)
    {   
        $id = explode(',' ,$ids);
        $ortu = Orangtua::whereIn('id_orang_tua',collect($id))->get();
        $pdf = PDF::loadview('orang_tua.export', ['ortu'=>$ortu]);
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
