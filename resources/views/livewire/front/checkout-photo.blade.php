<div>
    <div class="container py-4">
        {{-- Success Alert --}}
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row justify-content-center g-4">
            {{-- Image Card --}}
            <div class="col-lg-5">
                <div class="card shadow-sm border-0 overflow-hidden">
                    <div class="card-header bg-transparent">
                        <h5 class="mb-0 text-center text-primary">{{ $photo->title }}</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="ratio ratio-4x3">
                            <img
                                src="{{ asset('storage/photos/' . $photo->image_with_watermark) }}"
                                class="img-fluid w-100 h-100 object-fit-cover"
                                alt="{{ $photo->title }}">
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Digital Photo</span>
                            <span class="h4 mb-0 text-success">UGX {{ number_format($photo->price) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Card --}}
            <div class="col-lg-7">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Complete Your Purchase</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            {{-- Payment Method Selector --}}
                            <div class="col-12">
                                <div class="pb-3 mb-3">
                                    <label for="paymentMethod" class="form-label fw-bold">Select Payment Method</label>
                                    <select id="paymentMethod" class="form-select border-2 form-control" wire:model.live="paymentMethod">
                                        <option value="mobile_money">Mobile Money</option>
                                        <option value="bank">Bank Transfer</option>
                                        <option value="card">Credit/Debit Card</option>
                                    </select>
                                    <small wire:loading wire:target="paymentMethod" class="text-muted">Loading</small>
                                </div>
                            </div>

                            {{-- Payment Fields --}}
                            <div class="col-12 shadow p-2">
                                {{-- Mobile Money Fields --}}
                                @if($paymentMethod === 'mobile_money')
                                <div class="animate__animated animate__fadeIn">
                                    <div class="form-floating mb-3">
                                        <input
                                            type="text"
                                            id="phone_number"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            wire:model.defer="phone_number"
                                            placeholder="0701234567">
                                        <label for="phone_number">Mobile Money Number</label>
                                        @error('phone_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        <small class="text-muted">Format: 07XXXXXXXX</small>
                                    </div>
                                </div>
                                @endif

                                {{-- Bank Payment Fields --}}
                                @if($paymentMethod === 'bank')
                                <div class="animate__animated animate__fadeIn">
                                    <div class="form-floating mb-3">
                                        <input
                                            type="text"
                                            id="bank_name"
                                            class="form-control @error('bank_name') is-invalid @enderror"
                                            wire:model.defer="bank_name"
                                            placeholder="eg Equity Bank">
                                        <label for="bank_name">Bank Name</label>
                                        @error('bank_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input
                                            type="text"
                                            id="account_number"
                                            class="form-control @error('account_number') is-invalid @enderror"
                                            wire:model.defer="account_number"
                                            placeholder="1234567890">
                                        <label for="account_number">Account Number</label>
                                        @error('account_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                @endif

                                {{-- Credit/Debit Card Fields --}}
                                @if($paymentMethod === 'card')
                                <div class="animate__animated animate__fadeIn">
                                    <div class="form-floating mb-3">
                                        <input
                                            type="text"
                                            id="card_number"
                                            class="form-control @error('card_number') is-invalid @enderror"
                                            wire:model.defer="card_number"
                                            placeholder="1234 5678 9012 3456">
                                        <label for="card_number">Card Number</label>
                                        @error('card_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input
                                                    type="text"
                                                    id="card_expiry"
                                                    class="form-control @error('card_expiry') is-invalid @enderror"
                                                    wire:model.defer="card_expiry"
                                                    placeholder="MM/YY">
                                                <label for="card_expiry">Expiry Date</label>
                                                @error('card_expiry') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input
                                                    type="text"
                                                    id="card_cvc"
                                                    class="form-control @error('card_cvc') is-invalid @enderror"
                                                    wire:model.defer="card_cvc"
                                                    placeholder="CVC">
                                                <label for="card_cvc">Security Code</label>
                                                @error('card_cvc') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                {{-- Checkout Button --}}
                                <div class="d-grid mt-4">
                                    <button wire:click="checkout" class="btn btn-primary btn-lg py-3 shadow">
                                        <span wire:loading.remove wire:target="checkout">
                                            Pay UGX {{ number_format($photo->price) }}
                                        </span>
                                        <span wire:loading wire:target="checkout">
                                            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                            Processing Payment...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .form-control,
    .form-select {
        border-width: 2px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }

    .card {
        border-radius: 12px;
        overflow: hidden;
    }

    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endpush

@push('scripts')

@endpush