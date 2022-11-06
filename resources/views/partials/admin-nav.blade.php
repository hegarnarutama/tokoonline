<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/logo2.png') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li class="{{ Request::is('admin/produk') ? 'active' : '' }}">
                    <a href="{{ route('admin.produk') }}"> <i class="menu-icon fa fa-cutlery"></i>Produk</a>
                </li>
                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a href="{{ route('admin.produk') }}"> <i class="menu-icon fa fa-clipboard"></i>Pesanan</a>
                </li>
                <li class="{{ Request::is('admin/produk') ? 'active' : '' }}">
                    <a href="{{ route('admin.produk') }}"> <i class="menu-icon fa fa-repeat"></i>Retur</a>
                </li>
                <li class="{{ Request::is('admin/produk') ? 'active' : '' }}">
                    <a href="{{ route('admin.produk') }}"> <i class="menu-icon fa fa-file"></i>Laporan</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->