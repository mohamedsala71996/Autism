@extends('backend.dashboard.dashboard')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Our Services Section</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">Our Services Section</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('our-services.create') }}" class="btn btn-sm btn-neutral">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Our Services Section</h3>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('message') }}</strong>
                    </div>
                @endif
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th class="sort" data-sort="photo">Photo</th>
                                <th class="sort" data-sort="ar_title">Title (Arabic)</th>
                                <th class="sort" data-sort="en_title">Title (English)</th>
                                <th class="sort" data-sort="ar_description">Description (Arabic)</th>
                                <th class="sort" data-sort="en_description">Description (English)</th>
                                {{-- <th class="sort" data-sort="created_at">Created At</th> --}}
                                {{-- <th class="sort" data-sort="updated_at">Updated At</th> --}}
                                <th class="sort" data-sort="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($ourServices as $key => $ourService)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a class="avatar mr-3">
                                                <img width="60" height="48" src="{{ asset('dashboard/img/' . $ourService->photo) }}" />
                                            </a>
                                        </div>
                                    </th>
                                    <td class="ar_title">
                                        {{ $ourService->ar_title }}
                                    </td>
                                    <td class="en_title">
                                        {{ $ourService->en_title }}
                                    </td>
                                    <td class="ar_description">
                                        {!! Str::limit($ourService->ar_description, 15) !!}
                                    </td>
                                    <td class="en_description">
                                        {!! Str::limit($ourService->en_description, 15) !!}
                                    </td>
                                    {{-- <td class="created_at">
                                        {{ $ourService->created_at->diffForHumans() }}
                                    </td>
                                    <td class="updated_at">
                                        {{ $ourService->updated_at->diffForHumans() }}
                                    </td> --}}
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('our-services.edit', $ourService->id) }}">Edit</a>
                                                <form method="post" action="{{ route('our-services.destroy', $ourService->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Data Yet....</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    {{ $ourServices->links('vendor.pagination.custom_pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
