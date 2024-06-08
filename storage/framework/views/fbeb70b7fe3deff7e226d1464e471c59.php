<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/css/auth/auth-style.css">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>

<body>
    <div class="container col-xl-12 col-xxl-10 px-4 mt-5">
        <div class="row align-items-center g-lg-5 mt-5">
            <div class="col-lg-5 text-center text-lg-start">
                <h1 class="fw-bold lh-1 text-white text-center">Maenbal</h1>
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <img src="<?php echo e(asset('/images/authimage.png')); ?>" alt="" id="logo" style="width: 100%">
                </div>
            </div>
            <div class="col-md-10 mx-auto col-lg-4">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\Users\Kemal Crisannaufal\Documents\Kuliah\Semester 6\ABP-MODUL\Fix\maenbal\resources\views/layouts/auth/authLayout.blade.php ENDPATH**/ ?>