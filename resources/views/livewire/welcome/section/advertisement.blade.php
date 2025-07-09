{{--<div>
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
        </div>
        @foreach($adverts as $advert)
        <div class="bg-white text-center border border-top-0 p-3">
            <a href=""><img class="img-fluid" src="{{ asset('storage/adverts/'.$advert->image)}}" alt=""></a>
        </div>
        @endforeach
    </div>
</div>--}}
<div wire:init="startSlider" x-data>
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3" 
             x-init="
                window.addEventListener('startSliderJS', (e) => {
                    setInterval(() => {
                        @this.rotate();
                    }, e.detail.interval);
                });
             ">
            @if(count($adverts) > 0)
                <a href="{{ $adverts[$currentIndex]->link ?? '#' }}">
                    <img class="img-fluid" 
                         src="{{ asset('storage/adverts/'.$adverts[$currentIndex]->image) }}" 
                         alt="{{ $adverts[$currentIndex]->title ?? 'Advertisement' }}">
                </a>
            @else
                <p>No advertisements available</p>
            @endif
        </div>
    </div>
</div>
