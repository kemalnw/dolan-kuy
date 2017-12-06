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
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="<?=base_url()?>" data-pjax="#body" class="logo"><img src="<?=base_url('assets/images/logos_black.png')?>" width="270"></a>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Masuk</h4>
                </div>
                <div class="panel-body">
                    <?=form_open('ajax/signin', 'class="form-horizontal m-t-20"')?>
                        <?php
                        if ($this->session->flashdata()) {
                        ?>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                swal("Oops!", "<?=$this->input->get('msg')?>", "<?=$this->input->get('type')?>");
                            });
                        </script>
                        <?php
                        }
                        ?>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12">
                                <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end card-box-->
            
        </div>
        <!-- end wrapper page -->
        

        
    	<script>
            var resizefunc = [];
        </script>

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


    <!-- App js -->
    <script src="<?=base_url('assets/js/jquery.core.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.app.js')?>"></script>
</body>
</html>