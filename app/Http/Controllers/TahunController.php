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
            'tahun_ajaran' => 'required'
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
}
