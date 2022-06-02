<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();		
	}
	// ============================= MENU MASTER ===============================
	// VIEW 
	// =========================================================================
	// user
	public function view_user()
	{
		$sql = "SELECT * FROM users";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function simpan_user($data)
	{
		$this->db->insert('users', $data);
	}
	
	function delete_user($id)
	{
		$this->db->where('id_user', $id)->delete('users');
	}

	public function view_edit_user($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id_user', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_user($id, $data)
	{
		$this->db->where('id_user', $id);
		$this->db->update('users', $data);
	}
}