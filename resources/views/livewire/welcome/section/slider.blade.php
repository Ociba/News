<div>
    {{-- Stop trying to control. --}}
    <div class="owl-carousel main-carousel position-relative">
        @foreach($slider_news as $slider)
        <div class="position-relative overflow-hidden" style="height: 500px;">
            <img class="img-fluid h-100" src="{{ asset('storage/news/photo/'.$slider->photo)}}" style="object-fit: cover;">
            <div class="overlay">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                        href="{{URL::signedRoute('Details',[$slider->id])}}">{{ $slider->category->category }}</a>
                    <a class="text-white" href="{{URL::signedRoute('Details',[$slider->id])}}">{{ $slider->created_at->format('l d F, Y h:i A') }}</a>
                </div>
                <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="{{URL::signedRoute('Details',[$slider->id])}}">{{ $slider->content }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>