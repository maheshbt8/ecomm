<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class LanguageModel extends CI_Model {
    
    public function get_language_data(){
        $this->db->where('status',"ok");
        $LanguageData=$this->db->get('language_list')->result_array();
        return $LanguageData;
    }
    
  
}