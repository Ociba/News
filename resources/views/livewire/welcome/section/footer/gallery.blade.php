<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <h5 class="mb-4 text-white text-uppercase font-weight-bold">Gallery Photos</h5>
    <div class="row">
        @foreach($galleries as $gallery)
    <div class="col-4 mb-3">
        <a href=""><img class="w-100" src="{{ asset('storage/gallery/'.$gallery->image)}}" alt=""></a>
    </div>
    @endforeach
    </div></div>
</div>