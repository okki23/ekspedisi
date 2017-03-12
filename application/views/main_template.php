<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="<?php echo base_url('upload_files/' . @$favicon); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('upload_files/' . @$favicon); ?>" type="image/x-icon">
        <!--<link rel="shortcut icon" type="image/png" href="http://eg.com/favicon.png"/>-->
        <title><?php echo $title; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/data-tables/DT_bootstrap.css'); ?>" rel="stylesheet" />

        <link href="<?php echo base_url('assets/css/bootstrap-reset.css'); ?>" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css'); ?>" type="text/css">

        <link href="<?php echo base_url('assets/css/table-responsive.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet" />

        <!-- Sorting setiap table bootstrap -->
        <link href="<?php echo base_url('assets/plugins/sorter-table/style.css'); ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url('assets/plugins/sorter-table/script.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/jquery-1.12.4.js'); ?>"></script>
        
        <script src="<?php echo base_url('assets/js/saptable.0.4.js'); ?>"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/datepicker.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-timepicker/compiled/timepicker.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-colorpicker/css/colorpicker.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css'); ?>" />

        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js'); ?>"></script>

        <link href="<?php echo base_url('assets/css/uploadfile.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery.uploadfile.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/bootstrap-inputmask/bootstrap-inputmask.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/jquery.form.js'); ?> "></script>

        <script type="text/javascript" src="<?php echo base_url('assets/jquery.dataTables.min.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/jquery.dataTables.min.css'); ?> "> 

        <style>
            #project-label {
                display: block;
                font-weight: bold;
                margin-bottom: 1em;
            }
            #project-icon {
                float: left;
                height: 32px;
                width: 32px;
            }
            #project-description {
                margin: 0;
                padding: 0;
            }

        </style>

    </head>

    <body>

        <section id="container" >
            <!--header start-->
            <header class="header white-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--logo start-->
                <a href="<?php echo base_url('dashboard'); ?>" class="logo"><span><?php echo @$title; ?></span></a>
                <!--logo end-->

                <div class="top-nav ">
                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">

                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="<?php echo base_url('assets/img/avatar1_small.jpg'); ?>">
                                <span class="username">Username</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <li><a href="<?php echo base_url('login/signout'); ?>"><i class="fa fa-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="<?php echo base_url('dashboard'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-laptop"></i>
                                <span>Master</span>
                            </a>
                            <ul class="sub">

                                <li><a href="<?php echo base_url('master/customer'); ?>">Customer</a></li>
                                <li><a href="<?php echo base_url('master/vendor'); ?>">Vendor</a></li>
                                <li><a href="<?php echo base_url('master/branch'); ?>">Branch</a></li>
                                <li><a href="<?php echo base_url('master/position'); ?>">Position</a></li>
                                <li><a href="<?php echo base_url('master/employee'); ?>">Employee</a></li>
                                <li><a href="<?php echo base_url('master/bank'); ?>">Bank</a></li>
                                <li><a href="<?php echo base_url('master/satuan'); ?>">Satuan</a></li>

                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-book"></i>
                                <span>Transaksi</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="<?php echo base_url('transaksi/customer_quotation'); ?>">Customer Quotation</a></li>
                                <li><a  href="<?php echo base_url('transaksi/vendor_quotation'); ?>">Vendor Quotation</a></li>
                                <li><a  href="<?php echo base_url('transaksi/customer_order'); ?>">Customer Order</a></li>
                                <li><a  href="<?php echo base_url('transaksi/vendor_order'); ?>">Vendor Order</a></li>


                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-cogs"></i>
                                <span>Laporan</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="<?php echo base_url('lap_trans'); ?>">Laporan Transaksi Periodik</a></li>
                                <li><a  href="<?php echo base_url('lab_neraca'); ?>">Laporan Laba Rugi</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-tasks"></i>
                                <span>Setting</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="<?php echo base_url('preferences'); ?>">Preferences</a></li>
                                <li><a  href="<?php echo base_url('rbac/call_uac'); ?>">User Accounts</a></li>
                                <li><a  href="<?php echo base_url('rbac/call_function_list'); ?>">Function List</a></li>
                                <li><a  href="<?php echo base_url('rbac/call_menulist'); ?>">Menu List</a></li>
                                <li><a  href="<?php echo base_url('rbac/call_divisilist'); ?>">Divisi</a></li>
                                <li><a  href="<?php echo base_url('rbac/call_grouplist'); ?>">Group</a></li>

                            </ul>
                        </li>



                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">


                <?php echo $this->load->view($view); ?>

            </section>
        </section>
        <!--main content end-->

    </section>

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

    <script class="include" type="text/javascript" src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/jquery.sparkline.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/owl.carousel.js'); ?>" ></script>
    <script src="<?php echo base_url('assets/js/jquery.customSelect.min.js'); ?>" ></script>
    <script src="<?php echo base_url('assets/js/respond.min.js'); ?>" ></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url('assets/js/common-scripts.js'); ?>"></script>

    <!--script for this page-->

    <script src="<?php echo base_url('assets/typeahead/typeahead.bundle.js'); ?>"></script>




    <script>

//owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                autoPlay: true

            });
        });

//custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>

</body>
</html>
