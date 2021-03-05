<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <!-- Core Heading -->
                <div class="sb-sidenav-menu-heading">Core</div>
                <!-- if(permissions === Customer) -->
                <!-- Core Item Dashboard -->
                <a class="nav-link" href="{{ route('dashboard') }}"
                    ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard</a
                >

                <!-- if team has a store resource -->

                @if($team->store)
                    @if(auth()->user()->can('edit products'))

                    <!-- Core Item Store -->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStore" aria-expanded="false" aria-controls="collapseStore"
                        ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Store
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                    ></a>
                    <div class="collapse" id="collapseStore" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                            <!-- Store Sub Item Products -->
                            <a class="nav-link" href="{{ route('inventory') }}">
                                Products
                            </a>

                            @if(auth()->user()->can('manage orders'))
                            <a class="nav-link" href="{{route('store-orders')}}">
                                Orders
                            </a>
                            @endif

                            <!-- Store Sub Item Settings -->
                            <a class="nav-link" href="{{ route('store-edit') }}">
                                Settings (doesn't work)
                            </a>

                            
                            <!-- Aritcle Sub Item My Articles -->
                            <!-- <a class="nav-link" href="{{ route('store-list') }}">
                                My Stores
                            </a> -->

                        </nav>
                    </div>
                    @endif
                @endif

                <!-- Core Item Settings -->
                @if(auth()->user()->can('edit resources'))
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse" id="collapseSettings" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <!-- Settings Sub Item New Resource -->
                        <a class="nav-link" href="{{ route('new-resource') }}">
                            New Resource
                        </a>

                        <!-- Settings Sub Item My Team Resources -->
                        <a class="nav-link" href="{{ route('resources') }}">
                            My Resources
                        </a>

                    </nav>
                </div>
                @endif

                @if(auth()->user()->can('edit articles') || auth()->user()->can('edit social media'))

                <!-- Interface Heading -->
                <div class="sb-sidenav-menu-heading">Interface</div>

                @can('edit articles')
                <!-- Interface Item Articles -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArticles" aria-expanded="false" aria-controls="collapseArticles"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Articles
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse" id="collapseArticles" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <!-- Aritcle Sub Item New Article -->
                        <a class="nav-link" href="{{ route('new-article') }}">
                            New Article
                        </a>

                        <!-- Aritcle Sub Item My Articles -->
                        <a class="nav-link" href="{{ route('user-articles') }}">
                            My Articles
                        </a>

                    </nav>
                </div>
                @endcan

                <!-- Interface Item Products -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                    Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse" id="collapseProducts" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <!-- Products Sub Item Inventory -->
                        <a class="nav-link" href="{{ route('inventory') }}">
                            Inventory
                        </a>
                        <a class="nav-link" href="{{ route('product-create') }}">
                            New Product
                        </a>
                    </nav>
                </div>

                @can('edit social media')
                <!-- Interface Item Social Media -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSocialMedia" aria-expanded="false" aria-controls="collapseSocialMedia"
                    ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Social Media
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse" id="collapseSocialMedia" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <!-- Social Media Sub Item Twitch -->
                        <a class="nav-link" href="{{ route('twitch') }}">
                            Twitch
                        </a>
                    </nav>
                </div>
                @endcan

                @endif
                <!-- <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                            >Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        ></a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                            >Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        ></a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                        </div>
                    </nav>
                </div> -->
                <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html"
                    ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts</a
                ><a class="nav-link" href="tables.html"
                    ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables</a
                > -->
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
