<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class BannerModel extends CI_Model {
    
    public function get_banner_information(){
        $this->db->where("place", "after_slider");
        $this->db->where("status", "ok");
        $banners=$this->db->get('banner')->result_array();
        return $banners;
    }
    
  
}