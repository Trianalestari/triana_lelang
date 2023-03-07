<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_model');
		$this->load->model('model_auth');
	}

	// public function index()
	// {
	// 	if (!is_login()) {
	// 		redirect('dashboard/login');
	// 	}
		
	// 	$args = [
	// 		'page_title' => 'Dashboard',
	// 		'page_name'  => 'LelanginAja',
	// 		'errors' 	 => isset($errors) ? $errors : []
	// 	];

	// 	$this->template->dashboard('dashboard/welcome', $args);

	// }

public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates_lr/header');
			$this->load->view('dashboard/login');
			$this->load->view('templates_lr/footer');
        } else {
			$tb_petugas = $this->model_auth->cek_login();
			if ($tb_petugas == null) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username Anda Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('dashboard/login');
            } else {
				if (!password_verify($this->input->post('password'), $tb_petugas->password)) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Password Anda Salah!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
					redirect('dashboard/login');
				} else {
					$this->session->set_userdata('username', $tb_petugas->username);
					$this->session->set_userdata('id_level', $tb_petugas->id_level);

					switch ($tb_petugas->id_level) {
						case 1:
							redirect('admin/administrator');
							break;
						case 2:
							redirect('petugas/petugas');
							break;
						default:
							break;
					}
				}

            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

