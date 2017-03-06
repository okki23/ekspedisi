<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_m extends Parent_Model {

    //put your code here

    protected $_table_name = 'm_bank';
    protected $_table_name_alias = 'm_bank';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_table_name_lefjo = 'm_bank';
    protected $_column_order = array('id', 'bank_name', 'bank_info', 'bank_status');
    protected $_column_search = array('id', 'bank_name', 'bank_info', 'bank_status');
    //protected $_table_status = 'bank_status';
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
