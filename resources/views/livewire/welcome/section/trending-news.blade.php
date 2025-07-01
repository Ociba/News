<div>
    {{-- Stop trying to control. --}}
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            @foreach($trendings as $trend)
            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                <img class="img-fluid" src="{{ asset('storage/news/photo/'.$trend->photo)}}" alt="" style="width:100px;width:120px;">
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="#">{{ $trend->category->category }}</a>
                        <a class="text-body" href=""><small>{{ $trend->created_at->format('l d F') }}</small></a>
                    </div>
                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="#">{{ $trend->title }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>