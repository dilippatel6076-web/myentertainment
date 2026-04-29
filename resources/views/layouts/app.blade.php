<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    @livewireStyles
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modern Bootstrap 5 Admin Template - Clean, responsive dashboard">
    <meta name="keywords" content="bootstrap, admin, dashboard, template, modern, responsive">
    <meta name="author" content="Bootstrap Admin Template">
    <meta name="theme-color" content="#6366f1">

    <!-- Favicon & Icons -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('theme/assets/icon/favicon-CvUZKS4z.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('theme/assets/images/favicon-B_cwPWBd.png') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/icon/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/fontawesome/css/all.min.css') }}">

    <!-- Fonts & Main CSS -->
    <link rel="stylesheet" href="{{ asset('theme/assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/main-DLfE7m78.css') }}">

    <!-- Lite YouTube Embed Offline -->
    <link rel="stylesheet" href="{{ asset('theme/assets/lite-yt-embed.css') }}">

    <!-- PWA Manifest -->
    <link rel="manifest" href="{{ asset('theme/assets/manifest-DTaoG9pG.json') }}">

    <title>@yield('title', 'My Laravel App')</title>
</head>

<body data-page="dashboard" class="admin-layout">
    <div class="admin-wrapper" id="admin-wrapper">
        <!-- Header & Navbar -->
        @include('partials.header')
        @include('partials.navbar')
        <!-- Sidebar Toggle Button -->
        <button class="hamburger-menu" type="button" data-sidebar-toggle aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <!-- Main Content -->
        <main class="admin-content">
            @yield('content')
        </main>
        <!-- Footer -->
        @include('partials.footer')
    </div>
    @livewireScripts
    <!-- Lite YouTube Embed Offline JS -->
    <script src="{{ asset('theme/assets/lite-yt-embed.js') }}"></script>
    <script src="{{ asset('theme/assets/js/bootstrap.bundle.min.js') }}"></script>
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
</html>