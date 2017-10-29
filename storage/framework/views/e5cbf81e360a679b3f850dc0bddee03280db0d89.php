<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tecno Ink Lasser</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            color: #fff;
            font-family: 'Monserrat', sans-serif;
            margin: 0;
        }

        body {
            background: url(/images/home-header.jpg);
            background-size: cover;
            box-sizing: border-box;
            position: relative;
            z-index: 0;
        }

        body:after {
            background: rgba(0, 0, 0, 0.3);
            content: "";
            position: absolute;
            top:0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }

        .full-height {
            height: 100%;
            min-height: calc(100vh);
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            background: url(/images/splash.png) 50% 50% no-repeat;
            background-size: contain;
            padding: 135px 0;
            max-width: 640px;
            width: 100%;
            z-index: 2;
        }

        .links {
            z-index: 2;
        }

        .links > a {
            color: #fff;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: .1rem;
            padding: 0 25px;
            text-transform: uppercase;
            text-decoration: none;
        }

        .img-responsive {
            height: auto;
            width: 100%;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <?php if(Route::has('login')): ?>
        <div class="top-right links">
            <?php if(auth()->guard()->check()): ?>
                <a href="https://www.grupocva.com/me_bpm/inicio_me.php">CVA</a>
                <a href="https://store.intcomex.com/es-XMX/Account/Login">Intcomex</a>
                <a href="<?php echo e(url('/selling')); ?>">Ventas</a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>">Login</a>
                <a href="<?php echo e(route('register')); ?>">Register</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="content">
        <img src="/images/logo.png" alt="Tecno Ink Lasser" class="img-responsive"/>
    </div>
</div>
</body>
</html>
