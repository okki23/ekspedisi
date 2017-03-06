<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_m extends Parent_Model {

    //put your code here

    protected $_table_name = 'm_employee';
    protected $_position = 'm_position';
    protected $_table_name_alias = 'm_employee';
    protected $_table_name_lefjo = 'm_employee';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_column_order = array('id','id_position','employee_name','employee_domicile','employee_email','employee_phone','employee_status','place_of_birth','date_of_birth','identity_card','family_card','police_certificate','photo','tax_id','last_education');
    protected $_column_search = array('id','id_position','employee_name','employee_domicile','employee_email','employee_phone','employee_status','place_of_birth','date_of_birth','identity_card','family_card','police_certificate','photo','tax_id','last_education');
    //protected $_table_status = 'employee_status';
    protected $_order_by = array('id' => 'desc');

    function __construct() {
        parent::__construct();
    }

     public function get_files_to_delete($id){
        return $this->db->where('id',$id)->get($this->_table_name)->row();
        
    }

    public function get_new() {

        $setting = new StdClass();

        foreach ($this->_column_order as $key => $column_order) {
            $setting->$column_order = '';
        }
         
        return $setting;
    }

}
