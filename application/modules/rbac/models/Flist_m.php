<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Flist_m
 *
 * @author Langit-Biru
 */
class Flist_m extends Parent_Model {

    //put your code here
    protected $_table_name = 'u_function_lists a';
    protected $_table_name_alias = 'u_function_lists';
    protected $_primary_key = 'id';
    protected $_table_name_lefjo = '';
    protected $_primary_filter = 'intval';
    protected $_column_search = array('a.u_object_id', 'a.parent_id', 'a.u_function_name', 'a.u_module', 'a.u_function', 'a.u_params', 'a.u_status');
    protected $_column_order = array('a.u_object_id', 'a.parent_id', 'a.u_function_name', 'a.u_module', 'a.u_function', 'a.u_params', 'a.u_status');
    
}
