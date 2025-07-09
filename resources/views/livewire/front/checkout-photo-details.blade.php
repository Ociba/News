<div>
    {{-- The whole world belongs to you. --}}
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-4">
                    {{-- Column 1: Purchase Details --}}
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase mb-4">Purchase Details</h5>

                                @auth
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="text" class="form-control" value="UGX {{ number_format($photo->price) }}" readonly>
                                    </div>

                                    @if (!$canDownload)
                                    <button type="button" class="btn btn-primary w-100">
                                        <i class="fa fa-credit-card me-1"></i> Proceed to Payment
                                    </button>
                                    @else
                                    <div class="alert alert-success text-center">
                                        Payment completed. You can now download your image.
                                    </div>
                                    @endif
                                </form>
                                @else
                                <div class="alert alert-warning">
                                    <strong>Please login</strong> to make a purchase.
                                </div>
                                @endauth
                                <hr class="my-4">
                                {{-- Navigation Buttons --}}
                                <div class="d-flex justify-content-between flex-wrap gap-2">
                                    <a href="{{URL::signedRoute('More Photos')}}" class="btn btn-outline-primary">
                                        <i class="fa fa-arrow-left me-1"></i> Back to Photos
                                    </a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="fa fa-sign-out-alt me-1"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Column 2: Image & Download --}}
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-uppercase mb-4">{{ $photo->title }}</h5>

                                @if ($canDownload)
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="{{ asset('storage/photos/' . $photo->image_without_watermark) }}"
                                        class="img-fluid rounded mb-3"
                                        style="max-height: 350px; object-fit: cover;"
                                        alt="{{ $photo->title }}">
                                </div>
                                <button wire:click="download" class="btn btn-success">
                                    <i class="fa fa-download me-2"></i> Download Full Image
                                </button>

                                <div class="mt-2 text-muted small">
                                    Downloads: {{ $photo->download_count }}
                                </div>
                                @else
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="{{ asset('storage/photos/' . $photo->image_with_watermark) }}"
                                        class="img-fluid rounded mb-3"
                                        style="max-height: 350px; object-fit: cover;"
                                        alt="{{ $photo->title }}">
                                </div>
                                <p class="text-muted"><em>Login and complete purchase to download the original image.</em></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>