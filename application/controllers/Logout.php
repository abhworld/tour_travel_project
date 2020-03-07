<?php


class Logout extends CI_Controller{
    
    public function index() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('name');
        $this->session->sess_destroy();
//        $this->load->helper('cookie');
//        delete_cookie('user');
        redirect('login');
    }
    
}
