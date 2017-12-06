<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata('auth')){
			redirect(base_url('account/signin'));
		} elseif ($this->session->userdata('auth')['status'] !== 'admin') {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data['session']	=	$this->session->userdata('auth');
		$data['content']	=	$this->load->view('admin/dashboard', NULL, TRUE);
		$this->load->view('admin/main-page', $data);
	}

	public function dataCustomers()
	{
		$this->load->model('Customers', 'cust');
		$data['customer']	=	$this->cust->getCustomer();
		$data['content']	=	$this->load->view('admin/customer', $data, TRUE);
		$data['session']	=	$this->session->userdata('auth');
		$this->load->view('admin/main-page', $data);
	}

	public function dataArmada()
	{
		$this->load->model('Armada');
		$data['armada']	=	$this->Armada->getData();
		$data['content']	=	$this->load->view('admin/armada', $data, TRUE);
		$data['session']	=	$this->session->userdata('auth');
		$this->load->view('admin/main-page', $data);
	}
}