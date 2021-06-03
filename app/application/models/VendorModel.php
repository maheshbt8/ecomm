<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class VendorModel extends CI_Model {
    public function get_all_latest_vendors() {
        $limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 21))->row()->value;
        $this->db->limit($limit);
        $this->db->where('status','approved');
        $this->db->order_by("vendor_id", "desc");
        $vendors=$this->db->get('vendor')->result_array();
        return $vendors;
    }
    public function get_vendor_profile($vendor_id){
        $this->db->where('vendor_id',$vendor_id);
        $this->db->where('status','approved');
        $vendorData=$this->db->get('vendor')->result_array();
        return $vendorData;
    }
    
  
}