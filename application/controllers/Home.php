<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model('home_model'); 
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
		$data = array();

		$data['all_hotel'] = $this->home_model->get_all_hotel();
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

	public function hotel_detail($name)
	{	
		$data = array();

		$hotel_info = $this->home_model->getInfo('hotel', 'hotel_name', str_replace('-', ' ', $name));
		$id = $hotel_info[0]['id'];

		// echo '<pre>'; print_r($hotel_info);
		$data['hotel_detail'] = $this->home_model->get_hotel_detail($id);
        $data['hotel_destination'] = $this->home_model->get_hotel_destination($id);

        // echo '<pre>'; print_r($data['hotel_destination']); die;

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

	public function tour_homepage()
	{	
		$data = array();

		$data['all_tour'] = $this->home_model->getAllInfo('tour');
		// echo '<pre>'; print_r($data['all_tour']); die;

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
}
