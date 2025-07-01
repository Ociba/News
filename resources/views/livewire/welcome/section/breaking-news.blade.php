<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row align-items-center bg-dark">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div>
                <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                    style="width: calc(100% - 170px); padding-right: 90px;">
                    @foreach($breakings as $breaking)
                    <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="{{URL::signedRoute('More Details',[$breaking->id])}}">{{$breaking->content}}</a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
