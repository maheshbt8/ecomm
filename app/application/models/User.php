<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class User extends CI_Model {
    public function get_all_users() {
        return $this->db->get('user');
    }
    public function get_user($email) {
        return $this->db->from('user')->where('email', $email)->get();
    }
  
}