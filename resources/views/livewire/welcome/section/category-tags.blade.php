<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex flex-wrap m-n1">
                @foreach($categories as $category)
                <a href="{{URL::signedRoute('News Category',[$category->category])}}" class="btn btn-sm btn-outline-secondary m-1 capitalize">{{$category->category}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
