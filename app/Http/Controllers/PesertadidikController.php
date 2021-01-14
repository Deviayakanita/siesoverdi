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
        return view('peserta_didik.index');
    }


    public function list(Request $request)
    {
        if ($request->has('cari')){
            $pesertadidiks = Pesertadidik::where('nm_siswa','LIKE','%'.$request->cari.'%')->get(); 
        }else{
            $pesertadidiks = Pesertadidik::all();
        }
        return view('peserta_didik/listpesertadidik', compact('pesertadidiks'));
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
        return redirect('listpesertadidik');
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
        $pesertadidik = Pesertadidik::find($id);
        return view('peserta_didik/editpesertadidik', compact('pesertadidik'));
    }

    public function editpesertadidik (Request $request, $id)
    {

         DB::table('peserta_didik')->where('id_siswa', $id)
            -> update([
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

        return redirect('listpesertadidik');
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

    public function detailpesertadidik($id)
    {
        $detailpesertadidik = Pesertadidik::find($id);
        return view ('peserta_didik/detailpesertadidik',['detailpesertadidik' => $detailpesertadidik]);
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
