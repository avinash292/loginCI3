<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function admin_register($data)
    {
        return $this->db->insert('admin', $data[0]);
    }

    public function check_admin($data)
    {
        $this->db->select('*');
        $this->db->where('email', $data[0]['email']);
        $this->db->where('password', $data[0]['password']);
        $this->db->from('admin');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows()==1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}