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
        $pesertadidik = Pesertadidik::all();
        return view('alumni.alumni', [
            'pesertadidik' => $pesertadidik,
        ]);
    }

    public function list()
    {
        $alumnis = Alumni::all();
        return view('alumni/listalumni', compact('alumnis'));
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
         Alumni::create([
            'nm_pt' => request('nm_pt'),
            'id_siswa' => request('nis'),
            'jns_pt' => request('jns_pt'),
            'nm_fak' => request('nm_fak'),
            'nm_jurusan' => request('nm_jurusan'),
            'status_alumni' => request('status_alumni'),
        ]);

        $pesertadidik = Pesertadidik::find($request->nis);
        // dd($pesertadidik);
        if($request->status_alumni == 1){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }

        return redirect('listalumni');
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
        $pesertadidik4 = Pesertadidik::all();
        $alumni = Alumni::find($id);
        return view('alumni/editalumni', compact('alumni','pesertadidik4'));
    }

    public function editmutasimasuk (Request $request, $id)
    {

         DB::table('alumni_siswa')->where('id_alumni', $id)
            -> update([
            'nm_pt' => request('nm_pt'),
            'id_siswa' => request('nis'),
            'jns_pt' => request('jns_pt'),
            'nm_fak' => request('nm_fak'),
            'nm_jurusan' => request('nm_jurusan'),
            'status_alumni' => request('status_alumni'),
            ]);

        $pesertadidik = Pesertadidik::find($request->nis);
        // dd($pesertadidik);
        if($request->status_alumni == 1){
            $pesertadidik->sts_siswa = 0;
            $pesertadidik->save();
        }

        return redirect('listalumni');
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

    public function detailalumni($id)
    {
        $detailalumni = Alumni::find($id);
        return view ('alumni/detailalumni',['detailalumni' => $detailalumni]);
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
