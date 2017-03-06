<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu_m
 *
 * @author Langit-Biru
 */
class Menu_m extends Parent_Model {
    //put your code here
    protected $_table_name = 'u_menus a';
    protected $_table_name_alias = 'u_menus';
    protected $_primary_key = 'id';
    protected $_table_name_lefjo = '';
    protected $_primary_filter = 'intval';
    protected $_column_search = array('a.id_category_menu','a.id_menu_parent','a.u_menu','a.u_menu_desc','a.u_menu_index','a.u_jenis_kategori','a.u_function_list_id','a.u_create','a.u_modif','a.u_delete','a.u_date_create','a.u_date_modif','a.u_date_delete','a.u_group','a.u_status');
    protected $_column_order = array('a.id_category_menu','a.id_menu_parent','a.u_menu','a.u_menu_desc','a.u_menu_index','a.u_jenis_kategori','a.u_function_list_id','a.u_create','a.u_modif','a.u_delete','a.u_date_create','a.u_date_modif','a.u_date_delete','a.u_group','a.u_status');
    
    
    
}
