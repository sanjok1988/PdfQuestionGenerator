<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <script src="{{url('vue/vue.js')}}"></script>

    <script src="{{url('vue/vue-resource.js')}}"></script>
    {{ HTML::style("cms/css/bootstrap.min.css")}} {{ HTML::style("cms/fonts/css/font-awesome.min.css")}} {{ HTML::style("cms/css/animate.min.css")}} {{ HTML::style("vue/css/toastr.css")}} {{ HTML::style('cms/css/custom.css')}} {{ HTML::style('cms/css/icheck/flat/green.css')}}
    {{ HTML::script('cms/js/jquery.min.js')}} {{ HTML::script('cms/js/nprogress.js')}}

    <script src="{{url('vue/toastr.js')}}"></script>
    @yield('styles') {{ HTML::style('cms/css/dbros.css')}}

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('db-admin') }}" class="site_title"><i class="fa fa-home"></i> <span>{{$siteName or null}}</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{url('images/img.jpg')}}" alt="{{$siteName or null }}" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span> {{--
                            <h2>{{ Auth::user()->name }}</h2> --}}
                        </div>
                    </div>

                    @include('Layouts::sidebar')

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
                        <a href="{{url('logout')}}" data-toggle="tooltip" data-placement="top" title="Logout">
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
                                    <img src="{{url('images/img.jpg')}}" alt="">
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">

                                    <li>
                                        <a href="javascript:;">Help</a>
                                    </li>
                                    <li><a href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
                                <h2>{{ $pageName or 'Developed By Sanjok Dangol, Tulasi Bhandari, Gajendra Yadav, Manish Raimajhi'}}</h2>

                                <div class="clearfix"></div>
                            </div>
                            @yield('content')
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

    {{ HTML::script('cms/js/bootstrap.min.js')}}

    <!-- bootstrap progress js -->
  {{ HTML::script('cms/js/nicescroll/jquery.nicescroll.min.js')}}
    <!-- icheck -->
    {{ HTML::script('cms/js/icheck/icheck.min.js')}} 
    {{ HTML::script('cms/js/custom.js')}} 

    <!-- pace -->
    {{ HTML::script('cms/js/pace/pace.min.js')}} 
    {{ HTML::script('cms/js/datepicker/daterangepicker.js')}} @yield('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name=_token]').attr('content')
            }
        });
    </script>
</body>

</html>