<?php $__env->startSection('title', $movie->title); ?>
<?php $__env->startSection('content'); ?>

<style>
    body {
        background: #f4f5f7;
        font-family: 'Inter', sans-serif;
    }

    /* MAIN */
    .admin-main {
        padding-top: 80px;
    }

    /* BACK BUTTON */
    .back-btn {
        position: fixed;
        top: 95px;
        right: 20px;
        background: #6366f1;
        color: #fff;
        padding: 10px 18px;
        border-radius: 30px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        z-index: 1000;
    }

    /* VIDEO */
    .video-card {
        max-width: 1000px;
        margin: 30px auto;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
        background: #000;
    }

    .video-ratio {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
    }

    .video-ratio iframe {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        border: 0;
    }

    /* TITLE BAR */
    .video-title {
        padding: 14px 20px;
        background: #fff;
        font-weight: 600;
        font-size: 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* ACTION */
    .video-actions button {
        border: 0;
        background: #f1f3f5;
        padding: 7px 14px;
        border-radius: 20px;
        margin-left: 8px;
        cursor: pointer;
        font-weight: 600;
    }

    /* ARTIST SECTION */

    .artist-section {
        max-width: 1000px;
        margin: 20px auto;
        background: #fff;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
    }

    .artist-title {
        font-weight: 700;
        margin-bottom: 20px;
    }

    .artist-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 20px;
    }

    .artist-card {
        text-align: center;
        cursor: pointer;
        transition: .3s;
    }

    .artist-card:hover {
        transform: translateY(-5px);
    }

    .artist-img {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        overflow: hidden;
        margin: auto;
        border: 3px solid #6366f1;
    }

    .artist-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .artist-name {
        margin-top: 10px;
        font-weight: 600;
        font-size: 14px;
    }

    /* MOVIE INFO */

    .movie-info {
        max-width: 1000px;
        margin: 20px auto 50px;
        background: #fff;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 15px;
    }

    .info-box {
        background: #f8f9fa;
        padding: 12px;
        border-radius: 15px;
    }

    .info-title {
        font-size: 12px;
        color: #6c757d;
    }

    .info-value {
        font-weight: 600;
    }

    .category {
        background: #6366f1;
        color: #fff;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        margin-right: 5px;
    }

    /* DESCRIPTION */

    .description {
        margin-top: 25px;
        background: #f8f9fa;
        padding: 18px;
        border-radius: 15px;
    }
</style>

<main class="admin-main">

    <a href="<?php echo e(url()->previous()); ?>" class="back-btn">← Back</a>

    <!-- VIDEO -->
    <div class="video-card">

        <div class="video-ratio">
            <iframe
                src="https://www.youtube.com/embed/<?php echo e($movie->youtube_video_id); ?>?autoplay=1&controls=1&rel=0&modestbranding=1&playsinline=1"
                allow="autoplay; encrypted-media"
                allowfullscreen>
            </iframe>
        </div>

        <div class="video-title">

            <?php echo e($movie->title); ?>


            <div class="video-actions">
                <button>👍 Like</button>
                <button>❤ Favorite</button>
                <button>🔗 Share</button>
            </div>

        </div>

    </div>


    <!-- ARTISTS -->

    <div class="artist-section">

        <div class="artist-title">
            Artists
        </div>

        <div class="artist-grid">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>

            <div class="artist-card">

                <div class="artist-img">
                    <img src="<?php echo e(asset('storage/artists/'.$artist->photo)); ?>">
                </div>

                <div class="artist-name">
                    <?php echo e($artist->name); ?>

                </div>

            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

        </div>

    </div>


    <!-- MOVIE INFO -->

    <div class="movie-info">

        <div class="info-grid">

            <div class="info-box">
                <div class="info-title">Category</div>
                <div class="info-value">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = json_decode($movie->category,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <span class="category"><?php echo e($cat); ?></span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>

            <div class="info-box">
                <div class="info-title">Language</div>
                <div class="info-value"><?php echo e($movie->language); ?></div>
            </div>

            <div class="info-box">
                <div class="info-title">Release Year</div>
                <div class="info-value"><?php echo e($movie->release_year); ?></div>
            </div>

            <div class="info-box">
                <div class="info-title">Status</div>
                <div class="info-value"><?php echo e($movie->status); ?></div>
            </div>

            <div class="info-box">
                <div class="info-title">Created</div>
                <div class="info-value"><?php echo e($movie->created_at->format('d M Y')); ?></div>
            </div>

        </div>


        <div class="description">

            <h5>Description</h5>

            <p>
                <?php echo e($movie->description); ?>

            </p>

        </div>

    </div>

</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/MyEntertainment/resources/views/view.blade.php ENDPATH**/ ?>