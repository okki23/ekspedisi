<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Customer_quotation_m extends Parent_Model {

    protected $_table_name = 't_customer_quotation';
    protected $_primary_key = 'id';
    protected $_table_name_lefjo = 't_customer_quotation a';
    protected $_primary_filter = 'intval';
    protected $_column_order = array('id','id_pic_customer','customer_code','payment_type','top','quotation_code','type_service','customer_quotation_status','date_created');
    protected $_column_search = array('id','id_pic_customer','customer_name','customer_code','payment_type','top','quotation_code','type_service','customer_quotation_status','date_created');
    protected $_table_status = 'customer_quotation_status';
    protected $_order_by = array('id' => 'desc');

    function __construct() {
        parent::__construct();
    }
    
    public function get_update($id){
        $this->db->select('a.*,b.customer_name');
        $this->db->from('t_customer_quotation a');
        $this->db->join('m_customer b','b.customer_code=a.customer_code');
        $this->db->where('a.id',$id);
        
        return $this->db->get()->row();
        
    }
    
    public function get_temp_qc($query){
        $this->db->where('customer_code',$query);
        return $this->db->get('t_quotation_customer_detail_temp')->result();
    }

    public function get_last_id() {
        return $this->db->query("select max(id) as last_id from m_customer_quotation");
    }
    
    public function get_excel_init($id){
        $this->db->where('id',$id);
        return $this->db->get('t_customer_quotation')->row();
    }
    
    public function get_excel_list($data){
        $this->db->where('customer_code',$data);
        return $this->db->get('t_quotation_customer_detail')->result();
        
    }

    public function get_all_with_join() {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('t_customer_quotation a');
        $this->db->join('m_customer b', 'b.customer_code = a.customer_code', 'left');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_customer_code_json(){
       $data =  $this->db->get('m_customer')->result();
       $arr = array();
       foreach($data as $val){
           $list = $val->customer_name;
       
           array_push($arr,$list);
       }
       echo json_encode($arr);
        //return $list;
        
    }
    
      function insertDataTemp($data){
        $this->db->insert_batch('t_quotation_customer_detail',$data);
        return true;
    }
    public function get_customer_autocomplete($query) {
        $data = $this->db->query('select * from m_customer  WHERE customer_code LIKE "%' . $query . '%"  AND customer_status =  "en" ');
        $show = array();
        foreach ($data->result_array() as $list) {

            $show[] = array('id' => $list['id'],
                'indeks_quotation' => $list['indeks_quotation'],
                'customer_name' => $list['customer_name'],
                'customer_code' => $list['customer_code'],
                'npwp' => $list['npwp'],
                'office_address' => $list['office_address'],
                'office_email' => $list['office_email'],
                'office_phone' => $list['office_phone'],
                'payment_type' => $list['payment_type'],
                'top' => $list['top'],
                'customer_status' => $list['customer_status'],
                'customer_date_registration' => $list['customer_date_registration'],
                'show_label' => ($list['customer_code'] . '-' . $list['customer_name'])
            );
        }
        return $show;
    }

    public function getdata_transaction_by_codecust($id_customer) {
        return $this->db->query("select * from m_customer where customer_code LIKE '%".$id_customer."%' ")->result_array();
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

    public function get_new() {

       $setting = new StdClass();

        foreach ($this->_column_search as $key => $column_order) {
            $setting->$column_order = '';
        }
         
        return $setting;
    }
    
    function get_customer_name_json($query){
        $this->db->like('customer_name',$query);
        $query = $this->db->get('m_customer')->result();
        return $query;
    }
    
    function get_id_pic_customer($id){
        if($id != '' || $id != NULL){
            $this->db->like('code_customer',$id);
            $data = $this->db->get('m_pic_customer')->result();
        }else{
            $data = '';
        }
       
        return $data;
        
    }
    public function get_last_no(){
		$query = $this->db->query("SELECT SUBSTR(MAX(quotation_code),-3) AS id  FROM t_customer_quotation");
	       
		return $query;
    }
}
