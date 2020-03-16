<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//frontend hajj
$route['hajj-homepage']  = 'home/hajj_homepage';
$route['hajj-detail']    = 'home/hajj_detail';
$route['hajj-list']      = 'home/hajj_list';

//frontend Omrah
$route['omrah-homepage']  = 'home/omrah_homepage';
$route['omrah-detail']    = 'home/omrah_detail';
$route['omrah-list']      = 'home/omrah_list';

//frontend visa
$route['visa']            = 'home/visa';
$route['visa-service/(:any)']    = 'home/visa_service/$1';
$route['country-visa']    = 'home/country_visa';

//frontend hotel
$route['hotel-homepage']  = 'home/hotel_homepage';
$route['hotel-detail']    = 'home/hotel_detail';


//frontend tour
$route['tour-homepage']          = 'home/tour_homepage';
$route['tour-detail/(:any)']     = 'home/tour_detail/$1';

//frontend home Content
$route['contact']         = 'home/contact';
$route['about-us']        = 'home/about_us';
$route['gallery']         = 'home/gallery';
$route['blog']            = 'home/blog';

//Admin Login Section
$route['login']       = 'login';
$route['check-login'] = 'login/checkLogin';
//End Admin Login Section

//admin Book Section
$route['booking-list']        = 'admin/booking_list';
$route['view-booking/(:any)'] = 'admin/view_booking/$1';

//admin Request Section
$route['request-list']        = 'admin/request_list';
$route['view-request/(:any)'] = 'admin/view_request/$1';

//admin Countries Section
$route['countries-list']        = 'admin/country_list';
$route['edit-country']          = 'admin/edit_country/$1';
$route['delete-country/(:any)'] = 'admin/delete_country/$1';

//admin Cities Section
$route['cities-list']        = 'admin/cities_list';
$route['edit-city/(:any)']   = 'admin/edit_city/$1';
$route['delete-city/(:any)'] = 'admin/delete_city/$1';

//Search Data
$route['search-data']       = 'search/search_data';
$route['search-hotel-tour'] = 'search/hotel_tour_search';
$route['search-tour']       = 'search/tour_search';

//admin Hajj Section
$route['add-hajj']         = 'hajj/add_hajj';
$route['list-hajj']        = 'hajj/all_hajj';
$route['edit-hajj/(:any)'] = 'hajj/edit_hajj/$1';
//End Hajj Section

//Umra Section
$route['add-umra']         = 'umra/add_umra';
$route['list-umra']        = 'umra/all_umra';
$route['edit-umra/(:any)'] = 'umra/edit_umra/$1';
//End Umra Section

//Tour Section
$route['add-tour']         = 'tour/add_tour';
$route['list-tour']        = 'tour/all_tour';
$route['edit-tour/(:any)'] = 'tour/edit_tour/$1';
//End Tour Section

//Hotel Section
$route['add-hotel']         = 'hotel/add_hotel';
$route['list-hotel']        = 'hotel/all_hotel';
$route['edit-hotel/(:any)'] = 'hotel/edit_hotel/$1';
//End Hotel Section

//Visa Section
$route['add-visa']         = 'visa/add_visa';
$route['list-visa']        = 'visa/all_visa';
$route['edit-visa/(:any)'] = 'visa/edit_visa/$1';
//End Visa Section

//delete
$route['delete-image/(:any)/(:any)']      = 'hotel/delete_image/$1/$2';
$route['delete-tour-image/(:any)/(:any)'] = 'tour/delete_image/$1/$2';
$route['delete-gallery-image/(:any)/(:any)'] = 'tour/delete_gallery_image/$1/$2';
$route['delete-hajj-image/(:any)/(:any)'] = 'hajj/delete_image/$1/$2';
$route['delete-umra-image/(:any)/(:any)'] = 'umra/delete_image/$1/$2';

//Slider Section
$route['add-slider']           = 'admin/add_slider';
$route['slider-list']          = 'admin/all_slider';
$route['edit-slider/(:any)']   = 'admin/edit_slider/$1';
$route['update_slider']        = 'admin/update_slider';
$route['delete-slider/(:any)'] = 'admin/delete_slider/$1';
//Slider Section

//Countries Section
$route['countries-list']        = 'admin/country_list';
$route['edit-country']          = 'admin/edit_country/$1';
$route['delete-country/(:any)'] = 'admin/delete_country/$1';

//Cities Section
$route['cities-list']        = 'admin/cities_list';
$route['edit-city/(:any)']   = 'admin/edit_city/$1';
$route['delete-city/(:any)'] = 'admin/delete_city/$1';

//Set type to hot
$route['set-hot/(:any)/(:any)']     = 'admin/change_type/$1/$2';
$route['delete-data/(:any)/(:any)'] = 'admin/delete_data/$1/$2';
$route['edit-company-info']         = 'admin/edit_company_info';
$route['edit-company-data']         = 'admin/edit_company_data';

//Flight Section
$route['all-airport'] = 'flight/all_airport';

//Page Section
$route['admin/about-us'] = 'admin/about_us';
$route['admin/home-page'] = 'admin/home_page';
$route['admin/contact-us'] = 'admin/contact_us';
$route['admin/hotel-content'] = 'admin/hotel_content';
$route['admin/tour-content'] = 'admin/tour_content';
$route['admin/visa-content'] = 'admin/visa_content';
$route['admin/umrah-content'] = 'admin/umrah_content';
$route['admin/footer-content'] = 'admin/footer_content';
$route['page-list'] = 'admin/page_list';
$route['edit-page/(:any)'] = 'admin/edit_page/$1';

//news section
$route['add-news'] = 'news/add_news';
$route['all-news'] = 'news/all_news';
$route['edit-news/(:any)'] = 'news/edit_news/$1';