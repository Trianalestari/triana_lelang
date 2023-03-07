<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_lelang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('lelang_model');
	
	}
	
	public function index()
	{
		$data['auctions']  = $this->Lelang_model->all();
		
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar_petugas',$data);
		$this->load->view('petugas/data_lelang/data_lelang',$data);
		$this->load->view('templates_admin/footer');
	}
	

	public function create()
	{
	  if($this->input->post('save')) {
		  $errors = $this->_create_process();
	  }
	  $args = [
		  'products' => $this->Barang_model->all(),
		  'staffs' => $this->Petugas_model->all(),
	  ];

	  $this->load->view('templates_admin/header', $args);
	  $this->load->view('templates_admin/sidebar_petugas', $args);
	  $this->load->view('petugas/data_lelang/tambah_lelang', $args);
	  $this->load->view('templates_admin/footer');
	}
  
	private function _create_process()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('products', 'Products' , 'required');
		$this->form_validation->set_rules('tgl_lelang', 'Auction date' , 'required');
		$this->form_validation->set_rules('jam_lelang', 'Auction time' , 'required');
		$this->form_validation->set_rules('petugas', 'Staff' , 'required');
		$this->form_validation->set_rules('status', 'Status' , 'required');
		
		if($this->form_validation->run()) {
		$tgl_lelang = set_value('tgl_lelang') . ' '. set_value('jam_lelang'). ':00';
			$this->Lelang_model->id_barang = set_value('products');
			$this->Lelang_model->tgl_lelang = $tgl_lelang;
			$this->Lelang_model->jam_lelang = set_value('jam_lelang');
			$this->Lelang_model->id_user = uid();
			$this->Lelang_model->id_petugas = set_value('petugas');
			$this->Lelang_model->status = set_value('status');

			$this->Lelang_model->save();
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible fade-show" role="alert">
				Data Lelang Added!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria hidden="true">&times;</span>
				</button>
				</div>'

			);
			redirect('petugas/data_lelang');
		}
		return $this->form_validation->error_array();
	}
	
	public function edit($id)
	{
		$where = array('id_lelang' => $id);
		if($this->input->post('save')){
			$errors = $this->_edit_proccess($id);
		}
		$args = [
			'products' => $this->Barang_model->all(),
			'staffs' => $this->Petugas_model->all(),
			'auction' => $this->Lelang_model->first($id),
		];

		
		$this->load->view('templates_admin/header',$args);
		$this->load->view('templates_admin/sidebar_petugas',$args);
		$this->load->view('petugas/data_lelang/edit_lelang',$args);
		$this->load->view('templates_admin/footer');

	}

	private function _edit_proccess($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product', 'Product' , 'required');
		$this->form_validation->set_rules('tgl_lelang', 'Auction date' , 'required');
		$this->form_validation->set_rules('jam_lelang', 'Auction time' , 'required');
		$this->form_validation->set_rules('petugas', 'Staff' , 'required');
		$this->form_validation->set_rules('status', 'Status' , 'required');
		
		if($this->form_validation->run()) {
			$tgl_lelang = set_value('tgl_lelang') . ' '. set_value('jam_lelang'). ':00';
			$this->Lelang_model->id_barang = set_value('product');
			$this->Lelang_model->tgl_lelang = $tgl_lelang;
			$this->Lelang_model->id_petugas = set_value('petugas');
			$this->Lelang_model->status = set_value('status');

			$this->Lelang_model->update($id);
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible fade-show" role="alert">
				Data Lelang Update!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria hidden="true">&times;</span>
				</button>
				</div>'

			);
			redirect('petugas/data_lelang/'); 
		}
		return $this->form_validation->error_array();

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
  
	  $data = array(
		'gambar'				=> $gambar,
		'nama_barang'         	=> $nama_barang,
		'deskripsi_barang'   	=> $deskripsi_barang,
		'harga_awal'          	=> $harga_awal,
	  );
  
	  $where = array(
		'id_lelang' => $id_lelang
	  );
  
	  $this->Barang_model->update_data($where, $data, 'tb_lelang');
	  $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Data Berhasil DiUbah</strong> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>');
	  redirect('petugas/data_lelang/');
	}
}
	
	
	
	public function tambah_lelang()
    {
        $data['tb_lelang'] = $this->Barang_model->tampil_data_lelang()->result_array();
		var_dump('tes');die;
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar_petugas',$data);
		$this->load->view('petugas/data_lelang/tambah_lelang',$data);
		$this->load->view('templates_admin/footer');
    }

    public function insert()
    {
		$nama = $this->input->post('nama_barang');
        $desc = $this->input->post('deskripsi_barang');
        $hrg = $this->input->post('harga_awal');
		$tgl_lelang = $this->input->post('tgl_lelang') . ' ' . $this->input->post('jam_lelang');
		var_dump($tgl);die;
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
			redirect('petugas/data_lelang/');
		 }

        $data = array(
            'nama_barang' => $nama,
			'gambar'	=> $gambar,
            'deskripsi_barang' => $desc,
            'tgl' => $tgl_lelang,
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
        redirect('petugas/data_lelang/');
    }

	 public function delete($id)
    {
        $this->db->where('id_lelang', $id);
        $this->db->delete('tb_lelang');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Sudah Di hapus! 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('petugas/data_lelang');
    }

	public function view($id)
	{
		$products = $this->Lelang_model->first($id);

		$args = [
			'product' => $products,
			'history'  => $this->Lelang_model->history($id),
			'max_bid'  =>  $this->Lelang_model->max_bid($id),
			'auction'  =>  $this->Lelang_model->first($id),
		];


		$this->load->view('templates_admin/header', $args);
		$this->load->view('templates_admin/sidebar_petugas',$args);
		$this->load->view('petugas/data_lelang/view',$args);
		$this->load->view('templates_admin/footer');

	}

	public function finish($id)	
	{
		if ($this->input->post('finish')) {
			$errors = $this->_finish_process($id);
		}
		$args =[
			'id_lelang' => $id,
			'max_bid' => $this->Lelang_model->max_bid($id),
		];

		$this->load->view('templates_admin/header', $args);
		$this->load->view('templates_admin/sidebar_petugas', $args);
		$this->load->view('petugas/data_lelang/finish', $args);
		$this->load->view('templates_admin/footer');
	}

	private function _finish_process($id)
	{
		$max = $this->Lelang_model->max_bid($id);
		$this->Lelang_model->harga_akhir = $max->penawaran_harga;
		$this->Lelang_model->pemenang = $max->nama_lengkap;
		$this->Lelang_model->status = 'ditutup';
		$this->Lelang_model->update($id);

		// $this->session->set_flashdata('success', 'Lelang telah diselesaikan !');
		redirect('petugas/data_lelang/view/'. $id);

		return [];
	}
}
