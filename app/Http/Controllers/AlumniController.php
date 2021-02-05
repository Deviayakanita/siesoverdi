<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $alumnis = Alumni::all();
        $pesertadidik = Pesertadidik::all();
       
        return view('alumni/index', compact('alumnis','pesertadidik'));
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
            'status_alumni' => request('status_alumni'),
        ]);

        $pesertadidik = Pesertadidik::find($request->nis);
        if($request->status_alumni == 1){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }

        return redirect('/alumni');
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
        $pesertadidik= Pesertadidik::all();
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
        $alumnis->nm_pt = $request->nm_pt;
        $alumnis->id_siswa = $request->nis;
        $alumnis->jns_pt = $request->jns_pt;
        $alumnis->nm_fak = $request->nm_fak;
        $alumnis->nm_jurusan = $request->nm_jurusan;
        $alumnis->status_alumni = $request->status_alumni;
        $alumnis->save(); 

        $pesertadidik = Pesertadidik::find($request->nis);
        if($request->status_alumni == 1){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }
        return redirect('/alumni');
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
