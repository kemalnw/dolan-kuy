<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
    <link href="<?=base_url('assets/plugins/Nprogress/nprogress.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/bootstrap-sweetalert/sweet-alert.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/css/responsive.css')?>" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/datatables/buttons.bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/datatables/fixedHeader.bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/datatables/responsive.bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/datatables/scroller.bootstrap.min.css')?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?=base_url('assets/js/jquery3.min.js')?>"></script>
    <script src="<?=base_url('assets/js/modernizr.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap-sweetalert/sweet-alert.min.js')?>"></script>

    </head>

    <body id="body">

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="<?=base_url()?>" class="logo" style="margin-bottom: 15px; margin-top: 15px !important;"><img src="<?=base_url('assets/images/logos.png')?>" width="270"></a>
                    </div>
                    <!-- End Logo container-->

                    <div class="menu-extras">
                        <ul class="nav navbar-nav navbar-right pull-right">
                            <?php
                            if (! $session) {
                            ?>
                            <li class="user-box">
                                <a href="<?=base_url('account/signin')?>" data-pjax="#body" class="waves-effect waves-light profile" aria-expanded="true">
                                <i class="zmdi zmdi-sign-in"></i> <span style="margin-left: 5px;">Masuk</span>
                                </a>
                            </li>
                            <?php
                            } else {
                            ?>
                            <li class="user-box">
                                <a href="<?=base_url('account/settings')?>" data-pjax="#body" class="waves-effect waves-light profile" aria-expanded="true">
                                <span><?=$session['email']?></span>
                                </a>
                            </li>
                            <li class="user-box">
                                <a href="<?=base_url('account/signout')?>" data-pjax="#body" class="waves-effect waves-light profile" aria-expanded="true">
                                <span>Keluar</span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li>
                                <a href="<?=base_url('admin')?>" data-pjax="#body"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/dataCustomers')?>" data-pjax="#body"><i class="zmdi zmdi-file-text"></i> <span> Data Customers </span> </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/dataArmada')?>" data-pjax="#body"><i class="zmdi zmdi-file-text"></i> <span> Data Armada </span> </a>
                            </li>
                            <li>
                                <a href="index.html"><i class="zmdi zmdi-file-text"></i> <span> Data Penyewaan </span> </a>
                            </li>
                        </ul>
                        <!-- End navigation menu  -->
                    </div>
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row" style="margin-top: 50px;">
                <?=$content?>
                </div>
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
    <!-- jQuery  -->
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
    <script src="<?=base_url('assets/plugins/jquery-pjax/jquery.pjax.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/Nprogress/nprogress.js')?>"></script>
    <script src="<?=base_url('assets/plugins/flot-chart/jquery.flot.js')?>"></script>
    <script src="<?=base_url('assets/plugins/flot-chart/jquery.flot.time.js')?>"></script>
    <script src="<?=base_url('assets/plugins/flot-chart/jquery.flot.tooltip.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/flot-chart/jquery.flot.resize.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables/dataTables.responsive.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables/responsive.bootstrap.min.js')?>"></script>


    <!-- App js -->
    <script src="<?=base_url('assets/js/jquery.core.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.app.js')?>"></script>
</body>
</html>