<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Barang_model');
	
	}
	
	public function index()
	{
		$data['tb_petugas'] = $this->Barang_model->tampil_data_admin()->result();
		
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/data_admin/data_admin',$data);
		$this->load->view('templates_admin/footer');
	}
	
    public function edit($id_petugas)
	{
	  $where = array('id_petugas' => $id_petugas);
	  $data['tb_petugas'] = $this->Barang_model->edit_admin($where, 'tb_petugas')->row_array();
  
	  $this->load->view('templates_admin/header');
	  $this->load->view('templates_admin/sidebar');
	  $this->load->view('admin/data_admin/edit_admin', $data);
	  $this->load->view('templates_admin/footer');
	}
  
	public function update()
	{
	  $id_petugas                = $this->input->post('id_petugas');
	  $nama_petugas             = $this->input->post('nama_petugas');
	  $username                 = $this->input->post('username');
	  $password            	    = md5($this->input->post('password'));
	  
  
	  $data = array(
		'nama_petugas'             => $nama_petugas,
		'username'                 => $username,
		'password'                 => $password,
	  );
  
	  $where = array(
		'id_petugas' => $id_petugas
	  );
  
	  $this->Barang_model->update_data_admin($where, $data, 'tb_petugas');
	  $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Data Berhasil DiUbah</strong> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>');
	  redirect('admin/data_admin');
	}
	
	public function tambah_admin()
    {
        $data['tb_petugas'] = $this->Barang_model->tampil_data_admin()->result_array();
        $data['tb_level'] = $this->Barang_model->tampil_data_level()->result_array();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/data_admin/tambah',$data);
		$this->load->view('templates_admin/footer');
    }

    public function insert()
    {
		$nama_petugas = $this->input->post('nama_petugas');
        $username = $this->input->post('username');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$id_level = $this->input->post('id_level');

        $data = array(
            'nama_petugas' => $nama_petugas,
            'username' => $username,
			'password' => $password,
			'id_level' => $id_level,
        );
		
        $this->Barang_model->insert_data_admin($data);
        $this->session->set_flashdata(
			'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            New Kunjungan Added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
            </button>
			</div>'
        );
        redirect('admin/data_admin');
    }

    public function delete($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('tb_petugas');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Data berhasil dihapus..!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/data_admin');
    }

}

		
	
