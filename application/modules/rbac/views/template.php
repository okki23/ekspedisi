<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sapta Tech Indonesia Expedition Apps">
        <meta name="author" content="STI">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="assets/img/favicon.png">

        <title>GMSS Expedition Apps</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/data-tables/DT_bootstrap.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/plugins/advanced-datatable/media/css/demo_page.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/plugins/advanced-datatable/media/css/demo_table.css'); ?>" rel="stylesheet" />

        <link href="<?php echo base_url('assets/plugins/advanced-datatable/media/css/jquery.dataTables.css'); ?>" rel="stylesheet" type="text/css"/>

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

        <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/saptable.0.2.js'); ?>"></script>


        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/datepicker.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-timepicker/compiled/timepicker.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-colorpicker/css/colorpicker.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css'); ?>" />

        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/js/advanced-form-components.js'); ?>"></script>

        <!-- Bootstrap TreeGrid //-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/maxazan-jquery-treegrid/css/jquery.treegrid.css'); ?>" />
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/maxazan-jquery-treegrid/js/jquery.treegrid.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/maxazan-jquery-treegrid/js/jquery.treegrid.bootstrap3.js'); ?>"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <section id="container" >
            <!--header start-->
            <header class="header white-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--logo start-->
                <a href="<?php echo base_url('dashboard'); ?>" class="logo"><span>PT.GMSS</span></a>
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
                                <li><a href="<?php echo base_url('login/logut'); ?>"><i class="fa fa-key"></i> Log Out</a></li>
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
                                <li><a href="<?php echo base_url('user'); ?>">User</a></li>

                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-book"></i>
                                <span>Transaksi</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="<?php echo base_url('consignment_note'); ?>">Consignment Notes</a></li>
                                <li><a  href="<?php echo base_url('berita_acara'); ?>">Berita Acara</a></li>
                                <li><a  href="<?php echo base_url('sales_order'); ?>">Sales Order</a></li>
                                <li><a  href="<?php echo base_url('puchase_order'); ?>">Purchase Order</a></li>

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
                                <li><a  href="<?php echo base_url('preferecnces'); ?>">Preferences</a></li>
                                
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

                <?php
                echo $this->load->view($sub_template);
                ?>

            </section>
        </section>
        <!--main content end-->

    </section>

    <!-- Memanggil Modal Bootstrap //-->

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
                </div>
                <div class="modal-body"> ... </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="closeBtn">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Ended Modal //-->


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/advanced-datatable/media/js/jquery.dataTables.js'); ?>"></script>

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
    <script src="<?php echo base_url('assets/js/sparkline-chart.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/easy-pie-chart.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/count.js'); ?>"></script>


    <script type="text/javascript" src="<?php echo base_url('assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>


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
