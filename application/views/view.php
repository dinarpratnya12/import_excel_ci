<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Master Input</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/awal/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/awal/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/customz.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/awal/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/awal/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datatable/datatables.min.css">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatable/datatables.min.js"></script>

    
    
</head>
<body class="fix-header fix-sidebar">
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Master Input</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active">Master Input</li>
                    </ol>
                </div>
            </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="<?php echo base_url("index.php/MasterIn/form");?>"><button type="button" class="btn btn-primary float-right"><span class="fa fa-plus"></span>&nbsp;Upload Master Input</button></a>
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead>
                            <th>No</th>
                            <th>TGLIN</th>
                            <th>Inv No</th>
                            <th>Order No</th>
                            <th>Part No</th>
                            <th>Code Barang</th>
                            <th>QTY Inv</th>
                            <th>QTY Act</th>
                            <th>ETA</th>
                            <th>ETD</th>
                            <th>Remarks</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                        <?php
                            if( ! empty($masterin)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                foreach($masterin as $data){ // Lakukan looping pada variabel siswa dari controller
                                    echo "<tr>";
                                    echo "<td>".$data->no."</td>";
                                    echo "<td>".$data->tglin."</td>";
                                    echo "<td>".$data->invno."</td>";
                                    echo "<td>".$data->orderno."</td>";
                                    echo "<td>".$data->partno."</td>";
                                    echo "<td>".$data->codebrg."</td>";
                                    echo "<td>".$data->qtyinv."</td>";
                                    echo "<td>".$data->qtyact."</td>";
                                    echo "<td>".$data->eta."</td>";
                                    echo "<td>".$data->etd."</td>";
                                    echo "<td>".$data->remarks."</td>";
                                    ?>
                                    <td>
                                    <a href="<?php echo site_url()?>/MasterIn/getDataID/<?php echo $data->no;?>"><button type="button" class="btn btn-primary">&nbsp;Edit</button></a>
                                    </td>
                                    <?php 
                                    echo "</tr>";
                                }
                            }else{ // Jika data tidak ada
                                echo "<tr><td colspan='12'><center> Data tidak ada</center></td></tr>";
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>

    
    <!-- Bootstrap tether Core JavaScript -->