<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
	{
    $data['tb_barang'] = $this->Barang_model->tampil_data()->result();

    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar_petugas', $data);
    $this->load->view('petugas/dashboard/dashboard', $data);
    $this->load->view('templates_admin/footer');
    }
}