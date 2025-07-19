<div>
    {{-- Do your work, then step back. --}}
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Create Advert</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="section_id">Section</label>
                        <select wire:model="section_id" class="form-control" id="section_id">
                            <option value="">Select Section</option>
                            @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                        @error('section_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="section_id">Category</label>
                        <select wire:model="category_id" class="form-control" id="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-6">
                        <label for="start_date">Start Date</label>
                        <input type="date" wire:model="start_date" class="form-control" id="start_date">
                        @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_date">End Date</label>
                        <input type="date" wire:model="end_date" class="form-control" id="end_date">
                        @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="advert_status">Status</label>
                        <select wire:model="advert_status" class="form-control" id="advert_status">
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                            <option value="archive">Archive</option>
                        </select>
                        @error('advert_status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="image">Advert Image</label>
                        <input type="file" wire:model="image" class="form-control" id="image">
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        @if($image)
                        <div class="mt-2">
                            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" width="150">
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row col-md-12">
                    <button type="submit" class="btn btn-primary">
                        <span wire:loading wire:target="save">
                            <i class="fa fa-spinner fa-spin"></i> Saving Your Data, please wait .....
                        </span>
                        <span wire:loading.remove wire:target="save">Create Advert</span>
                    </button>
                </div>
            </form>
        </div>
    </div>