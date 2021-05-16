<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Property_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function add_property($data)
    {
        return $this->db->insert('property', $data[0]);
    }

    public function get_property_details($u_id)
    {
        $this->db->select('*');
        $this->db->where('u_id', $u_id);
        $this->db->from('property');
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function user_property_details($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('property');
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function update_property($p_id, $data)
    {
        $this->db->where('id', $p_id);
        if ($this->db->update('property', $data[0])) {
            return 1;
        } else {
            return 0;
        }
    }
}