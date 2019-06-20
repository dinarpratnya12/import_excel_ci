<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}
	public function index(){
		// $data['home'] = $this->MasterInModel->view();
		$this->load->view('home');
	}

	public function home(){
		$this->load->view('admin/header');
		$this->load->view('index');
		$this->load->view('admin/footer2'); 
	}
}
