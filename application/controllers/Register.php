<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        
        $this->load->model('register_model', 'rm');
    }
    public function index()
    {
        $this->load->view('templetes/header');
        $this->load->view('register');
        $this->load->view('templetes/footer');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'User name', 'trim|required|alpha');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required|min_length[6]|max_length[6]|numeric');
        if ($this->form_validation->run() == false) {
            $this->index();
            return false;
        } else {
            $data =array($this->input->post());
            $status=$this->rm->register($data);
            if ($status) {
                if ($this->session->userdata('session_data')['user_type'] == 'admin') {
                    $this->session->set_tempdata('success', 'User registered successfully. Login to continue.', 2);
                    redirect(base_url('user'));
                } else {
                    $this->session->set_tempdata('success', 'User registered successfully. Login to continue.', 2);
                    redirect(base_url('register'));
                }
            } else {
                $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
                redirect(base_url('register'));
            }
        }
    }
}