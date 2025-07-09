<div>
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">{{ Request()->Route()->getName() }}</h4>
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fa fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
                @endauth
            </div>
        </div>

        @foreach($photos_on_sales as $photo)
        <div class="col-lg-3">
            <div class="position-relative mb-3">
                <img class="img-fluid w-100"
                    src="{{ asset('storage/photos/' . $photo->image_with_watermark) }}"
                    style="object-fit: cover; height:250px;"
                    alt="{{ $photo->title }}">

                <div class="bg-white border border-top-0 p-4">
                    <div class="mb-2">
                        <span class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">
                            {{ $photo->title }}
                        </span>
                        <p class="text-body mt-3">
                            <strong>UGX: {{ number_format($photo->price) }}</strong>
                        </p>

                        <div class="row align-items-center mt-3">
                            <div class="col-auto">
                                <button wire:click.prevent="download({{ $photo->id }})"
                                    class="btn btn-sm btn-outline-success"
                                    title="Download high-quality version">
                                    <i class="fa fa-download"></i> Download
                                </button>
                            </div>
                            <div class="col-auto">
                                <span class="large p-1 btn-secondary text-white">
                                    Downloads: {{ $photo->download_count }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination/Load More -->
    @if($photos_on_sales->count() >= $perPage)
    <div class="row mt-4">
        <div class="col-12 text-center">
            <button wire:click="loadMore" class="btn btn-primary">
                Load More Photos
            </button>
        </div>
    </div>
    @endif
</div>