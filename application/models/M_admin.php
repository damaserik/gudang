<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{
	//fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('id_user');
    }

	//fungsi check login
    function check_login($users, $username, $password)
    {
        $this->db->select('*');
        $this->db->from($users);
        $this->db->where($username);
        $this->db->where($password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    //  public function login($users,$username, $password){
    //     $this->db->where('username', $username);
    //     $this->db->where('password', $password);
    //     $query = $this->db->get('users');
    //     if($query->num_rows()==1){
    //         return $query->result();
    //     }else{
    //         return false;
    //     }
    // }
}