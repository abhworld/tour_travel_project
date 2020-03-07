<?php

class Dashboard extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->user_id =  $this->session->userdata('user_id');
        $this->type =  $this->session->userdata('type');
        if($this->user_id == '') {
            redirect('login');
        }
        
        $this->load->model('admin_model');
        $this->load->model('common_model');
        $this->load->helper('common');
        $this->load->helper('role_permission');
        
//        $get_permission = $this->common_model->get_all_permission_role_wise($this->type);
//        $permission_type = array();
//        foreach ($get_permission as $permission) {
//            $permission_type[$permission['permission_type']][] = $permission;
//        }
//        echo '<pre>';print_r($permission_type);die;
    }
    
    public function index() {
        $data['title'] = 'Dasboard';
        
        $data['all_booking_list'] = $this->common_model->getAllOrderInfo('booking', 'booking_id', 'DESC');
        $data['all_request_list'] = $this->common_model->getAllOrderInfo('request', 'request_id', 'DESC');
        
//        echo '<pre>';print_r($data['all_booking_list']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
        
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        echo 123123;die;
        $data['main_content'] = $this->load->view('admin/dashboard_content', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
}
