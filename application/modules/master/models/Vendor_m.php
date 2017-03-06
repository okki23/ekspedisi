<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_m extends Parent_Model {

    protected $_table_name = 'm_vendor';
    protected $_table_name_alias = 'm_vendor';
    protected $t_bank = 'm_bank';
    protected $t_vehicle = 'm_vehicle';
    protected $_table_name_lefjo = 'm_vendor';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_column_order = array('id', 'indeks_quotation', 'vendor_code', 'vendor_name', 'vendor_address', 'vendor_email', 'vendor_phone', 'vendor_info', 'npwp', 'id_bank', 'account_no', 'payment_type', 'top', 'type_service', 'vendor_status', 'vendor_date_registration');
    protected $_column_search = array('id', 'indeks_quotation', 'vendor_code', 'vendor_name', 'vendor_address', 'vendor_email', 'vendor_phone', 'vendor_info', 'npwp', 'id_bank', 'account_no', 'payment_type', 'top', 'type_service', 'vendor_status', 'vendor_date_registration');
    //protected $_table_status = 'vendor_status';
    protected $_order_by = array('id' => 'desc');

    function __construct() {
        parent::__construct();
    }

    public function get_bank() {
        return $this->db->get($this->t_bank)->result();
    }

    public function get_vehicle() {
        return $this->db->get($this->t_vehicle)->result();
    }

    public function get_new() {

        $setting = new StdClass();

        foreach ($this->_column_order as $key => $column_order) {
            $setting->$column_order = '';
        }

        return $setting;
    }

    public function get_files_to_delete($id) {
        return $this->db->where('id', $id)->get($this->_table_name)->row();
    }

    public function get_data($id) {
        return $this->db->where('id', $id)->get($this->_table_name)->row();
    }

    public function get_last_id() {
        return $this->db->query("select max(id) as last_id from m_customer");
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->_table_name);
    }

}
