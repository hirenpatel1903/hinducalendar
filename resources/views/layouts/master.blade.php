<?php
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta name="robots" content="noindex, nofollow">
        <title>@lang('messages.siteName') - @yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->

        <link href="{{url('assets/layouts/layout4/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/layouts/layout4/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url('assets/layouts/layout4/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{url('assets/developer/developer.css')}}" rel="stylesheet" type="text/css" />
        {{-- <link href="{{url('assets/developer/admin_menu.css')}}" rel="stylesheet" type="text/css" /> --}}
        <link href="{{url('assets/tost/toastr.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->


        <!-- END THEME LAYOUT STYLES -->
        @yield('css')
        <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    @if(Auth::user()->role_id==config('const.roleSuperAdmin'))
                        <a href="{{route('dashboard')}}">
                    @elseif(Auth::user()->role_id==config('const.roleCoffeeShopSuperAdmin'))
                        <a href="{{route('shopdashboard')}}">
                    @endif
                        <img  src="{{url('assets/images/logo.png')}}" alt="logo" class="logo-default login-page-logo" />
                    </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->

                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->

                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"> </li>

                            <!-- END NOTIFICATION DROPDOWN -->
                            <li class="separator hide"> </li>
                            <!-- BEGIN INBOX DROPDOWN -->

                            <!-- END INBOX DROPDOWN -->
                            <li class="separator hide"> </li>
                            <!-- BEGIN TODO DROPDOWN -->

                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                    @if(Auth::user()->profile_pic)
                                        <img alt="" class="img-circle myprofilepic" src="{{Helper::displayProfilePath().Auth::user()->profile_pic}}" /> </a>
                                    @else
                                        <img alt="" class="img-circle" src="{{url('assets/layouts/layout4/img/avatar9.jpg')}}" /> </a>
                                    @endif
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{route('myprofile')}}">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="{{route('changepassword')}}">
                                            <i class="icon-settings"></i> Change Password </a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->

                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

                        @if(Auth::user()->role_id==config('const.roleAdmin'))
                        <li class="nav-item start {{ Route::is('dashboard')  ? 'active' : '' }}">
                            <a href="{{route('dashboard')}}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::user()->role_id==config('const.roleAdmin'))
                        <li class="nav-item  {{ Route::is('user.index') || Route::is('user.create') || Route::is('user.show') || Route::is('user.edit')  ? 'active' : '' }}">
                            <a href="{{route('user.index')}}" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Users</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item {{ Route::is('birth.index') || Route::is('birth.create')  ? 'active' : '' }}">
                            <a href="{{route('birth.index')}}" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">Panchang</span>
                            </a>
                        </li> --}}
                        <li class="nav-item {{ Route::is('hinducalendar.index') || Route::is('hinducalendar.create')  ? 'active' : '' }}">
                            <a href="{{route('hinducalendar.index')}}" class="nav-link nav-toggle">
                                <i class="fa fa-asterisk"></i>
                                <span class="title">Hindu Calendar</span>
                            </a>
                        </li>
                        <li class="nav-item  {{ Route::is('setting.edit')  ? 'active' : '' }}">
                            <a href="{{route('setting.edit')}}" class="nav-link nav-toggle">
                                <i class="fa fa-cog"></i>
                                <span class="title">Settings</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::user()->role_id==config('const.roleUser'))
                        <li class="nav-item  {{ Route::is('user.index') || Route::is('user.create') || Route::is('user.show') || Route::is('user.edit')  ? 'active' : '' }}">
                            <a href="{{route('user.index')}}" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Users</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
             @yield('content')
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> {{ now()->year }} &copy; @lang('messages.footer')</div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN QUICK NAV -->

        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
        <script src="{{url('assets/global/plugins/respond.min.js')}}"></script>
        <script src="{{url('assets/global/plugins/excanvas.min.js')}}"></script>
        <script src="{{url('assets/global/plugins/ie8.fix.min.js')}}"></script>
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{url('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{url('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>

        <script src="{{url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/horizontal-timeline/horizontal-timeline.js')}}" type="text/javascript"></script>


        <script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{url('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{url('assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{url('assets/layouts/layout4/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>

        <script type="text/javascript">window.baseUrl = "<?php echo URL::to('/') ?>";</script>
        <script src="{{url('assets/tost/toastr.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/developer/developer.js')}}" type="text/javascript"></script>

        <!-- For Manage Timezone Start-->

        <script src="{{url('assets/developer/moment.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/developer/moment-timezone.js')}}" type="text/javascript"></script>
        <script>
            var tz = moment.tz.guess();
            document.cookie = "headvalue="+tz;
            $(document).ready(function() {
                $.ajax({
                    url: baseUrl+'/settimezone',
                    type: "POST",
                    dataType: 'json',
                    data: {timezone:tz},
                    success: function (data) {
                    },
                    error: function (data) {

                    }
                });
            });
        </script>

        <!-- For Manage Timezone End-->

        @yield('script')
    </body>

</html>
