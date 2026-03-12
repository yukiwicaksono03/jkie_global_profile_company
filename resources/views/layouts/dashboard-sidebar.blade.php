<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#"><img src="{{ asset('images/berma.png') }}"alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('admin/home') ? 'active' : '' }}">
                        <a href="/admin/home"><i class="menu-icon fa fa-dashboard"></i>Home</a>
                    </li>
                    <li class="menu-item-has-children dropdown {{ Request::is('admin/slider*') || Request::is('admin/gallery*') ? 'show' : '' }}">
                        <a href="#"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="{{ Request::is('admin/slider*') || Request::is('admin/gallery*') ? 'true' : 'false' }}">
                            <i class="menu-icon fa fa-photo"></i>Photos
                        </a>

                        <ul class="sub-menu children dropdown-menu {{ Request::is('admin/slider*') || Request::is('admin/gallery*') ? 'show' : '' }}">
                            <li class="{{ Request::is('admin/slider*') ? 'active' : '' }}">
                                <i class="menu-icon fa fa-home"></i>
                                <a href="/admin/slider">Slider Home</a>
                            </li>

                            <li class="{{ Request::is('admin/gallery*') ? 'active' : '' }}">
                                <i class="menu-icon fa fa-photo"></i>
                                <a href="/admin/gallery">Gallery</a>
                            </li>

                            <li class="{{ Request::is('admin/entertainment*') ? 'active' : '' }}">
                                <i class="menu-icon fa fa-car"></i>
                                <a href="/admin/entertainment">Wahana</a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('admin/event') ? 'active' : '' }}">
                        <a href="/admin/event"><i class="menu-icon fa fa-align-left"></i>Event</a>
                    </li>

                    <li class="{{ Request::is('admin/menu') ? 'active' : '' }}">
                        <a href="/admin/menu"><i class="menu-icon fa fa-shopping-cart"></i>Menu</a>
                    </li>

                    <li class="{{ Request::is('admin/category') ? 'active' : '' }}">
                        <a href="/admin/category"><i class="menu-icon fa fa-archive"></i>Kategori</a>
                    </li>

                    <li class="{{ Request::is('admin/facility') ? 'active' : '' }}">
                        <a href="/admin/facility"><i class="menu-icon fa fa-info"></i>Fasilitas</a>
                    </li>
                    <li class="{{ Request::is('login-admin') ? 'active' : '' }}">
                        <a href="#"
                            onclick="event.preventDefault(); 
                                    if (confirm('Apakah anda yakin ingin logout?')) {
                                        document.getElementById('logout-form').submit();
                                    }">
                            <i class="menu-icon fa fa-sign-out"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>


                </ul>
            </div>
        </nav>
    </aside>