<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="section-title">
        <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
    </div>
    <div class="owl-carousel news-carousel carousel-item-4 position-relative">
        @foreach($featured_news as $feature)
        <div class="position-relative overflow-hidden" style="height: 300px;">
            <img class="img-fluid h-100" src="{{ asset('storage/news/photo/'. $feature->photo )}}" style="object-fit: cover;">
            <div class="overlay">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                        href="">{{ $feature->category->category }}</a>
                    <a class="text-white" href=""><small>{{ $feature->created_at->format('l d F, Y ') }}</small></a>
                </div>
                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">{{ $feature->title }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>