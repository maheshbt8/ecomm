<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class BlogCategoryModel extends CI_Model {
    
    public function get_blog_category_list(){
        $blogcategorylist=$this->db->get('blog_category')->result_array();
        return $blogcategorylist;
    }
    public function get_blog_by_category($cat_id){
        $this->db->where('blog_category_id',$cat_id);
        $blogCategory=$this->db->get('blog_category')->result_array();
        return $blogCategory;
    }
    
  
}