<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customer_order_m
 *
 * @author Okki Setyawan
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_order_m extends Parent_Model {

    //put your code here

    protected $_table_name = 't_sales_order';
    protected $_table_name_alias = 't_sales_order';
    protected $_table_name_lefjo = 't_sales_order a';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    
    protected $_column_order = array('id','customer_code','customer_top','customer_address','customer_phone','customer_name','sales_order_code','id_pic_customer','pic_customer_phone','date_order','date_pickup_order','estimation_date_arrival','type_service','payment_type','delivery_type','delivery_point','order_create','id_traffic_name','traffic_phone','special_instruction','customer_order_status','ppn','pph','ppn_val','pph_val','amount_sales','amount_dp','amount_dp_date','amount_dp_debt','customer_over_weight','customer_orver_price_weight','overnight','price_overnight','overnight_plus','netto_sales');
    protected $_column_search = array('id','customer_code','customer_top','customer_address','customer_phone','customer_name','sales_order_code','id_pic_customer','pic_customer_phone','date_order','date_pickup_order','estimation_date_arrival','type_service','payment_type','delivery_type','delivery_point','order_create','id_traffic_name','traffic_phone','special_instruction','customer_order_status','ppn','pph','ppn_val','pph_val','amount_sales','amount_dp','amount_dp_date','amount_dp_debt','customer_over_weight','customer_orver_price_weight','overnight','price_overnight','overnight_plus','netto_sales');
    protected $_table_status = 'customer_order_status';
    protected $_order_by = array('a.id' => 'desc');
    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }
    public function delete_pic_cust($dt){
        $data = array('code_customer'=>$dt['code_customer'],
                      'customer_pic_email'=>$dt['customer_pic_email']);
         $this->db->where('code_customer',$data['code_customer']);
         $this->db->where('customer_pic_email',$data['customer_pic_email']);
         return $this->db->delete($this->_table_name);
        
    }
    
    public function get_all($id = NULL){
        if($id == '' || $id == NULL){
           return $this->db->get($this->_table_name)->result();
        }else{
           $this->db->where('id',$id);
           return $this->db->get($this->_table_name)->row();
        }
        
    }
    
    public function get_list_parent_so_print($vs){
        $this->db->select($vs);
        $this->db->from('t_so_fix a');
        $this->db->join('m_customer b', 'b.customer_code=a.cust_code');
        return $this->db->get()->result();
    }
    
    public function get_list_child_so_print($soprimary){
        
        $this->db->from('t_so_fix_sub');
        $this->db->where('so_primary',$soprimary);
        //$this->db->join('m_customer b', 'b.customer_code=a.cust_code');
        return $this->db->get()->result_array();
    }
    public function get_so_open($custcode){
        $this->db->select("count(sales_order_status) as so_open");
        $this->db->from("t_so_fix");
        $this->db->where("cust_code",$custcode);
        $this->db->where("sales_order_status",'open');
        return $this->db->get()->row();
    }

    public function get_so_close($custcode){
        $this->db->select("count(sales_order_status) as so_close");
        $this->db->from("t_so_fix");
        $this->db->where("cust_code",$custcode);
        $this->db->where("sales_order_status",'close');
        return $this->db->get()->row();
    }

    public function get_qc_for_so($query){
        $this->db->where('customer_code',$query);
        return $this->db->get('t_quotation_customer_detail')->result();
    }
    
    public function cek_child_so($salcode){
        //$this->db->where('cust_code',$custcode);
        $this->db->where('so_primary',$salcode);
        return $this->db->get('t_so_fix_sub')->num_rows();
    }
    
    public function list_child_so($salcode){
        //$this->db->where('cust_code',$custcode);
        $this->db->where('so_primary',$salcode);
        return $this->db->get('t_so_fix_sub')->result();
    }
    
    public function get_origin($data){
        $this->db->where('customer_code',$data);
        $this->db->group_by('origin');
        return $this->db->get('t_quotation_customer_detail')->result();
    }
    
    public function calculating_qso($origin,$district,$vehicle){
        $this->db->where('origin',$origin);
        $this->db->where('category_destination',$district);
        $this->db->where('type_truck',$vehicle);
        
        return $this->db->get('t_quotation_customer_detail')->row();
    }
    
    public function calculating_qso_ftl($custcode,$origin,$district,$vehicle,$service_mode){
        $this->db->where('customer_code',$custcode);
        $this->db->where('origin',$origin);
        $this->db->where('category_destination',$district);
        $this->db->where('type_truck',$vehicle);
        $this->db->where('service_mode',$service_mode);
        
        return $this->db->get('t_quotation_customer_detail')->row();
    }
    public function get_list_utama_final_a($id){
        $this->db->select('a.*,b.customer_pic_name as pic_name,c.employee_name as traffic_name');
        $this->db->from('t_sales_order a');
        $this->db->join('m_pic_customer b','b.customer_pic_id=a.id_pic_customer','left');
        $this->db->join('m_employee c','c.id=a.id_traffic_name','left');
        $this->db->where('a.id',$id);
     
        return $this->db->get()->row();
        //echo $this->db->last_query();
    }
    
    public function get_list_utama_final_b($custcode){
        $this->db->select('a.*,b.customer_name');
        $this->db->from('t_so_fix a');
        
        $this->db->join('m_customer b', 'b.customer_code=a.cust_code');
        $this->db->where('cust_code',$custcode);
        //$data = $this->db->get('t_so_fix')->result();
     
        return $this->db->get()->result();
    }
    
     
    public function calculating_qso_ltl($custcode,$origin,$district,$vehicle){
        $this->db->where('customer_code',$custcode);
        $this->db->where('origin',$origin);
        $this->db->where('category_destination',$district);
        $this->db->where('type_truck',$vehicle);
        
        return $this->db->get('t_quotation_customer_detail')->row();
    }
    
    public function calculating_qso_multi($origin_sub,$district_sub,$vehicle_sub){
        $this->db->where('origin',$origin_sub);
        $this->db->where('category_destination',$district_sub);
        $this->db->where('type_truck',$vehicle_sub);
        
        return $this->db->get('t_quotation_customer_detail')->row();
    }
    
    public function save_so_fix($data){
        return $this->db->insert('t_so_fix', $data);
        
    }
    
    public function update_so_fix($dataupt,$data){
        $this->db->set($dataupt);
        $this->db->where('id',$data);
        return $this->db->update('t_so_fix');
    }
    
    public function save_so_fix_multi($data){
        return $this->db->insert('t_so_fix_sub', $data);
        
    }
    
    public function get_so_code($id){
   
        $this->db->where('id',$id);
        return $this->db->get('t_sales_order')->row();
    
 
        //echo $this->db->last_query();
    }
    
    public function update_so_fix_multi($dataupt,$idsosub,$id_primary_so){
        $this->db->set($dataupt);
        $this->db->where('id',$idsosub);
        $this->db->where('id_primary_so',$id_primary_so);
        return $this->db->update('t_so_fix_sub');
    }
    
    public function get_province($data){
        $this->db->where('customer_code',$data);
        $this->db->group_by('province');
        return $this->db->get('t_quotation_customer_detail')->result();
    }
    
    public function get_vehicle($data){
        $this->db->where('customer_code',$data);
        $this->db->group_by('type_truck');
        return $this->db->get('t_quotation_customer_detail')->result();
    }
    
    public function get_edit_so_fix($query){
        $this->db->where('id',$query);
        return $this->db->get('t_so_fix')->row();
    }
    
    public function get_params_multidp($query){
        $this->db->where('sales_order_code',$query);
        return $this->db->get('t_so_fix')->row();
    }
    
    public function get_edit_so_fix_multi($query){
        $this->db->where('id',$query);
        return $this->db->get('t_so_fix_sub')->row();
    }
    
    public function get_delete_so_fix($query){
        $this->db->where('id',$query);
        return $this->db->delete('t_so_fix');
    }    
    
    public function get_delete_so_fix_multi($query){
        $this->db->where('id',$query);
        return $this->db->delete('t_so_fix_sub');
    }   
    public function get_district($data){
        $this->db->where('customer_code',$data);
        $this->db->group_by('category_destination');
        return $this->db->get('t_quotation_customer_detail')->result();
    }

    public function get_data_pic($dt){
        $data = array('code_customer'=>$dt['code_customer'],
                      'customer_pic_email'=>$dt['customer_pic_email']);
         $this->db->where('code_customer',$data['code_customer']);
         $this->db->where('customer_pic_email',$data['customer_pic_email']);
         return $this->db->get($this->_table_name)->row();
        
    }
    
    public function get_list_so_fix($query){
       
        /* 
        $this->db->select('a.*,a.price as main_price,
case when (SUM(b.price)) IS NULL then 0 else (SUM(b.price)) end as totalsub,  
case when (SUM(b.price)) IS NULL then a.price else (a.price + SUM(b.price)) end as hasil');
         $this->db->from('t_so_fix a');
         $this->db->join('t_so_fix_sub b', 'b.so_primary=a.sales_order_code','left');
         $this->db->where('a.cust_code',$query);
         $this->db->group_by('a.id');
         */
        
        $this->db->select("a.*,a.id,a.cust_code,a.sales_order_code,a.type_service,a.date_order,a.charge_option,a.sales_order_status,a.price as main_price,
CASE when a.type_service = 'ftl' THEN (a.price + SUM(b.price))  ELSE a.price END AS hasil");
        $this->db->from('t_so_fix a');
        $this->db->join('t_so_fix_sub b', 'b.so_primary=a.sales_order_code','left');
        $this->db->where('a.cust_code',$query);
        $this->db->group_by('a.sales_order_code');
        //$this->db->where('cust_code',$query);
        return $this->db->get()->result();
    }
    
    public function get_detail_so_fix($query){
       
         $this->db->select('a.*,a.price as main_price,
case when (SUM(b.price)) IS NULL then 0 else (SUM(b.price)) end as totalsub,  
case when (SUM(b.price)) IS NULL then a.price else (a.price + SUM(b.price)) end as hasil');
         $this->db->from('t_so_fix a');
         $this->db->join('t_so_fix_sub b', 'b.id_primary_so=a.id','left');
         $this->db->where('a.id',$query);
         $this->db->group_by('a.id');
         
        
        //$this->db->where('cust_code',$query);
        return $this->db->get()->result();
    }
    
     
    public function print_all_so(){
        
         $this->db->select('a.*,a.price as main_price,
case when (SUM(b.price)) IS NULL then 0 else (SUM(b.price)) end as totalsub,  
case when (SUM(b.price)) IS NULL then a.price else (a.price + SUM(b.price)) end as hasil');
         $this->db->from('t_so_fix a');
         $this->db->join('t_so_fix_sub b', 'b.id_primary_so=a.id','left');
         //$this->db->where('a.id',$query);
         $this->db->group_by('a.id');
         
        
        //$this->db->where('cust_code',$query);
        return $this->db->get()->result();
    }
    
    public function get_list_so_fix_multi($query){
        $this->db->where('so_primary',$query);
        return $this->db->get('t_so_fix_sub')->result();
    }
    
    public function list_traffic(){
        return $this->db->where('id_position','5')->get('m_employee')->result();
    }
    
    public function get_traffic_phone($data){
        return $this->db->where('id',$data)->get('m_employee')->row();
    }
    
    public function get_pic_phone($data){
        return $this->db->where('code_customer',$data)->get('m_pic_customer')->row();
    }
    
    public function get_val_pic_phone($data){
        return $this->db->where('customer_pic_id',$data)->get('m_pic_customer')->row();
    }

    public function get_new() {

       $setting = new StdClass();

        foreach ($this->_column_order as $key => $column_order) {
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
		$query = $this->db->query("SELECT SUBSTR(MAX(sales_order_code),-3) AS id  FROM t_so_fix "); 
		return $query;
    }
    public function trans_id($param='') {
        $data = $this->get_last_no();
        $lastid = $data->row();
        $idnya = $lastid->id;
       

            if($idnya=='') { // bila data kosong
                    $ID = $param."001";
            //00000001
                }else {
                    $MaksID = $idnya;
                    $MaksID++;
             
             if($MaksID < 10) $ID = $param."00".$MaksID;
               else if($MaksID < 100) $ID = $param."0".$MaksID;
    
                    else $ID = $MaksID;  
                }

                return $ID;
    }
}

?>
