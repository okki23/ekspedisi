<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of T_po_fix_sub_m
 *
 * @author Okki Setyawan
 */
class T_po_fix_sub_m extends Parent_Model {
    //put your code here
    
    protected $_table_name = 't_po_fix_sub a';
    protected $_table_name_alias = 't_po_fix_sub';
    protected $_table_name_lefjo = 't_purchase_order a';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    
    protected $_column_order = array('id','id_primary_po','po_primary','origin','province','district','island_multi','vehicle','district_info','cubication','tonase','charge_option','address','lead_time','price','ven_code','u_status','id_group','id_divisi');
    protected $_column_search = array('id','id_primary_po','po_primary','origin','province','district','island_multi','vehicle','district_info','cubication','tonase','charge_option','address','lead_time','price','ven_code','u_status','id_group','id_divisi');
    protected $_table_status = 'vendor_order_status';
    protected $_order_by = array('a.id' => 'desc');
}
