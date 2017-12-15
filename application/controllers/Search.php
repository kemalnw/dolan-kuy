<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->kota   = $this->input->get('regionalArea');
        $this->pickUp = $this->input->get('fromDate');
        $this->return = $this->input->get('toDate');

        $this->load->model('cari'); 
    }

    public function index()
    {
        if ($this->kota) {
            $cari = $this->cari->doSearch($this->kota);
            if ($cari->num_rows() < 1) {
                $data['pencarian']  = FALSE;
                $data['total']      = 0;
            } else {
                $data['pencarian']  = $cari->result_array();
                $data['total']      = $cari->num_rows();
            }
            $data['content']    =   $this->load->view('main/search', $data, TRUE);
        } else {
            $data['content']    =   $this->load->view('main/search', NULL, TRUE);
        }
        $data['session']    =   $this->session->userdata('auth');
        $this->load->view('main/main-page', $data);
    }
}