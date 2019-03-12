<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User Management class created by CodexWorld
 */
class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');
    }

    /*
     * User account information
     */

    public function account() {
        $data = array();
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
            //load the view
            $this->load->view('users/account', $data);
        } else {
            redirect('users/login');
        }
    }

    /*
     * User login
     */

    public function login() {
        $data = array();
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if ($this->input->post('email')) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->user->getRows($con);
                if ($checkLogin) {
                    $this->session->set_userdata('isUserLoggedIn', TRUE);
                    $this->session->set_userdata('userId', $checkLogin['id']);
                    $this->session->set_userdata('userName', $checkLogin['name']);

                    redirect('users/account/');
                } else {
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
        //load the view
        $this->load->view('users/login', $data);
    }

//    public function reg() {
//        $data = array();
//         $this->load->view('users/registration', $data);
//    }

    /*
     * User registration
     */

    public function registration() {
        $data = array();
        $userData = array();
        if ($this->input->post('regisSubmit')) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
//                'gender' => $this->input->post('gender'),
                'phone' => strip_tags($this->input->post('phone'))
            );
//            print_r($userData);
//            exit;
            if ($this->form_validation->run() == true) {
                $insert = $this->user->insert($userData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
                    redirect('users/login');
                } else {
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $this->load->view('users/registration', $data);
    }

    public function update_user() {

        $data = array();
        $userData = array();
        if ($this->input->post('updateSubmit')) {
            echo 'dd';
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');


            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'phone' => strip_tags($this->input->post('phone'))
            );

            $id = $this->input->post('u_id');
            $password = md5($this->input->post('password'));
            if (!empty($password))
//            $this->form_validation->set_rules('password', 'password', 'required');
//            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');
            $userData['password'] = md5($password);
//            print_r($userData);
//            exit;
            if ($this->form_validation->run() == true) {
                print_r($userData);
                $up = $this->user->up_user($userData, $id);
                if ($up) {
                    $this->session->set_userdata('success_msg', 'Your Account Update successfully.');
                    redirect('users/account');
                } else {
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $this->load->view('users/account', $data);
    }

    /*
     * User logout
     */

    public function logout() {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('users/login/');
    }

    /*
     * Existing email check during validation
     */

    public function email_check($str) {
        $con['returnType'] = 'count';
        $con['conditions'] = array('email' => $str);
        $checkEmail = $this->user->getRows($con);
        if ($checkEmail > 0) {
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    
}
