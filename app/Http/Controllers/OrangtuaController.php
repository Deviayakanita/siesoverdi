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
        return view('orang_tua.orangtua');
    }

    public function list()
    {
        $ortus = Orangtua::all();
        return view('orang_tua/listortu', compact('ortus'));
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
        Orangtua::create([
            // 'nis' => request('nis'),
            'nm_ayah' => request('nm_ayah'),
            'id_siswa' => auth()->id_siswa(),
            'job_ayah' => request('job_ayah'),
            'pddk_ayah' => request('pddk_ayah'),
            'penghasilan_ayah' => request('penghasilan_ayah'),
            'nm_ibu' => request('nm_ibu'),
            'job_ibu' => request('job_ibu'),
            'pddk_ibu' => request('pddk_ibu'),
            'penghasilan_ibu' => request('penghasilan_ibu'),
            'sts_orang_tua' => request('sts_orang_tua'),
        ]);
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
        $orangtua = Orangtua::find($id);
        return view('orang_tua/editortu', compact('orangtua'));
    }

    public function editortu (Request $request, $id)
    {
        DB::table('orang_tua')->where('id_orang_tua', $id)
            -> update([
            // 'nis' => request('nis'),
            'nm_ayah' => request('nm_ayah'),
            'id_siswa' => auth()->id_siswa(),
            'job_ayah' => request('job_ayah'),
            'pddk_ayah' => request('pddk_ayah'),
            'penghasilan_ayah' => request('penghasilan_ayah'),
            'nm_ibu' => request('nm_ibu'),
            'job_ibu' => request('job_ibu'),
            'pddk_ibu' => request('pddk_ibu'),
            'penghasilan_ibu' => request('penghasilan_ibu'),
            'sts_orang_tua' => request('sts_orang_tua'),
            ]);

        return redirect('listortu');
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
