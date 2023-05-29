<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model {
	
	public function insert_surat($data)
	{
		return $this->db->insert('tbl_file_surat', $data);
	}
	
	public function insert_balasan($data)
	{
		return $this->db->insert('tbl_file_balasan', $data);
	}

	public function insert_bap($data)
	{
		return $this->db->insert('tbl_file_bap', $data);
	}
	public function insert_soal($data)
	{
		return $this->db->insert('tbl_file_soal', $data);
	}
	public function insert_laporan($data)
	{
		return $this->db->insert('tbl_file_laporan', $data);
	}
	

	public function getdata()
	{
		$query = $this->db->query("SELECT name FROM user WHERE role_id = '2' ORDER BY name ASC");				
		return $query->result();		
	}

	public function getruang()
	{
		$query = $this->db->query("SELECT * FROM tbl_ruangan ORDER BY ruangan ASC");
		return $query->result();
	}

	public function get_tbl($table)
	{
		return $this->db->get($table);	
	}

	public function get_bap()
	{
		$query = $this->db->query("SELECT * FROM tbl_file_bap where n_id='".$this->session->userdata('n_id')."'");
		return $query->result_array();
	}
	public function get_bap_admin()
	{
		$query = $this->db->query("SELECT * FROM tbl_file_bap ORDER BY id ASC");
		return $query->result_array();
	}
	public function get_lap()
	{
		$query = $this->db->query("SELECT * FROM tbl_file_laporan WHERE n_id='".$this->session->userdata('n_id')."'");
		return $query->result_array();
	}
	public function get_lap_admin()
	{
		$query = $this->db->query("SELECT * FROM tbl_file_laporan ORDER BY id ASC");
		return $query->result_array();
	}

	public function get_prodi()
	{
		$query = $this->db->query("SELECT * FROM prodi ORDER BY prodi ASC");
		return $query->result();
	}
	
	public function get_fakultas()
	{
		$query = $this->db->query("SELECT * FROM fakultas ORDER BY nama_fakultas ASC");
		return $query->result();
	}

	public function hapus_jta($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	public function hapus_jskripsi($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	public function download($table, $id)
    {
        $query = $this->db->get_where($table ,array('id'=>$id));
        return $query->row_array();
    }

	public function hapus($where,$table )
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}