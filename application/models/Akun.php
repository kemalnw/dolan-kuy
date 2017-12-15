<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function getUserByEmail($email)
  {
    return $this->db->get_where('user', array('email' => $email));
  }

  public function createData($data)
  {
    return $this->db->insert('user', $data);
  }

  public function getHistory($id)
  {
    $sql = $this->db
                ->select('sewa.id, armada.nama, sewa.tanggal_mulai, sewa.tanggal_selesai, sewa.createAt, pembayaran.total_biaya, pembayaran.status AS status_pembayaran, sewa.status AS status_sewa')
                ->join('pembayaran', 'user.id = pembayaran.user_idFK')
                ->join('sewa', 'pembayaran.id = sewa.id_pembayaran')
                ->join('armada', 'pembayaran.armada_id = armada.id')
                ->where('user.id', $id)
                ->get('user')
                ->result_array();
    return $sql;
  }
}
