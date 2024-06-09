<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('css', '/css/home/admin-home-style.css'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <h1 class="mb-3">Welcome Admin</h1>
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
        <a href="/admin/list-teams">
            <div class="box">
                Teams
            </div>
        </a>
        <a href="/admin/list-seasons">
            <div class="box">
                Seasons
            </div>
        </a>
        <a href="/admin/list-fixtures">
            <div class="box">
                Fixtures
            </div>
        </a>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainAdminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\Fix\maenbal\resources\views/admin/home.blade.php ENDPATH**/ ?>