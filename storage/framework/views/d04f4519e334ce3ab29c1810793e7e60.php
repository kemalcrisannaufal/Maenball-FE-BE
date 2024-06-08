<?php $__env->startSection('title', 'Teams'); ?>

<?php $__env->startSection('css', '/css/news/admin-news-style.css'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="d-flex mt-3">
            <button class="btn-add"><a href="/admin/add-team">Tambah Klub</a></button>
        </div>
        <h3 class="my-3">List Teams</h3>
        <div class="container mt-4">
            <div class="row">
                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="<?php echo e(asset('storage/logo/' . $team->logo)); ?>" alt="<?php echo e($team->name); ?>" height="50" width="50">
                                    <h5 class="card-title"><?php echo e($team->name); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainAdminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\Fix\maenbal\resources\views/admin/team/team.blade.php ENDPATH**/ ?>