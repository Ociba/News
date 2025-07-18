<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
    @foreach($populars as $popular)
    <div class="mb-3">
        <div class="mb-2">
            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{URL::signedRoute('Details',[$popular->id])}}">{{ $popular->category->category }}</a>
            <a class="text-body" href="{{URL::signedRoute('Details',[$popular->id])}}"><small>{{ $popular->created_at->format('l d F, Y ') }}</small></a>
        </div>
        <a class="small text-body text-uppercase font-weight-medium" href="{{URL::signedRoute('Details',[$popular->id])}}">{{ Str::limit($popular->title,25) }}</a>
    </div>
    @endforeach
</div>