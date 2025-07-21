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
                        <a href="#">
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
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="{{ asset('storage/news/photo/'.$category->photo)}}" style="object-fit: cover; height:250px;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="{{URL::signedRoute('Details',[$category->id])}}">{{ $category->category->category }}</a>
                            <a class="text-body" href="{{URL::signedRoute('Details',[$category->id])}}"><small>{{ $category->created_at->format('l d F, Y ') }}</small></a>
                        </div>
                        <a class="h4 d-block mb-3 text-secondary text-lowercase font-weight-bold" href="{{URL::signedRoute('Details',[$category->id])}}">{{ Str::limit($category->title, 15)}}</a>
                        <p class="m-0 text-justify">{!! Str::limit($category->content, 50) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row mt-4 align-items-center">
        <div class="col-12 col-lg-6 text-lg-start mb-3 mb-lg-0">
            <p class="mb-0">
                Showing <strong>{{ $categories->firstItem() }}</strong> to
                <strong>{{ $categories->lastItem() }}</strong> of
                <strong>{{ $categories->total() }}</strong> items
            </p>
        </div>
        <div class="col-12 col-lg-6 text-center text-lg-end">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center justify-content-lg-end mb-0">
                    {{-- Previous Page Link --}}
                    @if ($categories->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Previous</span>
                    </li>
                    @else
                    @php
                    $prevUrl = URL::signedRoute('News Category', [
                    'category' => $this->category,
                    'page' => $categories->currentPage() - 1
                    ]);
                    @endphp
                    <li class="page-item">
                        <a class="page-link" href="{{ $prevUrl }}" rel="prev">Previous</a>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                    @php
                    $signedUrl = URL::signedRoute('News Category', [
                    'category' => $this->category,
                    'page' => $page
                    ]);
                    @endphp
                    @if ($page == $categories->currentPage())
                    <li class="page-item active">
                        <span class="page-link">{{ $page }}</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $signedUrl }}">{{ $page }}</a>
                    </li>
                    @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($categories->hasMorePages())
                    @php
                    $nextUrl = URL::signedRoute('News Category', [
                    'category' => $this->category,
                    'page' => $categories->currentPage() + 1
                    ]);
                    @endphp
                    <li class="page-item">
                        <a class="page-link" href="{{ $nextUrl }}" rel="next">Next</a>
                    </li>
                    @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Next</span>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>