<?php

class Admin_model extends CI_Model{
    
    public function insertInfo($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function insertId($table, $data)
    {
        $this->db->insert($table, $data);

        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function getAllInfo($table)
    {
        $this->db->select('*');
        $this->db->from($table);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_where($select, $table, $columnName, $columnValue)
    {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($columnName, $columnValue);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSelectItem($select, $table)
    {
        $this->db->select($select);
        $this->db->from($table);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateInfo($table, $colName, $colValue, $data)
    {
        $this->db->where($colName, $colValue);
        $this->db->update($table, $data);
    }

    public function deleteInfo($table, $colName, $colValue)
    {
        $this->db->where($colName, $colValue);
        $this->db->delete($table);
    }

    public function getInfo($table, $colName, $colValue)
    {
        $this->db->select('*');
        $this->db->from($table);
        
        $this->db->where($colName, $colValue);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getInfoByOrder($table, $colName, $colValue, $order_col, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        
        $this->db->where($colName, $colValue);
        $this->db->order_by($order_col, $order_by);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getAllData($table_name)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getLastData($order_by, $table_name)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        
        $this->db->order_by($order_by, "desc");
        $this->db->limit(1);
        
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function getRow($table, $colName, $colValue)
    {
        $this->db->select('*');
        $this->db->from($table);
        
        $this->db->where($colName, $colValue);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_total_data_with_condition($table, $conditions)
    {
        $this->db->select('*');
        $this->db->from($table);

        if ($conditions) {
            $this->db->where($conditions);
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_data_with_limit_condition($table, $limit, $start, $conditions, $order_col, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);

        if ($conditions) {
            $this->db->where($conditions);
        }
        
        $this->db->limit($limit, $start);
        if ($order_by && $order_col) {
            $this->db->order_by($order_col, $order_by);
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getImages($id, $type) {
        $this->db->select('*');
        $this->db->from('hotel_images');
        
        $this->db->where('hotel_id', $id);
        $this->db->where('type', $type);
        
        $query = $this->db->get();
        return $query->result_array();
    }

     public function getGalleryImages($id) {
        $this->db->select('*');
        $this->db->from('gallery');
        
        $this->db->where('tour_id', $id);
        // $this->db->where('type', $type);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_all_hotel_details() {
        $this->db->select('hotel.*, countries.name AS country_name, cities.name AS city_name');
        $this->db->from('hotel');
        
        $this->db->join('countries', 'hotel.country = countries.id', 'LEFT');
        $this->db->join('cities', 'hotel.city = cities.id', 'LEFT');
//        $this->db->join('hotel_images', 'hotel.hotel_id = hotel_images.hotel_id', 'LEFT');
        
//        $this->db->where('hotel_images.is_main_image', '1');
//        $this->db->where('hotel_images.type', '1');
        $this->db->order_by('hotel.id', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_slider_detail() {
        $this->db->select('*');
        $this->db->from('sliders');
        
        $this->db->join('menu', 'sliders.menu_id = menu.menu_id', 'LEFT');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_page_slider($page_name) {
        $this->db->select('*');
        $this->db->from('sliders');
        
        $this->db->join('menu', 'sliders.menu_id = menu.menu_id', 'LEFT');
        $this->db->where('menu.name', $page_name);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_all_tour_details() {
        $this->db->select('tour.*, hotel_images.image');
        $this->db->from('tour');
        
        $this->db->join('hotel_images', 'tour.tour_id = hotel_images.hotel_id', 'LEFT');
        
        $this->db->where('hotel_images.is_main_image', '1');
        $this->db->where('hotel_images.type', '2');
        
        $this->db->order_by('tour.tour_id', 'DESC');
        
        $query = $this->db->get();
       // echo $this->db->last_query();die;
        return $query->result_array();
    }
    

    //according to tour type
    public function get_all_tour()
    {
        $this->db->select('*');
        $this->db->from('tour');

        // $this->db->join('package_type', 'tour.tour_id = package_type.tour_id', 'LEFT');
        // $this->db->join('tour_type', 'tour_type.type_id = package_type.type_id', 'LEFT');
        $this->db->join('hotel_images', 'tour.tour_id = hotel_images.hotel_id', 'LEFT');

        $this->db->where('hotel_images.is_main_image', '1');
        $this->db->where('hotel_images.type', '2');

        // $this->db->where('tour_type.type_id', '2');

        $this->db->order_by('tour.tour_id', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    // public function get_all_tour_domestic()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tour');

    //     $this->db->join('package_type', 'tour.tour_id = package_type.tour_id', 'LEFT');
    //     $this->db->join('tour_type', 'tour_type.type_id = package_type.type_id', 'LEFT');
    //     $this->db->join('hotel_images', 'tour.tour_id = hotel_images.hotel_id', 'LEFT');

    //     $this->db->where('hotel_images.is_main_image', '1');
    //     $this->db->where('hotel_images.type', '2');

    //     $this->db->where('tour_type.type_id', '1');

    //     $this->db->order_by('tour.tour_id', 'DESC');

    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    
    public function get_all_menu_details($select, $table, $type) {
        $this->db->select($select);
        $this->db->from($table);
        if($type == 1) {
            $this->db->join('countries', 'hotel.country = countries.id', 'LEFT');
            $this->db->join('cities', 'hotel.city = cities.id', 'LEFT');
        }
        $this->db->join('hotel_images', $table.'.'.$table.'_id = hotel_images.hotel_id', 'LEFT');
        
        $this->db->where('hotel_images.is_main_image', '1');
        $this->db->where('hotel_images.type', $type);
        
        $this->db->order_by($table.'.'.$table.'_id', 'DESC');
        
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array();
    }
    
    public function get_section_info($section_id, $section_name) {
        $this->db->select('*');
        $this->db->from('pages');
        
        $this->db->where('section', $section_id);
        $this->db->where('page_name', $section_name);
        
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function update_section_data($section_id, $section_name, $data) {
        $this->db->where('section', $section_id);
        $this->db->where('page_name', $section_name);
        
        $this->db->update('pages', $data);
    }

}
