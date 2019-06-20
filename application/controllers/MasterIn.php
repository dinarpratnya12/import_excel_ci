<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MasterIn extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('MasterInModel');
	}
	
	public function index(){
		$data['masterin'] = $this->MasterInModel->view();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('view', $data);
		$this->load->view('admin/footer'); 
	}
	
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di MasterInModel.php
			$upload = $this->MasterInModel->upload_file($this->filename);
			
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
		
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('formMasterIn', $data);
		$this->load->view('admin/footer');
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
				if(empty($row['B']) && empty($row['C']) && empty($row['D']) && empty($row['E']) && empty($row['F']) && empty($row['G']) && empty($row['H']) && empty($row['I']) && empty($row['J']) && empty($row['K'])){
				continue;
			}else{
				array_push($data, array(
					'tglin'=>$row['B'], // Insert data tglin dari kolom B di excel
					'invno'=>$row['C'], // Insert data invno dari kolom C di excel
					'orderno'=>$row['D'], // Insert data orderno dari kolom D di excel
					'partno'=>$row['E'], // Insert data partno dari kolom E di excel
					'codebrg'=>$row['F'], // Insert data codebrg dari kolom F di excel
					'qtyinv'=>$row['G'], // Insert data qtyinv dari kolom G di excel
					'qtyact'=>$row['H'], // Insert data qtyact kelamin dari kolom H di excel
					'eta'=>$row['I'], // Insert data eta dari kolom I di excel
					'etd'=>$row['J'], // Insert data etd kelamin dari kolom J di excel
					'remarks'=>$row['K'] // Insert data eta dari kolom K di excel
				));
			}
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->MasterInModel->insert_multiple($data);
		
		redirect("MasterIn"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}
