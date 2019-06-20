<html>
<head>
	<title>Form Upload Master Output</title>
	
	<!-- Load File jquery.min.js yang ada difolder js -->
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	
	<script>
	$(document).ready(function(){
		// Sembunyikan alert validasi kosong
		$("#kosong").hide();
	});
	</script>
</head>
<body>
	<h3>Form Upload Master Output</h3>
	<hr>
	
	<a href="<?php echo base_url("excel/formatMasterOut.xlsx"); ?>">Download Format</a>
	<br>
	<br>
	
	<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
	<form method="post" action="<?php echo base_url("index.php/MasterOut/form"); ?>" enctype="multipart/form-data">
		<!-- 
		-- Buat sebuah input type file
		-- class pull-left berfungsi agar file input berada di sebelah kiri
		-->
		<input type="file" name="file">
		
		<!--
		-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
		-->
		<input type="submit" name="preview" value="Preview">
	</form>
	
	<?php
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
		if(isset($upload_error)){ // Jika proses upload gagal
			echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
			die; // stop skrip
		}
		
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("index.php/MasterOut/import")."'>";
		
		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";
		
		// Buat sebuah div untuk menghitung jumlah data yang akan diupload
		echo "<div id='jumlah'><b>Data yang akan di upload : <span id='jumlah_data'></span></b>
		</div>";
		
		echo "<table border='1' cellpadding='8'>
		<tr>
			<th colspan='10'>Preview Data</th>
		</tr>
		<tr>
			<th>No</th>
			<th>TGL OUT</th>
			<th>Code Brng</th>
			<th>QTY OUT</th>
			<th>Line</th>
			<th>Control No</th>
			<th>REMARKS</th>

		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		$no = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
			// Ambil data pada excel sesuai Kolom
			$tglout = $row['B']; // Ambil data tglout
			$codebrg = $row['C'];
			$qtyout = $row['D']; // Ambil data qtyout
			$line = $row['E']; // Ambil data line
			$controlno = $row['F']; // Ambil data controlno
			$remarks = $row['G']; // Ambil data remarks


			
			// Cek jika semua data tidak diisi
			if(empty($tglout) && empty($controlno) && empty($line) && empty($codebrg) && empty($qtyout) && empty($remarks))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah invno-invno kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
				$tglout_td = ( ! empty($tglout))? "" : " style='background: #E07171;'"; // Jika tglout kosong, beri warna merah
				$controlno_td = ( ! empty($controlno))? "" : " style='background: #E07171;'"; // Jika Jetglout Kelamin kosong, beri warna merah
				$line_td = ( ! empty($line))? "" : " style='background: #E07171;'"; // Jika line kosong, beri warna merah

				$codebrg_td = ( ! empty($codebrg))? "" : " style='background: #E07171;'"; // Jika codebrg kosong, beri warna merah
				$qtyout_td = ( ! empty($qtyout))? "" : " style='background: #E07171;'"; // Jika qtyout kosong, beri warna merah

				$remarks_td = ( ! empty($remarks))? "" : " style='background: #E07171;'"; // Jika remarks kosong, beri warna merah
				
				// Jika salah satu data ada yang kosong
				if(empty($tglout) or empty($controlno) or empty($line) or empty($codebrg) or empty($qtyout) or empty($remarks)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td>".$no."</td>";
				echo "<td".$tglout_td.">".$tglout."</td>";
				echo "<td".$codebrg_td.">".$codebrg."</td>";
				echo "<td".$qtyout_td.">".$qtyout."</td>";
				echo "<td".$line_td.">".$line."</td>";
				echo "<td".$controlno_td.">".$controlno."</td>";
				echo "<td".$remarks_td.">".$remarks."</td>";
				echo "</tr>";
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
				$("#jumlah").show(); // Munculkan jumlah data yang akan diupload
				$("#kosong").show(); // Munculkan alert validasi kosong
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
			echo "<button type='submit' name='import'>Import</button>";
			echo "<a href='".base_url("index.php/MasterOut")."'>Cancel</a>";
		}
		
		echo "</form>";
	}
	?>
</body>
</html>
