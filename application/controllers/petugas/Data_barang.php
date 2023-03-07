<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Barang_model');
	
	}
	
	public function index()
	{
		$data['tb_barang'] = $this->Barang_model->tampil_data_barang()->result();
		
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar_petugas',$data);
		$this->load->view('petugas/data_barang/data_barang',$data);
		$this->load->view('templates_admin/footer');
	}
	

	public function edit($id_barang)
	{
	  $where = array('id_barang' => $id_barang);
	  $data['tb_barang'] = $this->Barang_model->edit_barang($where, 'tb_barang')->row_array();
  
	  $this->load->view('templates_admin/header');
	  $this->load->view('templates_admin/sidebar_petugas');
	  $this->load->view('petugas/data_barang/edit', $data);
	  $this->load->view('templates_admin/footer');
	}
  
  
  
	public function update()
	{
	  $id_barang                = $this->input->post('id_barang');
	  $nama_barang              = $this->input->post('nama_barang');
	  $deskripsi_barang         = $this->input->post('deskripsi_barang');
	  $harga_awal            	= $this->input->post('harga_awal');
	  $gambar 					= $_FILES['gambar']['name'];
		 // save gambar
		 if ($gambar != '') {
			 $config['upload_path'] = 'assets/images/barang/';
			 $config['allowed_types'] = 'jpg|jpeg|png|gif';
			 
			 $this->load->library('upload');
			 $this->upload->initialize($config);

			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar Gagal diupload! Error : " . $this->upload->display_errors();die;
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}
  
	  $data = array(
		
		'nama_barang'         	=> $nama_barang,
		'deskripsi_barang'   	=> $deskripsi_barang,
		'harga_awal'          	=> $harga_awal,
	  );

	  if ($gambar != '') {
		$data['gambar'] = $gambar;
	}
  
	  $where = array(
		'id_barang' => $id_barang
	  );
  
	  $this->Barang_model->update_data($where, $data, 'tb_barang');
	  $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Data Berhasil DiUbah</strong> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>');
	  redirect('petugas/data_barang');
}
	
	
	
	public function tambah_barang()
    {
		$data['tb_barang'] = $this->Barang_model->tampil_data_barang()->result_array();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar_petugas',$data);
		$this->load->view('petugas/data_barang/tambah',$data);
		$this->load->view('templates_admin/footer');
    }

    public function insert()
    {
		$nama = $this->input->post('nama_barang');
        $desc = $this->input->post('deskripsi_barang');
        $hrg = $this->input->post('harga_awal');
		$gambar = $_FILES['gambar']['name'];
		 // save gambar
		 if ($gambar != '') {
			 $config['upload_path'] = 'assets/images/barang/';
			 $config['allowed_types'] = 'jpg|jpeg|png|gif';
			 
			 $this->load->library('upload');
			 $this->upload->initialize($config);

			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar Gagal diupload! Error : " . $this->upload->display_errors();die;
			} else {
				$gambar = $this->upload->data('file_name');
			}
		 } else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Gagal uploud gambar!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>'
			);
			redirect('petugas/data_barang');
		 }

        $data = array(
			'gambar' => $gambar,
            'nama_barang' => $nama,
            'deskripsi_barang' => $desc,
            'harga_awal' => $hrg,
        );
		
        $this->Barang_model->insert_data($data);
        $this->session->set_flashdata(
			'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            New Kunjungan Added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
            </button>
			</div>'
        );
        redirect('petugas/data_barang');
    }

	 public function delete($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('tb_barang');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Obat Deleted
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('petugas/data_barang');
    }
}