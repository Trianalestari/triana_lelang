<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
	public $name;
	public $price;
	public $desc;

	// data barang
	public function first($id)
	{
		return $this->db->where('id_barang', $id)->get('tb_barang')->row_object();
	}

	public function all()
	{
		return $this->db->order_by('id_barang', 'desc')->get('tb_barang')->result_object();
	}

	public function save() {
		$result = $this->db->set('nama_barang', $this->name)
							->set('tgl', date('Y-m-d'))
							->set('harga_awal', $this->price)
							->set('deskripsi_barang', $this->desc)
							->insert('tb_barang');
		$this->_reset();
		return $result;
	}

	// public function update($id) {
	// 	$result = $this->db->where('id_barang', $id)
	// 						->set('nama_barang', $this->name)
	// 						->set('tgl', date('Y-m-d'))
	// 						->set('harga_awal', $this->price)
	// 						->set('deskripsi_barang', $this->desc)
	// 						->update('tb_barang');
	// 	$this->_reset();
	// 	return $result;
	// }

	// public function delete($id) {
	// 	return $this->db->where('id_barang', $id)->delete('tb_barang');
	// }

	// private function _reset() {
	// 	$this->name = null;
	// 	$this->price = null;
	// 	$this->desc = null;
	// }

	public function tampil_data()
    {
        return $this->db->get('tb_petugas');
    }
	public function tampil_data_level()
    {
        return $this->db->get('tb_level');
    }

	public function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


	function tampil_data_barang()
    {
        return $this->db->get('tb_barang');
    }
	
    function insert_data($data)
    {
        return $this->db->insert('tb_barang', $data);
    }
	
	public function detail_barang($id)
    {
		$result = $this->db->where('id_barang', $id)->get('tb_barang');
        if ($result->num_rows() > 0) {
			return $result->result();
        } else {
			return false;
        }
    }
	
	// data admin
	function tampil_data_admin()
	{
		return $this->db->get('tb_petugas');
	}

	function insert_data_admin($data)
	{
		return $this->db->insert('tb_petugas', $data);
	}

	public function edit_admin($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data_admin($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


	// data petugas
	function tampil_data_petugas()
	{
		return $this->db->get('tb_petugas');
	}

	function insert_data_petugas($data)
	{
		return $this->db->insert('tb_petugas', $data);
	}

	public function edit_petugas($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data_petugas($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
	
}
