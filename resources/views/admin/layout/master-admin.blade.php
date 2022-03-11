<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Style -->
    <link href="{{ asset('css/styles-sidebar.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom text-primary" style="background-color: #e3f2fd;">Dashboard Travellur</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-primary p-3 @yield('dashboardAdmin')" href="/admin/dashboard">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-primary p-3 @yield('menuAdmin')" href="/admin/dashboard/admin">Data Admin</a>
                <a class="list-group-item list-group-item-action list-group-item-primary p-3 @yield('menuUser')" href="/admin/dashboard/user">Data User</a>
                <a class="list-group-item list-group-item-action list-group-item-primary p-3 @yield('menuBandara')" href="/admin/dashboard/bandara">Data Bandara</a>
                <a class="list-group-item list-group-item-action list-group-item-primary p-3 @yield('menuPesawat')" href="/admin/dashboard/pesawat">Data Pesawat</a>
                <a class="list-group-item list-group-item-action list-group-item-primary p-3 @yield('menuJadwal')" href="/admin/dashboard/jadwal">Data Jadwal</a>
                <a class="list-group-item list-group-item-action list-group-item-primary p-3 @yield('menuPemesanan')" href="/admin/dashboard/pemesanan">Data Pemesanan</a>
                <a class="list-group-item list-group-item-action list-group-item-primary p-3 @yield('menuTransaksi')" href="/admin/dashboard/transaksi">Data Transaksi</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-md border-bottom shadow-sm" style="background-color: #e3f2fd;">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 px-5">
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script -->
    <script src="{{ asset('js/scripts-sidebar.js') }}"></script>

</body>

</html>