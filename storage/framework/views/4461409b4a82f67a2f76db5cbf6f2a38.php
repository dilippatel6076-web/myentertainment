<?php $__env->startSection('title', 'Home Page'); ?>

<?php $__env->startSection('content'); ?>

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
                <a href="<?php echo e(url('/add_artist')); ?>" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i> Add Artist
                </a>
            </div>
        </div>

        <div x-data="productTable" x-init="init()">
            <div class="row g-4 g-lg-5 g-xl-6">
                <div class="col-lg-12">
                    <div class="card">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('message')): ?>
                        <div class="alert alert-<?php echo e(session('alert-type')); ?> alert-dismissible fade show" id="sessionAlert">
                            <?php echo e(session()->pull('message')); ?>

                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="card-header">
                            <h5 class="card-title mb-0">Top Performing Pages</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div>
                                    <div class="d-flex mb-3">
                                        <form method="GET" action="<?php echo e(url('/artist_list')); ?>" class="d-flex w-100">
                                            <input type="text"
                                                name="search"
                                                value="<?php echo e(request('search')); ?>"
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
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $artist_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                            <tr>
                                                <td><?php echo e($artist->id); ?></td>
                                                <td><?php echo e($artist->name); ?></td>
                                                <td><?php echo e($artist->gender); ?></td>
                                                <td>
                                                    <?php echo e($artist->category); ?>

                                                </td>
                                                <td>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(file_exists(storage_path('app/public/artists/'.$artist->photo))): ?>
                                                   
                                                    <img src="<?php echo e(asset('storage/artists/' . $artist->photo)); ?>" width="100">
                                                    <?php else: ?>
                                                    <img src="<?php echo e(asset('storage/artists/default.jpg')); ?>" width="100" alt="Default Image">
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </td>
                                                <td>
                                                    <span class="badge bg-<?php echo e($artist->status == 'active' ? 'success' : 'danger'); ?>">
                                                        <?php echo e($artist->status); ?>

                                                    </span>
                                                </td>
                                                <td><?php echo e($artist->created_at->format('d-m-Y')); ?></td>
                                                <td>
                                                    <div class="btn-group">

                                                        <a href="<?php echo e(route('artist_edit',$artist->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="<?php echo e(route('artist_delete',$artist->id)); ?>"
                                                            class="btn btn-info btn-sm">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                            <tr>
                                                <td colspan="8" class="text-center">No movies found.</td>
                                            </tr>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </tbody>
                                    </table>
                                    <!-- Pagination Links -->
                                    <div class="d-flex justify-content-center mt-4">
                                        <?php echo e($artist_name->links('pagination::bootstrap-5')); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/MyEntertainment/resources/views/artist.blade.php ENDPATH**/ ?>