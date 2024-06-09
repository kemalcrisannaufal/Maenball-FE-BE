<?php $__env->startSection('title', 'Teams'); ?>

<?php $__env->startSection('css', '/css/form/admin-form-style.css'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="d-flex mt-3">
            <button class="btn-add"><a href="/admin/add-team">Tambah Klub</a></button>
        </div>
        <h3 class="my-3">List Teams</h3>

        <?php if($teams->count() == 0): ?>
            <div class="p-2 mt-5"">
                <h5 class="text-center m-0">Tidak ada team</h5>
            </div>
        <?php else: ?>
            <div class="container mt-4">
                <div class="row">
                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 mb-4">
                            <div class="card shadow-md">
                                <div class="card-body">
                                    <div class="d-flex flex-column gap-3 align-items-center">
                                        <img src="<?php echo e(asset('storage/logo/' . $team->logo)); ?>" alt="<?php echo e($team->name); ?>"
                                            height="150" width="150">
                                        <h5 class="card-title"><?php echo e($team->name); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="d-flex justify-content-center my-4">
            <?php echo e($teams->links('pagination::bootstrap-4')); ?>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainAdminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\Fix\maenbal\resources\views/admin/team/team.blade.php ENDPATH**/ ?>