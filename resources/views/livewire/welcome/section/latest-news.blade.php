<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
        </div>
        @foreach($latests as $latest)
        <div class="col-lg-6">
            <div class="position-relative mb-3">
                <img class="img-fluid w-100" src="{{ asset('storage/news/photo/'.$latest->photo)}}" style="object-fit: cover; height: 235px;">
                <div class="bg-white border border-top-0 p-4">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                            href="{{URL::signedRoute('Details',[$latest->id])}}">{{ $latest->category->category }}</a>
                        <a class="text-body" href="{{URL::signedRoute('Details',[$latest->id])}}"><small>{{ $latest->created_at->format('l d F, Y ') }}</small></a>
                    </div>
                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{URL::signedRoute('Details',[$latest->id])}}">{{ Str::limit($latest->title,25) }}</a>
                    <p class="m-0">{{ Str::limit($latest->content, 80) }}</p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-lg-12 mb-3">
            <a href=""><img class="img-fluid w-100" src="{{ asset('asset/img/ads.png')}}" alt=""></a>
        </div>
        @livewire('welcome.section.pan-african-news')
        <div class="col-lg-12 mb-3">
            <a href=""><img class="img-fluid w-100" src="{{ asset('asset/img/ads.png')}}" alt=""></a>
        </div>
        <div class="col-lg-12 mb-5">
            <div class="row news-lg mx-0 mb-3 d-flex align-items-stretch">
                <!-- Slider Column -->
                <div class="col-md-6 p-0">
                    <a href="{{URL::signedRoute('More Photos')}}">
                        <div id="slider" style="position: relative; width: 100%; height: 400px; overflow: hidden;">
                            @foreach($photos_on_sales as $index => $photo)
                            <img
                                src="{{ asset('storage/photos/' . $photo->image_with_watermark) }}"
                                alt="{{ $photo->title }}"
                                class="slide"
                                style="width: 100%; height: 400px;object-fit: cover; position: absolute; top: 0; left: 0; opacity: {{ $index === 0 ? 1 : 0 }}; transition: opacity 1s ease;">
                            @endforeach
                        </div>
                    </a>
                </div>

                <!-- Content Column -->
                <div class="col-md-6 d-flex flex-column border bg-white p-0">
                    <div class="p-4 flex-grow-1 d-flex flex-column">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="{{URL::signedRoute('More Photos')}}">New</a>
                            <a class="text-body" href="{{URL::signedRoute('More Photos')}}"><small>{{ date('F j, Y') }}</small></a>
                        </div>
                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{URL::signedRoute('More Photos')}}">Purchase Photo</a>
                        <p class="m-0 flex-grow-1">Get affordable, high-quality photography here.<br><a href="{{URL::signedRoute('More Photos')}}">see more photos.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('welcome.section.click-bait')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let slides = document.querySelectorAll('#slider .slide');
            let current = 0;
            const total = slides.length;

            setInterval(() => {
                slides[current].style.opacity = 0; // hide current
                current = (current + 1) % total; // next index
                slides[current].style.opacity = 1; // show next
            }, 3000); // change every 3 seconds
        });
    </script>
</div>