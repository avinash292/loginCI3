<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('register_model', 'rm');
        $this->load->model('admin_model', 'am');
    }
    public function index()
    {
        if (isset($this->session->userdata('session_data')['is_login'])) {
            redirect(base_url('user'));
        } else {
            $this->load->view('templetes/header');
            $this->load->view('login');
            $this->load->view('templetes/footer');
        }
    }

    // public function CkeckLogin()
    // {
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required');
    //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    //     if ($this->form_validation->run() == false) {
    //         $this->index();
    //     } else {
    //         $data =array($this->input->post());
    //         $result =$this->rm->checkLogin($data);
    //         if ($result) {
    //             $this->session->set_userdata('userdata', $result);
    //             redirect(base_url('user'));
    //         } else {
    //             $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
    //             redirect(base_url('login'));
    //         }
    //     }
    // }

    public function CkeckLogin()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->index();
        } elseif ($this->input->post('email') == 'admin@gmail.com') {
            $data =array($this->input->post());
            $result =$this->am->check_admin($data);
            $user_type = $result['user_type'];
            if ($result) {
                $this->session->set_userdata('login_userdata', $result);
                $login_userdata =$this->session->userdata('login_userdata');
                // echo"<pre>";
                // print_r($login_userdata);
                // die;
                $session_data = array('is_login' => 1, 'email' => $login_userdata['email'],'username' => $login_userdata['username'], 'user_type'=> $user_type,'u_id' => $login_userdata['id']);
                
                $this->session->set_userdata('session_data', $session_data);
                redirect(base_url('user'));
            } else {
                $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
                redirect(base_url('login'));
            }
        } else {
            $data =array($this->input->post());
            $result =$this->rm->checkLogin($data);
            if ($result) {
                $user_type = 'user';
                $this->session->set_userdata('login_userdata', $result);
                $login_userdata =$this->session->userdata('login_userdata');
                // echo"<pre>";
                // print_r($login_userdata);
                // die;
                $session_data = array('is_login' => 1, 'email' => $login_userdata['email'],'username' => $login_userdata['username'], 'user_type'=> $user_type,'u_id' => $login_userdata['id']);
                // echo"<pre>";
                // print_r($session_data);
                // die;
                $this->session->set_userdata('session_data', $session_data);
                redirect(base_url('user'));
            } else {
                $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
                redirect(base_url('login'));
            }
        }
    }
    public function logout()
    {
        $newdata= $this->session->userdata()['session_data'];
        echo"<pre>";
        print_r($this->session->userdata());
        die;
        $this->session->unset_userdata('session_data', $newdata);
        echo"<pre>";
        print_r($this->session->userdata());
        die;
        $this->session->set_tempdata('success', 'Logout Seccessfully! Thanks for comming', 2);
        //$this->session->sess_destroy();
        redirect(base_url('login'));
    }
}