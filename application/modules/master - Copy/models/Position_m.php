<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Position_m extends Parent_Model {

    //put your code here

    protected $_table_name = 'm_position';
    protected $_primary_key = 'id';
    protected $_table_name_alias = 'm_position';
    protected $_primary_filter = 'intval';
    protected $_table_name_lefjo = 'm_position';
    protected $_column_order = array('id', 'position_name', 'position_status');
    protected $_column_search = array('id', 'position_name', 'position_status');
    //protected $_table_status = 'position_status';
    protected $_order_by = array('id' => 'desc');

    function __construct() {
        parent::__construct();
    }

    public function get_new() {

        $setting = new StdClass();
        $setting->id = '';
        $setting->position_name = '';
        return $setting;
    }

}
