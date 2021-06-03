<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class CommonModel extends CI_Model {

    public function product_list_set($speciality, $limit,$id=''){
        $physical_product_activation = $this->get_settings_value('general_settings', 'physical_product_activation');
        $digital_product_activation = $this->get_settings_value('general_settings', 'digital_product_activation');
        $vendor_system_activation = $this->get_settings_value('general_settings', 'vendor_system');

        if ($vendor_system_activation == 'ok') {
            $approved_vendors = $this->db->get_where('vendor', array('status' => 'approved'))->result_array();
            foreach ($approved_vendors as $row) {
                $vendors[] = '{"type":"vendor","id":"' . $row['vendor_id'] . '"}';
            }
        }
        $admins = $this->db->get('admin')->result_array();
        foreach ($admins as $row) {
            $vendors[] = '{"type":"admin","id":"' . $row['admin_id'] . '"}';
        }
        $result = array();
        $category = $this->get_type_name_by_id('product', $id, 'category');
        //$this->db->select('product_id');
        $this->db->where('status', 'ok');
        $this->db->limit($limit);
        $this->db->where_in('added_by', $vendors);

        if ($physical_product_activation == 'ok' && $digital_product_activation !== 'ok') {
            $this->db->where('download', NULL);
        } else if ($physical_product_activation !== 'ok' && $digital_product_activation == 'ok') {
            $this->db->where('download', 'ok');
        } else if ($physical_product_activation !== 'ok' && $digital_product_activation !== 'ok') {
            $this->db->where('product_id', '');
        }
        if ($speciality == 'featured') {
            $this->db->where('featured', 'ok');
        }
        if ($speciality == 'deal') {
            $this->db->where('deal', 'ok');
        }
        if ($speciality == 'bundle') {
            $this->db->where('is_bundle', 'yes');
        }
        $this->db->order_by('product_id', 'desc');
        $res = $this->db->get('product')->result_array();
        return $res;
    }

    function get_settings_value($type, $type_name = '', $field = 'value')
    {
        if ($type_name != '') {
            return $this->db->get_where($type, array('type' => $type_name))->row()->$field;
        }
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'name')
    {
        if ($type_id != '') {
            $l = $this->db->get_where($type, array(
                $type . '_id' => $type_id
            ));
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row()->$field;
            }
        }
    }
    
  
}