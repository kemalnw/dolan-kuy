<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function getCustomer()
  {
    return $this->db->select('id, nama_lengkap, email, alamat')->where('status', 'admin')->get('user')->result_array();
  }
}
