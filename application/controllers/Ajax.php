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
				$ref = base_url('admin/dataCustomers');
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

	public function getCustomerInfo($uid)
	{
		if (! $uid OR ! $this->session->userdata('auth') OR $this->session->userdata('auth')['status'] !== 'admin')
			exit('Access denied');
		$this->load->model('Customers');
		$user = $this->Customers->getCustomerInfo($uid);
		if ($user->num_rows() < 1) {
			$ret = array('nama_depan' => '', 'nama_belakang' => '', 'email' => '', 'hp' => '', 'alamat' => '');
		} else {
			$user = $user->row(); 
			$ret  = array('nama_depan' => $user->nama_depan, 'nama_belakang' => $user->nama_belakang, 'email' => $user->email, 'hp' => $user->HP, 'alamat' => $user->alamat);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($ret));
	}

	public function editDataCustomer()
	{
		if (! $this->input->post() OR ! $this->session->userdata('auth') OR $this->session->userdata('auth')['status'] !== 'admin')
			exit('Access denied');
		$uid 			= $this->input->post('id');
		$nama_depan		= $this->input->post('nama_depan');
		$nama_belakang	= $this->input->post('nama_belakang');
		$email	  		= $this->input->post('email');
		$hp	  			= $this->input->post('hp');
		$alamat 		= $this->input->post('alamat');
		$this->form_validation->set_rules('id','uid','trim|required');
		$this->form_validation->set_rules('nama_depan','Nama Depan','trim|required');
		$this->form_validation->set_rules('nama_belakang','Nama Belakang','trim|required');
		$this->form_validation->set_rules('email','Alamat Email','trim|required|valid_email');
		$this->form_validation->set_rules('hp','No HP','trim|required');
		$this->form_validation->set_rules('alamat','Alamat','trim|required');

		try {
			run_validated();
			$this->load->model('Customers');
			$data = [
					'nama_depan' => $nama_depan,
					'nama_belakang' => $nama_belakang,
					'email'	=>	$email,
					'HP'	=>	$hp,
					'alamat' => $alamat
					];
			$this->Customers->editCustomerData($uid, $data);
			$ref = base_url('admin/dataCustomers/?succes=[true]&type=success&msg='.urlencode('Data Berhasil Diperbarui'));
		} catch (Exception $e) {
			if (validation_errors()) {
				$ref = base_url('admin/dataCustomers/?error=[true]&type=warning&msg='.urlencode('isi formulir sesuai kriteria'));
			} else {
				$ref = base_url('admin/dataCustomers/?error=[true]&type=info&msg='.urlencode($e->getMessage()));
			}
		}
		$this->session->set_flashdata('msg', TRUE);
		$this->output
				->set_status_header(303)
				->set_content_type('text/html; charset=UTF-8')
				->set_header('X-PJAX-URL: ' .$ref)
				->set_header('Location: '.$ref, false);
	}

	public function addArmada()
	{
		if (! $this->input->post() OR ! $this->session->userdata('auth') OR $this->session->userdata('auth')['status'] !== 'admin')
			exit('Access denied');
		$nama_armada		= $this->input->post('nama_armada');
		$kota 				= $this->input->post('kota');
		$harga_sewa			= $this->input->post('price');
		$status 	  		= $this->input->post('status');
		$description		= $this->input->post('desc');
		$tahun				= $this->input->post('tahun');
		$penumpang			= $this->input->post('penumpang');
		$barang				= $this->input->post('barang');
		$this->form_validation->set_rules('nama_armada','Nama Armada','trim|required');
		$this->form_validation->set_rules('kota','Nama Kota','trim|required');
		$this->form_validation->set_rules('price','Harga Sewa','trim|required');
		$this->form_validation->set_rules('status','status','trim|required');
		$this->form_validation->set_rules('desc','Description','trim|required');
		$this->form_validation->set_rules('tahun','Description','trim|required');
		$this->form_validation->set_rules('penumpang','Description','trim|required');
		$this->form_validation->set_rules('barang','Description','trim|required');
		try {
			run_validated();
			$config['upload_path']          = './assets/images/gallery/armada/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar'))
				error_msg($this->upload->display_errors());
			$gambar = $this->upload->data('file_name');
			$this->load->model('Armada');
			$data = [
					'nama' 		  => $nama_armada,
					'kota'		  => $kota,
					'harga_sewa'  => $harga_sewa,
					'status'	  => $status,
					'description' => $description,
					'img_name'	  => $gambar,
					'thn_pembuatan'=> $tahun,
					'penumpang'	  => $penumpang,
					'barang'	  => $barang
					];
			$this->Armada->addNewArmada($data);
			$ref = base_url('admin/dataArmada/?succes=[true]&type=success&msg='.urlencode('Data Berhasil Ditambahkan'));
		} catch (Exception $e) {
			if (validation_errors()) {
				$ref = base_url('admin/dataArmada/?error=[true]&type=warning&msg='.urlencode('isi formulir sesuai kriteria'));
			} else {
				$ref = base_url('admin/dataArmada/?error=[true]&type=info&msg='.urlencode($e->getMessage()));
			}
		}
		$this->session->set_flashdata('msg', TRUE);
		$this->output
				->set_status_header(303)
				->set_content_type('text/html; charset=UTF-8')
				->set_header('X-PJAX-URL: ' .$ref)
				->set_header('Location: '.$ref, false);
	}

	public function getArmadaInfo($aid)
	{
		if (! $aid OR ! $this->session->userdata('auth') OR $this->session->userdata('auth')['status'] !== 'admin')
			exit('Access denied');
		$this->load->model('Armada');
		$armada = $this->Armada->getArmadaInfo($aid);
		if ($armada->num_rows() < 1) {
			$ret = array('nama_armada' => '', 'kota' => '', 'harga_sewa' => '', 'status' => '', 'desc' => '');
		} else {
			$armada = $armada->row(); 
			$ret  = array('nama_armada' => $armada->nama, 'kota' => $armada->kota, 'harga_sewa' => $armada->harga_sewa, 'status' => $armada->status, 'desc' => $armada->description);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($ret));
	}

	public function editDataArmada()
	{
		if (! $this->input->post() OR ! $this->session->userdata('auth') OR $this->session->userdata('auth')['status'] !== 'admin')
			exit('Access denied');
		$id 				= $this->input->post('id');
		$nama_armada		= $this->input->post('nama_armada');
		$kota 				= $this->input->post('kota');
		$harga_sewa			= $this->input->post('price');
		$status 	  		= $this->input->post('status');
		$description		= $this->input->post('desc');
		$this->form_validation->set_rules('id','aid','trim|required');
		$this->form_validation->set_rules('nama_armada','Nama Armada','trim|required');
		$this->form_validation->set_rules('kota','Nama Kota','trim|required');
		$this->form_validation->set_rules('price','Harga Sewa','trim|required');
		$this->form_validation->set_rules('status','status','trim|required');
		$this->form_validation->set_rules('desc','Description','trim|required');
		try {
			run_validated();
			$this->load->model('Armada');
			$data = [
					'nama' 		  => $nama_armada,
					'kota'		  => $kota,
					'harga_sewa'  => $harga_sewa,
					'status'	  => $status,
					'description' => $description
					];
			if ($_FILES['gambar']){
				$config['upload_path']          = './assets/images/gallery/armada/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('gambar'))
					error_msg($this->upload->display_errors());
				$gambar = $this->upload->data('file_name');
				$data   = array_merge($data, ['img_name' => $gambar]);
			}
			$this->Armada->editArmadaData($id, $data);
			$ref = base_url('admin/dataArmada/?succes=[true]&type=success&msg='.urlencode('Data Berhasil Diperbarui'));
		} catch (Exception $e) {
			if (validation_errors()) {
				$ref = base_url('admin/dataArmada/?error=[true]&type=warning&msg='.urlencode('isi formulir sesuai kriteria'));
			} else {
				$ref = base_url('admin/dataArmada/?error=[true]&type=info&msg='.urlencode($e->getMessage()));
			}
		}
		$this->session->set_flashdata('msg', TRUE);
		$this->output
				->set_status_header(303)
				->set_content_type('text/html; charset=UTF-8')
				->set_header('X-PJAX-URL: ' .$ref)
				->set_header('Location: '.$ref, false);
	}
}