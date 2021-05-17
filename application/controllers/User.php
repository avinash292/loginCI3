<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('form', 'url', 'file');
        $this->load->library('form_validation', 'session');
        
        $this->load->library('upload');
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
            array_push($u_name['un'], $u_id);
            // echo"<pre>";
            // print_r($u_name);
            // die;
            $this->load->view('templetes/property_header');
            $this->load->view('User_property_details', $u_name);
            $this->load->view('templetes/property_footer');
        } else {
            redirect(base_url('user'));
        }
    }


    public function add_property($u_id=null)
    {
        if ($this->session->userdata('session_data')['is_login'] == 1) {
            $this->session->set_userdata('u_id', $u_id);
            // $u_id =$this->session->userdata('u_id');
            // echo"<pre>";
            // print_r($u_id);
            // die;
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
            if ($this->form_validation->run() == false) {
                $this->add_property();
            } else {
                $property_data =$this->input->post();
                $config['upload_path']   = './assets/uploads/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['encrypt_name']  = true;
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('p_photo')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_tempdata('error', $error, 2);
                    redirect(base_url('user/add_property'));
                } else {
                    $data = $this->upload->data();
                    $property_data['p_photo'] = $data['file_name'];
                    if (!isset($p_id)) {
                        // echo"<pre>";
                        // print_r($property_data);
                        // die;
                        if ($this->session->userdata('session_data')['user_type'] == 'admin') {  #############  if admin add property
                            $property_data['u_id'] = $this->session->userdata('u_id');
                            $status=$this->pm->add_property($property_data);
                            if ($status) {
                                $this->session->set_tempdata('success', 'Property Added successfully ! Click on Property Info', 2);
                                redirect(base_url('user/dashboard'));
                            } else {
                                $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
                                redirect(base_url('user/dashboard'));
                            }
                        } else {
                            $property_data['u_id']=$this->session->userdata('session_data')['u_id'];  #############  if user add property
                            $status=$this->pm->add_property($property_data);
                            if ($status) {
                                $this->session->set_tempdata('success', 'Property Added successfully ! Click on Property Details', 2);
                                redirect(base_url('user/dashboard'));
                            } else {
                                $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
                                redirect(base_url('user/dashboard'));
                            }
                        }
                        // $property_data['u_id']=$this->session->userdata('session_data')['u_id'];
                    } else {
                        if ($this->session->userdata('session_data')['user_type'] == 'admin') {    #############  if admin update property
                            $property_data['u_id'] = $this->session->userdata('u_id');
                            $user_property_details= $this->pm->user_property_details($p_id);
                            $p_image = $user_property_details[0]['p_photo'];             ######### delete image
                            if (file_exists('./assets/uploads/' . $p_image)) {
                                unlink('./assets/uploads/' . $p_image);
                            }
                            $status= $this->pm->update_property($p_id, $property_data);
                            if ($status) {
                                $this->session->set_tempdata('success', 'Property Updated successfully ! Click on Property Details', 2);
                                redirect(base_url('user/dashboard'));
                            } else {
                                $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
                                redirect(base_url('user/property_edit'));
                            }
                        } else {
                            $property_data['u_id']=$this->session->userdata('session_data')['u_id'];    #############  if user update property
                            $user_property_details= $this->pm->user_property_details($p_id);
                            $p_image = $user_property_details[0]['p_photo'];             ######### delete image
                            if (file_exists('./assets/uploads/' . $p_image)) {
                                unlink('./assets/uploads/' . $p_image);
                            }
                            $status= $this->pm->update_property($p_id, $property_data);
                            if ($status) {
                                $this->session->set_tempdata('success', 'Property Updated successfully ! Click on Property Info', 2);
                                redirect(base_url('user/dashboard'));
                            } else {
                                $this->session->set_tempdata('error', 'Something went wrong. Try again.', 2);
                                redirect(base_url('user/property_edit'));
                            }
                        }
                        // $property_data['u_id']=$this->session->userdata('session_data')['u_id'];
                    }
                }
            }
        } else {
            $this->session->set_tempdata('error', 'Please Login First....', 2);
            redirect(base_url('login'));
        }
    }

    public function edit_property($id ='')
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



    public function del_property($id=null)
    {
        $multi_id = $this->input->post('property_id');
        $id=$this->input->post('p_id');
        if ($this->session->userdata('session_data')['is_login'] == 1) {
            if ($this->input->post('act') == 'delete_multi_property') {
                if ($multi_id==0) {
                    $this->session->set_tempdata('error', 'Sorry! Please select Atleast one Records to Delete !', 2);
                    redirect(base_url('user/dashboard'));
                } else {
                    foreach ($multi_id as $id) {
                        $user_property_details= $this->pm->user_property_details($id);
                        $p_image = $user_property_details[0]['p_photo'];             ######### delete image
                        if (file_exists('./assets/uploads/' . $p_image)) {
                            unlink('./assets/uploads/' . $p_image);
                        }
                        $status = $this->pm->del_property($id);
                        if ($status) {
                            $this->session->set_tempdata('success', 'Property Deleted Successfully !', 2);
                            redirect(base_url('user/dashboard'));
                        } else {
                            $this->session->set_tempdata('error', 'Sorry! Something went wrong !', 2);
                            redirect(base_url('user/dashboard'));
                        }
                    }
                }
            } else {
                $user_property_details= $this->pm->user_property_details($id);
                $p_image = $user_property_details[0]['p_photo'];             ######### delete image
                if (file_exists('./assets/uploads/' . $p_image)) {
                    unlink('./assets/uploads/' . $p_image);
                }
                $status = $this->pm->del_property($id);
                if ($status) {
                    if ($this->session->userdata('session_data')['user_type'] == 'admin') {
                        $this->session->set_tempdata('success', 'Property Deleted Successfully !', 2);
                        redirect(base_url('user/userdata'));
                    } else {
                        $this->session->set_tempdata('success', 'Property Deleted Successfully !', 2);
                        redirect(base_url('user/dashboard'));
                    }
                } else {
                    if ($this->session->userdata('session_data')['user_type'] == 'admin') {
                        $this->session->set_tempdata('error', 'Sorry! Something went wrong !', 2);
                        redirect(base_url('user/userdata'));
                    } else {
                        $this->session->set_tempdata('error', 'Sorry! Something went wrong !', 2);
                        redirect(base_url('user/dashboard'));
                    }
                }
            }
        } else {
            $this->session->set_tempdata('error', 'Please Login First....', 2);
            redirect(base_url('login'));
        }
    }

    public function delete_user($u_id)
    {
        $property_data = $this->pm->get_property_details($u_id);
        if (empty($property_data)) {       ############ if property not available then delete user only
            $is_deleted = $this->rm->del_user($u_id);
            if ($is_deleted) {
                $this->session->set_tempdata('success', 'User Deleted Successfully !', 2);
                redirect(base_url('user/dashboard'));
            } else {
                $this->session->set_tempdata('success', 'Sorry Something wrong !', 2);
                redirect(base_url('user/dashboard'));
            }
        } else {												############ if property  available then delete property forst
            foreach ($property_data as $property) {
                $p_image = $property['p_photo'];
                $p_id= $property['id'];
    
                if (file_exists('./assets/uploads/' . $p_image)) {
                    unlink('./assets/uploads/' . $p_image);        ######### delete property image
                }
                $status = $this->pm->del_property($p_id);
            }
            if ($status) {
                $is_deleted = $this->rm->del_user($u_id);			################ delete user
                if ($is_deleted) {
                    $this->session->set_tempdata('success', 'User Deleted Successfully !', 2);
                    redirect(base_url('user/dashboard'));
                } else {
                    $this->session->set_tempdata('success', 'Sorry Something wrong !', 2);
                    redirect(base_url('user/dashboard'));
                }
            } else {
                $this->session->set_tempdata('error', 'Sorry! Property is not deleted !', 2);
                redirect(base_url('user/dashboard'));
            }
        }
    }
}