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
    return $this->db->select('id, nama_depan, nama_belakang, email, HP, alamat')->where('status', 'admin')->get('user')->result_array();
  }

  public function getCustomerInfo($uid)
  {
  	return $this->db->get_where('user', array('id' => $uid));
  }

  public function editCustomerData($uid, $data)
  {
  	return $this->db->where('id', $uid)->update('user', $data);;
  }

  public function deleteCustomer($uid)
  {
  	return $this->db->where('id', $uid)->delete('user');
  }
}
