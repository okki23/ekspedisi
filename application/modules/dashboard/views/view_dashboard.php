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
        <link rel="shortcut icon" href="<?php echo base_url('upload_files/'.$favicon); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('upload_files/'.$favicon); ?>" type="image/x-icon">
        <!--<link rel="shortcut icon" type="image/png" href="http://eg.com/favicon.png"/>-->
        <title><?php echo $title;?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/data-tables/DT_bootstrap.css'); ?>" rel="stylesheet"/ >
        <link href="<?php echo base_url('assets/plugins/advanced-datatable/media/css/demo_page.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/plugins/advanced-datatable/media/css/demo_table.css'); ?>" rel="stylesheet" />

        <link href="<?php echo base_url('assets/css/bootstrap-reset.css'); ?>" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css'); ?>" type="text/css">
        
        <link href="<?php echo base_url('assets/css/table-responsive.css');?>" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet" />

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
                <a href="<?php echo base_url('dashboard');?>" class="logo"><span>PT.GMSS</span></a>
                <!--logo end-->

                <div class="top-nav ">
                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">

                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="assets/img/avatar1_small.jpg">
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
                                <li><a href="<?php echo base_url('user'); ?>">User</a></li>

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
                                <li><a href="<?php echo base_url('lap_quotation'); ?>">Laporan Quotation</a></li>
                                <li><a href="<?php echo base_url('lab_transaction'); ?>">Laporan Transaksi</a></li>
                                <li><a href="<?php echo base_url('lab_traffic'); ?>">Laporan Traffic</a></li>
                                <li><a href="<?php echo base_url('lab_finance_acc'); ?>">Laporan Finannce & Acc</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:void(0);" >
                                <i class="fa fa-tasks"></i>
                                <span>Setting</span>
                            </a>
                            <ul class="sub">
                                <li><a href="<?php echo base_url('preferences'); ?>">Preferences</a></li>
                                
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
                <section class="wrapper">

                    <section class="panel">
                        <header class="panel-heading">
                            Summary Report
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body profile-activity">

                            <!--state overview start-->
                            <div class="row state-overview">
                                <div class="col-lg-3 col-sm-6">
                                    <section class="panel">
                                        <div class="symbol terques">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="value">
                                            <h1 class="count">
                                                0
                                            </h1>
                                            <p>New Users</p>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <section class="panel">
                                        <div class="symbol red">
                                            <i class="fa fa-tags"></i>
                                        </div>
                                        <div class="value">
                                            <h1 class=" count2">
                                                0
                                            </h1>
                                            <p>Sales</p>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <section class="panel">
                                        <div class="symbol yellow">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <div class="value">
                                            <h1 class=" count3">
                                                0
                                            </h1>
                                            <p>New Order</p>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <section class="panel">
                                        <div class="symbol blue">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="value">
                                            <h1 class=" count4">
                                                0
                                            </h1>
                                            <p>Total Profit</p>
                                        </div>
                                    </section>
                                </div>
                            </div>

                            <!--state overview end-->

                        </div>
                    </section>

                </section>
            </section>
            <!--main content end-->

        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>"></script>
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
        <script src="<?php echo base_url('assets/js/sparkline-chart.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/easy-pie-chart.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/count.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/all-chartjs.js'); ?> "></script>
        <script src="<?php echo base_url('assets/plugins/chart-master/Chart.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/advanced-datatable/media/js/jquery.dataTables.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function () {
                $('#example').dataTable({

                    aoColumns: [
                        {mData: 'Name'},
                        {mData: 'Result'},
                        {mData: 'ExecutionTime'}
                    ]
                });
            });



        </script>
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
