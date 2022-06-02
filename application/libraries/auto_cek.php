<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');
class auto_cek {
 // SET SUPER GLOBAL
 var $CI = NULL;
 public function __construct() {
 $this->CI =& get_instance();
 }

 // Proteksi halaman
 public function cek_login() {
 if(($this->CI->session->userdata('username') == "") && ($this->CI->session->userdata('status') == "")){
		echo '<script language="javascript">';
		echo 'alert("Akses langsung tidak diperbolehkan")';
		echo '</script>';
		echo '<script language="javascript">';
		echo 'window.location=("'.site_url('login/').'")';
		echo '</script>';
	 // redirect(base_url('Auth'));
	 }
 }

}