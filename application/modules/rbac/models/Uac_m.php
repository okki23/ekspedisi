<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Uac_m
 *
 * @author Langit-Biru
 */
class Uac_m extends Parent_Model {
    //put your code here
    protected $_table_name = 'u_account a';
    protected $_table_name_alias = 'u_account';
    protected $_primary_key = 'id';
    protected $_table_name_lefjo = '';
    protected $_primary_filter = 'intval';
    protected $_column_search = array('id','username','nama_lengkap','password','no_telp','email','path_foto','id_divisi','id_group','u_date_expired','access_account','access_data','u_create','u_modif','u_delete','u_date_create','u_date_modif','u_date_delete','u_lastlogin','u_status_login','u_status');
    protected $_column_order = array('id','username','nama_lengkap','password','no_telp','email','path_foto','id_divisi','id_group','u_date_expired','access_account','access_data','u_create','u_modif','u_delete','u_date_create','u_date_modif','u_date_delete','u_lastlogin','u_status_login','u_status');
}
