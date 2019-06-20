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

    <script>
    $(document).ready(function(){
        // Sembunyikan alert validasi kosong
        $("#kosong").hide();
    });
    </script>

    
    
</head>
<body class="fix-header fix-sidebar">
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Upload Master Input</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item">Master Input</li>
                        <li class="breadcrumb-item active">Upload data</li>
                    </ol>
                </div>
            </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                    <form method="post" action="<?php echo base_url("index.php/MasterIn/form"); ?>" enctype="multipart/form-data">
                    <!-- 
                    -- Buat sebuah input type file
                    -- class pull-left berfungsi agar file input berada di sebelah kiri
                    -->
                    <input type="file" name="file">
                    
                    <!--
                    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
                    -->
                    <input type="submit"   class="btn btn-primary float-right" name="preview" value="Preview">
                    </form>
                    <br>

                    <?php
                        if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
                            if(isset($upload_error)){ // Jika proses upload gagal
                                echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                                die; // stop skrip
                            }
                            $jumlah = 0;
                            
                            // Buat sebuah tag form untuk proses import data ke database
                            echo "<form method='post' action='".base_url("index.php/MasterIn/import")."'>";
                            
                            // Buat sebuah div untuk alert validasi kosong
                            echo "<div style='color: red;' id='kosong'>
                            Sebagian data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                            </div>";

                            echo "<div id='jumlah'><b>Data yang akan di upload : <span id='jumlah_data'></span></b>
                            </div>";

                            echo "<br>";
                            
                            echo "  <div class='table-responsive'>
                                    <table class='table table-hover' id='example'>
                                    <thead>
                                            <th>No</th>
                                            <th>TGLIN</th>
                                            <th>Inv No</th>
                                            <th>Order No</th>
                                            <th>Part No</th>
                                            <th>Code Brng</th>
                                            <th>QTY Inv No</th>
                                            <th>QTY Act</th>
                                            <th>ETA</th>
                                            <th>ETD</th>
                                            <th>REMARKS</th>
                                        </thead>";
                            
                            $numrow = 1;
                            $kosong = 0;
                            $no = 0;
                        

                            // Lakukan perulangan dari data yang ada di excel
                            // $sheet adalah variabel yang dikirim dari controller
                            foreach($sheet as $row){ 
                                // Ambil data pada excel sesuai Kolom
                                $tglin = $row['B']; // Ambil data tglin
                                $invno = $row['C']; // Ambil data invno
                                $orderno = $row['D']; // Ambil data jetglin kelamin
                                $partno = $row['E']; // Ambil data partno
                                $codebrg = $row['F'];
                                $qtyinv = $row['G']; // Ambil data qtyinv
                                $qtyact = $row['H']; // Ambil data qtyact
                                $eta = $row['I']; // Ambil data eta
                                $etd = $row['J']; // Ambil data etd
                                $remarks = $row['K']; // Ambil data remarks
                                
                                // Cek jika semua data tidak diisi
                                if(empty($tglin) && empty($invno) && empty($orderno) && empty($partno) && empty($codebrg) && empty($qtyinv) && empty($qtyact) && empty($eta) && empty($etd) && empty($remarks))
                                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                                
                                // Cek $numrow apakah lebih dari 1
                                // Artinya karena baris pertama adalah invno-invno kolom
                                // Jadi dilewat saja, tidak usah diimport
                                if($numrow > 1){
                                    // Validasi apakah semua data telah diisi
                                    $tglin_td = ( ! empty($tglin))? "" : " style='background: #E07171;'"; // Jika tglin kosong, beri warna merah
                                    $invno_td = ( ! empty($invno))? "" : " style='background: #E07171;'"; // Jika invno kosong, beri warna merah
                                    $orderno_td = ( ! empty($orderno))? "" : " style='background: #E07171;'"; // Jika Jetglin Kelamin kosong, beri warna merah
                                    $partno_td = ( ! empty($partno))? "" : " style='background: #E07171;'"; // Jika partno kosong, beri warna merah

                                    $codebrg_td = ( ! empty($codebrg))? "" : " style='background: #E07171;'"; // Jika codebrg kosong, beri warna merah
                                    $qtyinv_td = ( ! empty($qtyinv))? "" : " style='background: #E07171;'"; // Jika qtyinv kosong, beri warna merah
                                    $qtyact_td = ( ! empty($qtyact))? "" : " style='background: #E07171;'"; // Jika qtyact Kelamin kosong, beri warna merah
                                    $eta_td = ( ! empty($eta))? "" : " style='background: #E07171;'"; // Jika eta kosong, beri warna merah
                                    $etd_td = ( ! empty($etd))? "" : " style='background: #E07171;'"; // Jika etd kosong, beri warna merah
                                    $remarks_td = ( ! empty($remarks))? "" : " style='background: #E07171;'"; // Jika remarks kosong, beri warna merah
                                    
                                    // Jika salah satu data ada yang kosong
                                    if(empty($tglin) or empty($invno) or empty($orderno) or empty($partno) or empty($codebrg) or empty($qtyinv) or empty($qtyact) or empty($eta) or empty($etd) or empty($remarks)){
                                        $kosong++; // Tambah 1 variabel $kosong
                                    }

                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>".$no."</td>";
                                    echo "<td".$tglin_td.">".$tglin."</td>";
                                    echo "<td".$invno_td.">".$invno."</td>";
                                    echo "<td".$orderno_td.">".$orderno."</td>";
                                    echo "<td".$partno_td.">".$partno."</td>";
                                    echo "<td".$codebrg_td.">".$codebrg."</td>";
                                    echo "<td".$qtyinv_td.">".$qtyinv."</td>";
                                    echo "<td".$qtyact_td.">".$qtyact."</td>";
                                    echo "<td".$eta_td.">".$eta."</td>";
                                    echo "<td".$etd_td.">".$etd."</td>";
                                    echo "<td".$remarks_td.">".$remarks."</td>";
                                    echo "</tr>";
                                    echo "</tbody>";

                                }

                                $numrow++;
                                $no++;  // Tambah 1 setiap kali looping
                            }

                            echo "</table>";

                            $jumlah = $no-1;
                            
                            // Cek apakah variabel kosong lebih dari 0
                            // Jika lebih dari 0, berarti ada data yang masih kosong
                            if($kosong > 0){
                            ?>  
                                <script>
                                $(document).ready(function(){
                                    // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                                    $("#jumlah_data").html('<?php echo $jumlah; ?>');
                                    $("#kosong").show(); // Munculkan alert validasi kosong
                                    $("#jumlah").show(); // Munculkan jumlah data yang akan diupload
                                });
                                </script>
                            <?php
                            }else{ // Jika semua data sudah diisi
                                ?>
                                <script>
                                $(document).ready(function(){
                                    $("#jumlah_data").html('<?php echo $jumlah; ?>');
                                    $("#jumlah").show(); // Munculkan jumlah data yang akan diupload
                                });
                                </script>
                            <?php
                                echo "<hr>";
                                
                                // Buat sebuah tombol untuk mengimport data ke database
                                echo "<button type='submit' class='btn btn-primary' name='import'>Import</button>";
                                echo "<a href='".base_url("index.php/MasterIn")."' type='btn btn-primary'>Cancel</a>";
                            }
                            
                            echo "</form>";
                        }
                        ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>

    
    <!-- Bootstrap tether Core JavaScript -->