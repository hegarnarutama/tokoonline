        <!-- Start Main Top -->
        <header class="main-header">
            <!-- Start Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
                <div class="container">
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                        <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a>
                    </div>
                    <!-- End Header Navigation -->
    
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#kategori">Kategori</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#tentang-kami">Tentang Kami</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#galeri">Galeri</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
    
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li>
                                <a href="{{ route('cart') }}" class="d-flex align-items-center">
                                    <i class="fa fa-shopping-bag mr-2"></i>
                                    <span class="badge"></span>
                                    <p>Keranjang</p>
                                </a>
                            </li>
                            @auth
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown">
                                    {{ auth()->user()->name }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2 bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" style="margin-left: -50px">
                                    <li>
                                        <form action="{{ route('logout') }}" method="post" id="logout-form">
                                            @csrf
                                        </form>
                                        <a onclick="document.querySelector('#logout-form').submit();">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            @endauth
                            @guest
                            <li>
                                <a href="{{ route('login') }}">
                                    <p>Masuk</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">
                                    <p>Daftar</p>
                                </a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->
                </div>
            </nav>
            <!-- End Navigation -->
        </header>
        <!-- End Main Top -->