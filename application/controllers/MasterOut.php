<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MasterOut extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('MasterOutModel');
	}
	
	public function index(){
		$data['masterout'] = $this->MasterOutModel->view();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('viewMasterOut', $data);
		$this->load->view('admin/footer'); 
	}
	
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di MasterOutModel.php
			$upload = $this->MasterOutModel->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->load->view('formMasterOut', $data);
	}
	
	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				if(empty($row['B']) && empty($row['C']) && empty($row['D']) && empty($row['E']) && empty($row['F']) && empty($row['G'])){
				continue;
			}else{
				array_push($data, array(
					'tglout'=>$row['B'], // Insert data tglout dari kolom B di excel
					'codebrg'=>$row['C'], // Insert data codebrg dari kolom F di excel
					'qtyout'=>$row['D'], // Insert data qtyout dari kolom G di excel
					'line'=>$row['E'], // Insert data line dari kolom H di excel
					'controlno'=>$row['F'], // Insert data control no dari kolom I di excel
					'remarks'=>$row['G'] // Insert data remarks dari kolom K di excel
				));
			}
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->MasterOutModel->insert_multiple($data);
		
		redirect("MasterOut"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}
