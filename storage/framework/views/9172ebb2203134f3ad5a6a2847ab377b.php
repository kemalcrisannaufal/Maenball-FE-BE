<?php $__env->startSection('title', 'List News'); ?>

<?php $__env->startSection('css', '/css/news/admin-news-style.css'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1>Daftar Berita</h1>
        <div class="d-flex mt-3">
            <button class="btn-add"><a href="/admin/add-news">Tambah Berita</a></button>
        </div>
        <div class="table-responsive mt-2 list-box shadow">
            <?php if($news->count() == 0): ?>
                <div class="p-2" style="background-color: rgb(2, 60, 94);">
                    <h5 class="text-white text-center m-0">Tidak ada berita</h5>
                </div>
            <?php else: ?>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($value->admin->name); ?></td>
                                <td><?php echo e($value->title); ?></td>
                                <td><?php echo e($value->created_at); ?></td>
                                <td><?php echo e($value->updated_at); ?></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1 align-items-center">
                                        <a class="btn btn-primary" href="/admin/news/edit/<?php echo e($value->id); ?>">Edit</a>
                                        <form action="/admin/news/delete/<?php echo e($value->id); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-danger"
                                                href="/admin/news/delete/<?php echo e($value->id); ?>">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainAdminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\maenbal\resources\views/news/admin/listNews.blade.php ENDPATH**/ ?>