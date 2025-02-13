@extends('backend.dashboard.dashboard')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Social Links</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">Social Links</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('social-links.create') }}" class="btn btn-sm btn-neutral">Add New</a>
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
                    <h3 class="mb-0">Social Links</h3>
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
                                <th scope="col" class="sort" data-sort="Platform">Platform</th>
                                <th scope="col" class="sort" data-sort="Links">Links or number</th>
                                {{-- <th scope="col" class="sort" data-sort="Created At">Created At</th> --}}
                                {{-- <th scope="col" class="sort" data-sort="Updated At">Updated At</th> --}}
                                <th scope="col" class="sort" data-sort="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($socialLinks as $key => $socialLink)
                                <tr>
                                    <td class="Platform">
                                        {{ $socialLink->platform }}
                                    </td>
                                    <td class="Links">
                                        <a href="{{ $socialLink->link }}" class="mr-3" target="_blanck">{{ $socialLink->link }}</a>
                                    </td>
                                    {{-- <td class="Created At">
                                        {{ $socialLink->created_at->diffForHumans() }}
                                    </td>
                                    <td class="Updated At">
                                        {{ $socialLink->updated_at->diffForHumans() }}
                                    </td> --}}
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item"
                                                    href="{{ route('social-links.edit', $socialLink->id) }}">Edit</a>
                                                <form method="post" action="{{ route('social-links.destroy', $socialLink->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td class="Updated At" colspan='7' style='text-align: center;'>
                                    No Data Yet....
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    {{$socialLinks->links('vendor.pagination.custom_pagination')}}
                </div>
            </div>
        </div>
    </div>
@endsection
