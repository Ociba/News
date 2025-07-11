<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
    <a href="index.html" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-uppercase text-primary">Explore<span class="text-white font-weight-normal">Africa</span></h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="/" class="nav-item nav-link active">Home</a>
            <a href="{{URL::signedRoute('News Category',['politics'])}}" class="nav-item nav-link">Politics</a>
            <a href="{{URL::signedRoute('News Category',['travel'])}}" class="nav-item nav-link">Travel</a>
            <a href="{{URL::signedRoute('News Category',['tourism'])}}" class="nav-item nav-link">Tourism</a>
            <a href="{{URL::signedRoute('News Category',['business'])}}" class="nav-item nav-link">Business</a>
            <a href="{{URL::signedRoute('News Category',['health'])}}" class="nav-item nav-link">Health</a>
            <a href="{{URL::signedRoute('News Category',['life style'])}}" class="nav-item nav-link">Life Style</a>
            <a href="{{URL::signedRoute('News Category',['entertainment'])}}" class="nav-item nav-link">Entertainment</a>
            <a href="{{URL::signedRoute('News Category',['sports'])}}" class="nav-item nav-link">Sports</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="{{URL::signedRoute('News Category',['corporate'])}}" class="dropdown-item">Corporate</a>
                    <a href="{{URL::signedRoute('News Category',['education'])}}" class="dropdown-item">Education</a>
                    <a href="{{URL::signedRoute('News Category',['technology'])}}" class="dropdown-item">Technology</a>
                    <a href="{{URL::signedRoute('News Category',['culture'])}}" class="dropdown-item">Culture</a>
                    <a href="{{URL::signedRoute('News Category',['food'])}}" class="dropdown-item">Food</a>
                </div>
            </div>
            <a href="{{URL::signedRoute('News Category',['farming'])}}" class="nav-item nav-link">Farming</a>
        </div>
        {{--<div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
            <input type="text" class="form-control border-0" placeholder="Keyword">
            <div class="input-group-append">
                <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                        class="fa fa-search"></i></button>
            </div>
        </div>--}}
    </div>
</nav>