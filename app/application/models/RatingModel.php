<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class RatingModel extends CI_Model {
    
    public function get_rating_information($product_id){
        $this->db->where('product_id',$product_id);
        $RatingData=$this->db->get('user_rating')->result_array();
        return $RatingData;
    }
    
  
}