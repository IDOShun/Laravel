<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
        <title>@yield('title')</title>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            @if (auth('user')->user()->role_id == 1)
                <a class="navbar-brand ps-3" href="{{route('get.superAdmin.home')}}">
            @elseif(auth('user')->user()->role_id == 2)
                <a class="navbar-brand ps-3" href="{{route('get.admin.home')}}">
            @else
                <a class="navbar-brand ps-3" href="{{route('get.merchant.home')}}">
            @endif
            My PHP Test
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" style="float: right; border: 2px solid red;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item" href="#!">Settings</a></li> --}}
                        {{-- <li><hr class="dropdown-divider" /></li> --}}
                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- Side Navigation -->
        @include('navigation')
        <!-- Header-->
        <header class="bg-dark">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    @if(auth('user')->user()->role_id == 1)
                        <h1 class="display-4 fw-bolder">For SuperAdmin</h1>
                    @elseif(auth('user')->user()->role_id == 2)
                        <h1 class="display-4 fw-bolder">For Admin</h1>
                    @else
                        <h1 class="display-4 fw-bolder">For Merchant</h1>
                    @endif
                    <p class="lead fw-normal text-white-50 mb-0">Home</p>
                </div>
            </div>
        </header>

        @yield('content')


        <!-- Footer-->
        <footer class="py-5 bg-dark" style="margin-bottom:0;">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Javascript Src -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('js/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
