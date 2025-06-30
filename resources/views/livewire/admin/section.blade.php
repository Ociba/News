<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card">
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
                    <a href="#" class="btn  btn-neutral w-100" onclick="Livewire.dispatch('openModal', { component: 'admin.create-section' })">Add New Section</a>
                </div>


            </div>
        </div>


        <!-- Light table -->
        <div class="table-responsive">
            <div class="card-body p-0">
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
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="">#</th>
                            <th scope="col" class="sort" data-sort="name">Section</th>
                            <th scope="col" class="sort" data-sort="budget">Created By</th>
                            <th scope="col" class="sort" data-sort="status">Option</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($sections as $i=>$section)
                        <tr>
                            <td>{{$i + 1}}</td>
                            <td scope="row">{{$section->section_name}}</td>
                            <td class="budget">{{$section->creator->name}}</td>
                            <td>
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
                            Showing {{ $sections->firstItem() }} to {{ $sections->lastItem() }} of {{ $sections->total() }} results
                        </small>
                    </div>

                    <!-- Right: Pagination links -->
                    <div>
                        {{ $sections->links('vendor.livewire.pagination.bootstrap') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
