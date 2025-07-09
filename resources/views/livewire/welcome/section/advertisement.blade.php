<div wire:init="startSlider" x-data>
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
        </div>
        
        @if($hasAdverts)
            <div class="bg-white text-center border border-top-0 p-3" 
                 x-init="
                    window.addEventListener('startSliderJS', (e) => {
                        setInterval(() => {
                            @this.rotate();
                        }, e.detail.interval);
                    });
                 ">
                <a href="{{ $adverts[$currentIndex]['link'] ?? '#' }}">
                    <img class="img-fluid" 
                         src="{{ asset('storage/adverts/'.$adverts[$currentIndex]['image']) }}" 
                         alt="{{ $adverts[$currentIndex]['title'] ?? 'Advertisement' }}">
                </a>
            </div>
        @else
            <div class="bg-white text-center border border-top-0 p-3">
                <p class="text-muted">No advertisements available</p>
            </div>
        @endif
    </div>
</div>