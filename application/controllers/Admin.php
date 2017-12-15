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
        /*$data['session']    =   $this->session->userdata('auth');
        $data['content']    =   $this->load->view('admin/dashboard', NULL, TRUE);
        $this->load->view('admin/main-page', $data);*/
        redirect(base_url('admin/dataCustomers'));
    }

	public function dataCustomers($uid = NULL, $DELETE = FALSE)
	{
		if (! is_null($uid) && $DELETE == 'DELETE') {
			$this->load->model('Customers');
			$this->Customers->deleteCustomer($uid);
			$ref = base_url('admin/dataCustomers/?succes=[true]&type=success&msg='.urlencode('Data Berhasil Dihapus'));
			$this->session->set_flashdata('msg', TRUE);
			$this->output
				->set_status_header(303)
				->set_content_type('text/html; charset=UTF-8')
				->set_header('X-PJAX-URL: ' .$ref)
				->set_header('Location: '.$ref, false);
		} else {
			$this->load->model('Customers', 'cust');
			$data['customer']	=	$this->cust->getCustomer();
			$data['content']	=	$this->load->view('admin/customer', $data, TRUE);
			$data['session']	=	$this->session->userdata('auth');
			$this->load->view('admin/main-page', $data);
		}
	}

	public function dataArmada($aid = NULL, $DELETE = FALSE)
	{
		if (! is_null($aid) && $DELETE == 'DELETE') {
            $this->load->model('Armada');
            $this->Armada->deleteArmada($aid);
            $ref = base_url('admin/dataArmada/?succes=[true]&type=success&msg='.urlencode('Data Berhasil Dihapus'));
            $this->session->set_flashdata('msg', TRUE);
            $this->output
                ->set_status_header(303)
                ->set_content_type('text/html; charset=UTF-8')
                ->set_header('X-PJAX-URL: ' .$ref)
                ->set_header('Location: '.$ref, false);
        } else {
            $this->load->model('Armada');
    		$data['armada']	    =	$this->Armada->getData();
    		$data['content']	=	$this->load->view('admin/armada', $data, TRUE);
    		$data['session']	=	$this->session->userdata('auth');
    		$this->load->view('admin/main-page', $data);
        }
	}

    public function dataPembayaran($pid = NULL, $OPT = NULL)
    {
        $this->load->model('Pembayaran');
        if (! is_null($pid) && $OPT == 'ACCEPT') {
            $this->Pembayaran->updateData($pid, ['status' => 1]);
            $pembayaran = $this->Pembayaran->getData($pid);
            $this->load->model('armada');
            $this->armada->editArmadaData($pembayaran->armada_id, ['status' => 0]);
            $ref = base_url('admin/dataPembayaran/?succes=[true]&type=success&msg='.urlencode('Pembayaran Sudah Diterima'));
            $this->session->set_flashdata('msg', TRUE);
            $this->output
                ->set_status_header(303)
                ->set_content_type('text/html; charset=UTF-8')
                ->set_header('X-PJAX-URL: ' .$ref)
                ->set_header('Location: '.$ref, false);
        } elseif (! is_null($pid) && $OPT == 'DELETE') {
            $this->Pembayaran->deleteData($pid);
            $ref = base_url('admin/dataPembayaran/?succes=[true]&type=success&msg='.urlencode('Data Berhasil Dihapus'));
            $this->session->set_flashdata('msg', TRUE);
            $this->output
                ->set_status_header(303)
                ->set_content_type('text/html; charset=UTF-8')
                ->set_header('X-PJAX-URL: ' .$ref)
                ->set_header('Location: '.$ref, false);
        } else {
            $data['data_pembayaran']    =   $this->Pembayaran->getData();
            $data['content']            =   $this->load->view('admin/pembayaran', $data, TRUE);
            $data['session']            =   $this->session->userdata('auth');
            $this->load->view('admin/main-page', $data);
        }
    }

    public function dataSewa($sid = NULL, $cmd = FALSE)
    {
        $this->load->model('sewa');
        if ( ! is_null($sid) && $cmd === "FINISH") {
            $this->sewa->updateData($sid, ['status' => 1]);
            $sewa = $this->sewa->getData($sid);
            $this->load->model('pembayaran');
            $pembayaran = $this->pembayaran->getData($sewa->id_pembayaran);
            $this->load->model('armada');
            $this->armada->editArmadaData($pembayaran->armada_id, ['status' => 1]);
            $ref = base_url('admin/dataSewa/?succes=[true]&type=success&msg='.urlencode('Data Sewa Telah Selesai'));
            $this->session->set_flashdata('msg', TRUE);
            $this->output
                ->set_status_header(303)
                ->set_content_type('text/html; charset=UTF-8')
                ->set_header('X-PJAX-URL: ' .$ref)
                ->set_header('Location: '.$ref, false);
        } else {
            $data['data_sewa']          =   $this->sewa->getDatas();
            $data['content']            =   $this->load->view('admin/sewa', $data, TRUE);
            $data['session']            =   $this->session->userdata('auth');
            $this->load->view('admin/main-page', $data);
        }
    }
}