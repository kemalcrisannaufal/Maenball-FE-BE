<?php $__env->startSection('title', 'Edit Profile'); ?>

<?php $__env->startSection('css', '/css/news/admin-news-style.css'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <h1>Edit Profile</h1>
    <div class="bg-light p-5 shadow" style="height: 300px">
        <form action="/profile/edit/<?php echo e($user->id); ?>" method="POST" enctype="multipart/form-data" class="w-100">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>">
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
            </div>
            <div class="mb-3">
                <button class="btn-submit">Edit</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/profile/editProfile.blade.php ENDPATH**/ ?>