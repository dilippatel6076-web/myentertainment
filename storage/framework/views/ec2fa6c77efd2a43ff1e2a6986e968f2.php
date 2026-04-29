<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
</head>

<body>

    <div class="login-card">
        <div class="login-left">
            <h1>Welcome Back!</h1>
            <p>Manage your dashboard, users, and reports with a single login.</p>
        </div>

        <div class="login-right">
            <h2>Admin Login</h2>
            <form method="POST" action="/check">
                <?php echo csrf_field(); ?>
                <div class="form-floating">
                    <input type="email" id="email" name="email" placeholder="Email Address" value="<?php echo e(old('email')); ?>" autofocus>
                    <label for="email">Email Address</label>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger" style="font-size:0.85rem;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="form-floating">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger" style="font-size:0.85rem;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <a href="<?php echo e(route('register')); ?>" class="login-btn">Register</a>
                    </div>
                    <a href="" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="login-btn mb-3">Login</button>
            </form>
        </div>
    </div>
</body>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/MyEntertainment/resources/views/login.blade.php ENDPATH**/ ?>