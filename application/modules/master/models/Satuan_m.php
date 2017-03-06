<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_m extends Parent_Model {

    //put your code here

    protected $_table_name = 'm_satuan';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_table_name_alias = 'm_satuan';
    protected $_table_name_lefjo = 'm_satuan';
    protected $_column_order = array('id','satuan_name','satuan_status');
    protected $_column_search = array('id','satuan_name','satuan_status');
    //protected $_table_status = 'satuan_status';
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

}
