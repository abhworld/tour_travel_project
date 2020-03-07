<?php

class Login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->user_id =  $this->session->userdata('user_id');
        $this->type =  $this->session->userdata('type');
        if ($this->user_id != '') {
            redirect('dashboard');
        }
        
        $this->load->model('login_model');
    }
    
    public function index() {
        $this->load->view('login');
    }
    
    public function checkLogin() {
        $email = $this->input->post('email', true);
        $password  = $this->input->post('password', true);
        $remember_me  = $this->input->post('remember', true);
        
        $result = $this->login_model->admin_login_check($email, $password);
        
        $m_data = array();
        $name_data = array();
        if ($result) {
            
            if ($result->type == 3 && $result->verify_code != '') {
                $this->session->set_flashdata('exception', 'You are not verified yet. Please verify from your email');
                redirect('login');
            }
          
            $name_data['user_id']= $result->id;
            $name_data['type']= $result->type;
//            $name_data['status']= $result->status;
            $name_data['email']= $result->email;
            $name_data['name']= $result->full_name;

//            print_r($name_data);die();

            $this->session->set_userdata($name_data);
//            if($remember_me == 'on'){
//                $this->load->helper('cookie');
//                $cookie = array(
//                    'name' => 'user',
//                    'value' => $result->id,
//                    'expire' => '86400',
//                );
//                $this->input->set_cookie($cookie);
//            }
            
            
//            if (strpos($this->session->userdata('page'), 'post-details') !== false) {
//                $redirected_page = $this->session->userdata('page');
//                $this->session->unset_userdata('page');
//                redirect($redirected_page);
//            } elseif (strpos($this->session->userdata('page'), 'questions') !== false) {
//                $redirected_page = $this->session->userdata('page');
//                $this->session->unset_userdata('page');
//                redirect($redirected_page);
//            } else {
                redirect('dashboard');
//            }
        } else {
            $this->session->set_flashdata('exception', 'Email or Password is  Incorrect');
            redirect('login');
        }
    }
}
