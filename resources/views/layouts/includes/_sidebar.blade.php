<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
    <li class="header" style="font-size: 12px">DASHBOARD</li>
    <li class="{{ (Request()->segment(1) == 'dashboard') ? 'active' : ''}}">
        <a href="{{url('/dashboard')}}">
            <i class="fa fa-home"></i><span> Dashboard</span>
        </a>
    </li>

    @if(Auth::user() && Auth::user()->level == 0)
    <li class="header" style="font-size: 12px" >DATA PESERTA DIDIK</li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-user"></i><span> Kelola Peserta Didik</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'pesertadidik') ? 'active' : ''}}"><a href="{{url('pesertadidik')}}"><i class="fa fa-circle-o text-aqua"></i> Data Peserta Didik</a></li>
            <li class="{{ (Request()->segment(1) == 'orangtua') ? 'active' : ''}}"><a href="{{url('orangtua')}}"><i class="fa fa-circle-o text-aqua"></i> Data Orang Tua</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-exchange"></i><span> Kelola Mutasi</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'mutasimasuk') ? 'active' : ''}}"><a href="{{url('mutasimasuk')}}"><i class="fa fa-circle-o text-aqua"></i> Data Mutasi Masuk</a></li>
            <li class="{{ (Request()->segment(1) == 'mutasikeluar') ? 'active' : ''}}"><a href="{{url('mutasikeluar')}}"><i class="fa fa-circle-o text-aqua"></i> Data Mutasi Keluar</a></li>     
        </ul>
    </li>
    <li class="{{ (Request()->segment(1) == 'alumni') ? 'active' : ''}}">
        <a href="{{url('alumni')}}">
        <i class="fa fa-files-o"></i><span> Kelola Alumni</span>
        </a>
    </li>
    @endif

    @if(Auth::user() && Auth::user()->level == 1)
    <li class="header" style="font-size: 12px" >DATA PESERTA DIDIK</li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-user"></i><span> Kelola Peserta Didik</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'pesertadidik') ? 'active' : ''}}"><a href="{{url('pesertadidik')}}"><i class="fa fa-circle-o text-aqua"></i> Data Peserta Didik</a></li>
            <li class="{{ (Request()->segment(1) == 'orangtua') ? 'active' : ''}}"><a href="{{url('orangtua')}}"><i class="fa fa-circle-o text-aqua"></i> Data Orang Tua</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-exchange"></i><span> Kelola Mutasi</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'mutasimasuk') ? 'active' : ''}}"><a href="{{url('mutasimasuk')}}"><i class="fa fa-circle-o text-aqua"></i> Data Mutasi Masuk</a></li>
            <li class="{{ (Request()->segment(1) == 'mutasikeluar') ? 'active' : ''}}"><a href="{{url('mutasikeluar')}}"><i class="fa fa-circle-o text-aqua"></i> Data Mutasi Keluar</a></li>     
        </ul>
    </li>
    <li class="{{ (Request()->segment(1) == 'alumni') ? 'active' : ''}}">
        <a href="{{url('alumni')}}">
        <i class="fa fa-files-o"></i><span> Kelola Alumni</span>
        </a>
    </li>
    <li class="header" style="font-size: 12px" >STATISTIK</li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-bar-chart-o"></i><span> Statistik</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'statistikpesertadidik') ? 'active' : ''}}"><a href="statistipesertadiidk"><i class="fa fa-circle-o text-aqua"></i> Peserta Didik</a></li>
            <li class="{{ (Request()->segment(1) == 'statistikorangtua') ? 'active' : ''}}"><a href="statistikorangtua"><i class="fa fa-circle-o text-aqua"></i> Orang Tua </a></li>
            <li class="{{ (Request()->segment(1) == 'statistikmutasi') ? 'active' : ''}}"><a href="statistikmutasi"><i class="fa fa-circle-o text-aqua"></i> Mutasi Peserta Didik</a></li>
            <li class="{{ (Request()->segment(1) == 'statistikalumni') ? 'active' : ''}}"><a href="statistikalumni"><i class="fa fa-circle-o text-aqua"></i> Alumni Peserta Didik</a></li>        
        </ul>
    </li>
    @endif
</ul>
</section>
</aside>