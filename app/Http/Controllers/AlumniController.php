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
        return view('alumni.alumni');
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
            // 'nis' => request('nis'),
            'nm_pt' => request('nm_pt'),
            'id_siswa' => auth()->id_siswa(),
            'jns_pt' => request('jns_pt'),
            'nm_fak' => request('nm_fak'),
            'nm_jurusan' => request('nm_jurusan'),
            'melanjutkan' => request('melanjutkan'),
            'status_alumni' => request('status_alumni'),
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
        $alumni = Alumni::find($id);
        return view('alumni/editalumni', compact('alumni'));
    }

    public function editmutasimasuk (Request $request, $id)
    {

         DB::table('alumni_siswa')->where('id_alumni', $id)
            -> update([
            // 'nis' => request('nis'),
            'nm_pt' => request('nm_pt'),
            'id_siswa' => auth()->id_siswa(),
            'jns_pt' => request('jns_pt'),
            'nm_fak' => request('nm_fak'),
            'nm_jurusan' => request('nm_jurusan'),
            'melanjutkan' => request('melanjutkan'),
            'status_alumni' => request('status_alumni'),
            ]);

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
