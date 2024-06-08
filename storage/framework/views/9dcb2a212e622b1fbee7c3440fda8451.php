<?php $__env->startSection('title', 'Berita'); ?>

<?php $__env->startSection('css', '/css/news/news-main-style.css'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(count($news) > 0): ?>
        <?php
            $list_news = $news->reverse();
            $latest_news = $list_news->first();
            $side_news = $list_news->slice(1, 3);
            $news = $list_news->slice(4);
        ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8" id="latest">
                    <p class="fw-bold fs-3 mb-3">News</p>
                    <a href="/news/<?php echo e($latest_news->id); ?>">
                        <div class="latest-news-box">
                            <img src="<?php echo e(asset('storage/thumbnails/' . $latest_news->thumbnail)); ?>"
                                alt="<?php echo e($latest_news->title); ?>" class="img-news-latest">
                            <h4 class="latest-news-title"><?php echo e($latest_news->title); ?></h4>
                        </div>
                    </a>
                </div>
                <?php if(count($side_news) > 0): ?>
                <div class="col-md-4">
                    <h1 class="fw-bold fs-3 mb-3">Latest News</h1>
                    <div class="vertical-news-box">
                        <?php $__currentLoopData = $side_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="/news/<?php echo e($value->id); ?>">
                                <div class="news-side-box">
                                    <img src="<?php echo e(asset('storage/thumbnails/' . $value->thumbnail)); ?>" alt=""
                                        class="news-img">
                                    <p class="news-title"><?php echo e($value->title); ?></p>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <hr>
            <?php if(count($news) > 0): ?>
            <div class="row">
                <h1 class="fw-bold fs-3">More News</h1>
                <div class="horizontal-news-box">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/news/<?php echo e($value->id); ?>">
                            <div class="news-box">
                                <img src="<?php echo e(asset('storage/thumbnails/' . $value->thumbnail)); ?>" alt=""
                                    class="news-img">
                                <p class="news-title"><?php echo e($value->title); ?></p>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

    <?php endif; ?>

    <div class="mb-5"></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/news/news.blade.php ENDPATH**/ ?>