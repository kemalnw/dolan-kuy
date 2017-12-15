<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function signin()
	{
		$this->load->helper('form');
		$this->load->view('signin/login');
	}

	public function signout()
	{
		$this->session->sess_destroy();
		$this->output
				->set_status_header(303)
				->set_content_type('text/html; charset=UTF-8')
				->set_header('X-PJAX-URL: ' .base_url())
				->set_header('Location: '.base_url(), false);
	}

	public function history()
	{
		if (! $this->session->userdata('auth')){
			redirect(base_url('account/signin'));
		}
		$_session = $this->session->userdata('auth');
		$this->load->model('akun');
		$data['history']	=   $this->akun->getHistory($_session['id']);
		$data['session']    =   $_session;
        $data['content']    =   $this->load->view('main/history', $data, TRUE);
        $this->load->view('main/main-page', $data);
	}
}
