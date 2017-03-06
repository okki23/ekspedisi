<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rbac_m extends Parent_Model {
    //put your code here
    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_table_name_lefjo = '';
    protected $_primary_filter = 'intval';
    protected $_column_search = array();
    protected $_column_order = array();
    protected $_table_status = '';
    protected $_order_by = array();
    public $_rules = array();
    protected $_timestamps = FALSE;
    
}
