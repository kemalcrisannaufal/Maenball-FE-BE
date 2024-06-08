<?php $__env->startSection('title', $news->title); ?>

<?php $__env->startSection('css', '/css/news/news-style.css'); ?>
<?php $__env->startSection('js', '/js/comment.js'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5 col-lg-7 col-md-7 col-sm-12 bg-light p-5 shadow">
        <div id="news">
            <h1 class="news-title-main"><?php echo e($news->title); ?></h1>
            <p class="news-date-main"><?php echo e($news->admin->name.' - '.$news->created_at); ?></p>
            <img src="<?php echo e(asset('storage/thumbnails/' . $news->thumbnail)); ?>" alt="<?php echo e($news->title); ?>" class="news-image-main">
            <p class="news-content-main"><?php echo nl2br(e($news->content)); ?></p>
        </div>

        <div id="comments">
            <h1 class="comment-title-main">Add Comment</h1>
            <div class="comment-input-box">
                <form action="/news-comment/<?php echo e($news->id); ?>" method="POST" style="width: 100%"
                    class="d-flex justify-content-center">
                    <div class="profile-picture-comment">
                        <?php if(auth()->user()->profile_picture == null): ?>
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                class="profile-image-comment">
                        <?php else: ?>
                            <img src="<?php echo e(asset('storage/profile/' . auth()->user()->profile_picture)); ?>" alt=""
                                class="profile-image-comment">
                        <?php endif; ?>
                    </div>
                    <input type="text" class="comment-input" placeholder="Tulis Komentar..." name="comment">
                    <?php echo csrf_field(); ?>
                    <button class="comment-button"><i class="fas fa-paper-plane" style="height: 50px; width: 50px"></i>
                    </button>
                </form>
            </div>

            <h1 class="comment-subtitle-main">Comments</h1>
            <?php $__currentLoopData = $news->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="comment">
                    <div class="profile-picture-comment">
                        <?php if($comment->users->profile_picture == null): ?>
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                class="profile-image-comment">
                        <?php else: ?>
                            <img src="<?php echo e(asset('storage/profile/' . $comment->users->profile_picture)); ?>" alt=""
                                class="profile-image-comment">
                        <?php endif; ?>
                    </div>
                    <div class="comment-content-box">
                        <p class="comment-name"><?php echo e($comment->users->name); ?></p>
                        <p class="comment-content"><?php echo e($comment->comment); ?></p>
                        <div class="d-flex gap-3">
                            <p class="comment-reply" data-comment-id="<?php echo e($comment->id); ?>">Reply</p>
                            <p class="see-replies" data-comment-id="<?php echo e($comment->id); ?>">See Replies</p>
                        </div>
                    </div>
                </div>
                <div class="reply-box" data-comment-id="<?php echo e($comment->id); ?>">
                    <form action="/news-comment/<?php echo e($comment->id); ?>/reply" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="reply" placeholder="Balas Komentar..." class="comment-reply-input">
                        <button class="comment-button" type="submit"><i class="fas fa-paper-plane"
                                style="height: 50px; width: 50px"></i> </button>
                    </form>
                </div>
                <div class="replies" data-comment-id="<?php echo e($comment->id); ?>">
                    <?php if($comment->replies->count() == 0): ?>
                        <p class="fw-bold fs-5 text-center">Tidak Ada Balasan</p>
                    <?php else: ?>
                        <p class="fw-bold fs-5">Balasan</p>
                        <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex justify-content-end gap-3 mb-2">
                                <div>
                                    <p class="comment-name"><?php echo e($reply->user->name); ?></p>
                                    <p class="comment-content"><?php echo e($reply->reply); ?></p>
                                </div>
                                <div class="profile-picture-comment">
                                    <?php if($reply->user->profile_picture == null): ?>
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                        class="profile-image-comment">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('storage/profile/' . $reply->user->profile_picture)); ?>" alt=""
                                        class="profile-image-comment">
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="mb-5"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/news/newsDetail.blade.php ENDPATH**/ ?>