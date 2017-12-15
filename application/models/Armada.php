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
        return $this->db->get('armada')->result_array();
    }

    public function addNewArmada($data)
    {
        return $this->db->insert('armada', $data);
    }

    public function deleteArmada($id)
    {
        return $this->db->where('id', $id)->delete('armada');
    }

    public function getArmadaInfo($id)
    {
        return $this->db->get_where('armada', array('id' => $id));
    }

    public function editArmadaData($id, $data)
    {
        return $this->db->where('id', $id)->update('armada', $data);;
    }
}
