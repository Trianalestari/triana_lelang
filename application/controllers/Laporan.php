<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('lelang_model');
		$this->load->library('pdf');
		if (!is_login() && is_level(3)) {
			redirect('auth/login');
		}
	}

	public function index() {
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_petugas');
        $this->load->view('admin/laporan/v_laporan');
        $this->load->view('templates_admin/footer');
	}

	public function pdf() {
		// $this->load->library('pdf');
		// $html = $this->load->view('report/lelang', [
		// 	'auction' => $this->lelang_model->report(),
		// 	'lelang_model' => $this->lelang_model
		// ], true);
		// $this->pdf->WriteHTML($html);
		// $this->pdf->Output('laporan-lelang-'.date('j-F-Y').'.pdf', 'I');


		$this->load->library('pdf');

		$data = [
			'laporan' => $this->lelang_model->report(),
			'lelang_model' => $this->lelang_model
		];
		
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "'laporan-lelang-'.date('j-F-Y').'.pdf', 'I'";
		$this->pdf->load_view('admin/laporan/cetak_laporan', $data);
	}
}
