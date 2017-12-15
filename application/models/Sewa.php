<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getData($id = NULL)
    {
        if (! is_null($id))
            return $this->db->get_where('sewa', array('id' => $id))->row();
        return $this->db->get('sewa')->row();
    }

    public function getDatas()
    {
        $sql = $this->db
                    ->select('sewa.id, user.nama_depan, user.nama_belakang, armada.nama, sewa.tanggal_mulai, sewa.tanggal_selesai, sewa.status')
                    ->join('pembayaran', 'sewa.id_pembayaran = pembayaran.id')
                    ->join('armada', 'pembayaran.armada_id = armada.id')
                    ->join('user', 'pembayaran.user_idFK = user.id')
                    ->get('sewa')
                    ->result_array();
        return $sql;
    }

    public function deleteData($id)
    {
        return $this->db->where('id', $id)->delete('sewa');
    }

    public function updateData($id, $data)
    {
        return $this->db->where('id', $id)->update('sewa', $data);;
    }

    public function createData($data)
    {
        return $this->db->insert('sewa', $data);
    }
}
