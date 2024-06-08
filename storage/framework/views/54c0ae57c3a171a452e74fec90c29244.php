<?php
    $list_videos = $videos->reverse();
    $latest_video = $list_videos->first();
    $videos = $list_videos->slice(1);
?>


<?php $__env->startSection('title', 'Highlight'); ?>
<?php $__env->startSection('css', '/css/highlight/highlight-main-style.css'); ?>
<?php $__env->startSection('js', '/js/highlight/highlight.js'); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.btn-like').click(function(e) {
                e.preventDefault();
                var button = $(this);
                var videoId = button.data('video-id');
                var url = button.data('url');
                var iconLove = button.find('.icon-love');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        video_id: videoId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            iconLove.toggleClass(
                                'icon-love-liked');
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: " + status + " " + error);
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <img src="images/videonav.png" alt="">
    <?php if($latest_video): ?>
        <div class="container mt-5 mb-5">
            <h1 class="fw-bold fs-3 mb-3">Highlight</h1>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <a href="/highlight/<?php echo e($latest_video->id); ?>">
                            <img src="<?php echo e(asset('storage/videos/thumbnails/' . $latest_video->thumbnail)); ?>" alt=""
                                class="w-100">
                        </a>
                    </div>
                </div>
            </div>

            <?php if(count($videos) > 0): ?>
                <h1 class="fw-bold fs-3 mt-4">More Highlight</h1>
                <div class="highlight-grid">
                    <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/highlight/<?php echo e($video->id); ?>" class="highlight" data-highlight-id="<?php echo e($video->id); ?>">
                            <div class="video-box">
                                <img src="<?php echo e(asset('storage/videos/thumbnails/' . $video->thumbnail)); ?>"
                                    alt="<?php echo e($video->title); ?>" class="side-thumbnail">
                                <div class="highlight-title" data-highlight-id="<?php echo e($video->id); ?>">
                                    <p><?php echo e($video->title); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="d-flex justify-content-center align-items-center w-100 p-5">
            <p class="text-center">Tidak ada highlight</p>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/highlight/video.blade.php ENDPATH**/ ?>