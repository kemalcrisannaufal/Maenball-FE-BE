<?php $__env->startSection('title', 'Schedule'); ?>

<?php $__env->startSection('css', 'css/schedule/schedule-style.css'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <?php if($main_schedule != null): ?>
                    <?php
                        $utcTime = $main_schedule['date'] . ' ' . $main_schedule['time'];
                        $localTime = Carbon\Carbon::parse($utcTime)->setTimezone('Asia/Jakarta');
                        $time = explode(' ', $localTime);
                    ?>
                    <div class="img-box">
                        <img src="images/schedule.png" alt="" class="img">
                        <div class="newest-schedule-match">
                            <p class="fw-bold fs-2 text-white mb-3" id="title">Upcoming Match</p>
                            <div class="d-flex justify-content-start align-items-center gap-3">
                                <p class="fw-bold fs-4"><?php echo e($main_schedule['home_name']); ?></p>
                                <p class="fw-bold fs-2 text-white">VS</p>
                                <p class="fw-bold fs-4"><?php echo e($main_schedule['away_name']); ?></p>
                            </div>
                            <div class="d-flex justify-content-start align-items-center gap-5 mt-3">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="far fa-calendar"></i>
                                    <p class="text-white"><?php echo e($time[0]); ?></p>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="far fa-clock"></i>
                                    <p class="text-white"> <?php echo e($time[1] . ' WIB'); ?></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 mt-3">
                                <i class="fas fa-map-marker-alt"></i>
                                <p><?php echo e($main_schedule['location']); ?></p>
                            </div>
                            <div id="newest-schedule-club"></div>
                        </div>
                    </div>
                <?php else: ?>
                    <img src="images/schedule.png" alt="" class="img">
                    <div class="newest-schedule-match">
                        <div class="d-flex justify-content-start align-items-center gap-3">
                            <p class="fw-bold fs-2 text-white">Tidak Ada Match</p>
                        </div>
                    </div>
                <?php endif; ?>

                <h1 class="fw-bold fs-3 my-3">Other Matches</h1>
                <?php if($schedule != null && $schedule->count() > 0): ?>
                    <?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $utcTime = $match['date'] . ' ' . $match['time'];
                            $localTime = Carbon\Carbon::parse($utcTime)->setTimezone('Asia/Jakarta');
                            $time = explode(' ', $localTime);
                        ?>
                        <div class="match-box"
                            style="background: linear-gradient(to left, rgba(0, 75, 117,  <?php echo e(1 - $index * 0.05); ?>), rgba(52, 61, 135,  <?php echo e(1 - $index * 0.05); ?>));">
                            <div>
                                <div class="club-match-box">
                                    <div class="item-box">
                                        <p class="fw-bold fs-4"><?php echo e($match['home_name']); ?></p>
                                    </div>
                                    <div>
                                        <p>VS</p>
                                    </div>
                                    <div class="item-box">
                                        <p class="fw-bold fs-4"><?php echo e($match['away_name']); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-box">
                                <i class="far fa-clock"></i>
                                <p><?php echo e($localTime . ' WIB'); ?></p>
                            </div>
                            <div class="item-box">
                                <i class="fas fa-map-marker-alt"></i>
                                <p><?php echo e($match['location']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="d-flex justify-content-center mt-4">
                        <?php echo e($schedule->links('pagination::bootstrap-4')); ?>

                    </div>
                <?php else: ?>
                    <div class="d-flex justify-content-center align-items-center w-100 p-2" id="no-schedule">
                        <p class="text-center text-white fw-bold fs-4">Tidak ada jadwal</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/schedule/schedule.blade.php ENDPATH**/ ?>