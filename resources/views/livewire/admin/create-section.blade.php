<div>
    {{-- Stop trying to control. --}}
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Create Section</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="createSection">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Section Name</label>
                        <input type="text" wire:model="section_name" class="form-control" placeholder="Section Name">
                        @error('section_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <span wire:loading wire:target="createSection">
                            <i class="fa fa-spinner fa-spin"></i> Saving Your Data, please wait .....
                        </span>
                        <span wire:loading.remove wire:target="createSection">Create Section</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
