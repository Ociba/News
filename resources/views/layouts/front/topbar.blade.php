<style>
    .image-text-slider {
        position: relative;
        width: 100%;
        height: 150px;
        /* Adjust based on your needs */
        overflow: hidden;
    }

    .slide2 {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .slide2.active {
        opacity: 1;
    }

    .slide2 img {
        max-height: 80px;
        width: auto;
    }

    .slide-text {
        width: 50%;
        padding: 0 20px;
        text-align: left;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .slide2 {
            flex-direction: column;
        }

        .slide2 img {
            max-width: 100%;
            height: auto;
        }

        .slide-text {
            width: 100%;
            padding: 10px 0;
            text-align: center;
        }
    }
</style>
<div class="container-fluid">
    <!-- Top Dark Bar -->
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-md-9">
            <nav class="navbar navbar-expand bg-dark p-0">
                <ul class="navbar-nav">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-white small" href="#">
                            <span id="current-date">Monday, January 1, 2045</span>
                        </a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-white small" href="#">Advertise</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-white small" href="/contact-us">Contact</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-white small" href="/about-us">About Us</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-md-3">
            <nav class="navbar navbar-expand bg-dark p-0">
                <ul class="navbar-nav ml-lg-auto justify-content-center justify-content-lg-end justify-content-sm-center">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><small class="fab fa-twitter"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><small class="fab fa-facebook-f"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><small class="fab fa-linkedin-in"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><small class="fab fa-instagram"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><small class="fab fa-google-plus-g"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><small class="fab fa-youtube"></small></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Logo and Slider Section -->
    <div class="row align-items-center bg-white py-1 px-lg-5">
        <div class="col-md-4">
            <a href="/" class="navbar-brand p-0">
                <img class="img-fluid" src="{{ asset('asset/img/news.png')}}" style="max-height: 90px; width: auto;" alt="News Logo">
            </a>
        </div>

        <div class="col-md-8">
            <!-- Image/text slider container -->
            <div class="image-text-slider">
                <!-- Slide 1 -->
                <div class="slide2 active">
                    <img class="img-fluid w-100" src="{{ asset('asset/img/elgon.jpg')}}" alt="Mountain Elgon">
                    <div class="slide-text">
                        <h5>Mountain Elgon</h5>
                        <p>Get 20% off on all products this week only!</p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="slide2">
                    <img class="img-fluid w-100" src="{{ asset('asset/img/ads.png')}}" alt="Advertisement">
                    <div class="slide-text">
                        <h5>New Arrivals</h5>
                        <p>Check out our latest collection just arrived!</p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="slide2">
                    <img class="img-fluid w-100" src="{{ asset('asset/img/hotsprings.jpeg')}}" alt="Uganda Hotsprings">
                    <div class="slide-text">
                        <h5>Uganda Hotsprings</h5>
                        <p>Don't miss our exclusive deals ending soon!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slide2');
        let currentSlide = 0;

        function nextSlide() {
            // Hide current slide
            slides[currentSlide].classList.remove('active');

            // Move to next slide
            currentSlide = (currentSlide + 1) % slides.length;

            // Show next slide
            slides[currentSlide].classList.add('active');
        }

        // Start the slider (change 3000 to adjust interval in milliseconds)
        setInterval(nextSlide, 3000);
    });
</script>