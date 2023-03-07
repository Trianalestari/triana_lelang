<?php
defined('BASEPATH') or exit('No direct script access allowed');

class petugas extends CI_Controller
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
		$this->load->view('templates_admin/sidebar_petugas',$data);
		$this->load->view('petugas/dashboard/dashboard',$data);
		$this->load->view('templates_admin/footer');
	}
	


}

		
	
