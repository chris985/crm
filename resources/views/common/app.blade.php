
<!DOCTYPE html>
<html lang="en" style="background: #F5F5F5">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- Check for page title variable, if undefined, show application name --}}
    <title>@hasSection('title')@yield('title') | Starstation @else Starstation @endif
    </title>
    <link rel="icon" type="image/x-icon" href="/symfony/web/favicon.ico" /> <!-- App Icon -->
    {{-- Dependent CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"> <!-- Bootstrap CSS Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> <!-- Font Awesome CSS --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" /> <!-- Select 2 CSS -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> <!-- Material Font Import -->

    {{-- Temporary embedded styles --}}
    <style type="text/css">
        body {
            font-family: 'Noto Sans', "Roboto", "Helvetica", "Arial", sans-serif; sans-serif;
        }
        /* Make Select2 boxes match Bootstrap boxes */
        .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple { 
            border: 1px solid rgba(0,0,0,.15);
        }
        .select2-container--default.select2-container--focus .select2-selection--single, .select2-container--default.select2-container--focus .select2-selection--multiple, .select2-container--default.select2-container--focus .select2-selection--single:hover, .select2-container--default.select2-container--focus .select2-selection--multiple:hover {
            border: 1px solid #5cb3fd;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
            font-size: 1rem;
            color: #636c72;
        }
        .select2-container .select2-selection--single {
            height: 38px;
        }
        /* Bootstrap overrides, reset colors on some elements */
        nav#nav a, #sub a {
            color: rgba(255,255,255,.5)
        }
        nav#nav p, #sub nav p, nav#nav .nav-item.active a, #sub nav .nav-item.active a, nav#nav .navbar-brand a, #sub nav h1 {
            color: #FFF;
        }
        .nav-text {
            color: inherit;
        }
        .nav-text:hover {
            text-decoration: none;
        }
        .btn-link {
            color: rgba(255,255,255,.5)
        }
        a, button {
            color: inherit;
        }
        /* Add some basic Material styling */
        .material-blue, nav#nav, #sub {
            background-color: #0091ea; 
        }
        html, body {
            background: #f5f5f5;
            height: 100%;
        }
        main {
            background: #FFF;
            box-shadow: 0px 4px 5px -2px rgba(0, 0, 0, 0.2), 0px 7px 10px 1px rgba(0, 0, 0, 0.14), 0px 2px 16px 1px rgba(0, 0, 0, 0.12);
        }
        #nav {
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            border-bottom: 1px solid #009af9;
        }
        .card {
            border: none;
        }
        /* Compressed Card-List Component, for paginated lists of cards */
        .card-list .card {
            background: none;
            border-top: none;
            border-right: none;
            border-left: none;
            border-radius: 0;
        }
        .card-list .card:hover {
            background: #FFF;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            border-bottom: 1px solid #FFFFFF;
            border-radius: 0.125rem;
        }
        /* A heavily-shadowed Card-Open focused card */
        .card-open {
            box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
        }
        /* Mainly for login pages, a centered card about half the width of the screen*/
        .card-centered {
            width: 25em;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    {{-- Injection point for temporary page-specific CSS --}}
    @hasSection('css')
    <style type="text/css">
        @yield('css')
    </style>
    @endif
</head>
<body>
    <nav id="nav" class="navbar navbar-toggleable-md navbar-inverse sticky-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#topnav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-brand mr-auto"><a href="{{ route('index') }}"><i class="fa fa-bars fa-fw mr-1"></i>Station</a></div>
        <div class="collapse navbar-collapse" id="topnav">
            {{-- Check if logged in --}}
            @if (Auth::check()) 
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link disabled" href="{{ route('tasks.index') }}"><i class="fa fa-leaf fa-fw"></i>&nbsp;Tasks</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('people.index') }}"><i class="fa fa-group fa-fw"></i>&nbsp;People</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('places.index') }}"><i class="fa fa-building fa-fw"></i>&nbsp;Places</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#"><i class="fa fa-money fa-fw"></i>&nbsp;Money</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#"><i class="fa fa-clock-o fa-fw"></i>&nbsp;Times</a></li>
                <li class="nav-item mr-3"><a class="nav-link disabled" href="#"><i class="fa fa-puzzle-piece fa-fw"></i>&nbsp;Things</a></li>
                <li class="nav-item dropdown hidden-xs-up"> {{-- Future notification system --}}
                    <a class="dropdown-toggle nav-link" href="#" id="UserNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o fa-lg fa-fw"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="UserNotification">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action" href="#">
                                <small>1 s</small>
                                <p class="mb-1"><i class="fa fa-eye-slash"></i>&nbsp;Notifications are disabled.</p>
                                <small>You can enable notifications under settings.</small>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item dropdown-toggle mr-3" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" width="40" height="40" src="https://randomuser.me/api/portraits/men/5.jpg" alt=""></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item text-muted disabled" href="#"><i class="fa fa-user fa-fw"></i>&nbsp;Profile</a>
                        <a class="dropdown-item text-muted disabled" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;Settings</a>
                        <a class="dropdown-item text-muted disabled" href="#"><i class="fa fa-question-circle fa-fw"></i>&nbsp;Help</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-muted" href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" disabled>
                    </form>
                </li>
            </ul>
            @else {{-- If not logged in, show login and registration menu items --}}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-key fa-fw"></i>&nbsp;Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus fa-fw"></i>&nbsp;Register</a></li>
                @endif
            </ul>
        </div>
    </nav>
    {{-- Open form early so variables are available to us and the navigation can function properly --}}
    @yield('form-open')
    <div id="sub" style="padding-bottom: 50px;">
        <nav class="navbar navbar-inverse py-3 px-3">
            <ul class="nav row align-items-center px-3">
                {{-- For ease of testing, the "back" button just takes one history step back. Eventually each page will have a seperate "back" step. Backing out of "Edit Person" will bring you to "Show Person" where as Backing out of "Show Person" will bring you to "Index People" --}}
                @yield('back', '<li class="nav-item"><a href="javascript:history.go(-1)"><i class="fa fa-arrow-left fa-fw mr-1"></i></a></li>')
                <li class="nav-item hidden-sm-down">
                    {{-- The Page title is reused and spit out in the sub navigation --}}
                    <a class="nav-link" href="#"><h1 class="">@yield('title')</h1></a>
                </li>
                {{-- If the user can take any actions on the page, spit out list items as linked icons. Ex: New, Edit, Delete --}}
                @yield('actions')
            </ul>
        </nav>
    </div>
    {{-- Use page variable to specify page-specific css classes. This will eventually be cleaned up to the page title or just targeted CSS --}}
    <main class="@yield('page')" style="margin-top: -50px;">
        {{-- If logged in, show main navigation --}}
        @yield('content')
    </main>
    {{-- Close a form if it is open --}}
    @yield('form-close') 
    <footer id="footer" class="py-3 px-3">
        {{-- Footer copyright --}}
        <p class="py-3 px-3" style="text-align: center;">&copy; 2017 Starcresc Interactive</p>
    </footer>
    {{-- Dependent scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- JQuery JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script> <!-- Tether -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script> <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> <!-- Select2 JS -->
    <script type="text/javascript">
        $('select').select2();
        $( document ).ready(function() {
            $(".dropdown-button").dropdown();
        });
    </script> <!-- Initialize Boostrap Components and Select2 -->
    {{-- If there is a modal dialog, such as a delete confirmation, load it in here --}}
    @hasSection('modal')
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                @yield('modal')
            </div>
        </div>
    </div>
    @endif
    {{-- You can all this section for any temporary page-specific JS --}}
    @hasSection('js')
    @yield('js')
    @endif
</body>
</html>
