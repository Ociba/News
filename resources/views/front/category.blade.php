@extends('template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Category: Business</h4>
            <a class="text-secondary font-weight-medium text-decoration-none" href="#">View All</a>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="position-relative mb-3">
            <img class="img-fluid w-100" src="{{ asset('asset/img/news-700x435-1.jpg')}}" style="object-fit: cover;">
            <div class="bg-white border border-top-0 p-4">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                        href="/news/politics/details/1">Business</a>
                    <a class="text-body" href="/news/politics/details/1"><small>Jan 01, 2045</small></a>
                </div>
                <a class="h4 d-block mb-3 text-secondary text-lowercase font-weight-bold" href="/news/politics/details/1">Lorem ipsum dolor sit amet elit...</a>
                <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                    rebum clita rebum dolor stet amet justo</p>
            </div>
            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle mr-2" src="{{ asset('asset/img/user.jpg')}}" width="25" height="25" alt="">
                    <small>John Doe</small>
                </div>
                <div class="d-flex align-items-center">
                    <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                    <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="position-relative mb-3">
            <img class="img-fluid w-100" src="{{ asset('asset/img/news-700x435-2.jpg')}}" style="object-fit: cover;">
            <div class="bg-white border border-top-0 p-4">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                        href="/news/politics/details/2">Business</a>
                    <a class="text-body" href="/news/politics/details/2"><small>Jan 01, 2045</small></a>
                </div>
                <a class="h4 d-block mb-3 text-secondary text-lowercase font-weight-bold" href="/news/politics/details/2">Lorem ipsum dolor sit amet elit...</a>
                <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                    rebum clita rebum dolor stet amet justo</p>
            </div>
            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle mr-2" src="{{ asset('asset/img/user.jpg')}}" width="25" height="25" alt="">
                    <small>John Doe</small>
                </div>
                <div class="d-flex align-items-center">
                    <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                    <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="position-relative mb-3">
            <img class="img-fluid w-100" src="{{ asset('asset/img/news-700x435-2.jpg')}}" style="object-fit: cover;">
            <div class="bg-white border border-top-0 p-4">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                        href="/news/politics/details/3">Business</a>
                    <a class="text-body" href="/news/politics/details/3"><small>Jan 01, 2045</small></a>
                </div>
                <a class="h4 d-block mb-3 text-secondary text-lowercase font-weight-bold" href="/news/politics/details/3">Lorem ipsum dolor sit amet elit...</a>
                <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                    rebum clita rebum dolor stet amet justo</p>
            </div>
            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle mr-2" src="{{ asset('asset/img/user.jpg')}}" width="25" height="25" alt="">
                    <small>John Doe</small>
                </div>
                <div class="d-flex align-items-center">
                    <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                    <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="position-relative mb-3">
            <img class="img-fluid w-100" src="{{ asset('asset/img/news-700x435-2.jpg')}}" style="object-fit: cover;">
            <div class="bg-white border border-top-0 p-4">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                        href="/news/politics/details/4">Business</a>
                    <a class="text-body" href="/news/politics/details/4"><small>Jan 01, 2045</small></a>
                </div>
                <a class="h4 d-block mb-3 text-secondary text-lowercase font-weight-bold" href="/news/politics/details/4">Lorem ipsum dolor sit amet elit...</a>
                <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                    rebum clita rebum dolor stet amet justo</p>
            </div>
            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle mr-2" src="{{ asset('asset/img/user.jpg')}}" width="25" height="25" alt="">
                    <small>John Doe</small>
                </div>
                <div class="d-flex align-items-center">
                    <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                    <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4 align-items-center">
    <!-- Left: Showing results -->
    <div class="col-lg-6">
        <p class="mb-0">
            Showing <strong>1</strong> to <strong>12</strong> of <strong>50</strong> items
        </p>
    </div>

    <!-- Right: Pagination -->
    <div class="col-lg-6 text-md-end">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-md-end justify-content-start mb-0">
                <!-- Previous -->
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>

                <!-- Page numbers -->
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>

                <!-- Next -->
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@endsection