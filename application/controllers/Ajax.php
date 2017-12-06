<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
    	$this->load->helper('dolankuy_helper');
	}

	public function signin()
	{
		if (! $this->input->post())
			exit('Access denied');
		$email	  = $this->input->post('email');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('email','Alamat Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
		try {
			run_validated();
			$this->load->model('akun');
			$user = $this->akun->getUserByEmail($email);
			if ($user->num_rows() <= 0)
				error_msg("Email / Password Salah");
			if ( ! password_verify($password, $user->row()->password))
				error_msg("Email dan Password Tidak Sesuai");
			$user    = $user->row();
			$session = array(
							'id' 		=> $user->id,
							'email'		=> $user->email,
							'status'	=> $user->status
							);
			$this->session->set_userdata('auth', $session);
			if ($user->status == 'admin') {
				$ref = base_url('admin');
			} else {
				$ref = base_url();
			}
		} catch (Exception $e) {
			if (validation_errors()) {
				$ref = base_url('account/signin?error=[true]&type=warning&msg='.urlencode('isi formulir sesuai kriteria'));
			} else {
				$ref = base_url('account/signin?error=[true]&type=info&msg='.urlencode($e->getMessage()));
			}
			$this->session->set_flashdata('error', TRUE);
		}
		$this->output
				->set_status_header(303)
				->set_content_type('text/html; charset=UTF-8')
				->set_header('X-PJAX-URL: ' .$ref)
				->set_header('Location: '.$ref, false);
	}
}