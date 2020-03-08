<?php

class Tour extends CI_Controller {
    
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
    
    public function add_tour() {
        $data['title'] = 'Add Tour';
        
        $data['all_type']    = $this->common_model->getAllInfo('tour_type');
        $data['get_all_tour'] = $this->common_model->getAllInfo('tour');
        $data['all_country'] = $this->common_model->getAllInfo('countries');
        $data['room_type'] = $this->common_model->getAllInfo('room_type');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/tour/add_tour', $data, true);
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

    public function save_tour_info() {
        $this->form_validation->set_error_delimiters('', '');
//        $this->form_validation->set_rules('country_id', 'country_id', 'callback_check_country');
        if(!$this->input->post('tour_id')){
            $this->form_validation->set_rules('package_name', 'package name', 'required|is_unique[tour.package_name]');
        }
        
        $this->form_validation->set_rules('tour_price', 'tour price', 'required');
        
        if ($this->form_validation->run() == false) {
            $errors = array();
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = false;
        } else {
            $post = $this->input->post();
            // echo '<pre>'; print_r($post); die;
            if($this->input->post('tour_id')){
                $tour_id = $this->input->post('tour_id');
            }
            
            $get_tour_file = $this->uploadImage($_FILES['image'], 'uploads/tour', 400, 270);
            
            $data['package_name'] = str_replace('-', '',$post['package_name']);
            $data['tour_price'] = $post['tour_price'];
            $data['no_of_day'] = $post['no_of_day'];
            $data['discount_amount'] = $post['tour_discount'];
            $data['tour_image'] = $get_tour_file[0];
            $data['type_id'] = $post['type_id'];

            if(isset($post['is_discount'])){
                $data['is_discount'] = $post['is_discount'];
            }
            if(isset($post['insurance'])){
                $data['insurance'] = $post['insurance'];
            }
            if(isset($post['all_drink_included'])){
                $data['all_drink_included'] = $post['all_drink_included'];
            }
            if(isset($post['restaurant'])){
                $data['restaurant'] = $post['restaurant'];
            }
            if(isset($post['all_ticket'])){
                $data['all_ticket'] = $post['all_ticket'];
            }
            if(isset($post['tour_guide'])){
                $data['tour_guide'] = $post['tour_guide'];
            }
            if(isset($post['travel_insurance'])){
                $data['travel_insurance'] = $post['travel_insurance'];
            }
            
            if(isset($post['related_tour_id'])){
                $data['related_tour'] = implode(', ', $post['related_tour_id']);
            }
            
            if(isset($tour_id)){
                $this->common_model->updateInfo('tour', 'tour_id', $tour_id, $data);
            } else {
                $tour_id = $this->common_model->insertId('tour', $data);
            }
            
            $get_file_info = $this->uploadImage($_FILES['userfile'], 'uploads/tour/tour_detail', 501, 250);
//            echo '<pre>';print_r($get_file_info);die;
            $tour_detail_data = array();
            for($i = 0; $i < count($get_file_info); $i++){
                $tour_detail_data['tour_pri_id'] = $tour_id;
                $tour_detail_data['country_id'] = $post['country_id'][$i];
                $tour_detail_data['city_id'] = $post['city'][$i];
                $tour_detail_data['tour_detail_text'] = $post['tour_detail_text'][$i];
                $tour_detail_data['image'] = $get_file_info[$i];
                
                $this->common_model->insertId('tour_detail', $tour_detail_data);
            }
            
            $response['status'] = true;
        }
        redirect('list-tour');
//        echo json_encode($response);
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
                        $config2['new_image'] = FCPATH . '/'.$path_folder.'/thumbnail/' . $file_data['file_name'];
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
    
    public function uploadtourImage($FILES, $path_folder, $width, $height) {
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
                    
                    $config2 = array();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $file_data['full_path'];
                    $config2['new_image'] = FCPATH .'uploads/tour/tour_detail' . $file_data['file_name'];
                    $config2['maintain_ratio'] = FALSE;
                    $config2['width'] = $width;
                    $config2['height'] = $height;
                    
                    $this->image_lib->initialize($config2);
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
    
    public function all_tour() {
        $data['title'] = 'All Tour';
        
        $data['all_tour'] = $this->admin_model->get_all_tour_details();
        
//        echo '<pre>';print_r($data['all_tour']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/tour/all_tour', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function edit_tour($id) {
        $data['title'] = 'Edit Tour';
        
        $data['get_all_tour'] = $this->common_model->getAllInfo('tour');
        $data['all_country'] = $this->common_model->getAllInfo('countries');
        $data['tour_detail'] = $this->home_model->get_tour_detail($id);

        $data['type_info'] = $this->common_model->getInfo('tour', 'tour_id', $id);
        $data['all_type']    = $this->common_model->getAllInfo('tour_type');
        // echo '<pre>'; print_r($data['tour_detail']); die;
//        $data['tour_info'] = $this->common_model->getInfo('tour', 'tour_id', $id);
        
//        echo '<pre>';print_r($data['tour_detail']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/tour/edit_tour', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function update_tour_info() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('package_name', 'package name', 'required');
        $this->form_validation->set_rules('tour_price', 'tour price', 'required');
        if ($this->form_validation->run() == false) {
            $errors = array();
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = false;
        } else {
            $post = $this->input->post();
            
            $tour_id = $this->input->post('tour_id');
            $get_tour_file = $this->uploadImage($_FILES['image'], 'uploads/tour', 400, 270);
            
            $data['package_name'] = str_replace('-', '',$post['package_name']);
            $data['tour_price'] = $post['tour_price'];
            $data['discount_amount'] = $post['tour_discount'];
            $data['type_id'] = $post['type_id'];
            $data['no_of_day'] = $post['no_of_day'];
            $data['tour_image'] = $post['prev_tour_image'];
            if($get_tour_file[0]){
                $data['tour_image'] = $get_tour_file[0];
            }
            if($post['related_tour_id']){
                $data['related_tour'] = implode(', ', $post['related_tour_id']);
            }
            
            $this->common_model->updateInfo('tour', 'tour_id', $tour_id, $data);
            
            $this->common_model->deleteInfo('tour_detail', 'tour_pri_id', $tour_id);
            $tour_detail_data = array();
            for($i = 1; $i <= $data['no_of_day']; $i++){
                $tour_detail_data['tour_pri_id'] = $tour_id;
                $tour_detail_data['country_id'] = $post['country_id'][$i];

                $tour_detail_data['city_id'] = $post['city'][$i];
                $tour_detail_data['tour_detail_text'] = $post['tour_detail_text'][$i];
                $tour_detail_data['image'] = $post['tour_day_image'][$i];
                
                $config['upload_path'] = FCPATH . '/uploads/tour/tour_detail/';
                $config['allowed_types'] = '*';
                $config['max_size'] = '0';
                
                $images = array();
                
                $files = $_FILES;
                
                if($files['userfile']['error'][$i] == 0) {
                    
                    $_FILES['userfile']['name']     = $files['userfile']['name'][$i];
                    $_FILES['userfile']['type']     = $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error']    = $files['userfile']['error'][$i];
                    $_FILES['userfile']['size']     = $files['userfile']['size'][$i];

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    $this->load->library('image_lib');

                    if ($this->upload->do_upload('userfile')) {
                        $file_data = $this->upload->data();
                        $images = $file_data['file_name'];
                        $tour_detail_data['image'] = $images;
                        
                        $config2 = array();
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] = $file_data['full_path'];
                        $config2['new_image'] = FCPATH .'uploads/tour/tour_detail/thumbnail/' . $file_data['file_name'];
                        $config2['maintain_ratio'] = FALSE;
                        $config2['width'] = 501;
                        $config2['height'] = 250;

                        $this->image_lib->initialize($config2);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                    }
                    
                    $file_path = FCPATH . 'uploads/tour/tour_detail/' . $post['tour_day_image'][$i];
                    unlink($file_path);

                    $thumb_path = FCPATH . 'uploads/tour/tour_detail/thumbnail/' . $post['tour_day_image'][$i];
                    unlink($thumb_path);
                }
//                echo '<pre>';print_r($tour_detail_data);
                $this->common_model->insertId('tour_detail', $tour_detail_data);
            }
            
            $response['status'] = true;
        }
        redirect('list-tour');
//        echo json_encode($response);
    }
    
    public function update_tour_image() {
        $image_id = $this->input->post('image_id');
        $image_info = $this->common_model->getInfo('hotel_images', 'image_id', $image_id);
//        echo '<pre>';print_r($_FILES['image']);die;
        $get_file_info = $this->uploadtourImage($_FILES['image'], 'tour');
        
        $file_path = FCPATH . 'uploads/tour/' . $image_info[0]['image'];
        unlink($file_path);
        
        $thumb_path = FCPATH . 'uploads/tour_feature/' . $image_info[0]['image'];
        unlink($thumb_path);
        
        if (file_exists(FCPATH . 'uploads/tour_main_image/' . $image_info[0]['image'])) {
            $main_image_path = FCPATH . 'uploads/tour_main_image/' . $image_info[0]['image'];
            unlink($main_image_path);
        }
        
        $thumb_path = FCPATH . 'uploads/tour_thumb/' . $image_info[0]['image'];
        unlink($thumb_path);
        
        foreach ($get_file_info as $file_info) {
            $file_data['hotel_id'] = $image_info[0]['hotel_id'];
            $file_data['image'] = $file_info;
            $file_data['is_main_image'] = $image_info[0]['is_main_image'];
            
            $this->common_model->updateInfo('hotel_images', 'image_id', $image_id, $file_data);
        }
        
        redirect('edit-tour/'.$image_info[0]['hotel_id']);
    }
    
    public function delete_image($id, $tour_id) {
        $this->admin_model->deleteInfo('hotel_images', 'image_id', $id);
        $this->session->set_flashdata('success_msg', 'Image deleted successfully');
        redirect('edit-tour/'.$tour_id);
    }
}
