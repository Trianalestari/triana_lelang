<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('masyarakat_model');
		$this->load->model('Barang_model');
	}

	/**
	 * Index page
	 */
	public function index() {
		$data['auction'] = $this->Lelang_model->all();

		if ($this->input->post('keyword')) {
			$args['auction'] = $this->Masyarakat_model->cariDataProduct();
		}
		
		$this->load->view('templates_user/header', $data );
		$this->load->view('auth/auth', $data );
		$this->load->view('templates_user/footer');
	}
	
	/**
	 * Login page
	 */
	
	 public function login() 
	 {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates_lr/header');
			$this->load->view('auth/login');
			$this->load->view('templates_lr/footer');
		} else {
			//jika berhasil tervalidasi
			$this->_login();
		}
	}

	/**
	 * Process login
	 */
	private function _login() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$query = $this->db->get_where('tb_petugas', ['username' => $username, 'password' => $password]);
		$query2 = $this->db->get_where('tb_masyarakat', ['username' => $username, 'password' => $password]);
		
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				//apabila login sebagai admin atau petugas
				$sess = array(
					'uid' => $row->id_petugas,
					'username' => $row->username,
					'password' => $row->password,
					'id_level' => $row->id_level
				);

				$this->session->set_userdata($sess);
				if ($row->id_level == 1) {
					return redirect('admin/administrator');
				} else if($row->id_level == 2){
					return redirect('petugas/petugas');
				}
			}
		} else if ($query2->num_rows()>0) {
			foreach ($query2->result() as $row) {
				//apabila login sebagai masyarakat
				$sess = array(
					'uid' => $row->id_user,
					'username' => $row->username,
					'password' => $row->password,
					'id_level' => $row->id_level
				);

				$this->session->set_userdata($sess);
				if ($row->id_level == 3) {
					return redirect('auth');
				}
			}
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Periksa kembali username dan password anda!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>'
			);
			redirect('auth/login');
		}
	}

	/**
	 * Register Process
	 */
	public function register() {
		if ($this->input->post('register')) {
			$errors = $this->_register_process();
		}
		
		$this->load->view('templates_lr/header');
		$this->load->view('auth/register');
		$this->load->view('templates_lr/footer');

	}

	/**
	 * Process Register
	 */
	private function _register_process()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|min_length[5]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[tb_masyarakat.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
		$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|min_length[4]|matches[password]');
		$this->form_validation->set_rules('telp', 'Telp', 'required|min_length[12]');
		
		if ($this->form_validation->run()) {
			
			$this->masyarakat_model->fullname = set_value('fullname');
			$this->masyarakat_model->username = set_value('username');
			$this->masyarakat_model->password = set_value('password');
			$this->masyarakat_model->telp 	  = set_value('telp');

			$this->masyarakat_model->save();

			$this->session->set_flashdata('success', 'Akun berhasil mendaftar !');
			redirect('auth/login');
		}
	}

	public function detail_barang($id)
	{

		$data['tb_barang'] = $this->Barang_model->detail_barang($id);
		
		$this->load->view('templates_user/header', $data);
		$this->load->view('auth/detail_barang', $data);
		$this->load->view('templates_user/footer');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

	
}
