<?php $__env->startSection('title', 'Score'); ?>

<?php $__env->startSection('css', '/css/score/score-style.css'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="img-box">
                <div id="img">
                    <img src="images/score.png" alt="" class="img">
                </div>
                <div class="d-flex justify-content-center align-items-center gap-3 text-white" id="main-score">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <p class="text-center fw-bold fs-2"><?php echo e($latest_match[0]['home_name']); ?></p>
                    </div>
                    <div class="text-center fw-bold fs-3">
                        <p><?php echo e($latest_match[0]['score']); ?></p>
                        <P class="text-white fw-bold fs-4">FULL TIME</P>
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <p class="text-center fw-bold fs-2"><?php echo e($latest_match[0]['away_name']); ?></p>
                    </div>
                </div>
                <div class="date-main-info">
                    <p class="fw-bold">UEFA Champions League</p>
                    <?php
                        $utcTime = $latest_match[0]['date'] . ' ' . $latest_match[0]['scheduled'];
                        $localTime = Carbon\Carbon::parse($utcTime)
                            ->setTimezone('Asia/Jakarta')
                            ->format('Y-m-d H:i');
                        $time = explode(' ', $localTime);
                    ?>
                    <p class="fw-bold"><?php echo e($localTime); ?></p>
                </div>
                <div class="additional-main-info">
                    <div class="d-flex gap-3 align-items-center">
                        <i class="far fa-clock"></i>
                        <p class="fw-bold"><?php echo e($time[1] . ' WIB'); ?></p>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <i class="fas fa-map-marker-alt"></i>
                        <p class="fw-bold"><?php echo e($latest_match[0]['location']); ?></p>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <p class="fw-bold fs-3 mb-2 text-dark">Result of the other matches</p>
                <div class="row">
                    <?php $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 mb-4">
                            <div class="score-main-box">
                                <div class="score-box">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <p class="fw-bold fs-5 text-white"><?php echo e($match['home_name']); ?></p>
                                    </div>
                                    <div>
                                        <p class="fw-bold fs-2 text-white"><?php echo e($match['score']); ?></p>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <p class="fw-bold fs-5 text-white"><?php echo e($match['away_name']); ?></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2 p-2 gap-2">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="far fa-clock"></i>
                                        <?php
                                            $utcTime = $match['date'] . ' ' . $match['scheduled'];
                                            $localTime = Carbon\Carbon::parse($utcTime)
                                                ->setTimezone('Asia/Jakarta')
                                                ->format('Y-m-d H:i');
                                        ?>
                                        <p><?php echo e($localTime); ?></p>
                                    </div>
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p><?php echo e($match['location']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo e($matches->links('pagination::bootstrap-4')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/score/score.blade.php ENDPATH**/ ?>