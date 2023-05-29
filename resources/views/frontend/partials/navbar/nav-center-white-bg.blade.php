<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky bg-white dark:bg-slate-900">
    <div class="container">
        <!-- Logo container-->
        <a class="logo pl-0" href="{{ url('/') }}">
            <img src="{{ asset('foto/'.$web->logo) }}" style="height: 48px; width:auto" class="inline-block dark:hidden" alt="">
            <img src="{{ asset('foto/'.$web->logo) }}" style="height: 48px; width:auto" class="hidden dark:inline-block" alt="">
        </a>

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->   
            <ul class="navigation-menu">
                <li><a href="{{ url('/') }}" class="sub-menu-item">Home</a></li>
                <li><a href="{{ url('/news') }}" class="sub-menu-item">Kabar</a></li>
                <li><a href="{{ url('/aspirasi') }}" class="sub-menu-item">Aspirasi</a></li>
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Profil Desa</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ url('tentang-desa') }}" class="sub-menu-item">Tentang Desa</a></li>
                    </ul>
                </li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->