<div>
    <div class="d-flex mb-3">
        <input type="text"
            wire:model="searchInput"
            placeholder="Search..."
            class="form-control me-2">
        <button class="btn btn-primary"
            wire:click="searchMovies">
            Search
        </button>
    </div>
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Youtube URL</th>
                <th>Category</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <tr>
                <td><?php echo e($movie->id); ?></td>
                <td><?php echo e($movie->title); ?></td>
                <td>
                    <?php
                    $firstWord = explode('/', $movie->thumbnail)[0] ?? '';
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($firstWord === 'thumbnails'): ?>
                    <img src="<?php echo e(asset('storage/' . $movie->thumbnail)); ?>" width="100" alt="Thumbnail">
                    <?php else: ?>
                    <img src="<?php echo e($movie->thumbnail); ?>" width="100" alt="Thumbnail">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td><?php echo e($movie->youtube_url); ?></td>
                <td>
                    <?php
                    $categories = json_decode($movie->category, true);
                    ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categories): ?>
                    <?php echo e(collect($categories)
                        ->map(fn($cat) => ucwords(str_replace('_',' ', $cat)))
                        ->implode(', ')); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td>
                    <span class="badge bg-<?php echo e($movie->status == 'active' ? 'success' : 'danger'); ?>">
                        <?php echo e($movie->status); ?>

                    </span>
                </td>
                <td><?php echo e($movie->created_at->format('d-m-Y')); ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?php echo e(route('view',$movie->id)); ?>"
                            class="btn btn-info btn-sm">
                            View
                        </a>
                        <a href="<?php echo e(route('edit',$movie->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?php echo e(route('delete',$movie->id)); ?>"
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

    <div class="d-flex justify-content-center mt-4">
        <?php echo e($movies->links()); ?>

    </div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/MyEntertainment/resources/views/livewire/movies-table.blade.php ENDPATH**/ ?>