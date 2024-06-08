<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css', '/css/home/home-style.css'); ?>

<?php $__env->startSection('js', '/js/dashboard.js'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div id="standings-web">
                    <p class="fw-bold fs-3 mb-3">Standings</p>
                    <?php $__currentLoopData = $standings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="background-color: rgb(2, 60, 94);
                                            color: white;">Group <?php echo e($value[0]['group_name']); ?></th>
                                            <th style="background-color: rgb(2, 60, 94);
                                            color: white;">Pts</th>
                                            <th style="background-color: rgb(2, 60, 94);
                                            color: white;">W</th>
                                            <th style="background-color: rgb(2, 60, 94);
                                            color: white;">D</th>
                                            <th style="background-color: rgb(2, 60, 94);
                                            color: white;">L</th>
                                            <th style="background-color: rgb(2, 60, 94);
                                            color: white;">Ga</th>
                                            <th style="background-color: rgb(2, 60, 94);
                                            color: white;">Gd</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for($i = 0; $i < 4; $i++): ?>
                                            <tr>
                                                <td><?php echo e($value[$i]['name']); ?></td>
                                                <td><?php echo e($value[$i]['points']); ?></td>
                                                <td><?php echo e($value[$i]['won']); ?></td>
                                                <td><?php echo e($value[$i]['drawn']); ?></td>
                                                <td><?php echo e($value[$i]['lost']); ?></td>
                                                <td><?php echo e($value[$i]['goals_scored']); ?></td>
                                                <td><?php echo e($value[$i]['goals_conceded']); ?></td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-5">
                    <img src="images/maenbal.png" alt="">
                </div>
            </div>

            <div class="col-md-8 col-lg-8 col-sm-12" id="right-side">
                <p class="fw-bold fs-3 mb-3">Latest News</p>
                <div class="news-slider">
                    <button class="button prev">&#10094;</button>
                    <div class="news-wrapper">
                        <?php $__currentLoopData = $latest_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="news-homepage">
                                <a href="/news/<?php echo e($news->id); ?>">
                                    <img src="<?php echo e('/storage/thumbnails/' . $news->thumbnail); ?>" alt="<?php echo e($news->title); ?>"
                                        class="img-news">
                                </a>
                                <h4 class="news-title-homepage"><?php echo e($news->title); ?></h4>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <button class="button next">&#10095;</button>
                </div>

                <?php if(count($schedule) > 0): ?>
                    <div class="schedule-section">
                        <div class="d-flex justify-content-between mb-3">
                            <p class="fw-bold fs-4">Next Match</p>
                            <a href="/schedule" class="fw-bold fs-4 text-decoration-none text-dark">View All</a>
                        </div>
                        <?php for($i = 0; $i < count($schedule); $i++): ?>
                            <?php
                                $color1 = 'rgb(' . (1 + $i * 15) . ', 109, 171)';
                                $color2 = 'rgba(' . (52 + $i * 15) . ', 61, 135, 1)';
                            ?>
                            <div class="schedule-box"
                                style="background: linear-gradient(to left, <?php echo e($color1); ?>, <?php echo e($color2); ?> );">
                                <div class="d-flex align-items-center gap-4 w-100" style="color: ">
                                    <div class="versus-container">
                                        <div class="team home-team team-responsive">
                                            <p><?php echo e($schedule[$i]['home_name']); ?></p>
                                        </div>
                                        <div class="score score-responsive">
                                            <p class="mb-0">|</p>
                                            <p class="mb-0">VS</p>
                                            <p class="mb-0">|</p>
                                        </div>
                                        <div class="team away-team team-responsive">
                                            <p><?php echo e($schedule[$i]['away_name']); ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <?php
                                            $utcTime = $schedule[$i]['date'] . ' ' . $schedule[$i]['time'];
                                            $localTime = Carbon\Carbon::parse($utcTime)
                                                ->setTimezone('Asia/Jakarta')
                                                ->format('Y-m-d H:i');
                                        ?>
                                        <i class="fas fa-clock"></i>
                                        <p><?php echo e($localTime); ?></p>
                                    </div>
                                    <div class="stadium">
                                        <div
                                            class="d-flex justify-content-center align-items-center gap-3 location-stadium">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p><?php echo e($schedule[$i]['location']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php endfor; ?>
                <?php endif; ?>

                <?php if(count($score) > 0): ?>
                    <div class="d-flex justify-content-between mb-3 mt-3">
                        <p class="fw-bold fs-4">Last Matches</p>
                        <a href="/score" class="fw-bold fs-4 text-decoration-none text-dark">View All</a>
                    </div>
                    <?php for($i = 0; $i < count($score); $i++): ?>
                        <?php
                            $color1 = 'rgb(' . (1 + $i * 15) . ', 109, 171)';
                            $color2 = 'rgba(' . (52 + $i * 15) . ', 61, 135, 1)';
                        ?>
                        <div class="schedule-box"
                            style="background: linear-gradient(to left, <?php echo e($color1); ?>, <?php echo e($color2); ?> );">
                            <div class="d-flex align-items-center gap-4 w-100">
                                <div class="versus-container">
                                    <div class="team home-team">
                                        <p><?php echo e($score[$i]['home_name']); ?></p>
                                    </div>
                                    <div class="score">
                                        <p class="score-text"><?php echo e($score[$i]['score']); ?></p>
                                    </div>
                                    <div class="team away-team">
                                        <p><?php echo e($score[$i]['away_name']); ?></p>
                                    </div>
                                </div>

                                <div class="date-time">
                                    <div class="d-flex justify-content-center align-items-center gap-3 me-2">
                                        <?php
                                            $utcTime = $score[$i]['date'] . ' ' . $score[$i]['scheduled'];
                                            $localTime = Carbon\Carbon::parse($utcTime)
                                                ->setTimezone('Asia/Jakarta')
                                                ->format('Y-m-d H:i');
                                        ?>
                                        <i class="fas fa-clock"></i>
                                        <p><?php echo e($localTime); ?></p>
                                    </div>
                                </div>
                                <div class="stadium">
                                    <div class="d-flex justify-content-center align-items-center gap-3 location-stadium">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p><?php echo e($score[$i]['location']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>


                <div class="highlight-section">
                    <div class="d-flex justify-content-between mb-3">
                        <p class="fw-bold fs-4">Highlights</p>
                        <a href="/highlight" class="fw-bold fs-4 text-decoration-none text-dark">View All</a>
                    </div>
                    <div>
                        <?php $__currentLoopData = $highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="/highlight/<?php echo e($highlight->id); ?>">
                                <div class="highlight-box">
                                    <img src="<?php echo e(asset('storage/videos/thumbnails/' . $highlight->thumbnail)); ?>"
                                        alt="<?php echo e($highlight->title); ?>" class="highlight-thumbnail">
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div id="standings-mobile">
                    <p class="fw-bold fs-4 mb-3">Standings</p>
                    <?php $__currentLoopData = $standings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Group <?php echo e($value[0]['group_name']); ?></th>
                                            <th>Pts</th>
                                            <th>W</th>
                                            <th>D</th>
                                            <th>L</th>
                                            <th>Ga</th>
                                            <th>Gd</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for($i = 0; $i < 4; $i++): ?>
                                            <tr>
                                                <td><?php echo e($value[$i]['name']); ?></td>
                                                <td><?php echo e($value[$i]['points']); ?></td>
                                                <td><?php echo e($value[$i]['won']); ?></td>
                                                <td><?php echo e($value[$i]['drawn']); ?></td>
                                                <td><?php echo e($value[$i]['lost']); ?></td>
                                                <td><?php echo e($value[$i]['goals_scored']); ?></td>
                                                <td><?php echo e($value[$i]['goals_conceded']); ?></td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <hr>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/home.blade.php ENDPATH**/ ?>