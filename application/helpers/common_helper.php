<?php

    function get_all_info($table) {
        $CI =& get_instance();
        
        $CI->db->select('*');
        $CI->db->from($table);
    
        $query = $CI->db->get();
        $result = $query->result_array();
        if($result){
            return $result;
        } else {
            return 0;
        }
        
    }
    
    function get_info($table, $col_name, $col_val) {
        $CI =& get_instance();
        
        $CI->db->select('*');
        $CI->db->from($table);
        
        $CI->db->where($col_name, $col_val);
    
        $query = $CI->db->get();
        $result = $query->result_array();
        if($result){
            return $result;
        } else {
            return 0;
        }
        
    }
    
    function get_country_id($city_id) {
        $CI =& get_instance();
        
        $CI->db->select('*');
        $CI->db->from('cities');
        
        $CI->db->where('id', $city_id);
    
        $query = $CI->db->get();
        $result = $query->result_array();
        if($result){
            return $result[0]['country_id'];
        } else {
            return 0;
        }
        
    }
    
    function send_mail($mail_data){
        $CI =& get_instance();
        
        
        $CI->load->library('email');
        
        $CI->email->from('admin@abhworld.com', 'Textile Knowledge');
        $CI->email->to($mail_data['mail_to']);
//        $this->email->cc('another@another-example.com');
//        $this->email->bcc('them@their-example.com');

        $CI->email->subject($mail_data['subject']);
        $CI->email->message($mail_data['message']);

        $CI->email->send();
    }
    
    function book_for($type){
        if($type == 1){
            return 'Hotel';
        }
        if($type == 2){
            return 'Tour Package';
        }
        if($type == 3){
            return 'Umra Package';
        }
        if($type == 4){
            return 'Hajj Package';
        }
        if($type == 5){
            return 'Flight';
        }
        if($type == 6){
            return 'Visa';
        }
    }
    
    function hotel_name($id){
        $CI =& get_instance();
        
        $CI->db->select('*');
        $CI->db->from('hotel');
        
        $CI->db->where('id', $id);
    
        $query = $CI->db->get();
        $result = $query->result_array();
        if($result){
            return $result[0]['hotel_name'];
        } else {
            return 0;
        }
    }
    
    function get_lowest_price($hotel_id){
        $CI =& get_instance();
        
        $CI->db->select_min('rent_per_night');
        $CI->db->from('room_detail');
        
        $CI->db->where('hotel_id', $hotel_id);
    
        $query = $CI->db->get();
        $result = $query->result_array();
        if($result){
            return $result[0]['rent_per_night'];
        } else {
            return 0;
        }
    }
    
    function related_hotels($hotel_id){
        $CI =& get_instance();
        
        $CI->db->select('*');
        $CI->db->from('hotel');
        
        $CI->db->where_in('id', explode(", ", $hotel_id));
    
        $query = $CI->db->get();
        $result = $query->result_array();
        if($result){
            return $result;
        } else {
            return 0;
        }
    }
    
    function related_tours($hotel_id){
        $CI =& get_instance();
        
        $CI->db->select('*');
        $CI->db->from('tour');
        
        $CI->db->where_in('tour_id', explode(", ", $hotel_id));
    
        $query = $CI->db->get();
        $result = $query->result_array();
        if($result){
            return $result;
        } else {
            return 0;
        }
    }
    