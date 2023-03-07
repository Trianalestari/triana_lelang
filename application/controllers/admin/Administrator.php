<?php
defined('BASEPATH') or exit('No direct script access allowed');

class administrator extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Barang_model');
	
	}
	
	public function index()
	{
		$data['tb_barang'] = $this->Barang_model->tampil_data()->result();
		
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/dashboard/dashboard',$data);
		$this->load->view('templates_admin/footer');
	}
	


}

		
	
