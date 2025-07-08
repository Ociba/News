<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Create Photo</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="section_id" class="form-label">Section</label>
                        <select wire:model="section_id" class="form-control">
                            <option value="">-- Select Section --</option>
                            @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                        @error('section_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" wire:model="title" class="form-control">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea wire:model="description" class="form-control"></textarea>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" wire:model="price" class="form-control" step="0.01">
                        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="license_type" class="form-label">License Type</label>
                        <select wire:model="license_type" class="form-control">
                            <option value="standard">Standard</option>
                            <option value="extended">Extended</option>
                            <option value="exclusive">Exclusive</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" wire:model="image" class="form-control">
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="row col-md-12">
                    <button type="submit" class="btn btn-primary">
                        <span wire:loading wire:target="save">
                            <i class="fa fa-spinner fa-spin"></i> Saving Your Data, please wait .....
                        </span>
                        <span wire:loading.remove wire:target="save">Create Photo</span>
                    </button>
                </div>
            </form>
        </div>
    </div>