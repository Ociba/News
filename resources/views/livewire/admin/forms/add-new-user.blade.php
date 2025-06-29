<div>
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Create User</h4>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="createUser">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" wire:model="name" class="form-control">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" wire:model="email" class="form-control">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" wire:model="password" class="form-control">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" class="form-control">
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                <span wire:loading wire:target="createUser">
                    <i class="fa fa-spinner fa-spin"></i>  Saving Your Data, please wait .....
                </span>
                <span wire:loading.remove wire:target="createUser">Create User</span>
                </button>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success mt-3 mb-0">
                    {{ session('message') }}
                </div>
            @endif
        </form>
    </div>
</div>

</div>