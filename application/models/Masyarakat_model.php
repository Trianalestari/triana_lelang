<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat_model extends CI_Model
{
	public $fullname;
	public $username;
	public $password;
	public $telp;

	public function first($username)
	{
		return $this->db->where('username', $username)->get('tb_masyarakat')->row_object();
	}

	public function all()
	{
		return $this->db->get('tb_masyarakat')->result_object();
	}

	public function tampil_data_masyarakat()
	{
		return $this->db->get('tb_masyarakat');
	}

	public function save()
	{
		$result = $this->db->set('nama_lengkap', $this->fullname)
			->set('username', $this->username)
			->set('password', md5($this->password))
			->set('telp', $this->telp)
			->set('id_level',3)
			->insert('tb_masyarakat');
		$this->_reset();
		return $result;
	}

	// public function tampil_data_masyarakat()
	// {
	// 	return $this->db->get('tb_masyarakat');
	// }

	public function history() {
		return $this->db
						->join('tb_masyarakat', 'tb_masyarakat.id_user=history_lelang.id_user')
						->join('tb_lelang', 'tb_lelang.id_lelang=history_lelang.id_lelang')
						->join('tb_barang', 'tb_barang.id_barang=history_lelang.id_barang')
			->where('tb_masyarakat.id_user', $this->session->userdata('uid'))
			->group_by('tb_barang.id_barang')
			->order_by('penawaran_harga', 'desc')
			->get('history_lelang')->result_object();
	}

     public function filter_pemenang($id_lelang) 
	 {
	    return $this->db
	            ->join('tb_masyarakat', 'tb_masyarakat.id_user=history_lelang.id_user')
	            ->join('tb_lelang', 'tb_lelang.id_lelang=history_lelang.id_user', 'left')
	            ->join('tb_barang', 'tb_barang.id_barang=tb_lelang.id_barang', 'left')
    ->where('tb_masyarakat.id_user', $this->session->userdata('uid'))
	->where('tb_lelang.id_lelang', $id_lelang)
    ->group_by('tb_barang.id_barang')
	->order_by('penawaran_harga', 'desc')
    ->get('history_lelang')->result_object();
	}

   public function _reset() 
   {
	   $this->fullname = null;
	   $this->username = null;
	   $this->password = null;
	   $this->telp = '';
   }

   public function cariDataProduct()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama_barang', $keyword)
		        ->join('tb_barang', 'tb_barang.id_barang=tb_lelang.id_barang', 'inner')
				->join('tb_petugas', 'tb_petugas.id_petugas=tb_lelang.id_petugas', 'inner');
		return $this->db->get('tb_lelang')->result();
	}
}
	