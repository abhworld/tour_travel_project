<?php

class News extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->user_id =  $this->session->userdata('user_id');
        $this->type =  $this->session->userdata('type');
        if($this->user_id == '') {
            redirect('login');
        }
        
        $this->load->model('common_model');
        $this->load->model('admin_model');
        $this->load->helper('common');
        $this->load->helper('role_permission');
    }
    
    public function add_news() {
        $data['title'] = 'Add News';
        
        $data['all_category'] = $this->common_model->getAllInfo('categories');
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
//        $data['footer'] = $this->load->view('admin_template/footer', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/news/add_news', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function save_category_info() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'category name', 'required');
        
        if ($this->form_validation->run() == false) {
            $errors = array();
            
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            
            $response['errors'] = array_filter($errors);
            $response['status'] = false;
        } else {
            $post = $this->input->post();
            
            $data['category_name'] = $post['category_name'];
            $this->common_model->insertId('categories', $data);
            
            $all_category = $this->common_model->getAllInfo('categories');
            $html = '';
            foreach ($all_category as $row) {
                $html = '<option value="'.$row['id'].'">
                            '.$row['category_name'].'
                        </option>';
            }
            $response['html'] = $html;
            $response['status'] = true;
        }

        echo json_encode($response);
    }
    
    public function save_info() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_id', 'category id', 'callback_check_category');
        if(!$this->input->post('news_id')){
            $this->form_validation->set_rules('news_title', 'news title', 'required|is_unique[news.news_title]');
        }
        $this->form_validation->set_rules('news_description', 'news description', 'required');
        
        if ($this->form_validation->run() == false) {
            $errors = array();
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            
            $response['errors'] = array_filter($errors);
            $response['status'] = false;
        } else {
            $post = $this->input->post();
            
            if(isset($post['news_id'])) {
                $news_id = $post['news_id'];
            }
            
            $data['news_title'] = str_replace('-', '',$post['news_title']);
            $data['category_id'] = $post['category_id'];
            $data['news_description'] = $post['news_description'];
            $data['created_by'] = $this->user_id;
            $data['created_at'] = date("Y-m-d H:i:s");
            
            $get_file_info = array();
            if(isset($_FILES['userfile'])) {
                $get_file_info = $this->uploadImage($_FILES['userfile'], 'uploads/news', 750, 350);
            }
//            
            if($get_file_info[0]) {
                $data['image'] = $get_file_info[0];
            } else {
                $data['image'] = $post['prev_hotel_image'];
            }
            
            if(isset($news_id)) {
                $this->common_model->updateInfo('news', 'news_id', $news_id, $data);
            } else {
                $news_id = $this->common_model->insertId('news', $data);
            }
            
            $response['status'] = true;
        }

        echo json_encode($response);
    }
    
    public function check_category($param) {
        if($param == ''){
            $this->form_validation->set_message('check_category', 'Category field is required');
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
    
    public function all_news() {
        $data['title'] = 'All News';
        
        $data['all_news'] = $this->common_model->get_all_news();
//        echo '<pre>';print_r($data['all_hotel']);die;
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
//        
        $data['main_content'] = $this->load->view('admin/news/all_news', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
    public function edit_news($id) {
        $data['title'] = 'Edit News';
        
        $data['all_category'] = $this->common_model->getAllInfo('categories');
        $data['news_info'] = $this->common_model->getInfo('news', 'news_id', $id);
        
        $data['headerlink'] = $this->load->view('admin_template/headerlink', $data, true);
        $data['header'] = $this->load->view('admin_template/header', $data, true);
        $data['leftbar'] = $this->load->view('admin_template/left_sidebar', $data, true);
        $data['footerlink'] = $this->load->view('admin_template/footerlink', $data, true);
        
        $data['main_content'] = $this->load->view('admin/news/edit_news', $data, true);
        $this->load->view('admin/admin_main_content', $data);
    }
    
}
