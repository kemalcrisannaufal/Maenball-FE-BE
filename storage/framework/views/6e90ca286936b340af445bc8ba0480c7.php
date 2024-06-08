<?php $__env->startSection('title', 'Liked Videos'); ?>

<?php $__env->startSection('css', '/css/highlight/liked-video-style.css'); ?>

<?php $__env->startSection('content'); ?>

    <div class="m-5">
        <div class="title-box">
            <h1 class="fs-2">Videos You Like</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="img-box">
                    <img src="images/messi.png" alt="" width="450">
                </div>
            </div>

            <div class="col-md-8">

                <?php if($liked_videos->count() == 0): ?>
                    <div class="d-flex justify-content-center align-items-center w-100 p-5 text-white bg-primary">
                        <p class="text-center">Tidak ada video yang anda sukai</p>
                    </div>
                <?php else: ?>
                    <div class="d-flex flex-wrap gap-2">
                        <?php $__currentLoopData = $liked_videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="/highlight/<?php echo e($video->video->id); ?>">
                                <div class="video-box">
                                    <img src="<?php echo e(asset('storage/videos/thumbnails/' . $video->video->thumbnail)); ?>"
                                        alt="" class="video-thumbnail">
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                <?php endif; ?>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/highlight/likedVideos.blade.php ENDPATH**/ ?>