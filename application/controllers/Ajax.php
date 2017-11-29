<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! $this->input->is_ajax_request())
		   exit('Access denied');
    	$this->load->library('form_validation');
    	$this->load->helper('dolankuy_helper');
	}

	public function signin()
	{
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
			$out = array('success' => 1, 'msg' => '<b>Berhasil !</b> Anda Akan Dialihkan...', 'redirect' => base_url('home'));
		} catch (Exception $e) {
			if (validation_errors()) {
				$out = array('success' => 0, 'msg' => 'Isi formulir sesuai kriteria');
			} else {
				$out = array('success' => 0, 'msg' => $e->getMessage());
			}
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}
}