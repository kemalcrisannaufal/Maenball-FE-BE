<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div>
    <div class="mb-3 text-center">
        <h1 class="text-white">Welcome Back</h1>
        <p class="text-white">Enter your credentials to access your account</p>
    </div>
    <form class="w-100" action="/login" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="email" class="form-label text-white">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com"
                name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-white">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password"
                name="password">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <small class="text-white">Dont have an account? <a href="/register" style="text-decoration: none" class="text-primary fw-bold">Sign up</a></small>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth.authLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\Fix\maenbal\resources\views/auth/login.blade.php ENDPATH**/ ?>