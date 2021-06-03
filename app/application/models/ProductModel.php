<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
Class ProductModel extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->model('CommonModel');
    }

    public function get_latest_feature_products() {
        $limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 20))->row()->value;
        $featured=$this->CommonModel->product_list_set('featured',$limit);
        return $featured;
    }
    public function get_today_deals_products(){
        $limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 61))->row()->value;
        $todays_deal=$this->CommonModel->product_list_set('deal',$limit);
        return $todays_deal;
    }
    public function get_bundle_products(){
        $limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 41))->row()->value;
        $product_bundle=$this->CommonModel->product_list_set('bundle',$limit);
        return $product_bundle;
    }

    public function get_classified_products(){
        $limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 44))->row()->value;
        $this->db->order_by('customer_product_id', 'desc');
        $this->db->limit($limit);
        $customer_products= $this->db->get_where('customer_product', array('status' => 'ok', 'admin_status' => 'ok', 'is_sold' => 'no'))->result_array();
        return $customer_products;
    }

    public function get_product_view_data($product_id,$title){
        $this->db->where('product_id',$product_id);
        $this->db->where('title',$title);
        $productViewData=$this->db->get('product')->result_array();
        return $productViewData;
    }
    
    
  
}