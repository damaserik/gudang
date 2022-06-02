<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
		$this->load->model('M_user');
	}
	// user
	// =====================================================================
	// tampilan data user
	public function view_user()
	{
		$data['isi'] = $this->M_user->view_user();
		$h = $this->load->view('gudang/dashboard', $data);
		$c['content'] = $this->load->view('gudang/user/view', $h);
	}

	public function tambah_user()
	{
		$h = $this->load->view('gudang/dashboard');
		$c['content'] = $this->load->view('gudang/user/tambah', $h);
		$this->load->view('gudang/dashboard', $c);
	}

	// Fungsi Insert user
	public function simpan_user()
	{
		$cek = $this->db->query("SELECT * FROM users where username='".$this->input->post('username',TRUE)."'")->num_rows();
		if($cek <= 0){
				$id_user = $this->input->post('id_user', TRUE);
				$username = $this->input->post('username', TRUE);
				$password = $this->input->post('password', TRUE);
				$hak_akses = $this->input->post('hak_akses', TRUE);

			$data = array(  
				"id_user"=> $id_user,
				"username"=> $username,
            	"password"=> md5($password),
            	"hak_akses"=> $hak_akses
			);
			$this->M_user->simpan_user($data);
			redirect('gudang/user/view_user','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Username Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('gudang/user/tambah_user/').'")';
			echo '</script>';
		}

	}
	// Fungsi Delete User
	public function user_hapus($id)
	{
		$sql = $this->M_user->delete_user($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('gudang/user/view_user')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal di hapus');window.location = '".site_url('gudang/user/view_user')."';</script>";
		}
	}

	// fungsi form edit data user
	public function edit_user($id='')
	{	
		$data['ubah_data'] = $this->M_user->view_edit_user($id);		
		$c['content'] = $this->load->view('gudang/user/edit', $data);
		$this->load->view('gudang/dashboard', $c);
	}
	// fungsi ubah user
	public function user_edit($id)
	{
				$id_user = $this->input->post('id_user', TRUE);
				$username = $this->input->post('username', TRUE);
				$password = $this->input->post('password', TRUE);
				$hak_akses = $this->input->post('hak_akses', TRUE);

			$data = array(  
				"id_user"=> $id_user,
				"username"=> $username,
            	"password"=> md5($password),
            	"hak_akses"=> $hak_akses,
            );
		$this->M_user->edit_user($id,$data);
		redirect('gudang/user/view_user', 'refresh');
	}

}