@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<main class="admin-main">
    <div class="container-fluid p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4 mb-lg-5">
            <div>
                <h1 class="h3 mb-0">Product Management</h1>
                <p class="text-muted mb-0">Manage your product catalog and inventory</p>
            </div>

            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary" @click="exportProducts()">
                    <i class="bi bi-download me-2"></i>Export
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="bi bi-upload me-2"></i>Import
                </button>
                <a href="{{ url('add_product') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i> Add Product
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
                                <!-- Livewire table -->
                                <livewire:movies-table />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection