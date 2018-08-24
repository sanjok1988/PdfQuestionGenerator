<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PreQuesGen</title>
    <meta property="og:type" content="website" />
    <meta property="og:description" content="PreQuesGen is Pre Question Generator" />
    <meta property="og:image" content="<?php echo (!empty($posts->filename)) ? url(" uploads/ " . $posts->filename) : url("images/logo.png ") ?>" />
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>"> <?php echo e(HTML::style('fonts/font-awesome.min.css')); ?>

    <link rel="stylesheet" href="<?php echo e(url('css/app.css')); ?>"> <?php echo e(HTML::style('css/hover.css')); ?>


   
        <?php echo $__env->yieldContent('styles'); ?>
</head>

<body>

    
    <div id="app">

        <div class="container">

            <div class="wrapper">
                <div class="content-wrapper">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- Return to Top -->
                <a href="javascript:" id="return-to-top" class="c2">
                <i class="fa fa-chevron-up c5-txt"></i></a> 
                
            </div>
        </div>
    </div>
</body>

<?php echo e(HTML::script('js/jquery.js')); ?> 
<?php echo e(HTML::script('js/bootstrap.min.js')); ?> 
<?php echo $__env->yieldContent('scripts'); ?>

</html>