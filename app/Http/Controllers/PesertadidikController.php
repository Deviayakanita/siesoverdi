<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PDF;
use App\Models\Pesertadidik;
use App\Models\Tahun;
use Carbon\Carbon;

class PesertadidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunajarans = Tahun::all();
        $pesertadidiks = Pesertadidik::latest()->get();
        return view('peserta_didik/index', compact('pesertadidiks', 'tahunajarans'));
    }

    public function filter(Request $request)
    {
        $pesertadidiks = Pesertadidik::latest()->get();
        $tahun_ajaran = Tahun::all();
        if ($request->ajax()) {
            if (!$request->tahun_ajaran) {
                $role = Auth::user()->level;
               $siswa = Pesertadidik::with(['tahun'])->orderBy('nm_siswa', 'ASC')->get();
            }else {
                $role = Auth::user()->level;
                $siswa = Pesertadidik::with(['tahun'])->where('id_ta',$request->tahun_ajaran)->orderBy('nm_siswa', 'ASC')->get();
            }
            return response()->json(['siswa'=>$siswa,'level'=>$role]);
        }
      
        return view('peserta_didik/ctk_pesertadidik', compact('pesertadidiks','tahun_ajaran'));
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
            'nis' => 'required|unique:peserta_didik',
            'nm_siswa' => 'required|min:8|max:50',
            'jns_kelamin' => 'required',
            'kabupaten' => 'required',
            'jurusan' => 'required',
            'sts_siswa' => 'required',
            'tmp_lahir' => 'required|min:3|max:20',
            'agama' => 'required|min:5|max:20',
            'no_tlpn' => 'required|min:7|max:13',
            
        ]);
        Pesertadidik::create([
            'nm_siswa' => request('nm_siswa'),
            'jns_kelamin' => request('jns_kelamin'),
            'nis' => request('nis'),
            'tmp_lahir' => request('tmp_lahir'),
            'tgl_lahir' => request('tgl_lahir'),
            'agama' => request('agama'),
            'alamat_siswa' => request('alamat_siswa'),
            'kabupaten' => request('kabupaten'),
            'no_tlpn' => request('no_tlpn'),
            'email' => request('email'),
            'id_ta' => request('tahun_ajaran'),
            'jurusan' => request('jurusan'),
            'sts_siswa' => request('sts_siswa'),
            'keterangan' => request('keterangan')
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

     public function detail($id)
    {
        $pesertadidiks = Pesertadidik::find($id);
        return view ('peserta_didik/detailkepsek', compact('pesertadidiks'));
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
        $pesertadidiks = Pesertadidik::find($id);
        return view('peserta_didik/editpesertadidik', compact('pesertadidiks', 'tahunajarans'));
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
            'nis' => 'required|unique:peserta_didik,nis,'.$id.',id_siswa',
            'nm_siswa' => 'required|min:8|max:50',
            'tmp_lahir' => 'required|min:3|max:20',
            'agama' => 'required|min:5|max:20',
            'no_tlpn' => 'required|min:7|max:13',
        ]);

        $pesertadidiks = Pesertadidik::where('id_siswa', $id)->first();
        $pesertadidiks->nm_siswa = $request->nm_siswa;
        $pesertadidiks->nis = $request->nis;
        $pesertadidiks->tmp_lahir = $request->tmp_lahir;
        $pesertadidiks->tgl_lahir = $request->tgl_lahir;
        $pesertadidiks->agama = $request->agama;
        $pesertadidiks->alamat_siswa = $request->alamat_siswa;
        $pesertadidiks->kabupaten = $request->kabupaten;
        $pesertadidiks->no_tlpn = $request->no_tlpn;
        $pesertadidiks->email = $request->email;
        $pesertadidiks->id_ta = $request->tahun_ajaran;
        $pesertadidiks->jurusan = $request->jurusan;
        $pesertadidiks->sts_siswa = $request->sts_siswa;
        $pesertadidiks->keterangan = $request->keterangan;
        $pesertadidiks->save();

        return redirect('/pesertadidik')->with('success', 'Data berhasil diupdate!');
    }

    public function export(Request $request)
    {
        $siswa = Pesertadidik::all();
        $pdf = PDF::loadview('peserta_didik.export', ['siswa'=>$siswa]);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function pdf($id)
    {
        $pesertadidiks = Pesertadidik::find($id);
        $pdf = PDF::loadview('peserta_didik.pdfpesertadidik', ['pesertadidiks'=>$pesertadidiks]);
        return $pdf->stream();
    }

    public function cetakfilter($tahun_ajaran)
    {   
        $siswa = Pesertadidik::where('id_ta',$tahun_ajaran)->get();
        $pdf = PDF::loadview('peserta_didik.export', ['siswa'=>$siswa]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }


    public function statistik()
    {
        $id_ta = [];

        $tahun_ajaran = Tahun::orderBy('tahun_ajaran', 'DESC')->limit(5)->get();
        foreach ($tahun_ajaran as $value) {
            $id_ta[] = $value->id_ta;
        }
        
        $categories = [];
        $tahun_ajaran = Tahun::whereIn('id_ta', collect($id_ta))->orderBy('tahun_ajaran', 'ASC')->get();
        foreach($tahun_ajaran as $th){
            $categories[] = $th->tahun_ajaran;
        }

        $series = [
            (object)[
                'name'=>'Jumlah Peserta Didik',
                'data'=>[]
            ]
        ];
        
        foreach ($tahun_ajaran as $key => $th) {
            $siswa = DB::table('peserta_didik')
                ->join('tahun_ajaran','tahun_ajaran.id_ta','=','peserta_didik.id_ta')
                ->where('peserta_didik.id_ta', $th->id_ta)->count();

            $series[0]->data[$key] = $siswa;
        }

        return view('statistik/pesertadidik', compact('categories','series'));
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
