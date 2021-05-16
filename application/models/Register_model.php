<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function register($data)
    {
        return $this->db->insert('user', $data[0]);
    }

    public function checkLogin($data)
    {
        $this->db->select('*');
        $this->db->where('email', $data[0]['email']);
        $this->db->where('password', $data[0]['password']);
        $this->db->from('user');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows()==1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function allusers()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}