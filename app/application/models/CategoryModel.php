<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class CategoryModel extends CI_Model {
    public function get_all_categories() {
        $selected =json_decode($this->db->get_where('ui_settings',array('ui_settings_id' => 35))->row()->value,true);
        $this->db->where_in('category_id',$selected);
        $categories=$this->db->get('category');
        return $categories;
    }
    
  
}