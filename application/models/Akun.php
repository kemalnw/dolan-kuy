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
}
