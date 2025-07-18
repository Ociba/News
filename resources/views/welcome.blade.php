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


    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                @livewire('welcome.section.slider')
            </div>
            <div class="col-lg-5 px-0">
                @livewire('welcome.section.headlines')
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            @livewire('welcome.section.breaking-news')
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="containe">
            @livewire('welcome.section.featured-news')
        </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="containe">
            <div class="row">
                <div class="col-lg-8">
                    @livewire('welcome.section.latest-news')
                </div>
                
                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    @livewire('welcome.section.social-links')
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    @livewire('welcome.section.advertisement')
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    @livewire('welcome.section.trending-news')
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    {{--@livewire('welcome.section.news-letter')--}}
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    @livewire('welcome.section.category-tags')
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    @include('layouts.front.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    @include('layouts.front.javascript')
</body>

</html>