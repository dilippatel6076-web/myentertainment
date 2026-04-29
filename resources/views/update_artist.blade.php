@extends('layouts.app')
@section('title', 'Edit Artist')
@section('content')

<main class="admin-main">
    <div class="container-fluid p-3 p-md-4 p-lg-5">

        <div class="card shadow-sm">
            <div class="card-header d-flex align-items-center">
                <h5 class="mb-0">Edit Artist</h5>
                <button onclick="history.back()" class="btn btn-primary ms-auto">Back</button>
            </div>

            <div class="card-body">
                 @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                <form method="POST" action="{{ route('artist_update', $artist->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <!-- Name -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" 
                                   placeholder="Enter artist name" 
                                   value="{{ old('name', $artist->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class="col-12 col-md-6">
                            <label class="form-label d-block">Gender</label>
                            @php $genderValue = old('gender', $artist->gender); @endphp
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Male" {{ $genderValue=='Male'?'checked':'' }}>
                                <label class="form-check-label">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Female" {{ $genderValue=='Female'?'checked':'' }}>
                                <label class="form-check-label">Female</label>
                            </div>
                            @error('gender')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Category</label>
                            <select class="form-select @error('category') is-invalid @enderror" name="category">
                                @php
                                    $categories = [
                                        'Bollywood_Actors'=>'Bollywood Actor',
                                        'Bollywood_Actresses'=>'Bollywood Actresses',
                                        'Telugu_Actors'=>'Telugu Actors',
                                        'Telugu_Actresses'=>'Telugu Actresses',
                                        'Tamil_Actors'=>'Tamil Actors',
                                        'Tamil_Actresses'=>'Tamil Actresses',
                                        'Bhojpuri_Actors'=>'Bhojpuri Actors',
                                        'Bhojpuri_Actresses'=>'Bhojpuri Actresses',
                                        'Gujarati_Actors'=>'Gujarati Actors',
                                        'Gujarati_Actresses'=>'Gujarati Actresses',
                                    ];
                                    $selectedCategory = old('category', $artist->category);
                                @endphp
                                <option value="">Select Category</option>
                                @foreach($categories as $key=>$value)
                                    <option value="{{ $key }}" {{ $selectedCategory==$key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Photo -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Photo</label>
                            <div class="d-flex flex-column flex-sm-row gap-3 align-items-start align-items-sm-center">
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" accept="image/*" onchange="previewThumb(event)">
                                <img id="thumb_preview" width="100" class="border rounded {{ $artist->photo ? '' : 'd-none' }}" 
                                     src="{{ $artist->photo ? asset('storage/artists/'.$artist->photo) : '' }}">
                                @error('photo')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Status</label>
                            @php $statusValue = old('status', $artist->status); @endphp
                            <select class="form-select @error('status') is-invalid @enderror" name="status">
                                <option value="active" {{ $statusValue=='active'?'selected':'' }}>Active</option>
                                <option value="inactive" {{ $statusValue=='inactive'?'selected':'' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                        <button type="button" onclick="history.back()" class="btn btn-secondary px-4">Cancel</button>
                    </div>

                </form>
            </div>

        </div>

    </div>

</main>

<script>
function previewThumb(event) {
    const preview = document.getElementById('thumb_preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.classList.remove('d-none');
}
</script>

@endsection