<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin_model', 'am');
        $this->load->model('register_model', 'rm');
    }
    public function index()
    {
        $this->load->view('templetes/header');
        $this->load->view('admin_registration');
        $this->load->view('templetes/footer');
    }

    public function admin_registration()
    {
        $this->form_validation->set_rules('name', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data =array($this->input->post());
            $result =$this->am->admin_register($data);
            if ($result) {
                $this->session->set_tempdata('success', 'You hav register Successfully. Please LogIN...!', 2);
                redirect(base_url('admin'));
            } else {
                $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
                redirect(base_url('login'));
            }
        }
    }
}