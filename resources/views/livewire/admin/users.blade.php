<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
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
                    <a href="#" class="btn  btn-neutral w-100" onclick="Livewire.dispatch('openModal', { component: 'admin.forms.add-new-user' })">Add New User</a>
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
                            <th scope="col" class="sort" data-sort="name">Name</th>
                            <th scope="col" class="sort" data-sort="budget">Email</th>
                            <th scope="col" class="sort" data-sort="status">Option</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($users as $i=>$user)
                        <tr>
                            <td>{{$i + 1}}
                            <td scope="row">{{$user->name}}</td>
                            <td class="budget">{{$user->email}}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <!-- Left: Result summary -->
                    <div class="mb-2 mb-md-0">
                        <small>
                            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
                        </small>
                    </div>

                    <!-- Right: Pagination links -->
                    <div>
                    {{ $users->links('vendor.livewire.pagination.bootstrap') }}
                    </div>
                </div>
            </div>

        </div>
    </div>