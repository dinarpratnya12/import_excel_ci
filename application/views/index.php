<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Control Tools and Equipment</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/awal/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?php echo base_url();?>assets/awal/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/awal/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/awal/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/style.css" rel="stylesheet">

</head>
<body class="fix-header">
    
        <div class="container-fluid" style="padding-top: 30px">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="card">
                                <div class="card-body">
                                   <h1 align="center">Control Tools and Equipment</h1>
                                </div>
                </div>
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <a href="<?php echo base_url("index.php/MasterIn");?>">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>Master Input</h2>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                             <a href="<?php echo base_url("index.php/MasterOut");?>">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>Master Output</h2>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-ticket f-s-40 color-warning"></i></span>
                                </div>
                               <div class="media-body media-text-right">
                                <h2>Master Part</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>Master STO</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row bg-white m-l-0 m-r-0 box-shadow ">

                    <!-- column -->
                     <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="year-calendar"></div>
                                </div>
                            </div>
                        </div>

                    <!-- column -->
                     <div class="col-lg-4">
                        <div class="card">
                            <h4>Barang yang tersedia</h4>
                            <hr>
                            <div class="card-body browser">
                                <div class="progress">
                                    <div role="progressbar" style="width:20%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h3>Recent Orders </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Product</th>
                                                <th>quantity</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="<?php echo base_url();?>assets/awal/images/avatar/4.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iBook</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="<?php echo base_url();?>assets/awal/images/avatar/2.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iPhone</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="<?php echo base_url();?>assets/awal/images/avatar/3.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iMac</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="<?php echo base_url();?>assets/awal/images/avatar/4.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iBook</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="<?php echo base_url();?>assets/awal/images/avatar/4.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iBook</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="<?php echo base_url();?>assets/awal/images/avatar/4.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iBook</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
   