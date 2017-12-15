<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getData($id = NULL)
    {
        if (! is_null($id))
            return $this->db->get_where('pembayaran', array('id' => $id))->row();
        return $this->db->select('pembayaran.id, CONCAT((user.nama_depan),(" "),(user.nama_belakang)) as nama_customer, armada.nama as nama_armada, pembayaran.total_biaya, pembayaran.status, pembayaran.waktu')->join('user', 'pembayaran.user_idFK = user.id')->join('armada', 'pembayaran.armada_id = armada.id')->get('pembayaran')->result_array();
    }

    public function deleteData($id)
    {
        return $this->db->where('id', $id)->delete('pembayaran');
    }

    public function updateData($id, $data)
    {
        return $this->db->where('id', $id)->update('pembayaran', $data);;
    }

    public function createData($data)
    {
        return $this->db->insert('pembayaran', $data);
    }
}
