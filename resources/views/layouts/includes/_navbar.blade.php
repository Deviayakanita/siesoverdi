<header class="main-header">
  
  <!-- Logo -->
    <div class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIE</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIE SOVERDI</b></span>
    </div>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        @if(Auth::user() && Auth::user()->level == 0)
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('adminLTE/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">Gabriel</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  Administartor SMAK Soverdi  
                  <small>Member since. 2021</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-right">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                  </form>
                </div>
              </li>

          @elseif(Auth::user() && Auth::user()->level == 1)
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('adminLTE/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">Dra. Magdalena Tin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  Kepala Sekolah SMAK Soverdi  
                  <small>Member since. 2021</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-right">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                  </form>
                </div>
              </li>
            @endif
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>