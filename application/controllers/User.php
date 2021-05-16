<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('form');
        $this->load->library('form_validation', 'session');
        $this->load->model('Property_model', 'pm');
        $this->load->model('register_model', 'rm');
    }
    public function dashboard()
    {
        if ($this->session->userdata('session_data')['is_login'] == 1) {
            if ($this->session->userdata('session_data')['user_type'] == 'admin') {
                $all_user_details['all'] = $this->rm->allusers();
                $this->load->view('templetes/property_header');
                $this->load->view('admin_dashboard', $all_user_details);
                $this->load->view('templetes/property_footer');
            } else {
                $u_id =$this->session->userdata('session_data')['u_id'];
                $property_data['pd'] = $this->pm->get_property_details($u_id);
                // echo"<pre>";
                // print_r($property_data);
                // die;
                $this->load->view('templetes/property_header');
                $this->load->view('User_dashboard', $property_data);
                $this->load->view('templetes/property_footer');
            }
        } else {
            $this->session->set_tempdata('error', 'Please Login First....', 2);
            redirect(base_url('login'));
        }
    }


    public function userdata()
    {
        if ($this->input->post()) {
            $udata =array($this->input->post());
            $u_id= $udata[0]['u_id'];
            $u_name['un'] = array($udata[0]['username']);
            $property_data['pd'] = $this->pm->get_property_details($u_id);
            array_push($u_name['un'], $property_data['pd']);
            $this->load->view('templetes/property_header');
            $this->load->view('User_property_details', $u_name);
            $this->load->view('templetes/property_footer');
        } else {
            redirect(base_url('user'));
        }
    }


    public function add_property()
    {
        if ($this->session->userdata('session_data')['is_login'] == 1) {
            $this->load->view('templetes/property_header');
            $this->load->view('property_add');
            $this->load->view('templetes/property_footer');
        } else {
            $this->session->set_tempdata('error', 'Please Login First....', 2);
            redirect(base_url('login'));
        }
    }

    public function add_property_details($p_id=null)
    {
        if ($this->session->userdata('session_data')['is_login'] == 1) {
            $this->form_validation->set_rules('p_id', 'Property ID', 'trim|required');
            $this->form_validation->set_rules('p_name', 'Property Name', 'trim|required');
            $this->form_validation->set_rules('p_address', 'Property Address ', 'trim|required');
            $this->form_validation->set_rules('p_pincode', 'Pincode', 'trim|required|min_length[6]|max_length[6]|numeric');
            $this->form_validation->set_rules('a_name', 'Agent Name', 'required');
            $this->form_validation->set_rules('area', 'Peoperty Area', 'trim|required');
            $this->form_validation->set_rules('facilities', 'Facilities', 'required');
            $this->form_validation->set_rules('p_ref', 'Property Reference', 'required');
            $this->form_validation->set_rules('p_photo', 'Property Photo', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->add_property();
            } else {
                $data =array($this->input->post());
                // print_r($data[0]);
                // die;
                if (!isset($p_id)) {
                    $status=$this->pm->add_property($data);
                    if ($status) {
                        $this->session->set_tempdata('success', 'Property Added successfully ! Click on Property Details', 2);
                        redirect(base_url('user/add_property'));
                    } else {
                        $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
                        redirect(base_url('user/add_property'));
                    }
                } else {
                    $status= $this->pm->update_property($p_id, $data);
                    if ($status) {
                        $this->session->set_tempdata('success', 'Property Updated successfully ! Click on Property Details', 2);
                        redirect(base_url('user/add_property'));
                    } else {
                        $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
                        redirect(base_url('user/property_edit'));
                    }
                }
            }
        } else {
            $this->session->set_tempdata('error', 'Please Login First....', 2);
            redirect(base_url('login'));
        }
    }

    public function edit_user($id ='')
    {
        if ($this->session->userdata('session_data')['is_login'] == 1) {
            $property_data['pd']= $this->pm->user_property_details($id);
            $this->load->view('templetes/property_header');
            $this->load->view('property_edit', $property_data);
            $this->load->view('templetes/property_footer');
        } else {
            $this->session->set_tempdata('error', 'Please Login First....', 2);
            redirect(base_url('login'));
        }
    }
}