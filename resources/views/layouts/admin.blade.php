<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/admin/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('scss/style.css') }}">
    <link href="{{ asset('css/admin/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <title>Document</title>
</head>
<body>

    @include('partials.admin-nav')

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
    
            <div class="header-menu d-flex justify-content-end">
    
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <form action="{{ route('logout') }}" method="post" id="form-logout">
                            @csrf
                        </form>
                        <a class="nav-link" onclick="document.querySelector('#form-logout').submit();"><i class="fa fa-power -off"></i>Keluar</a>
                    </div>
    
                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    
        </header><!-- /header -->
        <!-- Header-->
    
    @yield('content')

    </div>

    <script src="{{ asset('js/admin/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('js/admin/plugins.js') }}"></script>
    <script src="{{ asset('js/admin/main.js') }}"></script>


    <script src="{{ asset('js/admin/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
    <script src="{{ asset('js/admin/widgets.js') }}"></script>
    <script src="{{ asset('js/admin/lib/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ asset('js/admin/lib/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('js/admin/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('js/admin/lib/vector-map/country/jquery.vmap.world.js') }}"></script>
</body>
</html>