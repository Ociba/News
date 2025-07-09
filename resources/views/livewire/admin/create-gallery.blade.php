<div>
    <form wire:submit.prevent="createGallery">
        <div class="modal-header">
            <h5 class="modal-title">Create New Gallery</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="$parent.closeModal()">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="heading">Gallery Heading</label>
                <input type="text" class="form-control" id="heading" wire:model="heading">
                @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label for="image">Gallery Image</label>
                <input type="file" class="form-control" id="image" wire:model="image">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                
                @if($image)
                    <div class="mt-2">
                        <small>Preview:</small>
                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid mt-2" style="max-height: 200px;">
                    </div>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" wire:click="$parent.closeModal()">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Gallery</button>
        </div>
    </form>
</div>