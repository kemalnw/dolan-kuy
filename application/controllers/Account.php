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
}
