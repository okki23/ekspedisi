<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pic_vendor_m
 *
 * @author Okki Setyawan
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic_vehicle_m extends Parent_Model {

    //put your code here

    protected $_table_name = 'm_vehicle_vendor';
    protected $_table_name_lefjo = 'm_vehicle_vendor a';
    protected $_primary_key = 'vendor_vehicle_id';
    protected $_primary_filter = 'intval';
    protected $_column_order = array('vendor_vehicle_id','vendor_code','vendor_vehicle_name','vendor_vehicle_phone','vendor_vehicle_license','vendor_vehicle_idcard');
    protected $_column_search = array('vendor_vehicle_id','vendor_code','vendor_vehicle_name','vendor_vehicle_phone','vendor_vehicle_license','vendor_vehicle_idcard');
    //protected $_table_status = 'vendor_vehicle_status';
    protected $_order_by = array('vendor_vehicle_id' => 'desc');
    
    public function delete_vehicle_vendor($dt){
         $data = array('vendor_code'=>$dt['vendor_code'],
                      'vendor_vehicle_no'=>$dt['vendor_vehicle_no']);
         $this->db->where('vendor_code',$data['vendor_code']);
         $this->db->where('vendor_vehicle_no',$data['vendor_vehicle_no']);
         return $this->db->delete($this->_table_name);
        
    }
    
    public function get_data_vehicle_vendor($dt){
        $data = array('vendor_code'=>$dt['vendor_code'],
                      'vendor_vehicle_no'=>$dt['vendor_vehicle_no']);
         $this->db->where('vendor_code',$data['vendor_code']);
         $this->db->where('vendor_vehicle_no',$data['vendor_vehicle_no']);
         return $this->db->get($this->_table_name)->row();
        
    }
}

?>
