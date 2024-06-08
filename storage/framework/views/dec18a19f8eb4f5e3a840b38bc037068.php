<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5 d-flex justify-content-center">
    <div class="d-flex mt-5 gap-5 justify-content-center align-items-center">
        <?php if($user->profile_picture == null): ?>
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="" width="200" height="200">
        <?php else: ?>
            <img src="<?php echo e(asset('storage/profile/' . $user->profile_picture)); ?>" alt="" width="200" height="200">
        <?php endif; ?>
        <div>
            <h1><?php echo e($user->name); ?></h1>
            <p><?php echo e($user->email); ?></p>
            <a href="/profile/edit/<?php echo e($user->id); ?>" class="btn btn-primary mt-3">Edit Profile</a>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/profile/profile.blade.php ENDPATH**/ ?>