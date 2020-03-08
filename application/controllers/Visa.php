<?php

class Visa extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->user_id =  $this->session->userdata('user_id');
        $this->type =  $this->session->userdata('type');
        if($this->user_id == '') {
            redirect('login');
        }
        
        $this->load->model('common_model');
        $this->load->model('admin_model');
        $this->load->model('home_model');
        
        $this->load->helper('role_permission');
        $this->load->helper('common');
    }
    
    public function add_visa() {
        $data['title'] = 'Add Visa';
        
        $data['all_country'] = $this->common_model->getAllInfo('countries');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/visa/add_visa', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }

    public function save_visa_info() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('country_id', 'country id', 'callback_check_country');
        $this->form_validation->set_rules('basic_text', 'basic', 'required');
        
        
        if ($this->form_validation->run() == false) {
            $errors = array();
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = false;
        } else {
            $post = $this->input->post();
//            
            if($this->input->post('visa_id')){
                $visa_id = $this->input->post('visa_id');
            }
            
            $data['country_id'] = $post['country_id'];
            $data['basic_text'] = $post['basic_text'];
            $data['check_list'] = $post['check_list'];
            $data['fee'] = $post['fee'];
            $data['consultancy'] = $post['consultancy'];
            
            $get_file_info = $this->uploadvisaImage($_FILES['images'], 'uploads/visa');
            
            if($get_file_info[0]){
                $data['image'] = $get_file_info[0];
            } else if($post['prev_image']){
                $data['image'] = $post['prev_image'];
            }
//            echo '<pre>';print_r($data);die;
            if(isset($visa_id)){
                $this->common_model->updateInfo('visa', 'visa_id', $visa_id, $data);
            } else {
                $visa_id = $this->common_model->insertId('visa', $data);
            }
            
            $response['status'] = true;
        }

        echo json_encode($response);
    }
    
    public function check_country($param) {
        if($param == ''){
            $this->form_validation->set_message('check_country', 'Country field is required');
            return FALSE;
        }
        return TRUE;
    }
    
    public function check_airprot_transport($param) {
        if($param == ''){
            $this->form_validation->set_message('check_airprot_transport', 'Airport transfer field is required');
            return FALSE;
        }
        return TRUE;
    }

    
    public function uploadImage($FILES, $path_folder, $width, $height) {
        $files = $FILES;
        
        $config['upload_path'] = FCPATH . '/'.$path_folder.'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '0';
        
        $this->load->library('image_lib');
        $this->load->library('upload', $config);
        
        $this->upload->initialize($config);
        $images = array();
        
        foreach ($files['name'] as $key => $image) {
            if($files['error'][$key] == 0){
                $_FILES['images[]']['name']= $files['name'][$key];
                $_FILES['images[]']['type']= $files['type'][$key];
                $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['images[]']['error']= $files['error'][$key];
                $_FILES['images[]']['size']= $files['size'][$key];

                $fileName = $files['name'][$key];

                $config['file_name'] = $fileName;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('images[]')) {
                    $file_data = $this->upload->data();
                    $images[] = $file_data['file_name'];
                    if($width != '' && $height != ''){
                        
                        $config2 = array();
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] = $file_data['full_path'];
                        $config2['new_image'] = FCPATH .$path_folder.'/thumbnail/' . $file_data['file_name'];
                        $config2['maintain_ratio'] = TRUE;
                        $config2['width'] = $width;
                        $config2['height'] = $height;

                        $this->image_lib->initialize($config2);
                        $this->image_lib->resize();
                    }
                } else {
                    return false;
                }
            } else {
                $images[] = '';
            }
        }

        return $images;
        
//        return $response;
    }
    
    public function uploadvisaImage($FILES, $path_folder) {
        $files = $FILES;
//        echo '<pre>';print_r($files);die;
        $config['upload_path'] = FCPATH . '/'.$path_folder.'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '0';
        $this->load->library('upload');
        
        $images = array();
        
        foreach ($files['name'] as $key => $image) {
            if($files['error'][$key] == 0){
                $_FILES['images[]']['name']= $files['name'][$key];
                $_FILES['images[]']['type']= $files['type'][$key];
                $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['images[]']['error']= $files['error'][$key];
                $_FILES['images[]']['size']= $files['size'][$key];

                $fileName = $files['name'][$key];

                $config['file_name'] = $fileName;

                $this->upload->initialize($config);
                $this->load->library('image_lib');
                
                if ($this->upload->do_upload('images[]')) {
                    $file_data = $this->upload->data();
                    $images[] = $file_data['file_name'];
                    
                } else {
                    return false;
                }
            } else {
                $images[] = '';
            }
        }

        return $images;
        
//        return $response;
    }
    
    public function all_visa() {
        $data['title'] = 'All Visa';
        
        $data['all_visa'] = $this->common_model->get_all_visa();
        
//        echo '<pre>';print_r($data['all_visa']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/visa/all_visa', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function edit_visa($id) {
        $data['title'] = 'Edit Visa';
        
        $data['all_country'] = $this->common_model->getAllInfo('countries');
        $data['visa_info'] = $this->common_model->getInfo('visa', 'visa_id', $id);
//        echo '<pre>';print_r($data['all_visa_city']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/visa/edit_visa', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
}
