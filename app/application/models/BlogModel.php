<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class BlogModel extends CI_Model {
    
    public function get_latest_blogs(){
        $limit =  4;
        $this->db->limit($limit);
        $this->db->order_by("blog_id", "desc");
        $blogs=$this->db->get('blog')->result_array();
        return $blogs;
    }

    public function get_blogs($cat_id){
        $this->db->where('blog_category_id',$cat_id);
        $blogs=$this->db->get('blog')->result_array();
        return $blogs;
    }
    
  
}