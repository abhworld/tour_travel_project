<?php

class Home_model extends CI_Model{
    
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
    
    public function get_hotel_detail($id) {
        $this->db->select('hotel.*, countries.name AS country_name, cities.name AS city_name');
        $this->db->from('hotel');
        
        $this->db->join('countries', 'hotel.country = countries.id', 'LEFT');
        $this->db->join('cities', 'hotel.city = cities.id', 'LEFT');
//        $this->db->join('hotel_images', 'hotel.hotel_id = hotel_images.hotel_id', 'LEFT');
        
        $this->db->where('hotel.id', $id);
        
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_related_hotel($country_id, $id) {
        $this->db->select('hotel.*');
        $this->db->from('hotel');
        
        $this->db->where('hotel.id !=', $id);
        $this->db->where('hotel.country', $country_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_tour_detail($id) {
        $this->db->select('tour.*, tour_detail.*, countries.name AS country_name, cities.name AS city_name');
        $this->db->from('tour');
        
        $this->db->join('tour_detail', 'tour.tour_id = tour_detail.tour_pri_id', 'LEFT');
        $this->db->join('countries', 'tour_detail.country_id = countries.id', 'LEFT');
        $this->db->join('cities', 'tour_detail.city_id = cities.id', 'LEFT');
        
        $this->db->where('tour.tour_id', $id);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_destination($id)
    {
        $this->db->select('countries.name  AS country_name, cities.name AS city_name');

        $this->db->from('tour');

        $this->db->join('tour_detail', 'tour.tour_id = tour_detail.tour_pri_id', 'LEFT');
        $this->db->join('countries', 'tour_detail.country_id = countries.id', 'LEFT');
        $this->db->join('cities', 'tour_detail.city_id = cities.id', 'LEFT');

        $this->db->where('tour.tour_id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_gallery($id)
    {
        $this->db->select('*');

        $this->db->from('gallery');

        $this->db->where('gallery.tour_id', $id);    
        
        $query = $this->db->get();
        return $query->result_array();      
    }
    
    public function get_related_tour($country_id, $tour_id) {
        $this->db->select('tour.*, tour_detail.*');
        $this->db->from('tour');
        
        $this->db->join('tour_detail', 'tour.tour_id = tour_detail.tour_pri_id', 'LEFT');
        
        $this->db->where('tour_detail.country_id', $country_id);
        $this->db->where('tour.tour_id !=', $tour_id);
        
        $this->db->order_by('tour.tour_id', 'DESC');
        $this->db->group_by('tour.tour_id');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_tour_country() {
        $this->db->select('*');
        $this->db->from('tour_country');
        
        $this->db->join('countries', 'tour_country.country_id = countries.id', 'LEFT');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_tour_type() {
        $this->db->select('*');
        // $this->db->from('package_type');
        // 
        // $this->db->join('tour_type', 'package_type.type_id = tour_type.type_id', 'LEFT');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    
    public function get_tour_city() {
        $this->db->select('*');
        $this->db->from('tour_city');
        
        $this->db->join('cities', 'tour_city.city_id = cities.id', 'LEFT');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_offer_list_data($table, $type) {
        $this->db->select($table.'.*, hotel_images.image, type');
        $this->db->from($table);
        
        $this->db->join('hotel_images', $table.'.'.$table.'_id = hotel_images.hotel_id', 'LEFT');
        
        $this->db->where($table.'.offer', 1);
        $this->db->where('hotel_images.is_main_image', 1);
        $this->db->where('hotel_images.type', $type);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_highest_price($table, $column) {
        $query = $this->db->query("SELECT MAX($column) AS highest_price FROM $table");
        
        return $query->result_array();
    }
    
    public function get_facilities_count() {
        $this->db->select('SUM(fitness_center) AS fitness_count, SUM(coffee_shop) AS coffee_shop_cnt, '
                . 'SUM(restaurant) AS restaurant_count, SUM(swimming_pool) AS swimming_pool_cnt, '
                . 'SUM(service_room) AS service_room_count, SUM(wifi) AS wifi_free_cnt');
        $this->db->from('hotel');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_data_by_keyword($keyword) {
        $this->db->select('*');
        
        $this->db->join('countries', 'airports.airline_country_id = countries.id', 'LEFT');
        
        $this->db->like('airports.airline_airport', $keyword);
        $this->db->or_like('airports.airline_iata_code', $keyword);
        
        $this->db->group_by('airports.airline_airport');
        
        $query = $this->db->get('airports');

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $new_row['label'] = $row['airline_airport'] .' '. $row['name'] .'('. $row['airline_iata_code'].')';
                $new_row['value']='ArticleDescription/';
                $row_set[] = $new_row; //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }

    }
    
}
