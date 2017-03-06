<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pic_customer_m
 *
 * @author Okki Setyawan
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic_customer_m extends Parent_Model {

    //put your code here

    protected $_table_name = 'm_pic_customer a';
    protected $_table_name_alias = 'm_pic_customer';
    protected $_table_name_lefjo = 'm_pic_customer a';
    protected $_primary_key = 'customer_pic_id';
    protected $_primary_filter = 'intval';
    protected $_column_order = array('id', 'code_customer','customer_pic_name','customer_pic_position','customer_pic_phone','customer_pic_email');
    protected $_column_search = array('a.code_customer','a.customer_pic_name','a.customer_pic_position','a.customer_pic_phone','a.customer_pic_email');
    //protected $_table_status = 'customer_pic_status';
    protected $_order_by = array('a.customer_pic_id' => 'desc');
    
    public function delete_pic_cust($dt){
        $data = array('code_customer'=>$dt['code_customer'],
                      'customer_pic_email'=>$dt['customer_pic_email']);
        
        //var_dump($data);
        //exit();
         $this->db->where('code_customer',$data['code_customer']);
         $this->db->where('customer_pic_email',$data['customer_pic_email']);
         return $this->db->delete($this->_table_name_alias);
        
    }
    
    public function get_data_pic($dt){
        $data = array('code_customer'=>$dt['code_customer'],
                      'customer_pic_email'=>$dt['customer_pic_email']);
         $this->db->where('code_customer',$data['code_customer']);
         $this->db->where('customer_pic_email',$data['customer_pic_email']);
         return $this->db->get($this->_table_name)->row();
        
    }
}

?>
