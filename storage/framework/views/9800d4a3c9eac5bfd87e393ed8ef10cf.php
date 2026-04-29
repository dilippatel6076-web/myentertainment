<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('content'); ?>

<!-- Main Content -->
<main class="admin-main">
    <div class="container-fluid p-4 p-lg-5">
        <div class="modal-dialog modal-lg border p-3">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" onclick="history.back()" class="btn btn-primary ms-auto">Back</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo e(route('movies.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-6">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" x-model="form.name" name="title">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Youtube URL</label>
                                <input type="text" class="form-control" x-model="form.name" id="youtube_url" name="youtube_url">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Youtube Video ID</label>
                                <input type="text" class="form-control" x-model="form.name" id="youtube_video_id" name="youtube_video_id">
                            </div>
                            <div class="col-6">
                                <div class="row mb-3">
                                    <label class="form-label">Thumbnail</label>
                                    <div class="d-flex align-items-center gap-3">
                                        <input type="file" class="form-control w-50" accept="image/*" id="thumbnail" name="thumbnail">
                                        <img id="thumb_preview" width="120" class="border rounded">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Select Category</label>
                                <div x-data="{ dropdowns: [''] }">
                                    <template x-for="(value, index) in dropdowns" :key="index">
                                        <div class="d-flex mb-2">
                                            <select :name="'category['+index+']'" class="form-select me-2" x-model="dropdowns[index]">
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
                                            <button type="button" class="btn btn-danger btn-sm" @click="dropdowns.splice(index,1)">Remove</button>
                                        </div>
                                    </template>
                                    <button type="button" class="btn btn-primary btn-sm" @click="dropdowns.push('')">Add More</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Select Artist</label>
                                <div x-data="{dropdowns: [''],artists: <?php echo \Illuminate\Support\Js::from($artists)->toHtml() ?>}">
                                    <template x-for="(value, index) in dropdowns" :key="index">
                                        <div class="d-flex mb-2">
                                            <select :name="'artist_name['+index+']'"
                                                class="form-select me-2"
                                                x-model="dropdowns[index]">

                                                <option value="">Select Artist</option>
                                                <template x-for="artist in artists" :key="artist.id">
                                                    <option :value="artist.id" x-text="artist.name"></option>
                                                </template>
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
                            <div class="col-6">
                                <label class="form-label">Select Langage</label>
                                <select class="form-select" name="language">
                                    <option value="">Select language</option>
                                    <option value="hindi" selected>Hindi</option>
                                    <option value="english">English</option>
                                    <option value="gujrati">Gujrati</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Select Year</label>
                                <select class="form-control" name="release_year">
                                    <option value="">Select Year</option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($year = date('Y'); $year >= date('Y')-50; $year--): ?>
                                    <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" x-model="form.name" name="description">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Searching Word</label>
                                <input type="text" class="form-control" x-model="form.name" name="searching_word">
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="">Select Status</option>
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <!-- <div class="col-6">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="form-control" accept="image/*">
                            </div> -->
                        </div>
                        <div class="modal-footer mt-4  justify-content-center gap-3">
                            <button type="submit" class="btn btn-primary" @click="saveProduct()">Save </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('youtube_url').addEventListener('input', function() {

            let url = this.value.trim();

            let regExp = /^.*(youtu\.be\/|embed\/|watch\?v=)([^#\&\?]{11}).*/;
            let match = url.match(regExp);

            if (match) {

                let videoId = match[2];
                let thumbnail = "https://img.youtube.com/vi/" + videoId + "/hqdefault.jpg";

                document.getElementById('youtube_video_id').value = videoId;

                let img = document.getElementById('thumb_preview');
                img.src = thumbnail;
                img.style.display = "block";
                //  document.getElementById('thumbnail').style.display = "none";

            } else {
                document.getElementById('thumb_preview').style.display = "none";
            }

        });

    });
</script>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/MyEntertainment/resources/views/add_product.blade.php ENDPATH**/ ?>