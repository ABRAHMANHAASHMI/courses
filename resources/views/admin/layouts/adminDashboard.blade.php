<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{--<link href="{{ asset('assets/form.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('assets/fonts/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/material-design-icons/material-icon.css') }}" rel="stylesheet">
    <!--bootstrap -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/material/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/material/material.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/material_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css') }}">
    <!-- inbox style -->
    <link rel="stylesheet" href="{{ asset('assets/css/pages/inbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/inbox.min.css') }}">
    <!-- Theme Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme/rtl/theme_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme/rtl/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme/rtl/theme-color.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme/rtl/rtl.css') }}">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/extra_pages.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/img/favicon.ico') }}">
    <script>
        base_url = "<?php echo $app->make('url')->to('/');?>"
        action   = "<?php echo Route::getCurrentRoute()->getActionName();?>"
    </script>
</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md sidemenu-container-reversed header-white white-sidebar-color logo-indigo">
<?php
    $admin = Cookie::get('admin_info');
    if($admin == '' || $admin == null){ ?>
<script>
    window.location = "/admin-panel";
</script>
    <?php }
    $admin_info = json_decode($admin);
?>
<?php
?>
<div class="page-wrapper">
    <!-- start header -->
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner ">
            <!-- logo start -->
            <div class="page-logo">
                <a href="{{url('/admin/dashboard')}}">
                    <span class="logo-default">Smart</span> </a>
                <span class="logo-icon material-icons fa-rotate-45">school</span>
            </div>
            <!-- logo end -->
            <ul class="nav navbar-nav navbar-right in">
                <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
            </ul>
            <form class="search-form-opened" action="#" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="query">
                    <span class="input-group-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
                </div>
            </form>
            <!-- start mobile menu -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- end mobile menu -->
            <!-- start header menu -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                           data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </li>
                    <!-- start manage user dropdown -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <img alt="" class="img-circle " src="{{asset('assets/img/dp.jpg')}}" />
                            <span class="username username-hide-on-mobile">  </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                           {{-- <li>
                                <a href="{{url('admin/settings')}}">
                                    <i class="icon-settings"></i> Settings
                                </a>
                            </li>--}}
                            <li class="divider"> </li>
                            <li>
                                <a href="{{url('/admin/logout')}}">
                                    <i class="icon-logout"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end manage user dropdown -->
                    <!-- start notification dropdown -->
                    <!-- end notification dropdown -->
                    <!-- start message dropdown -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <!-- end message dropdown -->
                    <!-- start language menu -->
{{--                    <li class="dropdown language-switch">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img
                                    src="../assets/img/flags/gb.png" class="position-left" alt=""> English <span
                                    class="fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="deutsch"><img src="../assets/img/flags/de.png" alt=""> Deutsch</a>
                            </li>
                            <li>
                                <a class="ukrainian"><img src="../assets/img/flags/ua.png" alt=""> Українська</a>
                            </li>
                            <li>
                                <a class="english"><img src="../assets/img/flags/gb.png" alt=""> English</a>
                            </li>
                            <li>
                                <a class="espana"><img src="../assets/img/flags/es.png" alt=""> España</a>
                            </li>
                            <li>
                                <a class="russian"><img src="../assets/img/flags/ru.png" alt=""> Русский</a>
                            </li>
                        </ul>
                    </li>--}}
                    <!-- end language menu -->
                    <li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end header -->
    <!-- start color quick setting -->
    <div class="quick-setting-main">
        <button class="control-sidebar-btn btn" data-toggle="control-sidebar"><i
                    class="fa fa-cog fa-spin"></i></button>
        <div class="quick-setting display-none">
            <ul id="themecolors">
                <li>
                    <p class="selector-title">Main Layouts</p>
                </li>
                <li class="complete">
                </li>
                <li>
                    <p class="selector-title">Sidebar Color</p>
                </li>
                <li class="complete">
                    <div class="theme-color sidebar-theme">
                        <a href="#" data-theme="white"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="blue"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="indigo"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="cyan"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="green"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="red"><span class="head"></span><span class="cont"></span></a>
                    </div>
                </li>
                <li>
                    <p class="selector-title">Header Brand color</p>
                </li>
                <li class="theme-option">
                    <div class="theme-color logo-theme">
                        <a href="#" data-theme="logo-white"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="logo-dark"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="logo-blue"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="logo-indigo"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="logo-cyan"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="logo-green"><span class="head"></span><span class="cont"></span></a>
                        <a href="#" data-theme="logo-red"><span class="head"></span><span class="cont"></span></a>
                    </div>
                </li>
                <li>
                    <p class="selector-title">Header color</p>
                </li>
                <li class="theme-option">
                    <div class="theme-color header-theme">
                        <a href="#" data-theme="header-white"><span class="head"></span><span
                                    class="cont"></span></a>
                        <a href="#" data-theme="header-dark"><span class="head"></span><span
                                    class="cont"></span></a>
                        <a href="#" data-theme="header-blue"><span class="head"></span><span
                                    class="cont"></span></a>
                        <a href="#" data-theme="header-indigo"><span class="head"></span><span
                                    class="cont"></span></a>
                        <a href="#" data-theme="header-cyan"><span class="head"></span><span
                                    class="cont"></span></a>
                        <a href="#" data-theme="header-green"><span class="head"></span><span
                                    class="cont"></span></a>
                        <a href="#" data-theme="header-red"><span class="head"></span><span class="cont"></span></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- end color quick setting -->
    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->
        <div class="sidebar-container">
            <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                <div id="remove-scroll" class="left-sidemenu">
                    <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true"
                        data-slide-speed="200" style="padding-top: 20px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>
                        <li class="nav-item start active open">
                            <a href="#" class="nav-link nav-toggle">
                                <span class="title">Dashboard</span>
                                <i class="material-icons">dashboard</i>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item active">
                                    <a href="{{url('/admin/dashboard')}}" class="nav-link ">
                                        <span class="title">Dashboard</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/update_template')}}" class="nav-link nav-toggle"> <i class="material-icons">event</i>
                                <span class="title">Update Template</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <span class="title">Subject</span>
                                <i class="material-icons">description</i>
                                <span class="selected"></span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{url('/add_subject')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">Add Subject</span>
                                        <span class="selected"></span>
                                    </a>
                                    <a href="{{url('admin/all_subject')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">All Subject</span>
                                        <span class="selected"></span>
                                    </a>
                                    <a href="{{url('/add_subject_type')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">Add Subject branch</span>
                                        <span class="selected"></span>
                                    </a>
                                    <a href="{{url('/admin/all_subject_type')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">All Subject branch</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <span class="title">Lesson</span>
                                <i class="material-icons">school</i>
                                <span class="selected"></span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{url('/admin/add_lesson')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">Add Lesson</span>
                                        <span class="selected"></span>
                                    </a>
                                    <a href="{{url('admin/all_lesson')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">All Lesson</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/enable_work')}}" class="nav-link nav-toggle"> <i class="material-icons">dvr</i>
                                <span class="title">Enable work</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <span class="title">Examples </span>
                                <i class="material-icons">widgets</i>
                                <span class="selected"></span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{url('/admin/add_quiz/lesson')}}" class="nav-link nav-toggle"> <i class="material-icons">dvr</i>
                                        <span class="title">Add Quiz</span>
                                    </a>
                                    <a href="{{url('/admin/all_quiz/lesson')}}" class="nav-link nav-toggle"> <i class="material-icons">dvr</i>
                                        <span class="title">All Quiz</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <span class="title">Exams</span>
                                <i class="material-icons">widgets</i>
                                <span class="selected"></span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{url('add_subject')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">Add Exam</span>
                                        <span class="selected"></span>
                                    </a>
                                    <a href="{{url('admin/all_subject')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">All Exams</span>
                                        <span class="selected"></span>
                                    </a>
                                    <a href="{{url('/admin/add_example')}}" class="nav-link nav-toggle"> <i class="material-icons">dvr</i>
                                        <span class="title">Add Exam type</span>
                                    </a>
                                    <a href="{{url('/admin/add_quiz/exam')}}" class="nav-link nav-toggle"> <i class="material-icons">dvr</i>
                                        <span class="title">Add Quiz</span>
                                    </a>
                                    <a href="{{url('/admin/all_quiz/exam')}}" class="nav-link nav-toggle"> <i class="material-icons">dvr</i>
                                        <span class="title">All Quiz</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <span class="title">User</span>
                                <i class="material-icons">face</i>
                                <span class="selected"></span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{url('/admin/add_user')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">Add User</span>
                                        <span class="selected"></span>
                                    </a>
                                    <a href="{{url('admin/premium')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">User Check</span>
                                        <span class="selected"></span>
                                    </a>
                                    <a href="{{url('admin/all_user_check')}}" class="nav-link ">
                                        <i class="material-icons">dvr</i>
                                        <span class="title">All User Check</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!-- end page content -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> <?php echo date('Y');?> &copy;
            <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss"></a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- end footer -->
</div>
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/popper/popper.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootbox.min.js') }}"></script>
<script src="{{ asset('js/ajax_lib.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.js') }}"></script>
<script src="{{ asset('assets/js/pages/sparkline/sparkline-data.js') }}"></script>
<!-- Common js-->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/layout.js') }}"></script>
<script src="{{ asset('assets/js/theme-color.js') }}"></script>
<!-- material -->
<script src="{{ asset('assets/plugins/material/material.min.js') }}"></script>
<script src="{{ asset('assets/plugins/material-datetimepicker/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('assets/plugins/material-datetimepicker/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/material-datetimepicker/datetimepicker.js') }}"></script>
<script src="{{ asset('assets/js/pages/material-select/getmdl-select.js') }}"></script>
<!-- chart js -->
<script src="{{ asset('assets/plugins/chart-js/Chart.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/chart-js/utils.js') }}"></script>
<script src="{{ asset('assets/js/pages/chart/chartjs/home-data.js') }}"></script>
<!-- summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote.js') }}"></script>
<script src="{{ asset('assets/js/pages/summernote/summernote-data.js') }}"></script>
<script src="{{ asset('assets/js/pages/extra-pages/pages.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/ajax_lib.js') }}"></script>
<script src="{{ asset('js/validation_lib.js') }}"></script>
<script src="{{ asset('js/admin_main.js') }}"></script>
</body>
</html>