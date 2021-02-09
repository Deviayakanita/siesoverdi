<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Models\Orangtua;
use App\Models\Pesertadidik;


class OrangtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orangtuas = Orangtua::all();
        $pesertadidik = Pesertadidik::all();

        return view('orang_tua/index', compact('orangtuas','pesertadidik'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesertadidik = Pesertadidik::all();
        $orangtuas = Orangtua::find($id);
        return view('orang_tua/editortu', compact('orangtuas','pesertadidik'));
    }

    public function update(Request $request, $id)
    {
        $orangtuas = Orangtua::find($id);
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
