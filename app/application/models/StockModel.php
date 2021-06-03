<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class StockModel extends CI_Model {
    
    public function get_stock_information($category,$sub_category,$product){
        $this->db->where('category',$category);
        $this->db->where('sub_category',$sub_category);
        $this->db->where('product',$product);
        $stockData=$this->db->get('stock')->result_array();
        return $stockData;
    }
    
  
}