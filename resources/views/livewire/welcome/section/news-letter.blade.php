<div>
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <p>Stay informed with our latest news and updates. Subscribe to get breaking stories delivered to your inbox.</p>
            
            @if($success)
                <div class="alert alert-success mb-3">
                    Thank you for subscribing!
                </div>
            @endif
            
            <form wire:submit.prevent="subscribe">
                <div class="input-group mb-2" style="width: 100%;">
                    <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                           wire:model="email" placeholder="Your Email">
                    <div class="input-group-append">
                        <button class="btn btn-primary font-weight-bold px-3" type="submit">Sign Up</button>
                    </div>
                </div>
                @error('email')
                    <div class="text-danger mb-2">{{ $message }}</div>
                @enderror
            </form>
        </div>
    </div>
</div>