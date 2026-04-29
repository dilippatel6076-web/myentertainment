<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modern Bootstrap 5 Admin Template - Clean, responsive dashboard">
    <meta name="keywords" content="bootstrap, admin, dashboard, template, modern, responsive">
    <meta name="author" content="Bootstrap Admin Template">
    <meta name="theme-color" content="#6366f1">

    <!-- Favicon & Icons -->
    <link rel="icon" type="image/svg+xml" href="<?php echo e(asset('theme/assets/icon/favicon-CvUZKS4z.svg')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('theme/assets/images/favicon-B_cwPWBd.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('theme/assets/icon/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('theme/assets/fontawesome/css/all.min.css')); ?>">

    <!-- Fonts & Main CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('theme/assets/css/fonts.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('theme/assets/main-DLfE7m78.css')); ?>">

    <!-- Lite YouTube Embed Offline -->
    <link rel="stylesheet" href="<?php echo e(asset('theme/assets/lite-yt-embed.css')); ?>">

    <!-- PWA Manifest -->
    <link rel="manifest" href="<?php echo e(asset('theme/assets/manifest-DTaoG9pG.json')); ?>">

    <title><?php echo $__env->yieldContent('title', 'My Laravel App'); ?></title>
</head>

<body data-page="dashboard" class="admin-layout">
    <div class="admin-wrapper" id="admin-wrapper">
        <!-- Header & Navbar -->
        <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <!-- Sidebar Toggle Button -->
        <button class="hamburger-menu" type="button" data-sidebar-toggle aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <!-- Main Content -->
        <main class="admin-content">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <!-- Footer -->
        <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <!-- Lite YouTube Embed Offline JS -->
    <script src="<?php echo e(asset('theme/assets/lite-yt-embed.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButton = document.querySelector('[data-sidebar-toggle]');
            const wrapper = document.getElementById('admin-wrapper');
            if (!toggleButton || !wrapper) return;

            const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
            if (isCollapsed) wrapper.classList.add('sidebar-collapsed');

            toggleButton.addEventListener('click', () => {
                wrapper.classList.toggle('sidebar-collapsed');
                localStorage.setItem('sidebar-collapsed', wrapper.classList.contains('sidebar-collapsed'));
            });
        });
    </script>
</body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/MyEntertainment/resources/views/layouts/app.blade.php ENDPATH**/ ?>