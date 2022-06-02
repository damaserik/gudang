<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$this->load->view('index');
	}

	public function gudang()
	{
	 $data =	$this->load->view('gudang/dashboard');
	 $c['content'] =	$this->load->view('gudang/content', $data);
	}
}