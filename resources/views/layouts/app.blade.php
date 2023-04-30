<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mawq3i</title>

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
        {{-- <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <h1 class="auth-title text-center mt-5">Mawq3i</h1>
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        
                        
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
                                    @if (request()->session()->get('LoginID') != null)
                                    <a href="{{ route('users.show', ['username' => request()->session()->get('LoginID')]) }}">My Profile</a>
                                    @endif
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
                            @if (request()->session()->get('LoginID') != null)
                            <a href="{{ route('users.show', ['username' => request()->session()->get('LoginID')]) }}" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                            @endif
                        </li>
                        @endif
                        

                        <li class="sidebar-title">
                            <div class="d-flex flex-column align-items-center text-center">
                                <form action="{{ route('users.logout') }}" method="post">
                                    @csrf
                                    @if (request()->session()->get('LoginID') != null)
                                    <button type="submit" class="btn icon icon-left bg-danger" style="color:aliceblue">Logout</button>
                                    @else
                                    <a class="btn icon icon-left bg-primary" href="{{ route('users.login') }}"  style="color:aliceblue">Login</a>
                                    @endif
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div> --}}
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <h1 class="auth-title text-center mt-5">Mawq3i</h1>
                        <div class="header-top-right">

                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            @if (request()->session()->get('IsAdmin'))
                                <li class="menu-item  ">
                                    <a href="/" class='menu-link'>
                                        <i class="bi bi-grid-fill"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="menu-item  has-sub">
                                    <a href="#" class='menu-link'>
                                        <i class="bi bi-stack"></i>
                                        <span>System Users</span>
                                    </a>
                                    <div class="submenu ">
                                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                        <div class="submenu-group-wrapper">
                                            <ul class="submenu-group">
                                                <li class="submenu-item  ">
                                                    <a href="{{ route('users.index') }}" class='submenu-link'>All
                                                        Users</a>
                                                </li>
                                                <li class="submenu-item  ">
                                                    <a href="{{ route('users.create') }}" class='submenu-link'>Create
                                                        Users</a>
                                                </li>
                                                @if (request()->session()->get('LoginID') != null)
                                                    <li class="submenu-item  ">
                                                        <a href="{{ route('users.show', ['username' => request()->session()->get('LoginID')]) }}"
                                                            class='submenu-link'>My Profile</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="menu-item  ">
                                    <a href="/" class='menu-link'>
                                        <i class="bi bi-grid-fill"></i>
                                        <span>Welcome</span>
                                    </a>
                                </li>
                                <li class="menu-item  ">
                                    @if (request()->session()->get('LoginID') != null)
                                        <a href="{{ route('users.show', ['username' => request()->session()->get('LoginID')]) }}"
                                            class='menu-link'>
                                            <i class="bi bi-grid-fill"></i>
                                            <span>My Profile</span>
                                        </a>
                                    @endif
                                </li>
                            @endif
                            <li class="menu-item">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <form action="{{ route('users.logout') }}" method="post">
                                        @csrf
                                        @if (request()->session()->get('LoginID') != null)
                                            <button type="submit" class="btn icon icon-left bg-danger"
                                                style="color:aliceblue">Logout</button>
                                        @else
                                            <a class="btn icon icon-left bg-primary" href="{{ route('users.login') }}"
                                                style="color:aliceblue">Login</a>
                                        @endif
                                    </form>
                                </div>
                            </li>
                        </ul>



                        </ul>
                    </div>
                </nav>

            </header>
            <div class="content-wrapper container">
                @yield('content')

            </div>
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
    <script src="{{ asset('assets/js/pages/horizontal-layout.js') }}"></script>
</body>

</html>
