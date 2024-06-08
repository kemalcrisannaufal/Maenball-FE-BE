<?php $__env->startSection('title', 'Add News'); ?>

<?php $__env->startSection('css', '/css/news/admin-news-style.css'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1>Add Team</h1>
    <div class="edit-box">
        <form action="/admin/team" method="POST" enctype="multipart/form-data" class="w-100">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Team Name">
            </div>
            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo">
            </div>
            <div class="mb-3">
                <button class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainAdminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\Fix\maenbal\resources\views/admin/team/addTeam.blade.php ENDPATH**/ ?>