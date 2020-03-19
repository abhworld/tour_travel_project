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
        
        $data['all_country'] = $this->common_model->getAllInfo('countries');
        $data['room_type']   = $this->common_model->getAllInfo('room_type');
        $data['all_type']    = $this->common_model->getAllInfo('hotel_type');
        
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

    public function get_country_by_continent(){
        $continent_id = $this->input->post('continent_id');
        $get_all_country = $this->common_model->getInfo('countries', 'continent_id', $continent_id);
        
        $country = '';
        foreach ($get_all_country as $row) {
            $country.= '<option value="'.$row['id'].'" '.($country_id != '' && $country_id == $row['id'] ? 'selected' : '').'>'.$row['name'].'</option>';
        }
        
        echo json_encode($country);
    }


    public function save_hotel_info() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('country_id', 'country_id', 'callback_check_country');
        if(!$this->input->post('hotel_id')){
            $this->form_validation->set_rules('hotel_name', 'hotel name', 'required|is_unique[hotel.hotel_name]');
        }
        $this->form_validation->set_rules('hotel_address', 'hotel address', 'required');
        $this->form_validation->set_rules('hotel_description', 'hotel description', 'required');
        $this->form_validation->set_rules('hotel_facilities', 'hotel facilities', 'required');
        $this->form_validation->set_rules('hotel_itinerary', 'hotel itinerary', 'required');
        
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
            $data['hotel_description'] = $post['hotel_description'];
            $data['hotel_address'] = $post['hotel_address'];
            $data['latitude'] = $post['latitude'];
            $data['longitude'] = $post['longitude'];
            $data['hotel_facilities'] = $post['hotel_facilities'];
            $data['hotel_itinerary'] = $post['hotel_itinerary'];
            $data['hotel_type_id'] = $post['hotel_type_id'];

            
            if(isset($post['restaurant'])){
                $data['restaurant'] = $post['restaurant'];
            }
            if(isset($post['swimming_pool'])){
                $data['swimming_pool'] = $post['swimming_pool'];
            }
            if(isset($post['fitness_center'])){
                $data['fitness_center'] = $post['fitness_center'];
            }
            if(isset($post['service_room'])){
                $data['service_room'] = $post['service_room'];
            }
            if(isset($post['coffee_shop'])){
                $data['coffee_shop'] = $post['coffee_shop'];
            }
            if(isset($post['wifi'])){
                $data['wifi'] = $post['wifi'];
            }

            
 
