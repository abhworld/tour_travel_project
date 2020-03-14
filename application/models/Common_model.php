<?php

class Common_model extends CI_Model{
    
    public function insertInfo($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    // public function add_gallery($data) 
    // {
    //     $this->db->insert('gallery', $data);
    // }

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

    public function get_all_news() {
        $this->db->select('*');
        $this->db->from('news');
        
        $this->db->join('categories', 'news.category_id = categories.id', 'LEFT');
        $this->db->join('users', 'news.created_by = users.id', 'LEFT');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllOrderInfo($table, $order_col, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        
        $this->db->order_by($order_col, $order_by);

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
//        echo '<pre>';print_r($query);die;
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
    
    public function get_all_permission_role_wise($role) {
        $this->db->select('*');
        $this->db->from('role_permission');

        $this->db->join('permissions', 'role_permission.permission = permissions.permission_id', 'LEFT');
        $this->db->join('roles', 'role_permission.role = roles.role_id', 'LEFT');
        $this->db->join('permission_type', 'permissions.permission_type = permission_type.permission_type_id', 'LEFT');
        
        $this->db->where('role_permission.role', $role);

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function count_all_hotel_data($table, $condition) {
        
        $this->db->select($table.'.*, countries.name AS country_name, cities.name AS city_name');
        $this->db->from($table);
        
        $this->db->join('countries', $table.'.country = countries.id', 'LEFT');
        $this->db->join('cities', $table.'.city = cities.id', 'LEFT');
        $this->db->join('room_detail', $table.'.id = room_detail.hotel_id', 'LEFT');
        
        foreach ($condition as $key => $val) {
            if($key != 'room_type' && $key != 'price_start' && $key != 'price_end' && $key != 'no_of_adult' && $key != 'no_of_child' && $val != ''){
                $this->db->where($table.'.'.$key, $val);
            }
            
            if($key == 'room_type' && $val != ''){
                $this->db->where('room_detail.room_type', $val);
            }
            if($key == 'price_start' && $val != ''){
                $this->db->where('room_detail.rent_per_night >=', $val);
            }
            if($key == 'price_end' && $val != ''){
                $this->db->where('room_detail.rent_per_night <=', $val);
            }
            if($key == 'no_of_adult' && $val != ''){
                $this->db->where('room_detail.no_of_adult', $val);
            }
            if($key == 'no_of_child' && $val != ''){
                $this->db->where('room_detail.no_of_child', $val);
            }
        }
        
        $this->db->group_by($table.'.id');
        
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->num_rows();
    }
    
    public function get_search_hotel_data($table, $condition, $limit, $start) {
        
        $this->db->select($table.'.*, countries.name AS country_name, cities.name AS city_name');
        $this->db->from($table);
        
        $this->db->join('countries', $table.'.country = countries.id', 'LEFT');
        $this->db->join('cities', $table.'.city = cities.id', 'LEFT');
        $this->db->join('room_detail', $table.'.id = room_detail.hotel_id', 'LEFT');
//        $this->db->join('hotel_images', $table.'.hotel_id = hotel_images.hotel_id', 'LEFT');
//        
//        $this->db->where($table.'_images.is_main_image', '1');
//        $this->db->where('hotel_images.type', '1');
        foreach ($condition as $key => $val) {
            if($key != 'room_type' && $key != 'price_start' && $key != 'price_end' && $key != 'no_of_adult' && $key != 'no_of_child' && $val != ''){
                $this->db->where($table.'.'.$key, $val);
            }
            
            if($key == 'room_type' && $val != ''){
                $this->db->where('room_detail.room_type', $val);
            }
            if($key == 'price_start' && $val != ''){
                $this->db->where('room_detail.rent_per_night >=', $val);
            }
            if($key == 'price_end' && $val != ''){
                $this->db->where('room_detail.rent_per_night <=', $val);
            }
            if($key == 'no_of_adult' && $val != ''){
                $this->db->where('room_detail.no_of_adult >=', $val);
            }
            if($key == 'no_of_child' && $val != ''){
                $this->db->where('room_detail.no_of_child >=', $val);
            }
        }
        
        $this->db->group_by($table.'.id');
        $this->db->order_by($table.'.id', 'DESC');
        
        if ($limit != '' || $start != '') {
            $this->db->limit($limit, $start);
        }
        
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array();
    }
    
    public function count_all_tour_data($condition, $type) {
        $this->db->select('tour.*, countries.name AS country_name, cities.name AS city_name, tour_detail.*');
        $this->db->from('tour');
        
        $this->db->join('tour_detail', 'tour.tour_id = tour_detail.tour_pri_id', 'LEFT');
        $this->db->join('countries', 'tour_detail.country_id = countries.id', 'LEFT');
        $this->db->join('cities', 'tour_detail.city_id = cities.id', 'LEFT');

        // $this->db->join('package_type', 'package_type.tour_id = tour.tour_id', 'LEFT');

        
        foreach ($condition as $key => $val) {
            if($key != 'price_start' && $key != 'price_end' && $val != ''){
                $this->db->where('tour_detail.'.$key, $val);
            }
            if($key == 'price_start' && $val != ''){
                $this->db->where('tour.tour_price >=', $val);
            }
            if($key == 'price_end' && $val != ''){
                $this->db->where('tour.tour_price <=', $val);
            }
        }
        // $this->db->where('package_type.type_id', $type);
        $this->db->group_by('tour.tour_id');
        
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->num_rows();
    }
    
    public function get_search_tour_data($condition, $limit, $start, $type) {
        
        $this->db->select('tour.*, countries.name AS country_name, cities.name AS city_name, tour_detail.*, hotel_images.image');
        $this->db->from('tour');
        
        $this->db->join('tour_detail', 'tour.tour_id = tour_detail.tour_pri_id', 'LEFT');
        $this->db->join('hotel_images', 'tour.tour_id = hotel_images.hotel_id', 'LEFT');
        $this->db->join('countries', 'tour_detail.country_id = countries.id', 'LEFT');
        $this->db->join('cities', 'tour_detail.city_id = cities.id', 'LEFT');
    
        // $this->db->join('package_type', 'package_type.tour_id = tour.tour_id', 'LEFT');
        
        foreach ($condition as $key => $val) {
            if($key != 'price_start' && $key != 'price_end' && $val != ''){
                $this->db->where('tour_detail.'.$key, $val);
            }
            if($key == 'price_start' && $val != ''){
                $this->db->where('tour.tour_price >=', $val);
            }
            if($key == 'price_end' && $val != ''){
                $this->db->where('tour.tour_price <=', $val);
            }
        }
        $this->db->where('hotel_images.is_main_image', 1);
        $this->db->where('hotel_images.type', 2);
        // $this->db->where('package_type.type_id', $type);
        $this->db->order_by('tour.tour_id', 'DESC');
        $this->db->group_by('tour.tour_id');
        
        if ($limit != '' || $start != '') {
            $this->db->limit($limit, $start);
        }
        
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array();

    }
    
    public function get_city_with_country() {
        $this->db->select('cities.*, countries.name as country_name');
        $this->db->from('cities');

        $this->db->join('countries', 'cities.country_id = countries.id', 'LEFT');

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_hotel_info() {
        $this->db->select('*');
        $this->db->from('hotel');
        
//        $this->db->join('room_detail', 'hotel.id = room_detail.hotel_id', 'LEFT');
        
        $this->db->order_by('hotel.id', 'DESC');
        
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array();
    }
    
    public function get_room_info($id) {
        $this->db->select('*');
        $this->db->from('room_detail');
        
        $this->db->join('room_type', 'room_detail.room_type = room_type.room_type_id', 'LEFT');
//        $this->db->join('hotel_images', 'room_detail.room_detail_id = hotel_images.hotel_id', 'LEFT');
//        
//        $this->db->where('hotel_images.type', '1');
        $this->db->where('room_detail.hotel_id', $id);
        
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array();
    }
    
    public function room_image_with_detail($image_id) {
        $this->db->select('hotel_images.*, room_detail.hotel_id AS hotel');
        $this->db->from('hotel_images');
        
        $this->db->join('room_detail', 'hotel_images.hotel_id = room_detail.room_detail_id', 'LEFT');
        
        $this->db->where('hotel_images.image_id', $image_id);
        
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array();
    }
    
    public function get_hotel_content() {
        $this->db->select('*');
        $this->db->from('pages');
        
        $this->db->join('pages_meta_section', 'pages.page_name = pages_meta_section.pages_name', 'LEFT');
        
        $this->db->where('pages.page_name', 'Hotel');
        
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_airport_info() {
        $this->db->select('*');
        $this->db->from('airports');
        
        $this->db->join('countries', 'airports.airline_country_id = countries.id', 'LEFT');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_all_visa() {
        $this->db->select('*');
        $this->db->from('visa');
        
        $this->db->join('countries', 'visa.country_id = countries.id', 'LEFT');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_visa_detail($id) {
        $this->db->select('*');
        $this->db->from('visa');
        
        $this->db->join('countries', 'visa.country_id = countries.id', 'LEFT');
        $this->db->where('visa.country_id', $id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
}
