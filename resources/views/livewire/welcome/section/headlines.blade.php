<div>
    {{-- Do your work, then step back. --}}
    <div class="row mx-0">
        @foreach($headlines as $headline)
        <div class="col-md-6 px-0">
            <div class="position-relative overflow-hidden" style="height: 250px;">
                <img class="img-fluid w-100 h-100" src="{{ asset('storage/news/photo/'.$headline->photo)}}" style="object-fit: cover;">
                <div class="overlay">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                            href="#">{{ $headline->category->category }}</a>
                        <a class="text-white" href="#"><small>{{ $headline->created_at->format('l d F, Y ') }}</small></a>
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="#">{{ $headline->title }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>