<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand" href="dashboard.html">
                <b class="logo-icon">
                    <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff" alt="homepage" />
                </b>
            </a>

            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-none d-md-block d-lg-none">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto d-flex align-items-center">
                <li class="pr-5 mr-3">
                    <div class="dropdown">
                        <a class="profile-pic dropdown-toggle" href="javascript:void(0)" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?format=SVG&length=2&name={{auth()->user()->name}}&rounded=true"
                                alt="user-img" width="36" class="img-circle">
                            <span class="text-white font-medium">{{auth()->user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-user mr-2"></i>Profil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('setting.index')}}">
                                    <i class="fa fa-cog mr-2"></i>Pengaturan
                                </a>
                            </li>
                            <li class="divider">
                                <hr class="w-75 my-0">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        <i class='fa fa-power-off mr-2'></i>Keluar
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>