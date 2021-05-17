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
        return $this->db->insert('property', $data);
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
        if ($this->db->update('property', $data)) {
            return 1;
        } else {
            return 0;
        }
    }


    public function del_property($p_id)
    {
        $this->db->where('id', $p_id);
        if ($this->db->delete('property')) {
            return 1;
        } else {
            return 0;
        }
    }




    public function get_property_image($p_id)
    {
        $this->db->select('*');
        $this->db->where('p_id', $p_id);
        $this->db->from('property');
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function all_property($u_id)
    {
        $this->db->where('u_id', $u_id);
        $result = $this->db->get('property')->num_rows();
        return $result;
    }
}