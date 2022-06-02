<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	// public function shuttle2()
	// {
	//  $data =	$this->load->view('shuttle2/home_shuttle2');
	//  $c['content'] =	$this->load->view('shuttle2/content', $data);
	// }
	

	public function gudang()
	{
	 $data =	$this->load->view('gudang/dashboard');
	 $c['content'] =	$this->load->view('gudang/content', $data);
	}

	public function notfound()
	{
		$this->load->view('notfound404');
	}

}