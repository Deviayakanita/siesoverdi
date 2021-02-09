<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Models\Pesertadidik;
use App\Models\User;

class PesertadidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesertadidiks = Pesertadidik::all();
        return view('peserta_didik/index', compact('pesertadidiks'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        Pesertadidik::create([
            'nm_siswa' => request('nm_siswa'),
            'id_user' => Auth::user()->id,
            'jns_kelamin' => request('jns_kelamin'),
            'nis' => request('nis'),
            'tmp_lahir' => request('tmp_lahir'),
            'tgl_lahir' => request('tgl_lahir'),
            'agama' => request('agama'),
            'alamat_siswa' => request('alamat_siswa'),
            'provinsi' => request('provinsi'),
            'kabupaten' => request('kabupaten'),
            'no_tlpn' => request('no_tlpn'),
            'email' => request('email'),
            'tahun_ajaran' => request('tahun_ajaran'),
            'jurusan' => request('jurusan'),
            'sts_siswa' => request('sts_siswa'),
            'keterangan' => request('keterangan'),
        ]);
        return redirect('/pesertadidik')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesertadidiks = Pesertadidik::find($id);
        return view ('peserta_didik/detailpesertadidik', compact('pesertadidiks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesertadidiks = Pesertadidik::find($id);
        return view('peserta_didik/editpesertadidik', compact('pesertadidiks'));
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
        $pesertadidiks = Pesertadidik::find($id);
        $pesertadidiks->nm_siswa = $request->nm_siswa;
        $pesertadidiks->id_user = Auth::user()->id;
        $pesertadidiks->nis = $request->nis;
        $pesertadidiks->tmp_lahir = $request->tmp_lahir;
        $pesertadidiks->tgl_lahir = $request->tgl_lahir;
        $pesertadidiks->agama = $request->agama;
        $pesertadidiks->alamat_siswa = $request->alamat_siswa;
        $pesertadidiks->provinsi = $request->provinsi;
        $pesertadidiks->kabupaten = $request->kabupaten;
        $pesertadidiks->no_tlpn = $request->no_tlpn;
        $pesertadidiks->email = $request->email;
        $pesertadidiks->tahun_ajaran = $request->tahun_ajaran;
        $pesertadidiks->jurusan = $request->jurusan;
        $pesertadidiks->sts_siswa = $request->sts_siswa;
        $pesertadidiks->keterangan = $request->keterangan;
        $pesertadidiks->save();

        return redirect('/pesertadidik')->with('success', 'Data berhasil diupdate!');
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
