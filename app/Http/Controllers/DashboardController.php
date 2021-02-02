<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesertadidik;
use App\Mutasimasuk;
use App\Mutasikeluar;
use App\Alumni;


class DashboardController extends Controller
{
    public function index()
    {
    	$pesertadidik = Pesertadidik::count();
    	$mutasimasuk = Mutasimasuk::count();
    	$mutasikeluar = Mutasikeluar::count();
    	$alumni = Alumni::count();

    	

    	return view('dashboard.index', compact('pesertadidik','mutasimasuk','mutasikeluar','alumni'));
}
