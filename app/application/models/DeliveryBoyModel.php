<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class DeliveryBoyModel extends CI_Model {
    
    public function checkDataExistOrNot($user_id) {
        $this->db->where('user_id',$user_id);
        $dBoy=$this->db->get('delivery_boy_settings')->result_array();
        return $dBoy;
    }

    public function updateDeliveryBoyStatus($status,$user_id){
        $this->db->where('user_id',$user_id);
        $res = $this->db->update('delivery_boy_settings',array('delivery_boy_status'=>$status));

    }

    Public function InsertDelniveryBoyData($user_id,$status){
        $this->db->set('user_id',$user_id);
        $this->db->set('delivery_boy_status',$status);
        $this->db->insert('delivery_boy_settings');   
    }

    public function updateDeliveryBoyLocation($user_id,$latitude,$longitude){
        $this->db->set('latitude',$latitude);
        $this->db->set('longitude',$longitude);
        $this->db->where('user_id',$user_id);
        $this->db->update('delivery_boy_settings'); 
    }

    
    
  
}