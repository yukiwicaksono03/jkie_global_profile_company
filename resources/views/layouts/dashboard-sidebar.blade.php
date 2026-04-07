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
                    <li class="{{ Request::is('admin/slider') ? 'active' : '' }}">
                        <a href="/admin/slider"><i class="menu-icon fa fa-home"></i>SLIDER HOME (VIDEO)</a>
                    </li>

                    <li class="{{ Request::is('admin/menu/1') ? 'active' : '' }}">
                        <a href="/admin/menu/1"><i class="menu-icon fa fa-align-left"></i>SERVICE & PRODUCTS</a>
                    </li>

                    <li class="{{ Request::is('admin/menu/2') ? 'active' : '' }}">
                        <a href="/admin/menu/2"><i class="menu-icon fa fa-shopping-cart"></i>INSIGHTS</a>
                    </li>

                    <li class="{{ Request::is('admin/menu/3') ? 'active' : '' }}">
                        <a href="/admin/menu/3"><i class="menu-icon fa fa-list"></i>CLIENTS</a>
                    </li>

                    <li class="{{ Request::is('admin/menu/4') ? 'active' : '' }}">
                        <a href="/admin/menu/4"><i class="menu-icon fa fa-suitcase"></i>CAREERS</a>
                    </li>

                    <!-- <li class="{{ Request::is('admin/category') ? 'active' : '' }}">
                        <a href="/admin/category"><i class="menu-icon fa fa-archive"></i>Kategori</a>
                    </li>

                    <li class="{{ Request::is('admin/facility') ? 'active' : '' }}">
                        <a href="/admin/facility"><i class="menu-icon fa fa-info"></i>Fasilitas</a>
                    </li> -->
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