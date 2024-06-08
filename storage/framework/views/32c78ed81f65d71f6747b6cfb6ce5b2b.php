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
    <?php
        $list_video = $videos->reverse();
        $side_video = $list_video->slice(0, 4);
        $rest_video = $list_video->slice(4);
    ?>
    <div class="container mt-5 mb-3">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <h1 class="fs-2 mb-3">Highlight</h1>
                <div>
                    <iframe src="<?php echo e($video->url); ?>" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="main-video-description">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="fs-4"><?php echo e($video->title); ?></h1>
                            <div class="d-flex gap-3">
                                <form action="/highlight/like/<?php echo e($video->id); ?>" method="POST">
                                    <?php
                                        $isLiked = \App\Models\LikedVideo::where('user_id', auth()->id())
                                            ->where('video_id', $video->id)
                                            ->exists();
                                    ?>
                                    <button class="btn-like" data-video-id="<?php echo e($video->id); ?>"
                                        data-url="<?php echo e(route('video.like', ['id' => $video->id])); ?>" type="button">
                                        <i class="fas fa-heart <?php echo e($isLiked ? 'icon-love-liked' : 'icon-love'); ?>"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p><?php echo e($video->description); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h1 class="fw-bold fs-3 mb-3">Other Highlights</h1>
                <?php $__currentLoopData = $side_video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/highlight/<?php echo e($video->id); ?>">
                        <div class="side-video mb-4">
                            <img class="img-side-video" src="<?php echo e(asset('storage/videos/thumbnails/' . $video->thumbnail)); ?>"
                                alt="<?php echo e($video->title); ?>">

                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <hr class="mt-5">

            <?php if(count($rest_video) > 0): ?>
            <div class="row">
                <h1 class="fw-bold fs-3">More Highlight</h1>
                <div class="horizontal-highlight-box">
                    <?php $__currentLoopData = $rest_video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/highlight/<?php echo e($video->id); ?>">
                            <div class="highlight-box">
                                <img class="img-highlight" src="<?php echo e(asset('storage/videos/thumbnails/' . $video->thumbnail)); ?>"
                                    alt="<?php echo e($video->title); ?>">
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/highlight/videoDetail.blade.php ENDPATH**/ ?>