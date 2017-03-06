<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Preferences_m extends Parent_Model {

    //put your code here

    protected $_table_name = 't_pref';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_table_name_lefjo = 't_pref a';
    protected $_column_order = array('id','apps_name','apps_desc','apps_url','apps_favicon','company_name','company_phone','preferences_status');
    protected $_column_search = array('id','apps_name','apps_desc','apps_url','apps_favicon','company_name','company_phone','preferences_status');
    protected $_table_status = 'preferences_status';
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

    public function get_pref(){
        $this->db->where('id','1');
        return $this->db->get('t_pref')->row();
    }
}
