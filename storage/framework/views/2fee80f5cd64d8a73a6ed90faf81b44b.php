<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('css', '/css/home/admin-home-style.css'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <h1 class="mb-3">Selamat Datang Admin</h1>
    <div class="d-flex gap-5 justify-content-center">
        <a href="/admin/list-news">
            <div class="box">
                Berita
            </div>
        </a>
        <a href="/admin/list-highlight">
            <div class="box">
                Highlight
            </div>
        </a>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainAdminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/admin/home.blade.php ENDPATH**/ ?>