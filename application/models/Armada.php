<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armada extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function getData()
  {
    return $this->db->select('id, nama, harga_sewa, status')->get('armada')->result_array();
  }
}
