<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class BrandModel extends CI_Model {
    public function get_all_brands() {
        $limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 22))->row()->value;
        $this->db->limit($limit);
        $this->db->order_by("brand_id", "desc");
        $brands=$this->db->get('brand')->result_array();
        return $brands;
    }
    
  
}