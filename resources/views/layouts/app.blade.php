<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo3.png" alt="Mawqa3y"
                                    srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        
                        @if (request()->session()->get('IsAdmin'))
                        <li class="sidebar-item active ">
                            <a href="/" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Users</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('users.index') }}">Index</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('users.create') }}">Create</a>
                                </li>                                
                                <li class="submenu-item ">
                                    <a href="{{ route('users.show',request()->session()->get('LoginID')) }}">My Profile</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="sidebar-item active ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Welcome</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('users.show',request()->session()->get('LoginID')) }}" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        @endif
                        

                        <li class="sidebar-title">
                            <div class="d-flex flex-column align-items-center text-center">
                                <form action="{{ route('users.logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn icon icon-left bg-danger" style="color:aliceblue">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            @yield('content')


            {{-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>



    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
