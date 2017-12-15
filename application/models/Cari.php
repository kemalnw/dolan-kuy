<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cari extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function doSearch($kota)
  {
    $query =    $this->db->where('status', 1)
                         ->where('kota', $kota)
                         ->get('armada');
    return $query;
  }
}