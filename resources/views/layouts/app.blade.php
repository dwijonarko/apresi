<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Indikator Layanan Keterjangkauan Infrastruktur - BADAN PERENCANAAN PEMBANGUNAN DAERAH
    PEMERINTAH KABUPATEN PROBOLINGGO
    ">
    <meta name="keyword" content="IKLI, Bappeda, Probolinggo Kab">
    <title>{{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
   
    <link href="{{asset('css/coreui.css')}}" rel="stylesheet" />
    @yield('css')
    @stack('css')
    <link rel="stylesheet" href="{{asset('css/custom-data-table.css')}}">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{asset('img/logo-full.jpg')}}" style="margin: 10px 0" height="40"
             alt="Limakode Logo">
        <img class="navbar-brand-minimized" src="{{asset('img/logo.png')}}" style="margin: 10px 0"
             height="40" alt="Limakode Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        
        <li class="nav-item dropdown">

            <a class="nav-link" style="margin-right: 10px" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
               <div class="c-avatar"><img class="c-avatar-img" style="height: 30px" src="{!! asset(Auth::user()->avatar) !!}" alt="{!! Auth::user()->name !!}"> {!! Auth::user()->role->name !!}</div>
                
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                
                <a class="dropdown-item" href="{!! url('profile/users',Auth::user()->id) !!}">
                    <i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="{!! route('profile.edit',  Auth::user()->id) !!}">
                    <i class="fa fa-wrench"></i> Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i>Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</header>

<div class="app-body">
    @include('layouts.sidebar')
    <main class="main">
        @yield('content')
    </main>
</div>
<footer class="app-footer">
    <div>
        <a href="https://limakode.com">Limakode </a>
        <span>&copy; 2019 Limakode Software Development</span>
    </div>

</footer>
<!-- jQuery 3.1.1 -->
<script src="{{asset('js/app.js')}}"></script>

@yield('scripts')
@stack('scripts')
</body>

</html>