//            echo '<pre>';print_r($data);die;
            // echo '<pre>'; print_r($hotel_id); die;
            
            

            
            if(isset($hotel_id)){
                $this->common_model->updateInfo('hotel', 'id', $hotel_id, $data);
            } else {
                $hotel_id = $this->common_model->insertId('hotel', $data);
            }

            $get_gallery_file = $this->uploadImage($_FILES['gallery_image'], 'uploads/hotel/hotel_gallery', 400, 270);
            $file_data = array();
            $i = 0;
            if($get_gallery_file)
            {
                foreach ($get_gallery_file as $file_info) 
                {
                    if($file_info)
                    {
                        $file_data['hotel_id'] = $hotel_id;
                        $file_data['gallery_image'] = $file_info;
                        $tour_gallery_id = $this->common_model->insertId('hotel_gallery', $file_data);
                    }
                    $i++;
                }
            }
            
            $room_data = array();
            
            $get_room_file = $this->uploadImage($_FILES['room_image'], 'uploads/hotel/rooms', 370, 257);
            // echo '<pre>';print_r($get_room_file);die;
            for ($i = 0; $i < count($post['room_type']); $i++) {
                $room_data['hotel_id'] = $hotel_id;
                $room_id = '';
                if(isset($post['room_id'][$i])){
                    $room_id = $post['room_id'][$i];
                }
                $room_data['room_type'] = $post['room_type'][$i];
                $room_data['room_condition'] = $post['room_condition'][$i];
                $room_data['meal_type'] = $post['meal_type'][$i];
                $room_data['no_of_guest'] = $post['no_of_guest'][$i];
                $room_data['no_of_adult'] = $post['no_of_adult'][$i];
                $room_data['no_of_child'] = $post['no_of_child'][$i];
                $room_data['rent_per_night'] = $post['rent_per_night'][$i];
                
                if($get_room_file && $get_room_file[$i]){
                    $room_data['room_image'] = $get_room_file[$i];
                }
                $room_data['room_detail'] = $post['room_detail'][$i];
                if($room_id){
                    $this->common_model->updateInfo('room_detail', 'room_detail_id', $room_id, $room_data);
                } else {
                    $this->common_model->insertId('room_detail', $room_data);
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
        
        $config['upload_path'] = FCPATH . '/' . $path_folder . '/';
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
                        $config2['new_image'] = FCPATH . '/' . $path_folder.'thumbnail/' . $file_data['file_name'];
                        $config2['maintain_ratio'] = FALSE;
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
    
    public function uploadHotelImage($FILES, $path_folder) {
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
                    $configi['image_library'] = 'gd2';
                    $configi['source_image'] = $file_data['full_path'];
                    $configi['new_image'] = FCPATH .'uploads/hotel/hotel_main_image/' . $file_data['file_name'];
                    $configi['maintain_ratio'] = FALSE;
                    $configi['width'] = 370;
                    $configi['height'] = 257;
                    $this->image_lib->initialize($configi);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    
                    $config2 = array();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $file_data['full_path'];
                    $config2['new_image'] = FCPATH .'uploads/hotel/hotel_feature/' . $file_data['file_name'];
                    $config2['maintain_ratio'] = FALSE;
                    $config2['width'] = 771;
                    $config2['height'] = 433;
                    
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

    public function uploadHotelGalleryImage($FILES, $path_folder) {
        $files = $FILES;
//        echo '<pre>';print_r($files);die;
        $config['upload_path'] = FCPATH . '/uploads/hotel/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '0';
        $this->load->library('upload');
        
        $images = array();
        
        foreach ($files['name'] as $key => $image) {
            if($files['error'][$key] == 0){
                $_FILES['image[]']['name']= $files['name'][$key];
                $_FILES['image[]']['type']= $files['type'][$key];
                $_FILES['image[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['image[]']['error']= $files['error'][$key];
                $_FILES['image[]']['size']= $files['size'][$key];

                $fileName = $files['name'][$key];

                $config['file_name'] = $fileName;

                $this->upload->initialize($config);
                $this->load->library('image_lib');
                
                if ($this->upload->do_upload('image[]')) {
                    $file_data = $this->upload->data();
                    $images[] = $file_data['file_name'];
                    
                    $configi = array();
                    if($key == 0){
                        $configi['image_library'] = 'gd2';
                        $configi['source_image'] = $file_data['full_path'];
                        $configi['new_image'] = FCPATH .'uploads/hotel/hotel_main_image/' . $file_data['file_name'];
                        $configi['maintain_ratio'] = FALSE;
                        $configi['width'] = 370;
                        $configi['height'] = 218;
                        $this->image_lib->initialize($configi);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                    }
                    
                    $config2 = array();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $file_data['full_path'];
                    $config2['new_image'] = FCPATH .'uploads/hotel/hotel_gallery/' . $file_data['file_name'];
                    $config2['maintain_ratio'] = FALSE;
                    $config2['width'] = 770;
                    $config2['height'] = 438;
                    
                    $this->image_lib->initialize($config2);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    
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
        $data['hotel_info'] = $this->common_model->getInfo('hotel', 'id', $id);
        $data['room_type']   = $this->common_model->getAllInfo('room_type');
        $data['room_info'] = $this->common_model->getInfo('room_detail', 'hotel_id', $id);
        // echo "<pre>"; print_r($data['room_info']); die;
        $data['hotel_gallery_images'] = $this->admin_model->getHotelGalleryImages($id);
        $data['room_detail_info'] = $this->common_model->getInfo('room_detail', 'hotel_id', $id);
        $data['hotel_images'] = $this->admin_model->getImages($id, 1);

        $data['type_info'] = $this->common_model->getInfo('hotel', 'id', $id);
        $data['all_type']    = $this->common_model->getAllInfo('hotel_type');
        
//        echo '<pre>';print_r($data['room_detail_info']);die;
        
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
        $image_info = $this->common_model->getInfo('hotel_images', 'image_id', $image_id);
//        echo '<pre>';print_r($_FILES['image']);die;
        $get_file_info = $this->uploadHotelImage($_FILES['image'], 'hotel');
        
        $file_path = FCPATH . 'uploads/hotel/' . $image_info[0]['image'];
        unlink($file_path);
        
        $thumb_path = FCPATH . 'uploads/hotel_feature/' . $image_info[0]['image'];
        unlink($thumb_path);
        
        if (file_exists(FCPATH . 'uploads/hotel_main_image/' . $image_info[0]['image'])) {
            $main_image_path = FCPATH . 'uploads/hotel_main_image/' . $image_info[0]['image'];
            unlink($main_image_path);
        }
        
        $thumb_path = FCPATH . 'uploads/hotel_thumb/' . $image_info[0]['image'];
        unlink($thumb_path);
        
        foreach ($get_file_info as $file_info) {
            $file_data['hotel_id'] = $image_info[0]['hotel_id'];
            $file_data['image'] = $file_info;
            $file_data['is_main_image'] = $image_info[0]['is_main_image'];
            
            $this->common_model->updateInfo('hotel_images', 'image_id', $image_id, $file_data);
        }
        
        redirect('edit-hotel/'.$image_info[0]['hotel_id']);
    }

    public function update_hotel_gallery_image() {
        $hotel_gallery_id = $this->input->post('hotel_gallery_id');
        // echo '<pre>';print_r($tour_gallery_id);die;
        $image_info = $this->common_model->getInfo('hotel_gallery', 'hotel_gallery_id', $hotel_gallery_id);
        // echo '<pre>';print_r($image_info);die;
        $get_file_info = $this->uploadHotelGalleryImage($_FILES['gallery_image'], 'hotel_gallery');
        // echo '<pre>';print_r($get_file_info);die;
        $file_path = FCPATH . 'uploads/hotel/hotel_gallery' . $image_info[0]['gallery_image'];
        unlink($file_path);
    
        foreach ($get_file_info as $file_info) {
            $file_data['hotel_id'] = $image_info[0]['hotel_id'];
            $file_data['gallery_image'] = $file_info;
            
            $this->common_model->updateInfo('hotel_gallery', 'hotel_gallery_id', $hotel_gallery_id, $file_data);
        }
        
        redirect('edit-hotel/'.$image_info[0]['hotel_id']);
    }
    
    public function delete_image($id, $hotel_id) {
        $this->admin_model->deleteInfo('hotel_images', 'image_id', $id);
        $this->session->set_flashdata('success_msg', 'Image deleted successfully');
        redirect('edit-hotel/'.$hotel_id);
    }

    public function delete_hotel_gallery_image($id, $hotel_id) {
        $this->admin_model->deleteInfo('hotel_gallery', 'hotel_gallery_id', $id);
        $this->session->set_flashdata('success_msg', 'Image deleted successfully');
        redirect('edit-hotel/'.$hotel_id);
    }

    
}
