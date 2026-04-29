<?php $__env->startSection('title', 'Home Page'); ?>

<?php $__env->startSection('content'); ?>

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
                <a href="<?php echo e(url('add_product')); ?>" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i> Add Product
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
                                <!-- Livewire table -->
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('movies-table', []);

$key = null;
$__componentSlots = [];

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-4105818039-0', $key);

$__html = app('livewire')->mount($__name, $__params, $key, $__componentSlots);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/MyEntertainment/resources/views/movies.blade.php ENDPATH**/ ?>