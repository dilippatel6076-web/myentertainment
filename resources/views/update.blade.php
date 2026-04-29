@extends('layouts.app')
@section('title', 'Update Movie')
@section('content')

<main class="admin-main">
    <div class="container-fluid p-4 p-lg-5">
        <div class="modal-dialog modal-lg border p-3">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Movie</h5>
                    <button type="button" onclick="history.back()" class="btn btn-primary ms-auto">Back</button>
                </div>
                <div class="modal-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form method="POST" action="{{ route('update',$movie->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <!-- Title -->
                            <div class="col-6">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $movie->title }}">
                            </div>
                            <!-- YouTube URL -->
                            <div class="col-6">
                                <label class="form-label">YouTube URL</label>
                                <input type="text" class="form-control" id="youtube_url" name="youtube_url" value="{{ $movie->youtube_url }}">
                            </div>
                            <!-- Video ID -->
                            <div class="col-6">
                                <label class="form-label">YouTube Video ID</label>
                                <input type="text" class="form-control" id="youtube_video_id" name="youtube_video_id" value="{{ $movie->youtube_video_id }}">
                            </div>
                            <!-- Thumbnail -->
                            <div class="col-6">
                                <label class="form-label">Thumbnail</label>
                                <div class="d-flex align-items-center gap-3">
                                    <input type="file" class="form-control w-50" accept="image/*" id="thumbnail" name="thumbnail">
                                    <img id="thumb_preview" width="120"
                                        class="border rounded"
                                        src="{{ $movie->thumbnail ? asset($movie->thumbnail) : '' }}">
                                </div>
                            </div>
                            <!-- CATEGORY -->
                            <div class="col-md-6">
                                <label class="form-label">Select Category</label>
                                <div x-data="{ dropdowns: @js($selectedCategories) }">
                                    <template x-for="(value,index) in dropdowns" :key="index">
                                        <div class="d-flex mb-2">
                                            <select :name="'category['+index+']'"
                                                class="form-select me-2"
                                                x-model="dropdowns[index]">
                                                <option value="">Select Category</option>
                                                <option value="action">Action</option>
                                                <option value="comedy">Comedy</option>
                                                <option value="love_story">Love Story</option>
                                                <option value="romance">Romance</option>
                                                <option value="desh_bhakti">Desh Bhakti</option>
                                                <option value="biography">Biography</option>
                                                <option value="documentary">Documentary</option>
                                                <option value="drama">Drama</option>
                                                <option value="fantasy">Fantasy</option>
                                                <option value="history">History</option>
                                                <option value="musical">Musical</option>
                                                <option value="mystery">Mystery</option>
                                                <option value="sport">Sport</option>
                                                <option value="war">War</option>
                                                <option value="horror">Horror</option>
                                                <option value="sci_fi">Sci-Fi</option>
                                                <option value="mythology">Mythology</option>
                                                <option value="family">Family</option>
                                            </select>
                                            <button type="button"
                                                class="btn btn-danger btn-sm"
                                                @click="dropdowns.splice(index,1)">
                                                Remove
                                            </button>
                                        </div>
                                    </template>
                                    <button type="button"
                                        class="btn btn-primary btn-sm"
                                        @click="dropdowns.push('')">
                                        Add Category
                                    </button>
                                </div>
                            </div>
                            <!-- ARTIST -->
                            <div class="col-md-6">
                                <label class="form-label">Select Artist</label>

                                <div x-data="{ dropdowns: @js($selectedArtists) }">

                                    <template x-for="(value,index) in dropdowns" :key="index">

                                        <div class="d-flex mb-2">

                                            <select :name="'artist_name['+index+']'"
                                                class="form-select me-2"
                                                x-model="dropdowns[index]">

                                                <option value="">Select Artist</option>

                                                @foreach($artists as $artist)

                                                <option value="{{ $artist->id }}">
                                                    {{ $artist->name }}
                                                </option>

                                                @endforeach

                                            </select>

                                            <button type="button"
                                                class="btn btn-danger btn-sm"
                                                @click="dropdowns.splice(index,1)">
                                                Remove
                                            </button>

                                        </div>

                                    </template>

                                    <button type="button"
                                        class="btn btn-primary btn-sm"
                                        @click="dropdowns.push('')">
                                        Add Artist
                                    </button>

                                </div>

                            </div>
                            <!-- Language -->
                            <div class="col-6">
                                <label class="form-label">Language</label>
                                <select class="form-select" name="language">
                                    <option value="hindi" {{ $movie->language=='hindi'?'selected':'' }}>Hindi</option>
                                    <option value="english" {{ $movie->language=='english'?'selected':'' }}>English</option>
                                    <option value="gujrati" {{ $movie->language=='gujrati'?'selected':'' }}>Gujarati</option>
                                </select>
                            </div>
                            <!-- Release Year -->
                            <div class="col-6">
                                <label class="form-label">Release Year</label>
                                <select class="form-control" name="release_year">
                                    @for($year=date('Y');$year>=date('Y')-50;$year--)
                                    <option value="{{$year}}" {{ $movie->release_year==$year?'selected':'' }}>
                                        {{$year}}
                                    </option>
                                    @endfor
                                </select>
                            </div>
                            <!-- Description -->
                            <div class="col-6">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control"
                                    name="description"
                                    value="{{ $movie->description }}">
                            </div>
                            <!-- Searching Word -->
                            <div class="col-6">
                                <label class="form-label">Searching Word</label>
                                <input type="text" class="form-control"
                                    name="searching_word"
                                    value="{{ $movie->searching_word }}">
                            </div>
                            <!-- Status -->
                            <div class="col-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="active" {{ $movie->status=='active'?'selected':'' }}>Active</option>
                                    <option value="inactive" {{ $movie->status=='inactive'?'selected':'' }}>Inactive</option>
                                </select
                                    </div>
                            </div>
                            <div class="modal-footer mt-4 justify-content-center gap-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let youtubeUrlInput = document.getElementById('youtube_url')
        let videoIdInput = document.getElementById('youtube_video_id')
        let thumbPreview = document.getElementById('thumb_preview')
        youtubeUrlInput.addEventListener('input', function() {

            let url = this.value.trim()

            let regExp = /^.*(youtu\.be\/|embed\/|watch\?v=)([^#\&\?]{11}).*/
            let match = url.match(regExp)

            if (match) {

                let videoId = match[2]

                videoIdInput.value = videoId

                thumbPreview.src = "https://img.youtube.com/vi/" + videoId + "/hqdefault.jpg"
            }
        })
    })
</script>
@endsection