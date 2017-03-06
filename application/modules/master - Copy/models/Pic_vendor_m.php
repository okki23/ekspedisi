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

class Pic_vendor_m extends Parent_Model {

    //put your code here

    protected $_table_name = 'm_pic_vendor';
    protected $_table_name_lefjo = 'm_pic_vendor a';
    protected $_primary_key = 'vendor_pic_id';
    protected $_primary_filter = 'intval';
    protected $_column_order = array('id', 'code_vendor','vendor_pic_name','vendor_pic_position','vendor_pic_phone','vendor_pic_email');
    protected $_column_search = array('a.code_vendor','a.vendor_pic_name','a.vendor_pic_position','a.vendor_pic_phone','a.vendor_pic_email');
    //protected $_table_status = 'vendor_pic_status';
    protected $_order_by = array('a.vendor_pic_id' => 'desc');
    
    public function delete_pic_vendor($dt){
        $data = array('vendor_code'=>$dt['vendor_code'],
                      'vendor_pic_email'=>$dt['vendor_pic_email']);
         $this->db->where('vendor_code',$data['vendor_code']);
         $this->db->where('vendor_pic_email',$data['vendor_pic_email']);
         return $this->db->delete($this->_table_name);
        
    }
    
    public function get_data_pic_vendor($dt){
        $data = array('vendor_code'=>$dt['vendor_code'],
                      'vendor_pic_email'=>$dt['vendor_pic_email']);
         $this->db->where('vendor_code',$data['vendor_code']);
         $this->db->where('vendor_pic_email',$data['vendor_pic_email']);
         return $this->db->get($this->_table_name)->row();
        
    }
}

?>
