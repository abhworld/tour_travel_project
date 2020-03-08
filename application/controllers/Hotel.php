<?php

class Hotel extends CI_Controller {
    
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
    
    public function add_hotel() {
        $data['title'] = 'Add Hotel';
        
        $data['get_all_hotel'] = $this->common_model->getAllInfo('hotel');
        $data['all_country'] = $this->common_model->getAllInfo('countries');
        $data['room_type'] = $this->common_model->getAllInfo('room_type');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/hotel/add_hotel', $data, true);
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


    public function save_hotel_info() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('country_id', 'country_id', 'callback_check_country');
        if(!$this->input->post('hotel_id')){
            $this->form_validation->set_rules('hotel_name', 'hotel name', 'required|is_unique[hotel.hotel_name]');
        }
        $this->form_validation->set_rules('hotel_address', 'hotel address', 'required');
        $this->form_validation->set_rules('hotel_overview', 'hotel overview', 'required');
        
        if ($this->form_validation->run() == false) {
            $errors = array();
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = false;
        } else {
            $post = $this->input->post();
            
            if(isset($post['hotel_id'])){
                $hotel_id = $post['hotel_id'];
            }
            
            $data['hotel_name'] = str_replace('-', '',$post['hotel_name']);
            $data['country'] = $post['country_id'];
            $data['city'] = $post['city'];
            $data['hotel_overview'] = $post['hotel_overview'];
            $data['hotel_address'] = $post['hotel_address'];
            $data['latitude'] = $post['latitude'];
            $data['longitude'] = $post['longitude'];
            $data['attract_nearby'] = $post['attract_nearby'];
            if(isset($post['fitness_center'])){
                $data['fitness_center'] = $post['fitness_center'];
            }
            if(isset($post['coffee_shop'])){
                $data['coffee_shop'] = $post['coffee_shop'];
            }
            if(isset($post['restaurant'])){
                $data['restaurant'] = $post['restaurant'];
            }
            if(isset($post['baby_care'])){
                $data['baby_care'] = $post['baby_care'];
            }
            if(isset($post['service_room'])){
                $data['service_room'] = $post['service_room'];
            }
            if(isset($post['wifi_free'])){
                $data['wifi_free'] = $post['wifi_free'];
            }
            $get_file_info = array();
            if(isset($_FILES['userfile'])){
                $get_file_info = $this->uploadImage($_FILES['userfile'], 'uploads/hotel', 800, 540);
            }
//            
            if($get_file_info[0]){
                $data['hotel_image'] = $get_file_info[0];
            } else {
                $data['hotel_image'] = $post['prev_hotel_image'];
            }
            
            if($post['related_hotel_id']){
                $data['related_hotel'] = implode(', ', $post['related_hotel_id']);
            }
            
            
            if(isset($hotel_id)){
                $this->common_model->updateInfo('hotel', 'id', $hotel_id, $data);
            } else {
                $hotel_id = $this->common_model->insertId('hotel', $data);
            }
            
            $room_data = array();
//            echo '<pre>';print_r($post);
            
            
//            $get_room_file = $this->uploadImage($_FILES['room_image'], 'uploads/hotel/rooms/', 600, 270);
//            echo '<pre>';print_r($get_room_file);die;
            foreach ($post['room_type'] as $key => $val) {
                $room_data['hotel_id'] = $hotel_id;
                $room_id = '';
                if(isset($post['room_id'][$key][0])){
                    $room_id = $post['room_id'][$key][0];
                }
                $room_data['room_type'] = $post['room_type'][$key][0];
                $room_data['room_condition'] = $post['room_condition'][$key][0];
                $room_data['meal_type'] = $post['meal_type'][$key][0];
                $room_data['no_of_guest'] = $post['no_of_guest'][$key][0];
                $room_data['no_of_adult'] = $post['no_of_adult'][$key][0];
                $room_data['no_of_child'] = $post['no_of_child'][$key][0];
                $room_data['rent_per_night'] = $post['rent_per_night'][$key][0];
                $room_data['room_detail'] = $post['room_detail'][$key][0];
                
                if($room_id){
                    $this->common_model->updateInfo('room_detail', 'room_detail_id', $room_id, $room_data);
                } else {
                    $room_id = $this->common_model->insertId('room_detail', $room_data);
                }
                
                $config['upload_path'] = FCPATH . '/uploads/hotel/rooms/';
                $config['allowed_types'] = '*';
                $config['max_size'] = '0';

                $this->load->library('image_lib');
                $this->load->library('upload', $config);

                $this->upload->initialize($config);
                $images = array();
                $files = $_FILES['room_image'];
                foreach ($files['name'][$key] as $imagekey => $image) {
                    if($files['error'][$key][$imagekey] == 0) {
                        $_FILES['images[]']['name']= $files['name'][$key][$imagekey];
                        $_FILES['images[]']['type']= $files['type'][$key][$imagekey];
                        $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key][$imagekey];
                        $_FILES['images[]']['error']= $files['error'][$key][$imagekey];
                        $_FILES['images[]']['size']= $files['size'][$key][$imagekey];

                        $fileName = $files['name'][$key][$imagekey];

                        $config['file_name'] = $fileName;

                        $this->upload->initialize($config);
                        $image_data = array();
                        if ($this->upload->do_upload('images[]')) {
                            $file_data = $this->upload->data();
                            $images[] = $file_data['file_name'];
                            
                            $config2 = array();
                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = $file_data['full_path'];
                            $config2['new_image'] = FCPATH . '/uploads/hotel/rooms/thumbnail/' . $file_data['file_name'];
                            $config2['maintain_ratio'] = TRUE;
                            $config2['width'] = 600;
                            $config2['height'] = 270;

                            $this->image_lib->initialize($config2);
                            $this->image_lib->resize();
                            
                            $image_data['hotel_id'] = $room_id;
                            $image_data['image'] = $file_data['file_name'];
                            $image_data['type'] = 1;
                            $image_data['is_main_image'] = 0;
                            $this->common_model->insertId('hotel_images', $image_data);
                        }
                    }
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
    
    public function all_hotel() {
        $data['title'] = 'All Hotel';
        
        $data['all_hotel'] = $this->admin_model->get_all_hotel_details();
//        echo '<pre>';print_r($data['all_hotel']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/hotel/all_hotel', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function edit_hotel($id) {
        $data['title'] = 'Edit Hotel';
        
        $data['all_country'] = $this->common_model->getAllInfo('countries');
        $data['get_all_hotel'] = $this->common_model->getAllInfo('hotel');
        $data['hotel_info'] = $this->common_model->getInfo('hotel', 'id', $id);
        $data['room_type'] = $this->common_model->getAllInfo('room_type');
        $room_detail = $this->common_model->get_room_info($id);
        $data['hotel_images'] = $this->admin_model->getImages($id, 1);
        
        $new_array = array();
        foreach ($room_detail as $row) {
            $new_array[$row['room_detail_id']][] = $row;
        }
        $data['room_detail_info'] = $new_array;
//        echo '<pre>';print_r($data['hotel_info']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/hotel/edit_hotel', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function update_image() {
        $image_id = $this->input->post('image_id');
        
        $image_info = $this->common_model->room_image_with_detail($image_id);
        $get_file_info = $this->uploadImage($_FILES['image'], 'uploads/hotel/rooms', 600, 270);
        
        if($get_file_info[0]){
            $file_path = FCPATH . 'uploads/hotel/rooms/' . $image_info[0]['image'];
            unlink($file_path);

            $thumb_path = FCPATH . 'uploads/hotel/rooms/thumbnail/' . $image_info[0]['image'];
            unlink($thumb_path);
            foreach ($get_file_info as $file_info) {
                $file_data['hotel_id'] = $image_info[0]['hotel_id'];
                $file_data['image'] = $file_info;
                $file_data['is_main_image'] = $image_info[0]['is_main_image'];

                $this->common_model->updateInfo('hotel_images', 'image_id', $image_id, $file_data);
            }
        }
        
        redirect('edit-hotel/'.$image_info[0]['hotel']);
    }
    
    public function delete_image($id, $hotel_id) {
        $this->admin_model->deleteInfo('hotel_images', 'image_id', $id);
        $this->session->set_flashdata('success_msg', 'Image deleted successfully');
        redirect('edit-hotel/'.$hotel_id);
    }
}
