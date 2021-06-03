<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class SubCategoryModel extends CI_Model {
    public function get_all_subcategories() {
        return $this->db->get('sub_category');
    }
    public function get_subcategory($cat_id){
        return $this->db->from('sub_category')->where('category', $cat_id)->get();
    }
    
  
}