@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<main class="admin-main">
    <div class="container-fluid p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4 mb-lg-5">
            <div>
                <h1 class="h3 mb-0">Artist </h1>
                <p class="text-muted mb-0"> Artist Manage </p>
            </div>

            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary" @click="exportProducts()">
                    <i class="bi bi-download me-2"></i>Export
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="bi bi-upload me-2"></i>Import
                </button>
                <a href="{{ url('/add_artist') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i> Add Artist
                </a>
            </div>
        </div>

        <div x-data="productTable" x-init="init()">
            <div class="row g-4 g-lg-5 g-xl-6">
                <div class="col-lg-12">
                    <div class="card">
                        @if(session()->has('message'))
                        <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" id="sessionAlert">
                            {{ session()->pull('message') }}
                        </div>
                        @endif

                        <div class="card-header">
                            <h5 class="card-title mb-0">Top Performing Pages</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div>
                                    <div class="d-flex mb-3">
                                        <form method="GET" action="{{ url('/artist_list') }}" class="d-flex w-100">
                                            <input type="text"
                                                name="search"
                                                value="{{ request('search') }}"
                                                placeholder="Search by name, category, gender..."
                                                class="form-control me-2">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </form>
                                    </div>
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Category</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($artist_name as $artist)
                                            <tr>
                                                <td>{{ $artist->id }}</td>
                                                <td>{{ $artist->name }}</td>
                                                <td>{{ $artist->gender }}</td>
                                                <td>
                                                    {{ $artist->category  }}
                                                </td>
                                                <td>
                                                    @if(file_exists(storage_path('app/public/artists/'.$artist->photo)))
                                                   
                                                    <img src="{{ asset('storage/artists/' . $artist->photo) }}" width="100">
                                                    @else
                                                    <img src="{{ asset('storage/artists/default.jpg') }}" width="100" alt="Default Image">
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge bg-{{ $artist->status == 'active' ? 'success' : 'danger' }}">
                                                        {{ $artist->status }}
                                                    </span>
                                                </td>
                                                <td>{{ $artist->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    <div class="btn-group">

                                                        <a href="{{ route('artist_edit',$artist->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="{{ route('artist_delete',$artist->id) }}"
                                                            class="btn btn-info btn-sm">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No movies found.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <!-- Pagination Links -->
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $artist_name->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection