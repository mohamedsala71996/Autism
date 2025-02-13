@extends('backend.dashboard.dashboard')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Books</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">Books</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('books.create') }}" class="btn btn-sm btn-neutral">Add New</a>
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
                    <h3 class="mb-0">Books</h3>
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
                                <th scope="col" class="sort" data-sort="ar_name">Name (Arabic)</th>
                                <th scope="col" class="sort" data-sort="en_name">Name (English)</th>
                                <th scope="col" class="sort" data-sort="category">Category</th>
                                <th scope="col" class="sort" data-sort="prefer">Prefer Status</th>
                                <th scope="col" class="sort" data-sort="video">Video</th>
                                <th scope="col" class="sort" data-sort="publication_date">Publication Date</th>
                                <th scope="col" class="sort" data-sort="ar_author_name">Author Name (Arabic)</th>
                                <th scope="col" class="sort" data-sort="en_author_name">Author Name (English)</th>
                                <th scope="col" class="sort" data-sort="display_order">Display Order</th>
                                {{-- <th scope="col" class="sort" data-sort="created_at">Created At</th>
                                <th scope="col" class="sort" data-sort="updated_at">Updated At</th> --}}
                                <th scope="col" class="sort" data-sort="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($books as $key => $book)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a href="#" class="avatar mr-3">
                                                <img width='60' height='48' src="{{ asset('dashboard/img/' . $book->photo) }}" />
                                            </a>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{ $book->ar_name }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="name">
                                        <span class="name mb-0 text-sm">{{ $book->en_name }}</span>
                                    </td>
                                    <td class="category">
                                        {{ $book->category->en_name }}
                                    </td>
                                    @if ($book->prefer)
                                        <td style="column-width: 50px;">
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>
                                                <span class="status">Yes</span>
                                            </span>
                                        </td>
                                    @else
                                        <td style="column-width: 50px;">
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-danger"></i>
                                                <span class="status">No</span>
                                            </span>
                                        </td>
                                    @endif
                                    <td class="video">
                                        @if($book->video)
                                            <video controls width="150">
                                                <source src="{{ asset('dashboard/img/' . $book->video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <span>No video</span>
                                        @endif
                                    </td>
                                    <td class="publication_date">
                                        {{ $book->publication_date }}
                                    </td>
                                    <td class="author_name">
                                        {{ $book->ar_author_name }}
                                    </td>
                                    <td class="author_name">
                                        {{ $book->en_author_name }}
                                    </td>
                                    <td class="display_order">
                                        {{ $book->display_order }}
                                    </td>
                                    {{-- <td class="created_at">
                                        {{ $book->created_at->diffForHumans() }}
                                    </td>
                                    <td class="updated_at">
                                        {{ $book->updated_at->diffForHumans() }}
                                    </td> --}}
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('books.edit', $book->id) }}">Edit</a>
                                                <form method="post" action="{{ route('books.destroy', $book->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item">Delete</button>
                                                </form>
                                                <a class="dropdown-item" href="{{ route('books.book-questions.index', $book->id) }}">Q&As</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td class="updated_at" colspan='12' style='text-align: center;'>
                                    No Data Yet....
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    {{ $books->links('vendor.pagination.custom_pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
