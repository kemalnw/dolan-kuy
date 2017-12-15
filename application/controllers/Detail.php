<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('auth')){
            redirect(base_url('account/signin'));
        }
        $this->load->model('sewa');
        $this->load->model('armada');
        $this->load->model('pembayaran');
        $this->load->model('customers');
        $this->load->helper('text');
    }

    public function index($id)
	{
		if (is_null($id))
            redirect(base_url());
        $data['sewa']       =   $sewa = $this->sewa->getData($id);
        $data['pembayaran'] =   $pembayaran = $this->pembayaran->getData($sewa->id_pembayaran);
        $data['armada']     =   $this->armada->getArmadaInfo($pembayaran->armada_id)->row();
        $start              =   new Datetime($sewa->tanggal_mulai);
        $end                =   new Datetime($sewa->tanggal_selesai);
        $data['hari']       =   $start->diff($end)->days == 0 ?1:$start->diff($end)->days;
        $data['customer']   =   $this->customers->getCustomerInfo($pembayaran->user_idFK)->row();
        $data['session']	=	$this->session->userdata('auth');
		$data['content']	=	$this->load->view('main/detail', $data, TRUE);
		$this->load->view('main/main-page', $data);
	}
}
