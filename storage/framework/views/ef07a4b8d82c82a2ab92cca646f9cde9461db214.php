<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <script src="<?php echo e(url('vue/vue.js')); ?>"></script>

    <script src="<?php echo e(url('vue/vue-resource.js')); ?>"></script>
    <?php echo e(HTML::style("cms/css/bootstrap.min.css")); ?> <?php echo e(HTML::style("cms/fonts/css/font-awesome.min.css")); ?> <?php echo e(HTML::style("cms/css/animate.min.css")); ?> <?php echo e(HTML::style("vue/css/toastr.css")); ?> <?php echo e(HTML::style('cms/css/custom.css')); ?> <?php echo e(HTML::style('cms/css/icheck/flat/green.css')); ?>

    <?php echo e(HTML::script('cms/js/jquery.min.js')); ?> <?php echo e(HTML::script('cms/js/nprogress.js')); ?>


    <script src="<?php echo e(url('vue/toastr.js')); ?>"></script>
    <?php echo $__env->yieldContent('styles'); ?> <?php echo e(HTML::style('cms/css/dbros.css')); ?>


</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo e(url('db-admin')); ?>" class="site_title"><i class="fa fa-home"></i> <span><?php echo e(isset($siteName) ? $siteName : null); ?></span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo e(url('images/img.jpg')); ?>" alt="<?php echo e(isset($siteName) ? $siteName : null); ?>" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span> <?php /*
                            <h2><?php echo e(Auth::user()->name); ?></h2> */ ?>
                        </div>
                    </div>

                    <?php echo $__env->make('Layouts::sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a href="<?php echo e(url('logout')); ?>" data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo e(url('images/img.jpg')); ?>" alt="">
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">

                                    <li>
                                        <a href="javascript:;">Help</a>
                                    </li>
                                    <li><a href="<?php echo e(url('logout')); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="row">
                    <span class="section alert alert-danger" id="message"></span>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><?php echo e(isset($pageName) ? $pageName : 'Developed By Sanjok Dangol, Tulasi Bhandari, Gajendra Yadav, Manish Raimajhi'); ?></h2>

                                <div class="clearfix"></div>
                            </div>
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>

                    </div>
                </div>


                <!-- footer content -->
                <footer>
                    <div class="copyright-info">
                        <p class="pull-right">Developed by <a href="">Sanjok Dangol, Tulasi Bhandari, Gajendra Yadav, Manish Raimajhi</a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>
            <!-- /page content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <?php echo e(HTML::script('cms/js/bootstrap.min.js')); ?>


    <!-- bootstrap progress js -->
  <?php echo e(HTML::script('cms/js/nicescroll/jquery.nicescroll.min.js')); ?>

    <!-- icheck -->
    <?php echo e(HTML::script('cms/js/icheck/icheck.min.js')); ?> 
    <?php echo e(HTML::script('cms/js/custom.js')); ?> 

    <!-- pace -->
    <?php echo e(HTML::script('cms/js/pace/pace.min.js')); ?> 
    <?php echo e(HTML::script('cms/js/datepicker/daterangepicker.js')); ?> <?php echo $__env->yieldContent('scripts'); ?>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name=_token]').attr('content')
            }
        });
    </script>
</body>

</html>