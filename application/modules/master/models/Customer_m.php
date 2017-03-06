<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends Parent_Model {

    protected $_table_name = 'm_customer';
    protected $_table_name_alias = 'm_customer';
    protected $_primary_key = 'id';
    protected $_table_name_lefjo = 'm_customer a';
    protected $_primary_filter = 'intval';
    protected $_column_order = array('id', 'indeks_quotation', 'customer_name', 'customer_code', 'npwp', 'office_address', 'office_email', 'office_phone', 'payment_type', 'top', 'customer_status', 'customer_date_registration');
    protected $_column_search = array('indeks_quotation', 'customer_name', 'customer_code', 'npwp', 'office_address',
        'office_email', 'type_payment', 'top', 'customer_status');
    //protected $_table_status = 'customer_status';
    protected $_order_by = array('id' => 'desc');

    function __construct() {
        parent::__construct();
    }

    public function get_last_id() {
        return $this->db->query("select max(id) as last_id from m_customer");
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->_table_name);
    }

    public function get_files_to_delete($id) {
        return $this->db->where('id', $id)->get($this->_table_name)->row();
    }

    public function get_data($id) {
        return $this->db->where('id', $id)->get($this->_table_name)->row();
    }

    function get_new() {
        $list = new stdClass();
        $list->id = '';
        $list->indeks_quotation = '';
        $list->customer_name = '';
        $list->customer_code = '';
        $list->npwp = '';
        $list->office_address = '';
        $list->office_email = '';
        $list->office_phone = '';
        $list->payment_type = '';
        $list->top = '';
        $list->customer_status = '';
        $list->customer_date_registration = '';

        return $list;
    }

}
