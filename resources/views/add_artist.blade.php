@extends('layouts.app')
@section('title', 'Add Artist')
@section('content')

<main class="admin-main">
    <div class="container-fluid p-3 p-md-4 p-lg-5">
    <div class="card shadow-sm">
        <div class="card-header d-flex align-items-center">
            <h5 class="mb-0">Add Artist</h5>
            <button onclick="history.back()" class="btn btn-primary ms-auto">Back</button>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('artist.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <!-- Name -->
                    <div class="col-12 col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter artist name">
                    </div>

                    <!-- Gender -->
                    <div class="col-12 col-md-6">
                        <label class="form-label d-block">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Male" checked>
                            <label class="form-check-label">Male</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Female">
                            <label class="form-check-label">Female</label>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="col-12 col-md-6">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category">
                            <option value="">Select Category</option>
                            <option value="Bollywood_Actors">Bollywood Actor</option>
                            <option value="Bollywood_Actresses">Bollywood Actresses</option>
                            <option value="Telugu_Actors">Telugu Actors</option>
                            <option value="Telugu_Actresses">Telugu Actresses</option>
                            <option value="Tamil_Actors">Tamil Actors</option>
                            <option value="Tamil_Actresses">Tamil Actresses</option>
                            <option value="Bhojpuri_Actors">Bhojpuri_Actors</option>
                            <option value="Bhojpuri_Actresses">Bhojpuri Actresses</option>
                            <option value="Bhojpuri_Actresses">Bhojpuri Actresses</option>
                            <option value="Gujarati_Actors">Gujarati Actors</option>
                            <option value="Gujarati_Actresses">Gujarati Actresses</option>
                        </select>
                    </div>

                    <!-- Photo -->
                    <div class="col-12 col-md-6">
                        <label class="form-label">Photo</label>
                        <div class="d-flex flex-column flex-sm-row gap-3 align-items-start align-items-sm-center">
                            <input type="file" class="form-control" name="photo" accept="image/*" onchange="previewThumb(event)">
                            <img id="thumb_preview" width="100" class="border rounded d-none">
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-12 col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4">Save</button>
                    <button type="button" class="btn btn-secondary px-4">Cancel</button>
                </div>

            </form>
        </div>

    </div>

</div>
```

</main>

<script>
function previewThumb(event) {
    const preview = document.getElementById('thumb_preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.classList.remove('d-none');
}
</script>

@endsection
