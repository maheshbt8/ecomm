<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class CouponModel extends CI_Model {
    
    public function get_coupon_data(){
        $this->db->where('status',"Active");
        $CouponData=$this->db->get('coupon')->result_array();
        return $CouponData;
    }
    
  
}