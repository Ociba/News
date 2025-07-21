<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
    <a href="{{ url('/') }}" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-uppercase text-primary">Explore<span class="text-white font-weight-normal">Africa</span></h1>
    </a>

    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            @php
                $currentRoute = Route::currentRouteName();
                $currentCategory = ($currentRoute === 'News Category') 
                    ? strtolower(request()->route('category')) 
                    : null;
            @endphp

            <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>

            <a href="{{ URL::signedRoute('News Category', ['tourism']) }}" class="nav-item nav-link {{ $currentCategory === 'tourism' ? 'active' : '' }}">Tourism</a>
            <a href="{{ URL::signedRoute('News Category', ['trade']) }}" class="nav-item nav-link {{ $currentCategory === 'trade' ? 'active' : '' }}">Trade</a>
            <a href="{{ URL::signedRoute('News Category', ['investiment']) }}" class="nav-item nav-link {{ $currentCategory === 'investiment' ? 'active' : '' }}">Investiment</a>
            <a href="{{ URL::signedRoute('News Category', ['politics']) }}" class="nav-item nav-link {{ $currentCategory === 'politics' ? 'active' : '' }}">Politics</a>
            <a href="{{ URL::signedRoute('News Category', ['panafrican']) }}" class="nav-item nav-link {{ $currentCategory === 'panafrican' ? 'active' : '' }}">Pan&nbsp;African</a>
            <a href="{{ URL::signedRoute('News Category', ['culture']) }}" class="nav-item nav-link {{ $currentCategory === 'culture' ? 'active' : '' }}">Culture</a>
            <a href="{{ URL::signedRoute('News Category', ['business']) }}" class="nav-item nav-link {{ $currentCategory === 'business' ? 'active' : '' }}">Business</a>
            <a href="{{ URL::signedRoute('News Category', ['city']) }}" class="nav-item nav-link {{ $currentCategory === 'city' ? 'active' : '' }}">City</a>
            <a href="{{ URL::signedRoute('News Category', ['conference']) }}" class="nav-item nav-link {{ $currentCategory === 'conference' ? 'active' : '' }}">Conference</a>

            <!-- Dropdown Menu -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ in_array($currentCategory, ['life style','entertainment','swahil','opinion','sports','gossip','development','corporate','education','technology','food','farming']) ? 'active' : '' }}" data-toggle="dropdown">More</a>
                <div class="dropdown-menu rounded-0 m-0">
                <a href="{{ URL::signedRoute('News Category', ['health']) }}" class="dropdown-item {{ $currentCategory === 'health' ? 'active' : '' }}">Health</a>
                    <a href="{{ URL::signedRoute('News Category', ['life style']) }}" class="dropdown-item {{ $currentCategory === 'life style' ? 'active' : '' }}">Life Style</a>
                    <a href="{{ URL::signedRoute('News Category', ['entertainment']) }}" class="dropdown-item {{ $currentCategory === 'entertainment' ? 'active' : '' }}">Entertainment</a>
                    <a href="{{ URL::signedRoute('News Category', ['conference']) }}" class="dropdown-item {{ $currentCategory === 'conference' ? 'active' : '' }}">Conference</a>
                    <a href="{{ URL::signedRoute('News Category', ['swahil']) }}" class="dropdown-item {{ $currentCategory === 'swahil' ? 'active' : '' }}">Swahil</a>
                    <a href="{{ URL::signedRoute('News Category', ['opinion']) }}" class="dropdown-item {{ $currentCategory === 'opinion' ? 'active' : '' }}">Opinion</a>
                    <a href="{{ URL::signedRoute('News Category', ['sports']) }}" class="dropdown-item {{ $currentCategory === 'sports' ? 'active' : '' }}">Sports</a>
                    <a href="{{ URL::signedRoute('News Category', ['gossip']) }}" class="dropdown-item {{ $currentCategory === 'gossip' ? 'active' : '' }}">Gossip</a>
                    <a href="{{ URL::signedRoute('News Category', ['development']) }}" class="dropdown-item {{ $currentCategory === 'development' ? 'active' : '' }}">Development</a>
                    <a href="{{ URL::signedRoute('News Category', ['corporate']) }}" class="dropdown-item {{ $currentCategory === 'corporate' ? 'active' : '' }}">Corporate</a>
                    <a href="{{ URL::signedRoute('News Category', ['education']) }}" class="dropdown-item {{ $currentCategory === 'education' ? 'active' : '' }}">Education</a>
                    <a href="{{ URL::signedRoute('News Category', ['technology']) }}" class="dropdown-item {{ $currentCategory === 'technology' ? 'active' : '' }}">Technology</a>
                    <a href="{{ URL::signedRoute('News Category', ['food']) }}" class="dropdown-item {{ $currentCategory === 'food' ? 'active' : '' }}">Food</a>
                    <a href="{{ URL::signedRoute('News Category', ['farming']) }}" class="dropdown-item {{ $currentCategory === 'farming' ? 'active' : '' }}">Farming</a>
                </div>
            </div>

            <a href="{{ URL::signedRoute('News Category', ['pdm']) }}" class="nav-item nav-link {{ $currentCategory === 'pdm' ? 'active' : '' }}">PDM</a>
        </div>
    </div>
</nav>
