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
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{url('assets/pages/css/login.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/developer/developer.css')}}" rel="stylesheet" type="text/css" />

        {{-- <link href="{{url('assets/developer/admin_menu.css')}}" rel="stylesheet" type="text/css" /> --}}
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
         @yield('css')
        <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" /> </head>
        <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="{{route('login')}}">
                <img  src="{{url('assets/images/logo.png')}}" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            @yield('content')
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright"> {{ now()->year }} &copy; @lang('messages.footer')</div>

        <!--[if lt IE 9]>
            <script src="{{url('assets/global/plugins/respond.min.js')}}"></script>
            <script src="{{url('assets/global/plugins/excanvas.min.js')}}"></script>
            <script src="{{url('assets/global/plugins/ie8.fix.min.')}}"></script>
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
        <script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{url('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">window.baseUrl = "<?php echo URL::to('/') ?>";</script>
        @yield('script')
    </body>

</html>
