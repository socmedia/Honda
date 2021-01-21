<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.dashboard.*') ? 'active' : ''}}"
                        href="{{route('adm.dashboard.index')}}" aria-expanded="false">
                        <i class="far fa-chart-bar" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.banner.*') ? 'active' : ''}}"
                        href="{{route('adm.banner.index')}}" aria-expanded="false">
                        <i class="fas fa-images" aria-hidden="true"></i>
                        <span class="hide-menu">Banner</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.product.*') ? 'active' : ''}}"
                        href="{{route('adm.product.index')}}" aria-expanded="false">
                        <i class="fas fa-motorcycle" aria-hidden="true"></i>
                        <span class="hide-menu">Produk</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>