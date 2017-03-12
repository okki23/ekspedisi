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

class Pic_driver_m extends Parent_Model {

    //put your code here

    protected $_table_name = 'm_driver_vendor';
    protected $_table_name_lefjo = 'm_driver_vendor a';
    protected $_table_name_alias = 'm_driver_vendor';
    protected $_primary_key = 'vendor_driver_id';
    protected $_primary_filter = 'intval';
    protected $_column_order = array('vendor_driver_id','vendor_code','vendor_driver_name','vendor_driver_phone','vendor_driver_license','vendor_driver_idcard');
    protected $_column_search = array('vendor_driver_id','vendor_code','vendor_driver_name','vendor_driver_phone','vendor_driver_license','vendor_driver_idcard');
    //protected $_table_status = 'vendor_driver_status';
    protected $_order_by = array('vendor_driver_id' => 'desc');
    
    public function delete_driver_vendor($dt){
        $data = array('vendor_code'=>$dt['vendor_code'],
                      'vendor_driver_phone'=>$dt['vendor_driver_phone']);
         $this->db->where('vendor_code',$data['vendor_code']);
         $this->db->where('vendor_driver_phone',$data['vendor_driver_phone']);
         return $this->db->delete($this->_table_name);
        
    }
    
    public function get_data_driver_vendor($dt){
        $data = array('vendor_code'=>$dt['vendor_code'],
                      'vendor_driver_phone'=>$dt['vendor_driver_phone']);
         $this->db->where('vendor_code',$data['vendor_code']);
         $this->db->where('vendor_driver_phone',$data['vendor_driver_phone']);
         return $this->db->get($this->_table_name)->row();
        
    }
}

?>
