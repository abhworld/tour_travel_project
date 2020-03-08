<?php

class Flight extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->user_id =  $this->session->userdata('user_id');
        $this->type =  $this->session->userdata('type');
        if($this->user_id == '') {
            redirect('login');
        }
        
        $this->load->model('common_model');
        $this->load->model('admin_model');
        $this->load->helper('role_permission');
    }
    
    public function all_airport() {
        $data['title'] = 'All Airport';
        
        $data['all_country'] = $this->common_model->getAllInfo('countries');
        $data['all_airport'] = $this->common_model->get_airport_info();
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/flight/all_airport', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function save_airport_data() {
        $post = $this->input->post();
//        echo '<pre>';print_r($post);die;
        $data['airline_country_id'] = $post['airline_country_id'];
        $data['airline_airport'] = $post['airline_airport'];
        $data['airline_iata_code'] = $post['airline_iata_code'];
        $data['airline_create_date'] = date('Y-m-d H:i:s');
        
        $this->common_model->insertInfo('airports', $data);
        redirect('all-airport');
        
    }
    
    public function edit_airport_modal() {
        $airline_id = $this->input->post('airline_id');
        $data['airport_info'] = $this->common_model->getRow('airports', 'airline_id', $airline_id);
        $data['all_country'] = $this->common_model->getAllInfo('countries');
        
        $data['edit_city_modal'] = $this->load->view('admin/flight/edit_airport', $data, true);
        
        echo json_encode($data);
    }
    
    public function update_airport_data() {
        $post = $this->input->post();
        
        $id = $post['airline_id'];
        $data['airline_country_id'] = $post['airline_country_id'];
        $data['airline_airport'] = $post['airline_airport'];
        $data['airline_iata_code'] = $post['airline_iata_code'];
        $data['airline_create_date'] = date('Y-m-d H:i:s');
        
        $this->common_model->updateInfo('airports', 'airline_id', $id, $data);
        redirect('all-airport');
    }
    
    public function delete_airline($id) {
        $this->common_model->deleteInfo('airports', 'airline_id', $id);
        redirect('all-airport');
    }
}
