<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Create News</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="createNews">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Category</label>
                        <select wire:model="category_id" class="form-select form-control">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Section Name</label>
                        <select wire:model="section_id" class="form-select form-control">
                            <option value="">Select</option>
                            @foreach ($sections as $section)
                                <option value="{{$section->id}}">{{$section->section_name}}</option>
                            @endforeach
                        </select>
                        @error('section_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Title</label>
                        <input type="text" wire:model="title" class="form-control" placeholder="Title">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Photo</label>
                        <input type="file" wire:model="photo" id="photo" class="form-control">
                        <div wire:loading wire:target="photo" style="color:green;"><strong>Uploading Photo, Please Wait...</strong></div>
                        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Content</label>
                        <textarea type="text" rows="4" wire:model="content" class="form-control"></textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <span wire:loading wire:target="createNews">
                            <i class="fa fa-spinner fa-spin"></i> Saving Your Data, please wait .....
                        </span>
                        <span wire:loading.remove wire:target="createNews">Create News</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
