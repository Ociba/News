<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card">
        @if (session()->has('msg'))
        <div class="alert alert-success mt-2">
            {{ session('msg') }}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger mt-2">
            {{ session('error') }}
        </div>
        @endif
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">

                <!-- Search Form -->
                <form class="form-inline flex-grow-1 me-md-3">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" wire:model.live.debounce.300ms="search" placeholder="Search" type="text">
                        <button type="button" class="btn btn-outline-secondary ms-2">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </form>

                <!-- Select and Button in Equal Width -->
                <div class="d-flex flex-row" style="width: 100%; max-width: 300px;">
                    <select class="form-control form-control-s w-100 mr-2" wire:model.live="perPage">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                    <a href="#" class="btn  btn-neutral w-100" onclick="Livewire.dispatch('openModal', { component: 'admin.create-news' })">Add News</a>
                </div>

            </div>
        </div>


        <!-- Light table -->
        <div class="table-responsive">
            <div class="card-body p-0">
               
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="">#</th>
                            <th scope="col" class="sort" data-sort="name">Category</th>
                            <th scope="col" class="sort" data-sort="name">Section</th>
                            <th scope="col" class="sort" data-sort="name">Title</th>
                            <th scope="col" class="sort" data-sort="name">Content</th>
                            <th scope="col" class="sort" data-sort="name">Photo</th>
                            <th scope="col" class="sort" data-sort="name">Status</th>
                            <th scope="col" class="sort" data-sort="budget">Created By</th>
                            <th scope="col" class="sort" data-sort="status">Option</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($news as $i=>$new)
                        <tr>
                            <td>{{$i + 1}}</td>
                            <td scope="row" class="text-capitalize">{{$new->category->category}}</td>
                            <td scope="row" class="text-capitalize">{{$new->section->section_name}}</td>
                            <td scope="row">{{$new->title}}</td>
                            <td scope="row">{{ Str::limit($new->content, 50)}}</td>
                            <td><img src="{{ asset('storage/news/photo/'.$new->photo)}}"></td>
                            <td scope="row">{{$new->status}}</td>
                            <td class="budget">{{$new->author->name}}</td>
                            <td class="">
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <!-- Left: Result summary -->
                    <div class="mb-2 mb-md-0">
                        <small>
                            Showing {{ $news->firstItem() }} to {{ $news->lastItem() }} of {{ $news->total() }} results
                        </small>
                    </div>

                    <!-- Right: Pagination links -->
                    <div>
                        {{ $news->links('vendor.livewire.pagination.bootstrap') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
