<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['session']	=	$this->session->userdata('auth');
		$data['content']	=	$this->load->view('main/home', NULL, TRUE);
		$this->load->view('main/main-page', $data);
	}
}
