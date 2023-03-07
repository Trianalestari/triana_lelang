<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_Masyarakat extends CI_Controller
{

	public function index()
	{
		$args = [
            'judul' => 'Laporan Masyarakat'
        ];

		$this->load->view('templates_admin/header', $args);
		$this->load->view('templates_admin/sidebar',$args);
		$this->load->view('admin/laporan_masyarakat/v_laporan_masyarakat',$args);
		$this->load->view('templates_admin/footer');
	}

	public function cetak_laporan() {
		//load library
		$this->load->model('Lelang_model');
		$this->load->library('pdf');
		// load model dashboard
		$data['laporan'] = $this->Lelang_model->filter_masyarakat();

		$this->pdf->setPaper('M', 'potrait');
		$this->pdf->filename = "Laporan-masyarakat.pdf";

		//run dompdf
		$this->pdf->load_view('admin/laporan_masyarakat/cetak_laporan_masyarakat', $data);
	}
}