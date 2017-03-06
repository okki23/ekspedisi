<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_m extends Parent_Model {

    //put your code here

    protected $_table_name = 'm_branch';
    protected $_primary_key = 'id';
    protected $_table_name_lefjo = 'm_branch';
    protected $_primary_filter = 'intval';
    protected $_column_order = array('id', 'branch_name', 'branch_address');
    protected $_column_search = array('id', 'branch_name', 'branch_address');
    protected $_table_status = 'branch_address';
    protected $_order_by = array('id' => 'desc');

    function __construct() {
        parent::__construct();
    }

    public function get_new() {

       $setting = new StdClass();

        foreach ($this->_column_order as $key => $column_order) {
            $setting->$column_order = '';
        }
         
        return $setting;
    }
	
	 public function delete($id){
        return $this->db->where('id',$id)->delete($this->_table_name);
    }
	
	public function get_last_id() {
        return $this->db->query("select max(id) as last_id from m_customer");
    }
    
   
    public function get_files_to_delete($id){
        return $this->db->where('id',$id)->get($this->_table_name)->row();
        
    }
	
	public function get_data($id){
        return $this->db->where('id',$id)->get($this->_table_name)->row();
    }

}
