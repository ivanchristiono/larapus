<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
   <!-- <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet"> -->
    <!-- <link href="<?php echo e(asset('css/fontawesome.min.css')); ?>" rel="stylesheet"> -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/regular.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/jquery.dataTables.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/selectize.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/selectize.bootstrap3.css')); ?>" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <?php if(Auth::check()): ?>
                            <li><a href="<?php echo e(url('/')); ?>">Dashboard</a></li>
                        <?php endif; ?>
                        <?php if (app('laratrust')->hasRole('admin')) : ?>
                            <li><a href="<?php echo e(route('authors.index')); ?>">Penulis</a></li>
                            <li><a href="<?php echo e(route('books.index')); ?>">Buku</a></li>
                            <li><a href="<?php echo e(route('members.index')); ?>">Member</a></li>
                        <?php endif; // app('laratrust')->hasRole ?>
                        <?php if (app('laratrust')->hasRole('member')) : ?>
                            <li><a href="<?php echo e(route('guests.index')); ?>">Peminjaman</a></li>
                        <?php endif; // app('laratrust')->hasRole ?>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(url('/register')); ?>">Daftar</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <?php if(auth()->check()): ?>
                                            <a href="<?php echo e(url('/settings/profile')); ?>">Profil</a>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/settings/password')); ?>"><i class="fa fa-btn fa-lock" aria-hidden="true"></i> Ubah Password</a></li>
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    <?php echo $__env->make('layouts._flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    
    <!-- <script src= "<?php echo e(asset('/js/app.js')); ?>"></script> -->
    <script src= "<?php echo e(asset('/js/jquery-3.4.1.min.js')); ?>"></script>
    <script src= "<?php echo e(asset('/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/selectize.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
    
</body>
</html>
