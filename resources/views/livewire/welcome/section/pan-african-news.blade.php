<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <div class="col-12">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Pan African News</h4>
            <a class="text-secondary font-weight-medium text-decoration-none" href="#">View All</a>
        </div>
    </div>

    <div class="col-lg-6">
        @foreach($pan_african_news as $new)
        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
            <img class="img-fluid" src="{{ asset('storage/news/photo/'.$new->photo)}}" alt="">
            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{URL::signedRoute('Details',[$new->id])}}">{{ $new->category->category }}</a>
                    <a class="text-body" href="{{URL::signedRoute('Details',[$new->id])}}"><small>{{ $new->created_at->format('l d F, Y ') }}</small></a>
                </div>
                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{URL::signedRoute('Details',[$new->id])}}">{{ Str::limit($new->title,25) }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>