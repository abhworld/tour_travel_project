<?php

class Umra extends CI_Controller {
    
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
    
    public function add_umra() {
        $data['title'] = 'Add Umra';
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/umra/add_umra', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function get_city_by_country(){
        $country_id = $this->input->post('country_id');
        $city_id = $this->input->post('city_id');
        $get_all_city = $this->common_model->getInfo('cities', 'country_id', $country_id);
        
        $city = '';
        foreach ($get_all_city as $row) {
            $city.= '<option value="'.$row['id'].'" '.($city_id != '' && $city_id == $row['id'] ? 'selected' : '').'>'.$row['name'].'</option>';
        }
        
        echo json_encode($city);
    }

    public function save_umra_info() {
        $this->form_validation->set_error_delimiters('', '');
//        $this->form_validation->set_rules('country_id', 'country_id', 'callback_check_country');
        if(!$this->input->post('umra_id')){
            $this->form_validation->set_rules('package_name', 'package name', 'required|is_unique[umra.package_name]');
        }
        $this->form_validation->set_rules('umra_itinerary', 'itinerary', 'required');
        $this->form_validation->set_rules('umra_included', 'umra included', 'required');
        $this->form_validation->set_rules('umra_excluded', 'umra excluded', 'required');
//        $this->form_validation->set_rules('umra_faq', 'FAQ', 'required');
        $this->form_validation->set_rules('umra_price', 'umra price', 'required');
        
        if ($this->form_validation->run() == false) {
            $errors = array();
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = false;
        } else {
            $post = $this->input->post();
            if($this->input->post('umra_id')){
                $umra_id = $this->input->post('umra_id');
            }
            $data['package_name'] = str_replace('-', '',$post['package_name']);
            $data['umra_itinerary'] = $post['umra_itinerary'];
            $data['umra_included'] = $post['umra_included'];
            $data['umra_excluded'] = $post['umra_excluded'];
            $data['umra_faq'] = $post['umra_faq'];
            $data['umra_price'] = $post['umra_price'];
            
//            echo '<pre>';print_r($post);die;
            if(isset($umra_id)){
                $this->common_model->updateInfo('umra', 'umra_id', $umra_id, $data);
            } else {
                $umra_id = $this->common_model->insertId('umra', $data);
            }
            
            
            $get_file_info = $this->uploadumraImage($_FILES['userfile'], 'umra');
//            echo '<pre>';print_r($get_file_info);die;
            $file_data = array();
            $i = 0;
            if($get_file_info){
                foreach ($get_file_info as $file_info) {
                    if($file_info){
                        $file_data['hotel_id'] = $umra_id;
                        $file_data['image'] = $file_info;
                        $file_data['type'] = 3;
                        $file_data['is_main_image'] = 0;
                        if($i == 0 && !$this->input->post('umra_id')){
                            $file_data['is_main_image'] = 1;
                        }
                        $this->common_model->insertId('hotel_images', $file_data);
                    }
                    $i++;
                }
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

    public function validate_image($files) {
        echo '<pre>';print_r($files);die;
        $check = false;
//        $ext = pathinfo($files['userfile']['tmp_name'], PATHINFO_EXTENSION);
        $detectedType = mime_content_type($files);

        if (($detectedType == "image/jpeg") || ($detectedType == "image/png") ||
            ($detectedType == "image/jpg") || ($detectedType == "image/gif")) {
            $check = true;
        }
        return $check;
    }
    
    public function uploadImage($FILES, $path_folder, $width, $height) {
        $files = $FILES;
        
        $config['upload_path'] = FCPATH . '/uploads/'.$path_folder.'/';
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
                        $config2['new_image'] = FCPATH .'uploads/umra/thumbnail/' . $file_data['file_name'];
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
    
    public function uploadumraImage($FILES, $path_folder) {
        $files = $FILES;
//        echo '<pre>';print_r($files);die;
        $config['upload_path'] = FCPATH . '/uploads/'.$path_folder.'/';
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
                    
                    $configi = array();
                    if($key == 0){
                        $configi['image_library'] = 'gd2';
                        $configi['source_image'] = $file_data['full_path'];
                        $configi['new_image'] = FCPATH .'uploads/umra_main_image/' . $file_data['file_name'];
                        $configi['maintain_ratio'] = FALSE;
                        $configi['width'] = 350;
                        $configi['height'] = 233;
                        $this->image_lib->initialize($configi);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                    }
                    
                    $config2 = array();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $file_data['full_path'];
                    $config2['new_image'] = FCPATH .'uploads/umra_feature/' . $file_data['file_name'];
                    $config2['maintain_ratio'] = FALSE;
                    $config2['width'] = 848;
                    $config2['height'] = 494;
                    
                    $this->image_lib->initialize($config2);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    
                    $config3 = array();
                    $config3['image_library'] = 'gd2';
                    $config3['source_image'] = $file_data['full_path'];
                    $config3['new_image'] = FCPATH .'uploads/umra_thumb/' . $file_data['file_name'];
                    $config3['maintain_ratio'] = FALSE;
                    $config3['width'] = 196;
                    $config3['height'] = 97;
                    $this->image_lib->initialize($config3);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    //                echo 'Upload Data: <pre>';print_r($this->upload->data());
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
    
    public function all_umra() {
        $data['title'] = 'All Umra';
        $select = 'umra.*, hotel_images.image';
        
        $data['all_umra'] = $this->admin_model->get_all_menu_details($select, 'umra', 3);
        
//        echo '<pre>';print_r($data['all_umra']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/umra/all_umra', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function edit_umra($id) {
        $data['title'] = 'Edit Umra';
        
        $data['umra_info'] = $this->common_model->getInfo('umra', 'umra_id', $id);
        $data['umra_images'] = $this->admin_model->getImages($id, 3);
        
        
//        echo '<pre>';print_r($data['all_umra_city']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/umra/edit_umra', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function update_image() {
        $image_id = $this->input->post('image_id');
        $image_info = $this->common_model->getInfo('hotel_images', 'image_id', $image_id);
//        echo '<pre>';print_r($_FILES['image']);die;
        $get_file_info = $this->uploadhajjImage($_FILES['image'], 'umra');
        
        $file_path = FCPATH . 'uploads/umra/' . $image_info[0]['image'];
        unlink($file_path);
        $thumb_path = FCPATH . 'uploads/umra_feature/' . $image_info[0]['image'];
        unlink($thumb_path);
        if (file_exists(FCPATH . 'uploads/umra_main_image/' . $image_info[0]['image'])) {
            $main_image_path = FCPATH . 'uploads/umra_main_image/' . $image_info[0]['image'];
            unlink($main_image_path);
        }
        $thumb_path = FCPATH . 'uploads/umra_thumb/' . $image_info[0]['image'];
        unlink($thumb_path);
        
        foreach ($get_file_info as $file_info) {
            $file_data['hotel_id'] = $image_info[0]['hotel_id'];
            $file_data['image'] = $file_info;
            $file_data['is_main_image'] = $image_info[0]['is_main_image'];
            
            $this->common_model->updateInfo('hotel_images', 'image_id', $image_id, $file_data);
        }
        
        redirect('edit-umra/'.$image_info[0]['hotel_id']);
    }
    
    public function delete_image($id, $hotel_id) {
        $this->admin_model->deleteInfo('hotel_images', 'image_id', $id);
        $this->session->set_flashdata('success_msg', 'Image deleted successfully');
        redirect('edit-umra/'.$hotel_id);
    }
}
