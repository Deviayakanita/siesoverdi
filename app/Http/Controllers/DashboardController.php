<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesertadidik;
use App\Models\Mutasimasuk;
use App\Models\Mutasikeluar;
use App\Models\Alumni;


class DashboardController extends Controller
{
    public function index()
    {
    	$pesertadidik_terakhir = Pesertadidik::latest()->limit(3)->get();
        $mtsmasuk_terakhir = Mutasimasuk::latest()->limit(3)->get();
        $mtskeluar_terakhir = Mutasikeluar::latest()->limit(3)->get();
        $alumni_terakhir = Alumni::latest()->limit(3)->get();


    	$pesertadidik = Pesertadidik::count();
    	$mutasimasuk = Mutasimasuk::count();
    	$mutasikeluar = Mutasikeluar::count();
    	$alumni = Alumni::count();

    	

    	return view ('dashboard/coba', compact('pesertadidik','mutasimasuk','mutasikeluar','alumni','pesertadidik_terakhir', 'mtsmasuk_terakhir', 'mtskeluar_terakhir', 'alumni_terakhir'));
    }
}
