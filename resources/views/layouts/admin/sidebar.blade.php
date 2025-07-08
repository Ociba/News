<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ asset('asset/img/news.png')}}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/dashboard">
                            <i class="ni ni-tv-2 text-default"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/section">
                            <i class="ni ni-planet text-default"></i>
                            <span class="nav-link-text">Page Sections</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/category">
                            <i class="ni ni-pin-3 text-default"></i>
                            <span class="nav-link-text">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news">
                            <i class="ni ni-single-02 text-default"></i>
                            <span class="nav-link-text">News</span>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="/photos-to-sell">
                            <i class="fas fa-image text-default"></i>
                            <span class="nav-link-text">Photos To Sell</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/adverts">
                            <i class="fas fa-bullhorn text-default"></i>
                            <span class="nav-link-text">Adverts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gallery">
                            <i class="ni ni-bullet-list-67 text-default"></i>
                            <span class="nav-link-text">Gallery</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Setting</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="/users">
                        <i class="ni ni-spaceship"></i>
                        <span class="nav-link-text">Users</span>
                    </a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-send text-dark"></i>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <span class="nav-link-text"><button type="submit" class="">Logout</button></span>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>