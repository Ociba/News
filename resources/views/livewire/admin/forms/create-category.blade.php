<div>
    {{-- The whole world belongs to you. --}}
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Create Category</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="createCategory">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Category</label>
                        <input type="text" wire:model="category" class="form-control" placeholder="Category">
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <span wire:loading wire:target="createCategory">
                            <i class="fa fa-spinner fa-spin"></i> Saving Your Data, please wait .....
                        </span>
                        <span wire:loading.remove wire:target="createCategory">Create Category</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
