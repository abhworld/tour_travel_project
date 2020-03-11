<?php

class Admin extends CI_Controller{
    
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
        $this->load->helper('common');
        $this->load->helper('role_permission');
    }
    
    public function change_password() {
        $data['title'] = 'Change Password';
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/change_password', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function update_password() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('old_password', 'old password', 'required');
        $this->form_validation->set_rules('new_password', 'new password', 'required');
        $this->form_validation->set_rules('conf_password', 'repeat password', 'required|matches[new_password]');
        
        $errors = array();
        
        $check_prev_password = $this->common_model->getInfo('users', 'id', $this->user_id);
        
        if ($this->form_validation->run() == false) {
            
            foreach ($this->input->post() as $key => $value) {
                // Add the error message for this field
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = false;
            
        } else {
            $post = $this->input->post();
            
            if($check_prev_password[0]['password'] != md5($this->input->post('old_password'))) {
                $errors['old_password'] = 'Your old password is wrong';
                $response['errors'] = array_filter($errors);
                $response['status'] = false;
            } else {
                $data['password'] = md5($this->input->post('new_password'));
                $this->common_model->updateInfo('users', 'id', $this->user_id, $data);

                $response['status'] = true;
            }
        }
        
        echo json_encode($response);
    }
    
    public function add_slider() {
        $data['title'] = 'Add Slider';
        
        $data['all_menu'] = $this->common_model->getAllInfo('menu');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/slider/add_slider', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function save_slider_info() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('menu_id', 'menu id', 'callback_check_menu');
        
        $errors = array();
        
        if($_FILES['userfile']['error'][0] != 0){
            $errors['userfile'] = 'Slider field is required';
        }
        
        if ($this->form_validation->run() == false) {
            
            foreach ($this->input->post() as $key => $value) {
                // Add the error message for this field
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = false;
            
        } else {
            $post = $this->input->post();
            $get_room_file = $this->uploadImage($_FILES['userfile'], 'slider', 1349, 712);
//            echo '<pre>';print_r($get_room_file);die;
            for ($i = 0; $i < count($get_room_file); $i++) {
                $room_data['menu_id'] = $post['menu_id'];
                $room_data['slider_image'] = $get_room_file[$i];
                
                $this->common_model->insertId('sliders', $room_data);
                
            }
            
            $response['status'] = true;
        }
        
        echo json_encode($response);
    }
    
    public function check_menu($param) {
        if($param == ''){
            $this->form_validation->set_message('check_menu', 'Menu field is required');
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
                        $config2['new_image'] = FCPATH .'/'.$path_folder.'/thumbnail/' . $file_data['file_name'];
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
    
    public function all_slider() {
        $data['title'] = 'All Slider';
        
        $data['all_sliders'] = $this->admin_model->get_slider_detail();
//        echo '<pre>';print_r($data['all_sliders']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/slider/all_slider', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function edit_slider($id) {
        $data['title'] = 'Edit Slider';
        
        $data['all_menu'] = $this->common_model->getAllInfo('menu');
        $data['slider_info'] = $this->common_model->getInfo('sliders', 'slider_id', $id);
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/slider/edit_slider', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function update_slider() {
        $post = $this->input->post();
        $id = $post['slider_id'];
        
        $data['slider_info'] = $this->common_model->getInfo('sliders', 'slider_id', $id);
        
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('menu_id', 'menu id', 'callback_check_menu');
        
        $errors = array();
        
        
        if ($this->form_validation->run() == false) {
            
            foreach ($this->input->post() as $key => $value) {
                // Add the error message for this field
                $errors[$key] = form_error($key);
            }
            
            $data['title'] = 'Edit Slider';
        
            $data['all_menu'] = $this->common_model->getAllInfo('menu');

            $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
            $data['header'] = $this->load->view('admin_template/header', $data, true);
            $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
    //        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
            $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
    //        
            $data['main_content'] = $this->load->view('admin/slider/edit_slider', $data, true);
            $this->load->view('admin/admin_main_content', $data);
            
        } else {
            if($_FILES['userfile']['error'][0] == 0) {
                $get_room_file = $this->uploadImage($_FILES['userfile'], 'slider', 1349, 712);
                $file_path = FCPATH .'uploads/slider/'. $data['slider_info'][0]['slider_image'];
                unlink($file_path);
                $thumb_path = FCPATH .'uploads/slider/thumbnail/'. $data['slider_info'][0]['slider_image'];
                unlink($thumb_path);
//                unlink('uploads/slider/'.$data['slider_info'][0]['slider_image']);
//                unlink('uploads/slider/thumbnail/'.$data['slider_info'][0]['slider_image']);
            }
//            echo '<pre>';print_r($get_room_file);die;
//            for ($i = 0; $i < count($get_room_file); $i++) {
                $slider_data['menu_id'] = $post['menu_id'];
                $slider_data['slider_image'] = $get_room_file[0];
                
                $this->common_model->updateInfo('sliders', 'slider_id', $id, $slider_data);
                
//            }
            redirect('slider-list');
        }
    }
    
    public function delete_slider($id) {
        $this->admin_model->deleteInfo('sliders', 'slider_id', $id);
        $this->session->set_flashdata('success_msg', 'Data deleted successfully');
        redirect('slider-list');
    }
    
    public function change_type($type, $id) {
        if($type == 1){
            $table = 'hotel';
        } else if($type == 2) {
            $table = 'tour';
        } else if($type == 3) {
            $table = 'umra';
        } else if($type == 4) {
            $table = 'hajj';
        }
        
        $get_info = $this->admin_model->getInfo($table, $table.'_id', $id);
        
        $update_data['offer'] = '1';
        if($get_info[0]['offer'] == 1){
            $update_data['offer'] = '0';
        }
        
        $this->admin_model->updateInfo($table, $table.'_id', $id, $update_data);
        
        redirect('list-'.$table);
    }
    
    public function home_page() {
        $data['get_all_hotel'] = $this->admin_model->getAllInfo('hotel');
        
        $tour_country = $this->home_model->get_tour_country();
        $new_array = array();
        foreach ($tour_country as $country) {
            $new_array[$country['tour_id']][] = $country;
        }
        $data['all_tour_country'] = $new_array;
        
        $data['get_all_tour'] = $this->admin_model->get_all_tour_details();
        
        $data['get_all_tour'] = $this->admin_model->get_all_tour();
        // $data['get_all_tour_domestic'] = $this->admin_model->get_all_tour_domestic();

        // echo "<pre>"; print_r($data['get_all_tour_international']); die;

        $data['get_info'] = $this->admin_model->getInfo('pages', 'page_name', 'Home');
        // echo "<pre>"; print_r($data['get_info']); die; 

        $data['home_meta_content'] = $this->common_model->getRow('pages_meta_section', 'pages_name', 'Home');
        
        // echo '<pre>';print_r($data['get_all_tour']);die;
        $data['title'] = 'Home Page';
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/pages/home_page', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function set_hotel_data() {
        $post = $this->input->post();
        $get_info = $this->admin_model->get_section_info('Section 3', 'Home');
        
        $json_decode_data = json_decode($get_info['section_content'], true);
        $json_decode_data['hotel_id'] = implode(',', $post['hotel_id']);
        
        $data['section_content'] = json_encode($json_decode_data);
       // echo '<pre>';print_r($data['section_content']);die;
        $this->admin_model->update_section_data('Section 3', 'Home', $data);
        
        redirect('admin/home-page');
//        echo '<pre>';print_r($json_decode_data);die;
    }

    public function set_tour_data() {
        $post = $this->input->post();
        // echo "<pre>"; print_r($post['tour_id']); die;

        $get_info = $this->admin_model->get_section_info('Section 3', 'Home');
         // echo "<pre>"; print_r($get_info); die;
        $json_decode_data = json_decode($get_info['section_content'], true);
        $json_decode_data['tour_id'] = implode(',', $post['tour_id']);
        
        $data['section_content'] = json_encode($json_decode_data);
        $this->admin_model->update_section_data('Section 3', 'Home', $data);
        
        redirect('admin/home-page');
//        echo '<pre>';print_r($json_decode_data);die;
    }
    
//     public function set_tour_data_domestic() {
//         $post = $this->input->post();
//         // echo "<pre>"; print_r($post['tour_id']); die;

//         $get_info = $this->admin_model->get_section_info('Section 4', 'Home');
//          // echo "<pre>"; print_r($get_info); die;
//         $json_decode_data = json_decode($get_info['section_content'], true);
//         $json_decode_data['tour_id'] = implode(',', $post['tour_id']);
        
//         $data['section_content'] = json_encode($json_decode_data);
//         $this->admin_model->update_section_data('Section 4', 'Home', $data);
        
//         redirect('admin/home-page');
// //        echo '<pre>';print_r($json_decode_data);die;
//     }
    
    public function get_section_data() {
        $post = $this->input->post();
        $data = array();
        
        $folder_name = str_replace(' ', '_', strtolower($post['type']));
        
        $data['get_info'] = $this->admin_model->get_section_info('Section '.$post['id'], $post['type']);
        $data['section_id'] = $post['id'];
        $data['section_modal_div'] = $this->load->view('admin/pages/'.$folder_name.'/section'.$post['id'], $data, true);
        echo json_encode($data);
    }
    
    public function save_section_data() {
        $post = $this->input->post();
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        if($post['section'] == 'Section 1') {
            $data = $this->section_1($post, $_FILES);
        } else if($post['section'] == 'Section 2') {
            $data = $this->section_2($post, $_FILES);
        } else if($post['section'] == 'Section 4') {
            $data = $this->section_4($post, $_FILES);
        } else if($post['section'] == 'Section 3'){
            $data = $this->section_3_5($post, $_FILES);
        }  else if($post['section'] == 'Section 5'){
            $data = $this->section_5($post, $_FILES);
        }else if($post['section'] == 'Section 6') {
            $data = $this->section_6($post, $_FILES);
        }
//        echo '<pre>';print_r($data);die;
        if($get_info){
            $this->admin_model->update_section_data($post['section'], $post['page_name'], $data);
        } else {
            $data['section'] = $post['section'];
            $data['page_name'] = $post['page_name'];
            $this->admin_model->insertInfo('pages', $data);
        }
        
    }
    
    public function section_1($post, $FILES) {
        $section_content['title'] = $post['title'];
        $section_content['text'] = $post['text'];
        
        $get_image_file = $this->uploadImage($FILES['image'], 'uploads/home/section1', 100, 90);
        
        $section_content['background_image'] = $get_image_file[0];
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        $json_decode_data['section_content'][] = $section_content;
        
        $data['section_content'] = json_encode($json_decode_data);
        
        return $data;
    }
    
    public function get_home_slider_data() {
        $post = $this->input->post();
        $data = array();
        $exploded_data = explode(" - ", $post['id']);
        
        $data['get_info'] = $this->admin_model->get_section_info($exploded_data[0], 'Home');
        $data['section_id'] = $post['id'];
        $data['array_index'] = $exploded_data[1] - 1;
        
        $folder_name = str_replace(' ', '', lcfirst($exploded_data[0]));
        $data['folder_name'] = $folder_name;
        $data['section_modal_div'] = $this->load->view('admin/pages/home/edit_section/'.$folder_name, $data, true);
        echo json_encode($data);
    }
    
    public function update_slider_data() {
        $post = $this->input->post();
        $get_image_file = $this->uploadImage($_FILES['image'], 'uploads/home/'.$post['folder_name'], 100, 90);
        
        
        $person_content['background_image'] = $post['prev_image'];
        if($get_image_file[0]){
            $person_content['background_image'] = $get_image_file[0];
        }
        if($post['section'] == 'Section 1'){
            $person_content['title'] = $post['title'];
            $person_content['text'] = $post['text'];
        }
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        
        $new = array();
        foreach ($json_decode_data['section_content'] as $key => $val){
            if($key == $post['index_id']) {
                $new['section_content'][$key] = $person_content;
            } else {
                $new['section_content'][$key] = $val;
            }
        }
        
        $data['section_content'] = json_encode($new);
//        echo '<pre>';print_r($data['section_content']);die;
        $this->admin_model->update_section_data($post['section'], 'Home', $data);
        
        redirect('admin/home-page');
    }
    
    public function section_2($post, $FILES) {
        $get_image_file = $this->uploadImage($FILES['image'], 'uploads/home/section2', 569, 322);
        
        $section_content['background_image'] = $get_image_file[0];
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        $json_decode_data['section_content'][] = $section_content;
        
        $data['section_content'] = json_encode($json_decode_data);
        
        return $data;
    }
    
    public function get_home_person_data() {
        $post = $this->input->post();
        $data = array();
        
        $exploded_data = explode(' - ', $post['id']);
        $data['array_index'] = $exploded_data[1];
        
        $data['get_info'] = $this->admin_model->get_section_info($exploded_data[0], 'Home');
        $data['section_id'] = $post['id'];
        $data['section_modal_div'] = $this->load->view('admin/pages/home/edit_section/section6', $data, true);
        echo json_encode($data);
    }
    
    public function edit_home_person_data() {
        $get_image_file = $this->uploadImage($_FILES['image'], 'uploads/home_happy_traveller', 100, 100);
        
        $post = $this->input->post();
        
        $person_content['image'] = $post['prev_image'];
        if($get_image_file[0]){
            $person_content['image'] = $get_image_file[0];
        }
        
        $person_content['name'] = $post['name'];
        $person_content['title'] = $post['title'];
        $person_content['review_text'] = $post['review_text'];
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        
        $new = array();
        foreach ($json_decode_data['person'] as $key => $val){
            if($key == $post['index_id']) {
                $new['person'][$key] = $person_content;
            } else {
                $new['person'][$key] = $val;
            }
        }
        
        $data['section_content'] = json_encode($new);
        $this->admin_model->update_section_data('Section 6', 'Home', $data);
        
        redirect('admin/home-page');
    }
    
    public function update_section_6_client() {
        $post = $this->input->post();
//        echo '<pre>';print_r($_FILES);die;
        $get_image_file = $this->uploadImage($_FILES['image'], 'uploads/home_happy_traveller', 100, 100);
        $person_content['image'] = $get_image_file[0];
        
        $person_content['name'] = $post['name'];
        $person_content['title'] = $post['title'];
        $person_content['review_text'] = $post['review_text'];
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        $json_decode_data['person'][] = $person_content;
//        
        $data['section_content'] = json_encode($json_decode_data);
        
        $this->admin_model->update_section_data($post['section'], $post['page_name'], $data);
        redirect('admin/home-page');
//        return $data;
    }
    
    public function section_3_5($post, $FILES) {
        $section_content['title'] = $post['title'];
        $section_content['text'] = $post['text'];
        
        if($FILES['image']['error'] == 0) {
            $config['upload_path'] = FCPATH . '/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $file_data = $this->upload->data();
                $section_content['background_image'] = $file_data['file_name'];
            }
        } else {
            $section_content['background_image'] = $post['prev_image'];
        }
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        if(isset($json_decode_data['tour_id'])){
            $section_content['tour_id'] = $json_decode_data['tour_id'];
        } if(isset($json_decode_data['hotel_id'])){
            $section_content['hotel_id'] = $json_decode_data['hotel_id'];
        }
        
        $data['section_content'] = json_encode($section_content);
        
        return $data;
    }
    
    public function section_4($post, $FILES) {
        $section_content['title'] = $post['title'];
        $section_content['text'] = $post['text'];
      
        $data['section_content'] = json_encode($section_content);
        
        return $data;
    }
    
    public function section_5($post, $FILES) {
        $section_content['title'] = $post['title'];
        $section_content['text'] = $post['text'];
        
        $get_image_file = $this->uploadImage($FILES['image'], 'uploads/home','','');
//        echo '<pre>';print_r($get_image_file);die;
        $section_content['background_image'] = $get_image_file[0];
        
        $section_content['happy_customer'] = $post['happy_customer'];
        $section_content['amazing_tours'] = $post['amazing_tours'];
        $section_content['in_business'] = $post['in_business'];
        $section_content['award_winning'] = $post['award_winning'];
        
        $data['section_content'] = json_encode($section_content);
        
        return $data;
    }
    
    public function about_us() {
        $data['title'] = 'About Us';
        
        $data['about_us_info'] = $this->common_model->getAllInfo('about_us');
        $data['get_info'] = $this->admin_model->getInfo('pages', 'page_name', 'About Us');
        $data['about_meta_content'] = $this->common_model->getRow('pages_meta_section', 'pages_name', 'About Us');
//        echo '<pre>';print_r($data['get_info']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/pages/about_us', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function get_person_data() {
        $post = $this->input->post();
        $data = array();
        
        $exploded_data = explode(' - ', $post['id']);
        $data['array_index'] = $exploded_data[1];
        
        $data['get_info'] = $this->admin_model->get_section_info($exploded_data[0], 'About Us');
        $data['section_id'] = $post['id'];
        $data['section_modal_div'] = $this->load->view('admin/pages/about_us/edit_section/section4', $data, true);
        echo json_encode($data);
    }
    
    public function get_section3_data() {
        $post = $this->input->post();
        $data = array();
        
        $exploded_data = explode(' - ', $post['id']);
        $data['array_index'] = $exploded_data[1];
        
        $data['get_info'] = $this->admin_model->get_section_info($exploded_data[0], 'About Us');
        $data['section_id'] = $post['id'];
        $data['section_modal_div'] = $this->load->view('admin/pages/about_us/edit_section/section3', $data, true);
        echo json_encode($data);
    }
    
    public function save_about_us_section() {
        $post = $this->input->post();
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        if($post['section'] == 'Section 1') {
            $data = $this->about_us_section_1($post, $_FILES);
        } else if($post['section'] == 'Section 2') {
            $data = $this->about_us_section_2($post, $_FILES);
        } else if($post['section'] == 'Section 3') {
            $data = $this->about_us_section_3($post);
        } else if($post['section'] == 'Section 4') {
            $data = $this->about_us_section_4($post, $_FILES);
        } else if($post['section'] == 'Section 5') {
            $data = $this->about_us_section_5($post, $_FILES);
        } else if($post['section'] == 'Section 6') {
            $data = $this->about_us_section_6($post, $_FILES);
        }
       
        if($get_info){
            $this->admin_model->update_section_data($post['section'], $post['page_name'], $data);
        } else {
            $data['section'] = $post['section'];
            $data['page_name'] = $post['page_name'];
            $this->admin_model->insertInfo('pages', $data);
        }
        
    }
    
    public function update_section_status() {
        $post = $this->input->post();
        $page_name = explode(' - ', $post['val']);
//        echo '<pre>';print_r($page_name);die;
        $data['is_enable'] = $post['is_enable'];
        $this->admin_model->update_section_data('Section '.$page_name[1], $page_name[0], $data);
    }
    
    public function about_us_section_1($post, $FILES) {
        if($FILES['image']['error'] == 0) {
            $config['upload_path'] = FCPATH . '/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $file_data = $this->upload->data();
                $section_content['background_image'] = $file_data['file_name'];
            }
        } else {
            $section_content['background_image'] = $post['prev_image'];
        }
        $data['section_content'] = json_encode($section_content);
        
        return $data;
    }
	
    public function about_us_section_2($post, $FILES) {
        $get_file = $this->uploadImage($FILES['image'], 'uploads/about_us', 450, 344);

        $section_content['title'] = $post['title'];
        $section_content['text'] = $post['text'];

        if ($get_file[0]) {
            $section_content['image'] = $get_file[0];
        } else {
            $section_content['image'] = $post['prev_image'];
        }
        $data['section_content'] = json_encode($section_content);

        return $data;
    }

    public function about_us_section_3($post) {

        $section_content['happy_customer'] = $post['happy_customer'];
        $section_content['amazing_tours'] = $post['amazing_tours'];
        $section_content['in_business'] = $post['in_business'];
        $section_content['award_winning'] = $post['award_winning'];

        $data['section_content'] = json_encode($section_content);

        return $data;
    }

    public function about_us_section_4($post, $FILES) {
        $get_room_file = $this->uploadImage($FILES['image'], 'uploads/about_us', 266, 266);
        $person_content['image'] = $get_room_file[0];
        
        $person_content['name'] = $post['name'];
        $person_content['title'] = $post['title'];
        $person_content['fb_link'] = $post['fb_link'];
        $person_content['twitter_link'] = $post['twitter_link'];
        $person_content['pinterest_link'] = $post['pinterest_link'];
        $person_content['google_link'] = $post['google_link'];
        
        $section_content['person'][] = $person_content;
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        $json_decode_data['person'][] = $person_content;
       
        $data['section_content'] = json_encode($json_decode_data);
        
        return $data;
//        
    }
    
    public function edit_person_data() {
        $get_room_file = array();
        if(isset($_FILES['image'])){
            $get_room_file = $this->uploadImage($_FILES['image'], 'uploads/about_us', 266, 266);
        }
        $post = $this->input->post();
        
        if($get_room_file[0]){
            $person_content['image'] = $get_room_file[0];
        }
        
        $person_content['name'] = $post['name'];
        $person_content['title'] = $post['title'];
        $person_content['fb_link'] = $post['fb_link'];
        $person_content['twitter_link'] = $post['twitter_link'];
        $person_content['pinterest_link'] = $post['pinterest_link'];
        $person_content['google_link'] = $post['google_link'];
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        
        $new = array();
        foreach ($json_decode_data['person'] as $key => $val){
            if($key == $post['index_id']) {
                $new['person'][$key] = $person_content;
            } else {
                $new['person'][$key] = $val;
            }
        }
        
        $data['section_content'] = json_encode($new);
        $this->admin_model->update_section_data('Section 4', 'About Us', $data);
        
        redirect('admin/about-us');
    }
    
    public function edit_section3_data() {
        $post = $this->input->post();
        
        $person_content['title'] = $post['title'];
        $person_content['text'] = $post['text'];
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        
        $new = array();
        foreach ($json_decode_data['content'] as $key => $val){
            if($key == $post['index_id']) {
                $new['content'][$key] = $person_content;
            } else {
                $new['content'][$key] = $val;
            }
        }
        
        $data['section_content'] = json_encode($new);
        $this->admin_model->update_section_data('Section 3', 'About Us', $data);
        
        redirect('admin/about-us');
    }
    
    public function about_us_section_5($post, $FILES) {
        $section_content['title'] = $post['title'];
        $section_content['text'] = $post['text'];
        
        $section_content['feature_1_title'] = $post['feature_1_title'];
        if($FILES['feature_1_image']['error'][0] == 0) {
            $get_room_file = $this->uploadImage($FILES['feature_1_image'], 'uploads/about_us', 47, 47);

            $section_content['feature_1_image'] = $get_room_file[0];
        } else {
            $section_content['feature_1_image'] = $post['prev_feature_1_image'];
        }
        $section_content['feature_1_text'] = $post['feature_1_text'];
        
        $section_content['feature_2_title'] = $post['feature_2_title'];
        if($FILES['feature_2_image']['error'][0] == 0) {
            $get_room_file = $this->uploadImage($FILES['feature_2_image'], 'uploads/about_us', 47, 47);

            $section_content['feature_2_image'] = $get_room_file[0];
        } else {
            $section_content['feature_2_image'] = $post['prev_feature_2_image'];
        }
        $section_content['feature_2_text'] = $post['feature_2_text'];
        
        $section_content['feature_3_title'] = $post['feature_3_title'];
        if($FILES['feature_3_image']['error'][0] == 0) {
            $get_room_file = $this->uploadImage($FILES['feature_3_image'], 'uploads/about_us', 47, 47);

            $section_content['feature_3_image'] = $get_room_file[0];
        } else {
            $section_content['feature_3_image'] = $post['prev_feature_3_image'];
        }
        $section_content['feature_3_text'] = $post['feature_3_text'];
        
        $data['section_content'] = json_encode($section_content);
        
        return $data;
    }
    
    public function about_us_section_6($post, $FILES) {
        $section_content['left_section_title'] = $post['left_section_title'];
        $section_content['left_section_text'] = $post['text'];
        $section_content['right_section_title'] = $post['right_section_title'];
        $section_content['right_section_text'] = $post['right_section_text'];
        
        if($FILES['image']['error'][0] == 0) {
            $get_room_file = $this->uploadImage($FILES['image'], 'uploads', 700, 320);

            $section_content['background_image'] = $get_room_file[0];
        } else {
            $section_content['background_image'] = $post['prev_image'];
        }
        $data['section_content'] = json_encode($section_content);
        
        return $data;
    }
    
    public function update_page() {
        $post = $this->input->post();
        $data['title'] = $post['page_name'];
        $data['content'] = $post['content'];
        $data['happy_client'] = $post['happy_client'];
        $data['satisfaction'] = $post['satisfaction'];
        $data['daily_tours'] = $post['daily_tours'];
        
        $percentage['satisfaction_percentage'] = $post['satisfaction_percentage'];
        $percentage['package_percentage'] = $post['package_percentage'];
        $percentage['accomodation_percentage'] = $post['accomodation_percentage'];
        $percentage['gurantee_percentage'] = $post['gurantee_percentage'];
        
        $data['about_us_percentage'] = json_encode($percentage);
        
        $this->admin_model->updateInfo('about_us', 'about_us_id', 1, $data);
        $response['status'] = true;
        echo json_encode($response);
    }
	
    public function contact_us() {
        $data['title'] = 'Contact Us';
        
        $data['contact_us_info'] = $this->common_model->getAllInfo('company_info');
        $data['get_info'] = $this->admin_model->getInfo('pages', 'page_name', 'Contact Us');
        $data['contact_meta_content'] = $this->common_model->getRow('pages_meta_section', 'pages_name', 'Contact Us');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/pages/contact_us', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function save_contact_us_section() {
        $post = $this->input->post();
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        if($post['section'] == 'Section 1') {
            $data = $this->about_us_section_1($post, $_FILES);
        } else if($post['section'] == 'Section 2') {
            $data = $this->contact_us_section_2($post, $_FILES);
        } 
//        
        if($get_info){
            $this->admin_model->update_section_data($post['section'], $post['page_name'], $data);
        } else {
            $data['section'] = $post['section'];
            $data['page_name'] = $post['page_name'];
            $this->admin_model->insertInfo('pages', $data);
        }
    }
    
    public function contact_us_section_2($post, $FILES) {
        $get_room_file = $this->uploadImage($FILES['image'], 'uploads/contact_us_organization', 200, 200);
        $person_content['image'] = $get_room_file[0];
        
        $person_content['name'] = $post['name'];
        $person_content['title'] = $post['title'];
        $person_content['address'] = $post['address'];
        $person_content['phone'] = $post['phone'];
        $person_content['email_address'] = $post['email_address'];
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        $json_decode_data['person'][] = $person_content;
//        echo '<pre>';print_r($json_decode_data);die;
        $data['section_content'] = json_encode($json_decode_data);
        
        return $data;
    }
    
    public function update_contact_page() {
        $post = $this->input->post();
        $data['title'] = $post['page_name'];
        $data['content'] = $post['content'];
        $data['happy_client'] = $post['happy_client'];
        $data['satisfaction'] = $post['satisfaction'];
        $data['daily_tours'] = $post['daily_tours'];
        
        $percentage['satisfaction_percentage'] = $post['satisfaction_percentage'];
        $percentage['package_percentage'] = $post['package_percentage'];
        $percentage['accomodation_percentage'] = $post['accomodation_percentage'];
        $percentage['gurantee_percentage'] = $post['gurantee_percentage'];
        
        $data['about_us_percentage'] = json_encode($percentage);
        
        $this->admin_model->updateInfo('about_us', 'about_us_id', 1, $data);
        $response['status'] = true;
        echo json_encode($response);
    }
    
    public function hotel_content() {
        $data['title'] = 'Hotel Content';
        
        $data['hotel_content'] = $this->common_model->getRow('pages', 'page_name', 'Hotel');
        $data['hotel_meta_content'] = $this->common_model->getRow('pages_meta_section', 'pages_name', 'Hotel');
//        echo '<pre>';print_r($data['hotel_meta_content']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
        
        $data['main_content'] = $this->load->view('admin/pages/hotel/hotel_content', $data, true);
//        $data['main_content'] = $this->load->view('admin/pages/contact_us', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function update_content() {
        $post = $this->input->post();
//        echo '<pre>';print_r($post);die;
        if($post['page_name'] == 'Hotel' || $post['page_name'] == 'Tour' || $post['page_name'] == 'Visa'
                 || $post['page_name'] == 'Hajj' || $post['page_name'] == 'Umrah'){
            $data['section_content'] = $post['section_content'];
            $this->admin_model->updateInfo('pages', 'page_name', $post['page_name'], $data);
        }
        
        $meta_data['meta_title'] = $post['meta_title'];
        $meta_data['meta_description'] = $post['meta_description'];
        $meta_data['meta_keyword'] = implode(', ', $post['meta_keyword']);
        
        $this->admin_model->updateInfo('pages_meta_section', 'pages_name', $post['page_name'], $meta_data);
        
        $response['status'] = true;
        echo json_encode($response);
    }
    
    public function tour_content() {
        $data['title'] = 'Tour Content';
        
        $data['hotel_content'] = $this->common_model->getRow('pages', 'page_name', 'Tour');
        $data['hotel_meta_content'] = $this->common_model->getRow('pages_meta_section', 'pages_name', 'Tour');
//        echo '<pre>';print_r($data['hotel_meta_content']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
        
        $data['main_content'] = $this->load->view('admin/pages/tour/tour_content', $data, true);
//        $data['main_content'] = $this->load->view('admin/pages/contact_us', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function update_tour_content() {
        $post = $this->input->post();
        $data['section_content'] = $post['section_content'];
        
        $this->admin_model->updateInfo('pages', 'page_name', 'Tour', $data);
        
        $meta_data['meta_title'] = $post['meta_title'];
        $meta_data['meta_description'] = $post['meta_description'];
        $meta_data['meta_keyword'] = implode(', ', $post['meta_keyword']);
        
        $this->admin_model->updateInfo('pages_meta_section', 'pages_name', 'Tour', $meta_data);
        
        $response['status'] = true;
        echo json_encode($response);
    }
    
    public function visa_content() {
        $data['title'] = 'Visa Content';
        
        $data['hotel_content'] = $this->common_model->getRow('pages', 'page_name', 'Visa');
        $data['hotel_meta_content'] = $this->common_model->getRow('pages_meta_section', 'pages_name', 'Visa');
//        echo '<pre>';print_r($data['hotel_meta_content']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
        
        $data['main_content'] = $this->load->view('admin/pages/visa/visa_content', $data, true);
//        $data['main_content'] = $this->load->view('admin/pages/contact_us', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function update_visa_content() {
        $post = $this->input->post();
        $data['section_content'] = $post['section_content'];
        
        $this->admin_model->updateInfo('pages', 'page_name', 'Visa', $data);
        
        $meta_data['meta_title'] = $post['meta_title'];
        $meta_data['meta_description'] = $post['meta_description'];
        $meta_data['meta_keyword'] = implode(', ', $post['meta_keyword']);
        
        $this->admin_model->updateInfo('pages_meta_section', 'pages_name', 'Visa', $meta_data);
        
        $response['status'] = true;
        echo json_encode($response);
    }
    
    
    public function hajj_content() {
        $data['title'] = 'Hajj Content';
        
        $data['hotel_content'] = $this->common_model->getRow('pages', 'page_name', 'Hajj');
        $data['hotel_meta_content'] = $this->common_model->getRow('pages_meta_section', 'pages_name', 'Hajj');
//        echo '<pre>';print_r($data['hotel_content']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
        
        $data['main_content'] = $this->load->view('admin/pages/hajj/hajj_content', $data, true);
//        $data['main_content'] = $this->load->view('admin/pages/contact_us', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function umrah_content() {
        $data['title'] = 'Hajj Content';
        
        $data['hotel_content'] = $this->common_model->getRow('pages', 'page_name', 'Umrah');
        $data['hotel_meta_content'] = $this->common_model->getRow('pages_meta_section', 'pages_name', 'Umrah');
//        echo '<pre>';print_r($data['hotel_content']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
        
        $data['main_content'] = $this->load->view('admin/pages/umrah/umrah_content', $data, true);
//        $data['main_content'] = $this->load->view('admin/pages/contact_us', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function footer_content() {
        $data['title'] = 'Footer Content';
        $data['company_info'] = $this->admin_model->getRow('company_info', 'id', 1);
        $data['get_info'] = $this->admin_model->getInfo('pages', 'page_name', 'Footer');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/pages/footer_content', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function save_footer_section() {
        $post = $this->input->post();
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        if($post['section'] == 'Section 1') {
            $data = $this->footer_section_1($post, $_FILES);
        } else if($post['section'] == 'Section 2') {
            $data = $this->footer_section_2($post, $_FILES);
        } 
//        
        if($get_info){
            $this->admin_model->update_section_data($post['section'], $post['page_name'], $data);
        } else {
            $data['section'] = $post['section'];
            $data['page_name'] = $post['page_name'];
            $this->admin_model->insertInfo('pages', $data);
        }
    }
    
    public function update_explore_content() {
        $post = $this->input->post();
//        echo '<pre>';print_r($post);die;
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        
        $explore_content = array();
        for($i = 0; $i < count($post['title']); $i++) {
            $explore_content['title'] = $post['title'][$i];
            $explore_content['link'] = $post['link'][$i];
            $new_array[] = $explore_content;
        }
        
        $json_decode_data = json_decode($get_info['section_content'], true);
        if($post['type'] == 'explore'){
            $json_decode_data['explore_content'] = $new_array;
        } if($post['type'] == 'deals'){
            $json_decode_data['deals_content'] = $new_array;
        }
        
//        echo '<pre>';print_r($json_decode_data);die;
        $data['section_content'] = json_encode($json_decode_data);
        
        $this->admin_model->update_section_data($post['section'], $post['page_name'], $data);
        
        $response['status'] = true;
        echo json_encode($response);
    }
    
    public function footer_section_2($post, $FILES) {
        $get_room_file = $this->uploadImage($FILES['image'], 'uploads/footer', 110, 90);
        $person_content['image'] = $get_room_file[0];
        
        $person_content['link'] = $post['link'];
        
        $get_info = $this->admin_model->get_section_info($post['section'], $post['page_name']);
        $json_decode_data = json_decode($get_info['section_content'], true);
        $json_decode_data['footer_image'][] = $person_content;
//        echo '<pre>';print_r($json_decode_data);die;
        $data['section_content'] = json_encode($json_decode_data);
        
        return $data;
    }
    
    public function edit_page($id) {
        $data['title'] = 'Edit Page';
        
        $data['page_data'] = $this->common_model->getInfo('pages', 'page_id', $id);
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/pages/edit_page', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function edit_company_info() {
        $data['title'] = 'Edit Company Info';
        
        $data['company_data'] = $this->common_model->getInfo('company_info', 'id', 1);
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/company/edit_company_data', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function edit_company_data() {
        $post = $this->input->post();
        $company_info = $this->admin_model->getInfo('company_info', 'id', 1);
        
        if ($_FILES['userfile']['error'][0] == 0) {
            $get_room_file = $this->uploadImage($_FILES['userfile'], 'slider', '', '');
            $file_path = FCPATH . 'uploads/slider/' . $company_info[0]['company_image'];
            unlink($file_path);
        }
//            echo '<pre>';print_r($get_room_file);die;
//            for ($i = 0; $i < count($get_room_file); $i++) {
        $data['company_name'] = $post['company_name'];
        $data['company_email'] = $post['company_email'];
        $data['company_phone'] = $post['company_phone'];
        $data['company_address'] = $post['company_address'];
        $data['longitude'] = $post['longitude'];
        $data['latitude'] = $post['latitude'];
        $data['fb_link'] = $post['fb_link'];
        $data['twitter_link'] = $post['twitter_link'];
        $data['pinterest_link'] = $post['pinterest_link'];
        $data['google_link'] = $post['google_link'];
        
        if(isset($get_room_file)){
            $data['company_image'] = $get_room_file[0];
        }

        $this->common_model->updateInfo('company_info', 'id', 1, $data);
        $this->session->set_flashdata('success_message', 'Company Info Updated Successfully');
        redirect('edit-company-info');
    }
    
    public function delete_data($type, $id) {
        if($type == 1){
            $table = 'hotel';
        } else if($type == 2) {
            $table = 'tour';
        } else if($type == 3) {
            $table = 'umra';
        } else if($type == 4) {
            $table = 'hajj';
        } else if($type == 5) {
            $table = 'visa';
        } else if($type == 6) {
            $table = 'air_ticket';
        }
        
//        $get_info = $this->admin_model->getInfo($table, $table.'_id', $id);
        $this->deleteImageInfo($id, $type);
//        
//        $update_data['offer'] = '1';
//        if($get_info[0]['offer'] == 1){
//            $update_data['offer'] = '0';
//        }
       
        $this->admin_model->deleteInfo($table, $table.'_id', $id);
        if($type == 1){
            $this->admin_model->deleteInfo('room_detail', 'hotel_id', $id);
        }
        if($type == 6){
            redirect('list-air-ticket');
        } else {
            redirect('list-'.$table);
        }
    }
    
    public function deleteImageInfo($id, $type) {
        
        $get_info = $this->admin_model->getImages($id, $type);
        
        if($type == 1){
            $get_hotel = $this->admin_model->getRow('hotel', 'id', $id);
            $file_path = FCPATH . 'uploads/hotel/' . $get_hotel['hotel_image'];
            unlink($file_path);
            $hotel_thumb_image_path = FCPATH . 'uploads/hotel/thumbnail/' . $get_hotel['image'];
            unlink($hotel_thumb_image_path);
            foreach ($get_info as $row) {
                $room_main_image_path = FCPATH . 'uploads/hotel/rooms/' . $row['image'];
                unlink($room_main_image_path);
                $room_thumb_image_path = FCPATH . 'uploads/hotel/rooms/thumbnail/' . $row['image'];
                unlink($room_thumb_image_path);
            }
        } else if($type == 2) {
            $get_hotel = $this->admin_model->getRow('tour', 'tour_id', $id);
            $get_info = $this->admin_model->getInfo('tour_detail', 'tour_pri_id', $id);
            
            $file_path = FCPATH . 'uploads/tour/' . $get_hotel['tour_image'];
            unlink($file_path);
            $hotel_thumb_image_path = FCPATH . 'uploads/tour/thumbnail/' . $get_hotel['tour_image'];
            unlink($hotel_thumb_image_path);
            foreach ($get_info as $row) {
                $room_main_image_path = FCPATH . 'uploads/tour/tour_detail/' . $row['image'];
                unlink($room_main_image_path);
                $room_thumb_image_path = FCPATH . 'uploads/tour/tour_detail/thumbnail/' . $row['image'];
                unlink($room_thumb_image_path);
            }
        } else if($type == 3) {
            $folder = 'umra';
            
            foreach ($get_info as $row) {
                $file_path = FCPATH . 'uploads/'.$folder.'/' . $row['image'];
                unlink($file_path);

                $main_image_path = FCPATH . 'uploads/'.$folder.'/thumbnail/' . $row['image'];
                unlink($main_image_path);

                $feature_path = FCPATH . 'uploads/'.$folder.'_feature/' . $row['image'];
                unlink($feature_path);

                $thumb_path = FCPATH . 'uploads/'.$folder.'_thumb/' . $row['image'];
                unlink($thumb_path);

                $this->admin_model->deleteInfo('hotel_images', 'image_id', $row['image_id']);
            }
        } else if($type == 4) {
            $folder = 'hajj';
            foreach ($get_info as $row) {
                $file_path = FCPATH . 'uploads/'.$folder.'/' . $row['image'];
                unlink($file_path);

                $main_image_path = FCPATH . 'uploads/'.$folder.'/thumbnail/' . $row['image'];
                unlink($main_image_path);

                $feature_path = FCPATH . 'uploads/'.$folder.'_feature/' . $row['image'];
                unlink($feature_path);

                $thumb_path = FCPATH . 'uploads/'.$folder.'_thumb/' . $row['image'];
                unlink($thumb_path);

                $this->admin_model->deleteInfo('hotel_images', 'image_id', $row['image_id']);
            }
        } else if($type == 5) {
            $folder = 'visa';
        } else if($type == 6) {
            $folder = 'air_ticket';
        }
    }
    
    public function request_list() {
        $data['title'] = 'Request List';
        
        $data['all_request_list'] = $this->common_model->getAllOrderInfo('request', 'request_id', 'DESC');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/request/request_list', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function view_request($request_id) {
        $data['title'] = 'Request Detail';
        
        $data['request_data'] = $this->common_model->getInfo('request', 'request_id', $request_id);
//        echo '<pre>';print_r($data['booking_data']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/request/request_detail', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function booking_list() {
        $data['title'] = 'Booking List';
        
        $data['all_booking_list'] = $this->common_model->getAllOrderInfo('booking', 'booking_id', 'DESC');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/booking/booking_list', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function view_booking($book_id) {
        $data['title'] = 'Booking Detail';
        
        $data['booking_data'] = $this->common_model->getInfo('booking', 'booking_id', $book_id);
//        echo '<pre>';print_r($data['booking_data']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/booking/booking_detail', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function country_list() {
        $data['title'] = 'Countries List';
        
        $data['all_country_list'] = $this->common_model->getAllInfo('countries');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/country/country_list', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function save_country() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'country name', 'required|is_unique[countries.name]');
        
        $errors = array();
        
        if ($this->form_validation->run() == false) {
            
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = false;
            
        } else {
            $data['name'] = $this->input->post('name');
            $this->admin_model->insertInfo('countries', $data);
            
            $response['status'] = true;
        }
        
        echo json_encode($response);
    }
    
    public function delete_country($id) {
        $get_all_cities = $this->admin_model->getInfo('cities', 'country_id', $id);
        
        $this->admin_model->deleteInfo('countries', 'id', $id);
        if($get_all_cities){
            $this->admin_model->deleteInfo('cities', 'country_id', $id);
        }
        redirect('countries-list');
        
    }
    
    public function cities_list() {
        $data['title'] = 'Cities List';
        
        $data['all_country'] = $this->common_model->getAllInfo('countries');
        $all_city_list = $this->common_model->get_city_with_country();
       
        $new_array = array();
        foreach ($all_city_list as $row) {
            $new_array[$row['country_name']][] = $row;
        }
        
        $data['all_city_list'] = $all_city_list;
//        echo '<pre>';print_r($new_array);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/city/city_list', $data, true);
        
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function save_city() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('country_id', 'country name', 'callback_check_country');
        
        $name = $this->input->post('name');
        
        
        $errors = array();
        if($name[0] == ''){
            $errors['city_name'] = 'City name is required';
        }
        
        if ($this->form_validation->run() == false || $name[0] == '') {
            
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = false;
            
        } else {
            foreach ($name as $city) {
                if($city != '') {
                    $data['country_id'] = $this->input->post('country_id');
                    $data['name'] = $city;
                    $this->admin_model->insertInfo('cities', $data);
                }
            }
            
            
            $response['status'] = true;
        }
        
        echo json_encode($response);
    }
    
    public function check_country($val) {
        if($val == ''){
            $this->form_validation->set_message('check_country', 'The country name is required');
            return FALSE;
        }
        
        return TRUE;
    }
    
    public function edit_city($id) {
        $data['title'] = 'Edit City';
        
        $data['city_data'] = $this->common_model->getInfo('cities', 'id', $id);
        $data['all_country_list'] = $this->common_model->getAllInfo('countries');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/city/city_edit', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function update_city_info() {
        $city_id = $this->input->post('id');
        $data['country_id'] = $this->input->post('country_id');
        $data['name'] = $this->input->post('name');
        
        $this->common_model->updateInfo('cities', 'id', $city_id, $data);
        
        redirect('cities-list');
    }
    
    public function delete_city($id) {
        $this->admin_model->deleteInfo('cities', 'id', $id);
        
        redirect('cities-list');
        
    }

}
