<div>
    {{-- In work, do what you enjoy. --}}
    
    <div class="row">
    @foreach($click_baits as $bait)
    <div class="col-lg-6 col-md-6 col-sm-2 col-6 mb-3">
        <div class="bg-white h-100 p-2 border">
            <div class="mb-1">
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{URL::signedRoute('Details',[$bait->id])}}">News</a>
                <a class="text-body" href=""><small>{{ $bait->created_at->format('M d, Y') }}</small></a>
            </div>
            <a class="h6 m-0 text-secondary text-lowercase" href="{{URL::signedRoute('Details',[$bait->id])}}">{{ Str::limit($bait->title, 40) }}</a>
            <p><a class="h6 text-muted m-0" href="">{{ Str::limit($bait->content, 40) }}</a></p>
        </div>
    </div>
    @endforeach
</div>
</div>
