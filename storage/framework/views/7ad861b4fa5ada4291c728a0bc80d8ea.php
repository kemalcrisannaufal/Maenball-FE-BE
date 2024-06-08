<?php $__env->startSection('title', 'Add News'); ?>

<?php $__env->startSection('css', '/css/news/admin-news-style.css'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1>Form Tambah Berita</h1>
    <div class="edit-box">
        <form action="/admin/news" method="POST" enctype="multipart/form-data" class="w-100">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Judul Berita">
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Isi Berita..."></textarea>
            </div>
            <div class="mb-3">
                <button class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainAdminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\Fix\maenbal\resources\views/news/admin/addNews.blade.php ENDPATH**/ ?>