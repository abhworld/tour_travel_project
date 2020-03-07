<?php

    
    function has_role($user_id){
//        $CI =& get_instance();
//        $CI->db->select('textile_role_permission.*, textile_roles.role_title');
//        $CI->db->from('textile_role_permission');
//
//        $CI->db->join('textile_roles', 'textile_roles.role_id=textile_role_permission.permission_role_id', 'LEFT');
//        $CI->db->where('textile_role_permission.permission_role_id', $role_id);
//
//        $query = $CI->db->get();
//        $result = $query->row_array();
//        if($result){
//            return $result[$permission_type];
//        } else {
//            return 0;
//        }
    }
    
    function has_permission($role_id, $permission_type){
        $CI =& get_instance();
        
        $CI->db->select('*');
        $CI->db->from('role_permission');

        $CI->db->join('permissions', 'role_permission.permission = permissions.permission_id', 'LEFT');
        
        $CI->db->where('role_permission.role', $role_id);
        $CI->db->where('permissions.slug', $permission_type);

        $query = $CI->db->get();
        $result = $query->row_array();
        
        if($result){
            return TRUE;
        } else {
            return 0;
        }
    }
    
    function has_permission_by_permission_type($role, $permission_type){
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('permissions');

        $CI->db->join('permission_type', 'permissions.permission_type = permission_type.permission_type_id', 'LEFT');
        $CI->db->join('role_permission', 'permissions.permission_id = role_permission.permission', 'LEFT');
        
        $CI->db->where_in('permission_type.permission_type', $permission_type);
        $CI->db->where('role_permission.role', $role);

        $query = $CI->db->get();
        $result = $query->result_array();
//        echo $CI->db->last_query();
//        echo '<pre>';print_r($result);die;
        if($result){
            return TRUE;
        } else {
            return 0;
        }
    }