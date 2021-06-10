<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class AdminModel extends CI_Model {
    
    public function get_admin($email) {
        return $this->db->from('admin')->where('email', $email)->get();
    }
    
  
}