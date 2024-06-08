<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src=<?php echo $__env->yieldContent('js'); ?>></script>
    <?php echo $__env->yieldContent('script'); ?>
    <link rel="stylesheet" href='/css/style.css'>
    <link rel="stylesheet" href=<?php echo $__env->yieldContent('css'); ?>>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function() {
            var nav = document.getElementById('nav');
            nav.classList.toggle('active');
        });
    </script>
</head>

<body>
    <div class="page-container">
        <div class="container-fluid navbar">
            <a href="/admin/dashboard"><img src="<?php echo e(asset('/images/ligachamp.png')); ?>" alt=""
                    id="logo"></a>
            <div class="nav">
                <ul class="d-flex gap-5 align-items-center" id="nav">
                    <li><a href="/admin/dashboard">Beranda</a></li>
                    <li><a href="/admin/list-news">Berita</a></li>
                    <li><a href="/admin/list-highlight">Highlight</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>


    <div class="footer">
        <p>Made By Group D</p>
        <p>Copyright &copy; 2024. All Rights Reserved.</p>
    </div>

</body>

</html>
<?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\Fix\maenbal\resources\views/layouts/mainAdminLayout.blade.php ENDPATH**/ ?>