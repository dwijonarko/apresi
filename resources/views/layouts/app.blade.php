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
    <link rel="stylesheet" href="{{asset('css/custom-data-table.css')}}">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="https://build.limakode.com/storage/2019/04/cropped-5KODE1-Long-white-1.png" style="margin-bottom: 10px" height="50"
             alt="InfyOm Logo">
        <img class="navbar-brand-minimized" src="https://build.limakode.com/storage/2019/04/cropped-5KODE1-Long-white-1.png" style="margin-bottom: 10px"
             height="50" alt="Infyom Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" style="margin-right: 10px" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                {!! Auth::user()->role->name !!}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-envelope-o"></i> Messages
                    <span class="badge badge-success">42</span>
                </a>
                <div class="dropdown-header text-center">
                    <strong>Settings</strong>
                </div>
                <a class="dropdown-item" href="{!! url('profile/users',Auth::user()->id) !!}">
                    <i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="{!! route('profile.edit',  Auth::user()->id) !!}">
                    <i class="fa fa-wrench"></i> Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-shield"></i> Lock Account</a>
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
</body>

</html>
