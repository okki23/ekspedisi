<?php

class Divisi_m extends Parent_Model {

//put your code here

    protected $_table_name = 'u_divisi';
    protected $_table_name_alias = 'u_divisi';
    protected $_primary_key = 'id';
    protected $_table_name_lefjo = '';
    protected $_primary_filter = 'intval';
    protected $_column_search = array('id', 'divisi', 'ket_divisi', 'access_divisi', 'u_create', 'u_modif', 'u_delete', 'u_date_create', 'u_date_modif', 'u_date_delete', 'u_status');
    protected $_column_order = array('id', 'divisi', 'ket_divisi', 'access_divisi', 'u_create', 'u_modif', 'u_delete', 'u_date_create', 'u_date_modif', 'u_date_delete', 'u_status');

}
