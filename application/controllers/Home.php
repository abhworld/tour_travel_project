<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model('home_model'); 
        $this->load->model('common_model'); 
        $this->load->model('admin_model'); 


        $this->load->library('Ajax_pagination');

        $this->load->helper('text');
        $this->load->helper('common');
    }

	public function index()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Home |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/home_content', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function hajj_homepage()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Hajj-Home |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/hajj/hajj_homepage', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function hajj_detail()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Hajj-Detail |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/hajj/hajj_detail', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function hajj_list()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Hajj-List |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/hajj/hajj_list', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function omrah_homepage()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Omrah-Home |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/omrah/omrah_homepage', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function omrah_detail()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Hajj-Detail |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/omrah/omrah_detail', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function omrah_list()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Omrah-List |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/omrah/omrah_list', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function visa()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		$data['continents'] = $this->home_model->getAllInfo('continents');

		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Visa |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/visa/visa', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}


	public function visa_service($id)
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		$data['countries'] = $this->home_model->getCountry($id);
		

		// echo '<pre>'; print_r($data['countries']); die;
		$data['title'] = 'Visa Service |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/visa/visa_service', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function country_visa($id)
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		$data['country_details'] = $this->home_model->getCountryDetails($id);

		// echo '<pre>'; print_r($data['country_details']); die;
		$data['title'] = 'Country Visa |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/visa/country_visa', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function hotel_homepage()
	{	
		$data['hotels']     = $this->home_model->get_all_hotel();
		$new_hotel_array = array();
		foreach($data['hotels'] as $row) {
			$new_hotel_array[$row['id']][] = $row;
		}
		// echo '<pre>';print_r($new_hotel_array);die;
		// echo '<pre>';print_r($data['all_hotel']);die;
		$data = array();

		// $post['country'] = $this->session->userdata('tour_country');
  //       $post['city'] = $this->session->userdata('tour_city');
       // $data = $post;

        // $totalRec = $this->common_model->count_all_hotel_data($post);
        // //pagination configuration
        // $data['page'] = 0;
        // $config['target'] = '#hotel_list_div';
        // $config['base_url'] = base_url() . 'ajaxPaginationData';
        // $config['total_rows'] = $totalRec;
        // $config['per_page'] = 12;
        // $config['link_func'] = 'searchPaginationData';
        // $this->ajax_pagination->initialize($config);
        $data['hotel_gallery'] =

		// $data['all_hotel']     = $this->home_model->get_all_hotel();
		$data['all_hotel']     = $new_hotel_array;

		$data['countries'] = $this->home_model->getAllInfo('countries');
		

		// echo '<pre>'; print_r($data['all_hotel']);echo "</pre>"; die;
		// $data['hotel_gallery'] = $this->home_model->get_hotel_gallery();

		// echo '<pre>'; print_r($data['hotel_info']); die;
		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;

		$data['title'] = 'Hotel-Home |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/hotel/hotel_homepage', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

// 	public function search_hotel_data() {
//         $post = $this->input->post();
        
//         $country = '';
//         $city = '';
//         if($this->input->post('country_id')){
//             $country = $post['country_id'];
//         }
//         if($this->input->post('city_id')){
//             $city = $post['city_id'];
//         }
//         $data['country'] = $country;
//         $data['city'] = $city;
//         // if(isset($post['price_start'])){
//         //     $data['price_start'] = $post['price_start'];
//         // }
//         // if(isset($post['price_end'])){
//         //     $data['price_end'] = $post['price_end'];
//         // }
        
//         $this->session->set_userdata($data);
//         $totalRec = $this->common_model->count_all_tour_data($post);
       	
//         //pagination configuration
//         $data['page'] = 0;
//         $config['target'] = '#hotel_list_div';
//         $config['base_url'] = base_url() . 'ajaxPaginationData';
//         $config['total_rows'] = $totalRec;
//         $config['per_page'] = 12;
//         $config['link_func'] = 'searchPaginationData';
//         $this->ajax_pagination->initialize($config);
        
//         $data['all_tour'] = $this->common_model->get_search_hotel_data($post, $config["per_page"], $data['page']);
// //        echo '<pre>';print_r($data['all_tour']);die;
        
//         $data['hotel_list_div'] = $this->load->view('home/hotel/hotel_homepage', $data, true);
        
//         echo json_encode($data);
//     }

	public function hotel_detail($name)
	{	
		$data = array();

		$hotel_info = $this->home_model->getInfo('hotel', 'hotel_name', str_replace('-', ' ', $name));
		$id = $hotel_info[0]['id'];

		// echo '<pre>'; print_r($hotel_info);
		$data['hotel_detail'] = $this->home_model->get_hotel_detail($id);
        $data['hotel_destination'] = $this->home_model->get_hotel_destination($id);
        $data['hotel_gallery'] = $this->home_model->get_gallery_hotel($id);
        $data['room_detail'] = $this->home_model->get_room_detail($id);

        // echo '<pre>'; print_r($data['hotel_detail']); die;

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Hotel-Detail |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/hotel/hotel_detail', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function send_booking_request() {
        $post = $this->input->post();

        // echo '<pre>'; print_r($post); die;
        
        $data = array();
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'name', 'required');
        // $this->form_validation->set_rules('last_name', 'last name', 'required');
        $this->form_validation->set_rules('email_address', 'email address', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        
        if ($this->form_validation->run() == false) {
            $errors = array();
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = false;
        } else {
            $data['type'] = $post['type'];
            
            if($this->input->post('package_name')){
                $data['package_name'] = $post['package_name'];
            }
            if($this->input->post('hotel_id')){
            	$data['hotel_id'] = $post['hotel_id'];
            }

            if($this->input->post('visa_id')){
            	$data['visa_id'] = $post['visa_id'];
            }
            $data['first_name'] = $post['name'];
            // $data['last_name'] = $post['last_name'];
//            $data['nationality'] = $post['nationality'];
            $data['phone_no'] = $post['phone'];
            $data['email_address'] = $post['email_address'];
//            $data['contact_no'] = $post['contact_no'];
            // $data['address'] = $post['address'];
            $data['booking_date'] = date('Y-m-d');
            if(isset($post['check_in'])){
                $data['check_in'] = $post['check_in'];
            }
            if(isset($post['check_out'])){
                $data['check_out'] = $post['check_out'];
            }
            if(isset($post['no_of_adult'])){
                $data['no_of_adult'] = $post['no_of_adult'];
            }
            if(isset($post['no_of_child'])){
                $data['no_of_child'] = $post['no_of_child'];
            }
            if(isset($post['booking_note'])){
                $data['booking_note'] = $post['booking_note'];
            }

            $this->admin_model->insertInfo('booking', $data);

    //        $this->send_mail($data['email_address']);
            $response['status'] = true;
        }

        echo json_encode($response);
    }

	public function get_city_by_country(){
		// echo '<pre>'; echo "string"; die;
        $country_id = $this->input->post('country_id');
        // echo '<pre>'; print_r($country_id); die;
        // $city_id = $this->input->post('city_id');
        $get_all_city = $this->common_model->getInfo('cities', 'country_id', $country_id);
        // echo '<pre>'; print_r($get_all_city); die;
        // echo '<pre>'; print_r($city_id); die;
        $city = '';
        foreach ($get_all_city as $row) {
            // $city.= '<option value="'.$row['id'].'" '.($city_id != '' && $city_id == $row['id'] ? 'selected' : '').'>'.$row['name'].'</option>';
             $city.= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
        // echo '<pre>'; print_r($city); die;
        echo json_encode($city);
    }

	public function tour_homepage()
	{	
		$data = array();

		// $data['all_tour'] = $this->home_model->getAllInfo('tour');
		// echo '<pre>'; print_r($data['all_tour']); die;

		$post['country_id'] = $this->session->userdata('tour_country');
        $post['city_id'] = $this->session->userdata('tour_city');
        $data = $post;

		$totalRec = $this->common_model->count_all_tour_data($post);
        //pagination configuration
        $data['page'] = 0;
        $config['target'] = '#tour_list_div';
        $config['base_url'] = base_url() . 'ajaxPaginationData';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = 12;
        $config['link_func'] = 'searchPaginationData';
        $this->ajax_pagination->initialize($config);

        // $data['all_tour'] = $this->home_model->getAllInfo('tour');

        $data['all_tour'] = $this->common_model->get_search_tour_data($post, $config["per_page"], $data['page']);

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Tour-Home |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/tour/tour_homepage', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	 public function ajaxPaginationData() {
        $country = '';
        $city = '';
        if($this->session->userdata('tour_country')){
            $country = $this->session->userdata('tour_country');
        }
        if($this->session->userdata('tour_city')){
            $city = $this->session->userdata('tour_city');
        }
        $data['tour_country'] = $country;
        $data['tour_city'] = $city;
        // $data['price_start'] = $this->session->userdata('price_start');
        // $data['price_end'] = $this->session->userdata('price_end');
        
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }
        $totalRec = $this->common_model->count_all_tour_data($data);
        //pagination configuration
        $config['target'] = '#tour_list_div';
        $config['base_url'] = base_url() . 'ajaxPaginationData';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = 12;
        $config['link_func'] = 'searchPaginationData';
        $this->ajax_pagination->initialize($config);
        
        $data['all_tour'] = $this->common_model->get_search_tour_data($data, $config["per_page"], $offset);
//        echo '<pre>';print_r($data['all_tour']);die;
        
        $data['tour_list_div'] = $this->load->view('home/tour/tour_div/tour_div', $data, true);
        
        echo json_encode($data);
    }

	public function search_tour_data() {
        $post = $this->input->post();
        // echo '<pre>'; print_r($post); die;
        
        $country = '';
        $city = '';
        if($this->input->post('country_id')){
            $country = $post['country_id'];
        }
        if($this->input->post('city_id')){
            $city = $post['city_id'];
        }
        $data['tour_country'] = $country;
        $data['tour_city'] = $city;
        // if(isset($post['price_start'])){
        //     $data['price_start'] = $post['price_start'];
        // }
        // if(isset($post['price_end'])){
        //     $data['price_end'] = $post['price_end'];
        // }
        
        $this->session->set_userdata($data);
        $totalRec = $this->common_model->count_all_tour_data($post);
       	
        //pagination configuration
        $data['page'] = 0;
        $config['target'] = '#tour_list_div';
        $config['base_url'] = base_url() . 'ajaxPaginationData';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = 12;
        $config['link_func'] = 'searchPaginationData';
        $this->ajax_pagination->initialize($config);
        
        $data['all_tour'] = $this->common_model->get_search_tour_data($post, $config["per_page"], $data['page']);
//        echo '<pre>';print_r($data['all_tour']);die;
        
        $data['tour_list_div'] = $this->load->view('home/tour/tour_div/tour_div', $data, true);
        
        echo json_encode($data);
    }

	public function tour_detail($name)
	{	
		$data = array();

		$tour_info = $this->home_model->getInfo('tour', 'package_name', str_replace('-', ' ', $name));
        // echo '<pre>'; print_r($tour_info); die;
        $id = $tour_info[0]['tour_id'];
        // echo '<pre>'; print_r($id); die;
        $data['tour_detail'] = $this->home_model->get_tour_detail($id);
        $data['tour_destination'] = $this->home_model->get_destination($id);
        // echo '<pre>'; print_r($data['tour_detail']); die;
        $data['tour_gallery'] = $this->home_model->get_gallery($id);
        // echo '<pre>'; print_r($data['tour_gallery']); die;
		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Tour-Detail |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/tour/tour_detail', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function contact()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Contact |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/contact', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function about_us()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'About Us |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/about_us', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function gallery()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Gallery |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/gallery', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function blog()
	{	
		$data = array();

		$data['company_info'] = $this->home_model->getRow('company_info', 'id', 1);
		// echo '<pre>'; print_r($data['company_info']); die;
		$data['title'] = 'Blog |';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['sidebar'] = $this->load->view('frontend_template/sidebar', $data, TRUE);

		$data['home_content'] = $this->load->view('home/blog', $data, TRUE);

		$this->load->view('home/home_main_content', $data);
	}

	public function searchHotel()
    {
		// $data['hotels']     = $this->home_model->get_all_hotel();
		// $new_hotel_array = array();
		// foreach($data['hotels'] as $row) {
		// 	$new_hotel_array[$row['id']][] = $row;
		// }
		$hotels = $this->home_model->searchHotel($_POST["restaurant"], $_POST["swimming_pool"], $_POST["fitness"], $_POST["coffee_shop"], $_POST["wifi_free"], $_POST["service_room"], $_POST["country_id"]);
		$new_hotel_array = array();
		foreach($hotels as $row) {
			$new_hotel_array[$row['id']][] = $row;
		}
		$data["all_hotel"] = $new_hotel_array;
		$data["hotel_list"] = $this->load->view('home/hotel/hotel_list', $data);
		return $data;
		// return json_encode($data["hotel_list"]);
	}

	public function searchCityByCountry()
    {
		$show = '';
		$cities = $this->common_model->getInfo('cities', 'country_id', $_POST["country_id"]);
		foreach($cities as $city)
			$show .= "<option value='". $city['id']."'>".$city['name']."</option>";

		echo $show;
 
	}
}
