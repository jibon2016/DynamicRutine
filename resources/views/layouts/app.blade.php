    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dynamic Routine System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{ asset('asset') }}/vendor/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
        <!-- Google fonts - Popppins for copy-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
        <!-- orion icons-->
        <link rel="stylesheet" href="{{ asset('asset') }}/css/orionicons.css">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{ asset('asset') }}/css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{ asset('asset') }}/css/custom.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('asset') }}/img/favicon.png?3">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body>
        <!-- navbar-->
        <header class="header">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">Dynamic Routine System</a>
            <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
            <li class="nav-item">
                <form id="searchForm" class="ml-auto d-none d-lg-block">
                <div class="form-group position-relative mb-0">
                    <button type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
                    <input type="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
                </div>
                </form>
            </li>
            <li class="nav-item dropdown mr-3"><a id="notifications" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1"><i class="fa fa-bell"></i><span class="notification-icon"></span></a>
                <div aria-labelledby="notifications" class="dropdown-menu"><a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                    <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                    <div class="text ml-2">
                        <p class="mb-0">You have 2 followers</p>
                    </div>
                    </div></a><a href="#" class="dropdown-item"> 
                    <div class="d-flex align-items-center">
                    <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                    <div class="text ml-2">
                        <p class="mb-0">You have 6 new messages</p>
                    </div>
                    </div></a><a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                    <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>
                    <div class="text ml-2">
                        <p class="mb-0">Server rebooted</p>
                    </div>
                    </div></a><a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                    <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                    <div class="text ml-2">
                        <p class="mb-0">You have 2 followers</p>
                    </div>
                    </div></a>
                <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small class="font-weight-bold headings-font-family text-uppercase">View all notifications</small></a>
                </div>
            </li>
            <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="{{ asset('asset') }}/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
                <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">{{Auth::user()->name }}</strong><small>DIU</small></a>
                <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log       </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
            </li>
            </ul>
        </nav>
        </header>
        <div class="d-flex align-items-stretch">
        @if (Auth::user()->role == 'admin')
            <div id="sidebar" class="sidebar py-3">
                <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
                <ul class="sidebar-menu list-unstyled">
                    <li class="sidebar-list-item"><a href="{{ route('home') }}" class="sidebar-link text-muted @if($manu == 'Home') active @endif"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>

                    <li class="sidebar-list-item">
                        <a href="{{ route('form') }}" class="sidebar-link text-muted @if($manu == 'Form') active @endif"><i class="o-survey-1 mr-3 text-gray"></i><span>Create Routine</span></a></li>

                <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted @if($manu == 'Routine') active @endif"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Routine</span></a>
                    <div id="pages" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                        <li class="sidebar-list-item"><a href="{{ url('showRoutine') }}" class="sidebar-link text-muted @if($manu == 'Routine') active @endif pl-lg-5">2022</a></li>
                        
                    </ul>
                    </div>
                </li>
                </ul>
                <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
                <ul class="sidebar-menu list-unstyled">
                    <li class="sidebar-list-item"><a href="{{ route('subjects.index') }}" class="sidebar-link text-muted @if($manu == 'Subject') active @endif"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Subjects</span></a></li>
                    <li class="sidebar-list-item"><a href="{{ route('teachers.index') }}" class="sidebar-link text-muted @if($manu == 'Teacher') active @endif"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Teachers</span></a></li>
                    <li class="sidebar-list-item"><a href="{{ route('batchs.index') }}" class="sidebar-link text-muted @if($manu == 'Batch') active @endif"><i class="o-table-content-1 mr-3 text-gray"></i><span>Batchs</span></a></li>
                </ul>
            </div>
        @endif

        @if (Auth::user()->role == 'teacher')
        <div id="sidebar" class="sidebar py-3">
            <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-list-item"><a href="{{ route('home') }}" class="sidebar-link text-muted @if($manu == 'Home') active @endif"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>

            <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Routine</span></a>
                <div id="pages" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="/routineTeacher " class="sidebar-link text-muted pl-lg-5">2022</a></li>
                </ul>
                </div>
            </li>
            </ul>
        </div>
        @endif

        @yield('content')
    </div>

        
        <!-- JavaScript files-->
        <script src="{{ asset('asset') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('asset') }}/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="{{ asset('asset') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('asset') }}/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="{{ asset('asset') }}/vendor/chart.js/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
        <script src="{{ asset('asset') }}/js/charts-home.js"></script>
        <script src="{{ asset('asset') }}/js/front.js"></script>
        
        @yield('js')
    </body>
    </html>