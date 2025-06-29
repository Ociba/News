<!DOCTYPE html>
<html lang="en">

<head>
   @include('layouts.front.css')
</head>

<body>
    <!-- Topbar Start -->
    @include('layouts.front.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        @include('layouts.front.mobile_menu')
    </div>
    <!-- Navbar End -->

    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- Footer Start -->
    @include('layouts.front.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    @include('layouts.front.javascript')
</body>

</html>