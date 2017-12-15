<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rent extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('armada', 'bus');
        $this->armada = $this->input->get('armada');
        $this->kota   = $this->input->get('regionalArea');
        $this->pickUp = $this->input->get('fromDate');
        $this->return = $this->input->get('toDate');
        $this->car    = $this->input->get('car');
        if (! $this->armada OR ! $this->kota OR ! $this->pickUp OR ! $this->return OR ! $this->car)
            redirect(base_url('/search'));
    }

    public function index()
    {
        $start              =   new Datetime($this->pickUp);
        $end                =   new Datetime($this->return);
        $data['hari']       =   $start->diff($end)->days == 0 ?1:$start->diff($end)->days;
        $data['armada']     =   $this->bus->getArmadaInfo($this->armada)->row();
        $data['content']    =   $this->load->view('main/rent', $data, TRUE);
        $data['session']    =   $this->session->userdata('auth');
        $this->load->view('main/main-page', $data);
    }

    public function store($type)
    {
        if (! $this->input->post())
            exit('Access denied');
        if ($type == "signin") {
            $email    = $this->input->post('email');
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
                                'id'        => $user->id,
                                'email'     => $user->email,
                                'status'    => $user->status
                                );
                $this->session->set_userdata('auth', $session);
                $bus = $this->bus->getArmadaInfo($this->armada)->row();
                $pembayaran = [
                            'user_idFK'     =>  $user->id,
                            'armada_id'     =>  $bus->id,
                            'total_biaya'   =>  $bus->harga_sewa
                            ];
                $this->load->model('pembayaran');
                $this->pembayaran->createData($pembayaran);
                $sewa       = [
                            'id_pembayaran'     => $this->db->insert_id(),
                            'tanggal_mulai'     => $this->pickUp,
                            'tanggal_selesai'   => $this->return
                            ];
                $this->load->model('sewa');
                $this->sewa->createData($sewa);
                $id_sewa    = $this->db->insert_id();
                $ref = base_url('detail/'.$id_sewa);
            } catch (Exception $e) {
                if (validation_errors()) {
                    $ref = base_url('rent/?error[true]&type=warning&msg='.urlencode('isi formulir sesuai kriteria').'&'.$_SERVER['QUERY_STRING']);
                } else {
                    $ref = base_url('rent/?error[true]&type=info&msg='.urlencode($e->getMessage()).'&'.$_SERVER['QUERY_STRING']);
                }
                $this->session->set_flashdata('error', TRUE);
            }
            $this->output
                ->set_status_header(303)
                ->set_content_type('text/html; charset=UTF-8')
                ->set_header('X-PJAX-URL: ' .$ref)
                ->set_header('Location: '.$ref, false);
        } elseif ($type == "signup") {
            $nama_depan     = $this->input->post('nama_depan');
            $nama_belakang  = $this->input->post('nama_belakang');
            $email          = $this->input->post('email');
            $password       = $this->input->post('password');
            $hp             = $this->input->post('hp');
            $alamat         = $this->input->post('alamat');
            $this->form_validation->set_rules('nama_depan','nama_depan','trim|required');
            $this->form_validation->set_rules('nama_belakang','nama_belakang','trim|required');
            $this->form_validation->set_rules('email','email','trim|required|valid_email');
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('hp','hp','trim|required');
            $this->form_validation->set_rules('alamat','Alamat','trim|required');
            try {
                run_validated();
                $this->load->model('akun');
                $akun   = [
                        'nama_depan'            => $nama_depan,
                        'nama_belakang'         => $nama_belakang,
                        'email'                 => $email,
                        'password'              => password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]),
                        'HP'                    => $hp,
                        'alamat'                => $alamat
                        ];
                $akun   = $this->akun->createData($akun);
                if (! $akun) error_msg('Gagal Membuat Akun Baru');
                $user_id= $this->db->insert_id();
                $session = array(
                                'id'        => $user_id,
                                'email'     => $email,
                                'status'    => 'customer'
                                );
                $this->session->set_userdata('auth', $session);
                $bus = $this->bus->getArmadaInfo($this->armada)->row();
                $pembayaran = [
                            'user_idFK'     =>  $user_id,
                            'armada_id'     =>  $bus->id,
                            'total_biaya'   =>  $bus->harga_sewa
                            ];
                $this->load->model('pembayaran');
                $this->pembayaran->createData($pembayaran);
                $sewa       = [
                            'id_pembayaran'     => $this->db->insert_id(),
                            'tanggal_mulai'     => $this->pickUp,
                            'tanggal_selesai'   => $this->return
                            ];
                $this->load->model('sewa');
                $this->sewa->createData($sewa);
                $id_sewa    = $this->db->insert_id();
                $ref = base_url('detail/'.$id_sewa);
            } catch (Exception $e) {
                if (validation_errors()) {
                    $ref = base_url('rent/?error[true]&type=warning&msg='.urlencode('isi formulir sesuai kriteria').'&'.$_SERVER['QUERY_STRING']);
                } else {
                    $ref = base_url('rent/?error[true]&type=info&msg='.urlencode($e->getMessage()).'&'.$_SERVER['QUERY_STRING']);
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
}