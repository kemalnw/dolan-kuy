<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.png')?>">

    <title>DolanKuy - Sahabat cerdas perjalanan anda</title>

    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/css/core.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/css/components.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/css/icons.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/css/pages.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/css/menu.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/select2/dist/css/select2.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/select2/dist/css/select2-bootstrap.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/css/responsive.css')?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?=base_url('assets/js/modernizr.min.js')?>"></script>
    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="index.html" class="logo" style="margin-bottom: 15px; margin-top: 15px !important;"><img src="<?=base_url('assets/images/logos.png')?>" width="270"></a>
                    </div>
                    <!-- End Logo container-->

                    <div class="menu-extras">
                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown user-box">
                                <a href="#" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                    <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <?=$content?>


                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <center>
                                    2016 - 2017 © Adminto.
                                </center>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
            <!-- end container -->



            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="zmdi zmdi-close-circle-o"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="zmdi zmdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>

    <!-- jQuery  -->
    <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/js/detect.js')?>"></script>
    <script src="<?=base_url('assets/js/fastclick.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.slimscroll.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.blockUI.js')?>"></script>
    <script src="<?=base_url('assets/js/waves.js')?>"></script>
    <script src="<?=base_url('assets/js/wow.min.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.nicescroll.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.scrollTo.min.js')?>"></script>


    <!-- Plugins Js -->
    <script src="<?=base_url('assets/plugins/moment/moment.js')?>"></script>
    <script src="<?=base_url('assets/plugins/select2/dist/js/select2.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>


    <!-- App js -->
    <script src="<?=base_url('assets/js/jquery.core.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.app.js')?>"></script>
</body>
</html>