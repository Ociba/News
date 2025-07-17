<div>
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Category: {{ $this->category }}</h4>
                <a class="text-secondary font-weight-medium text-decoration-none" href="#"></a>
            </div>
        </div>

        <!-- Advert Section - Full Width -->
        <div class="col-12 mb-4">
        <div wire:init="startSlider">
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
        </div>
        
        @if($hasAdverts)
            <div class="bg-white text-center border border-top-0 p-3">
                <a href="{{ $adverts[$currentAdvertIndex]['link'] ?? '#' }}" target="_blank">
                    <img class="img-fluid" 
                         src="{{ asset('storage/adverts/'.$adverts[$currentAdvertIndex]['image']) }}" 
                         alt="{{ $adverts[$currentAdvertIndex]['title'] ?? 'Advertisement' }}"
                         style="max-height: 250px; width: auto; margin: 0 auto;">
                </a>
                @if(count($adverts) > 1)
                    <div class="mt-2 d-flex justify-content-center">
                        @foreach($adverts as $index => $advert)
                            <span class="mx-1" style="
                                display: inline-block;
                                width: 10px;
                                height: 10px;
                                border-radius: 50%;
                                background: {{ $index === $currentAdvertIndex ? '#007bff' : '#ccc' }};
                                cursor: pointer;"
                                wire:click="set('currentAdvertIndex', {{ $index }})">
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            <div class="bg-white text-center border border-top-0 p-3">
                <p class="text-muted">No advertisements available</p>
            </div>
        @endif
    </div>
</div>
        </div>

        <!-- News Categories -->
        <div class="row">
            @foreach($categories as $category)
            <div class="col-lg-3">
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="{{ asset('storage/news/photo/'.$category->photo)}}" style="object-fit: cover; height:250px;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="{{URL::signedRoute('Details',[$category->id])}}">{{ $category->category->category }}</a>
                            <a class="text-body" href="{{URL::signedRoute('Details',[$category->id])}}"><small>{{ $category->created_at->format('l d F, Y ') }}</small></a>
                        </div>
                        <a class="h4 d-block mb-3 text-secondary text-lowercase font-weight-bold" href="{{URL::signedRoute('Details',[$category->id])}}">{{ Str::limit($category->title, 15)}}</a>
                        <p class="m-0 text-justify">{{ Str::limit($category->content, 50)}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination Section -->
    <div class="row mt-4 align-items-center">
        <div class="col-lg-6">
            <p class="mb-0">
                Showing <strong>1</strong> to <strong>12</strong> of <strong>50</strong> items
            </p>
        </div>
        <div class="col-lg-6 text-md-end">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-md-end justify-content-start mb-0">
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>