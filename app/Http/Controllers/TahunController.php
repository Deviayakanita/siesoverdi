<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesertadidik;
use App\Models\Tahun;

class TahunController extends Controller
{
    public function index()
    {
        $tahunajarans = Tahun::latest()->get();
        return view('tahun_ajaran/index', compact('tahunajarans'));
    }

    public function store(Request $request)
    { 
        $this->validate($request, [
            'tahun_ajaran' => 'required|unique:tahun_ajaran|min:9|max:12',
        ]);

        Tahun::create([
            'tahun_ajaran' => request('tahun_ajaran'),
        ]);
        return redirect('/tahunajaran')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tahunajarans = Tahun::find($id);

        return view('tahun_ajaran/edit', compact('tahunajarans'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
             'tahun_ajaran' => 'required|unique:tahun_ajaran|min:9|max:12',
        ]);

        $tahunajarans = Tahun::where('id_ta', $id)->first();
        $tahunajarans->tahun_ajaran = $request->tahun_ajaran;
        $tahunajarans->save();

        return redirect('/tahunajaran')->with('success', 'Data berhasil diupdate!');
    }
}
