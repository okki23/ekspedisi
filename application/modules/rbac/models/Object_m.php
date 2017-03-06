<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Object_m
 *
 * @author Langit-Biru
 */
class Object_m extends Parent_Model {
    //put your code here
    protected $_table_name = 'u_objects a';
    protected $_primary_key = 'a.id';
    protected $_table_name_lefjo = '';
    protected $_primary_filter = 'intval';
    protected $_column_search = array('a.nama_object','a.alias_object','a.method_object','a.param_object','a.tipe_object','a.bahasa_object','a.u_create','a.u_modif','a.u_delete','a.u_date_create','a.u_date_modif','a.u_date_delete','a.u_status','a.u_status');
    protected $_column_order = array('a.nama_object','a.alias_object','a.method_object','a.param_object','a.tipe_object','a.bahasa_object','a.u_create','a.u_modif','a.u_delete','a.u_date_create','a.u_date_modif','a.u_date_delete','a.u_status','a.u_status');
    
}
