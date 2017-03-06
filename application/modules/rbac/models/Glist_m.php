<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Glist_m
 *
 * @author Langit-Biru
 */
class Glist_m extends Parent_Model {
    //put your code here
    protected $_table_name = 'u_group a';
    protected $_table_name_alias = 'u_group';
    protected $_primary_key = 'id';
    protected $_table_name_lefjo = '';
    protected $_primary_filter = 'intval';
    protected $_column_search = array('id','u_divisi','u_group','u_group_desc','access_group','u_create','u_modif','u_delete','u_date_create','u_date_modif','u_date_delete','u_status');
    protected $_column_order = array('id','u_divisi','u_group','u_group_desc','access_group','u_create','u_modif','u_delete','u_date_create','u_date_modif','u_date_delete','u_status');
    
}
