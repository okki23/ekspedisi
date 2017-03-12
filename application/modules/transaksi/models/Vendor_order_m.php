                                                                                                                                  <?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vendor_order_m
 *
 * @author Okki Setyawan
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_order_m extends Parent_Model {

    //put your code here

    protected $_table_name = 't_purchase_order';
    protected $_table_name_alias = 't_purchase_order';
    protected $_table_name_lefjo = 't_purchase_order a';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    
    protected $_column_order = array('id','vendor_code','vendor_top','vendor_address','vendor_phone','vendor_name','vendor_order_index','id_pic_vendor','pic_vendor_phone','date_order','vendor_order_status','date_pickup_order','estimation_date_arrival','type_service','cubication','tonase','payment_type','delivery_type','delivery_point','order_create','id_traffic_name','traffic_phone','special_instruction','vendor_order_status','no_ba','no_cn','upload_ba','upload_cn','ppn','pph','ppn_val','pph_val','overnight_plus','amount_sales','amount_dp','amount_dp_date','amount_dp_debt','vendor_over_weight','vendor_orver_price_weight','overnight','price_overnight','netto_vendor','driver_vendors','no_vehicle','id_krani','u_status','id_group','id_divisi');
    protected $_column_search = array('id','vendor_code','vendor_top','vendor_address','vendor_phone','vendor_name','vendor_order_index','id_pic_vendor','pic_vendor_phone','date_order','vendor_order_status','date_pickup_order','estimation_date_arrival','type_service','cubication','tonase','payment_type','delivery_type','delivery_point','order_create','id_traffic_name','traffic_phone','special_instruction','vendor_order_status','no_ba','no_cn','upload_ba','upload_cn','ppn','pph','ppn_val','pph_val','overnight_plus','amount_sales','amount_dp','amount_dp_date','amount_dp_debt','vendor_over_weight','vendor_orver_price_weight','overnight','price_overnight','netto_vendor','driver_vendors','no_vehicle','id_krani','u_status','id_group','id_divisi');
    protected $_table_status = 'vendor_order_status';
    protected $_order_by = array('a.id' => 'desc');
    
    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }
    public function delete_pic_cust($dt){
        $data = array('code_vendor'=>$dt['code_vendor'],
                      'vendor_pic_email'=>$dt['vendor_pic_email']);
         $this->db->where('code_vendor',$data['code_vendor']);
         $this->db->where('vendor_pic_email',$data['vendor_pic_email']);
         return $this->db->delete($this->_table_name);
        
    }
    
    public function get_list_cust_om(){
    
            return $this->db->get('m_customer')->result();
       
    }
    
    public function get_all($id = NULL){
        if($id == '' || $id == NULL){
           return $this->db->get($this->_table_name)->result();
        }else{
           $this->db->where('id',$id);
           return $this->db->get($this->_table_name)->row();
        }
        
    }
    
    public function get_list_parent_po_print($vs){
        $this->db->select($vs);
        $this->db->from('t_po_fix a');
        $this->db->join('m_vendor b', 'b.vendor_code=a.ven_code');
        return $this->db->get()->result();
    }
    
    public function get_list_child_po_print($soprimary){
        
        $this->db->from('t_po_fix_sub');
        $this->db->where('po_primary',$soprimary);
        //$this->db->join('m_vendor b', 'b.vendor_code=a.ven_code');
        return $this->db->get()->result_array();
    }
    public function get_po_open($vencode){
        $this->db->select("count(vendor_order_status) as po_open");
        $this->db->from("t_po_fix");
        $this->db->where("ven_code",$vencode);
        $this->db->where("vendor_order_status",'open');
        return $this->db->get()->row();
    }

    public function get_po_close($vencode){
        $this->db->select("count(vendor_order_status) as po_close");
        $this->db->from("t_po_fix");
        $this->db->where("ven_code",$vencode);
        $this->db->where("vendor_order_status",'close');
        return $this->db->get()->row();
    }

    public function get_qc_for_so($query){
        $this->db->where('vendor_code',$query);
        return $this->db->get('t_quotation_vendor_detail')->result();
    }
    
    public function cek_child_po($salcode){
        //$this->db->where('ven_code',$custcode);
        $this->db->where('po_primary',$salcode);
        return $this->db->get('t_po_fix_sub')->num_rows();
    }
    
    public function list_child_po($salcode){
        //$this->db->where('ven_code',$custcode);
        $this->db->where('po_primary',$salcode);
        return $this->db->get('t_po_fix_sub')->result();
    }
    
    public function get_origin($data){
        $this->db->where('vendor_code',$data);
        $this->db->group_by('origin');
        return $this->db->get('t_quotation_vendor_detail')->result();
    }
    
    public function calculating_qso($origin,$district,$vehicle){
        $this->db->where('origin',$origin);
        $this->db->where('category_destination',$district);
        $this->db->where('type_truck',$vehicle);
        
        return $this->db->get('t_quotation_vendor_detail')->row();
    }
    
    public function calculating_qso_ftl($custcode,$origin,$district,$vehicle,$service_mode){
        $this->db->where('vendor_code',$custcode);
        $this->db->where('origin',$origin);
        $this->db->where('category_destination',$district);
        $this->db->where('type_truck',$vehicle);
        $this->db->where('service_mode',$service_mode);
        
        return $this->db->get('t_quotation_vendor_detail')->row();
    }
    public function get_list_utama_final_a($id){
        $this->db->select('a.*,b.vendor_pic_name as pic_name,c.employee_name as traffic_name,d.vendor_driver_name,e.vendor_vehicle_no');
        $this->db->from('t_purchase_order a');
        $this->db->join('m_pic_vendor b','b.vendor_pic_id=a.id_pic_vendor','left');
        $this->db->join('m_employee c','c.id=a.id_traffic_name','left');
        $this->db->join('m_driver_vendor d','d.vendor_driver_id = a.driver_vendors','left');
        $this->db->join('m_vehicle_vendor e','e.vendor_vehicle_id = a.no_vehicle','left');
        $this->db->where('a.id',$id);
     
        return $this->db->get()->row();
    }
    
    public function get_list_utama_final_b($custcode){
        $this->db->select('a.*,b.vendor_name');
        $this->db->from('t_po_fix a');
        
        $this->db->join('m_vendor b', 'b.vendor_code=a.ven_code');
        $this->db->where('ven_code',$custcode);
        //$data = $this->db->get('t_po_fix')->result();
     
        return $this->db->get()->result();
    }
    
     
    public function calculating_qso_ltl($custcode,$origin,$district,$vehicle){
        $this->db->where('vendor_code',$custcode);
        $this->db->where('origin',$origin);
        $this->db->where('category_destination',$district);
        $this->db->where('type_truck',$vehicle);
        
        return $this->db->get('t_quotation_vendor_detail')->row();
    }
    
    public function calculating_qso_multi($origin_sub,$district_sub,$vehicle_sub){
        $this->db->where('origin',$origin_sub);
        $this->db->where('category_destination',$district_sub);
        $this->db->where('type_truck',$vehicle_sub);
        
        return $this->db->get('t_quotation_vendor_detail')->row();
    }
    
    public function save_po_fix($data){
        return $this->db->insert('t_po_fix', $data);
        
    }
    
    public function update_po_fix($dataupt,$data){
        $this->db->set($dataupt);
        $this->db->where('id',$data);
        return $this->db->update('t_po_fix');
    }
    
    public function save_po_fix_multi($data){
        return $this->db->insert('t_po_fix_sub', $data);
        
    }
    
    public function get_po_code($id){
   
        $this->db->where('id',$id);
        return $this->db->get('t_purchase_order')->row();
    
 
        //echo $this->db->last_query();
    }
    
    public function update_po_fix_multi($dataupt,$idsosub,$id_primary_so){
        $this->db->set($dataupt);
        $this->db->where('id',$idsosub);
        $this->db->where('id_primary_po',$id_primary_so);
        return $this->db->update('t_po_fix_sub');
    }
    
    public function get_province($data){
        $this->db->where('vendor_code',$data);
        $this->db->group_by('province');
        return $this->db->get('t_quotation_vendor_detail')->result();
    }
    
    public function get_vehicle($data){
        $this->db->where('vendor_code',$data);
        $this->db->group_by('type_truck');
        return $this->db->get('t_quotation_vendor_detail')->result();
    }
    
    public function get_edit_po_fix($query){
        $this->db->where('id',$query);
        return $this->db->get('t_po_fix')->row();
    }
    
    public function get_params_multidp($query){
        $this->db->where('vendor_order_code',$query);
        return $this->db->get('t_po_fix')->row();
    }
    
    public function get_edit_po_fix_multi($query){
        $this->db->where('id',$query);
        return $this->db->get('t_po_fix_sub')->row();
    }
    
    public function get_delete_po_fix($query){
        $this->db->where('id',$query);
        return $this->db->delete('t_po_fix');
    }    
    
    public function get_delete_po_fix_multi($query){
        $this->db->where('id',$query);
        return $this->db->delete('t_po_fix_sub');
    }   
    public function get_district($data){
        $this->db->where('vendor_code',$data);
        $this->db->group_by('category_destination');
        return $this->db->get('t_quotation_vendor_detail')->result();
    }

    public function get_data_pic($dt){
        $data = array('code_vendor'=>$dt['code_vendor'],
                      'vendor_pic_email'=>$dt['vendor_pic_email']);
         $this->db->where('code_vendor',$data['code_vendor']);
         $this->db->where('vendor_pic_email',$data['vendor_pic_email']);
         return $this->db->get($this->_table_name)->row();
        
    }
    
    public function get_list_po_fix($query){
       
        /* 
        $this->db->select('a.*,a.price as main_price,
case when (SUM(b.price)) IS NULL then 0 else (SUM(b.price)) end as totalsub,  
case when (SUM(b.price)) IS NULL then a.price else (a.price + SUM(b.price)) end as hasil');
         $this->db->from('t_po_fix a');
         $this->db->join('t_po_fix_sub b', 'b.so_primary=a.vendor_order_code','left');
         $this->db->where('a.ven_code',$query);
         $this->db->group_by('a.id');
         */
        
        $this->db->select("a.*, a.price as main_price, (CASE when a.type_service = 'ftl' THEN (a.price + case when COUNT(b.price)>0 THEN SUM(b.price) else 0 END) ELSE a.price END) AS hasil");
        $this->db->from('t_po_fix a');
        $this->db->join('t_po_fix_sub b', 'b.po_primary=a.vendor_order_code','left');
        $this->db->where('a.ven_code',$query);
        $this->db->group_by('a.id');
        //$this->db->where('ven_code',$query);
        return $this->db->get()->result();
    }
    
    public function get_detail_po_fix($query){
       
         $this->db->select('a.*,a.price as main_price,
case when (SUM(b.price)) IS NULL then 0 else (SUM(b.price)) end as totalsub,  
case when (SUM(b.price)) IS NULL then a.price else (a.price + SUM(b.price)) end as hasil');
         $this->db->from('t_po_fix a');
         $this->db->join('t_po_fix_sub b', 'b.id_primary_po=a.id','left');
         $this->db->where('a.id',$query);
         $this->db->group_by('a.id');
         
        
        //$this->db->where('ven_code',$query);
        return $this->db->get()->result();
    }
    
     
    public function print_all_so(){
        
         $this->db->select('a.*,a.price as main_price,
case when (SUM(b.price)) IS NULL then 0 else (SUM(b.price)) end as totalsub,  
case when (SUM(b.price)) IS NULL then a.price else (a.price + SUM(b.price)) end as hasil');
         $this->db->from('t_po_fix a');
         $this->db->join('t_po_fix_sub b', 'b.id_primary_so=a.id','left');
         //$this->db->where('a.id',$query);
         $this->db->group_by('a.id');
         
        
        //$this->db->where('ven_code',$query);
        return $this->db->get()->result();
    }
    
    public function get_list_po_fix_multi($query){
        $this->db->where('po_primary',$query);
        return $this->db->get('t_po_fix_sub')->result();
    }
    
    public function list_traffic(){
        return $this->db->where('id_position','5')->get('m_employee')->result();
    }
    
    public function get_traffic_phone($data){
        return $this->db->where('id',$data)->get('m_employee')->row();
    }
    
    public function get_pic_phone($data){
        return $this->db->where('vendor_code',$data)->get('m_pic_vendor')->row();
    }
    
    public function get_val_pic_phone($data){
        return $this->db->where('vendor_pic_id',$data)->get('m_pic_vendor')->row();
    }

    public function get_new() {

       $setting = new StdClass();

        foreach ($this->_column_order as $key => $column_order) {
            $setting->$column_order = '';
        }
         
        return $setting;
    }
    
    function get_vendor_name_json($query){
        $this->db->like('vendor_name',$query);
        $query = $this->db->get('m_vendor')->result();
        return $query;
    }
    
    function get_id_pic_vendor($id){
        if($id != '' || $id != NULL){
            $this->db->like('vendor_code',$id);
            $data = $this->db->get('m_pic_vendor')->result();
        }else{
            $data = '';
        }
       
        return $data;
        
    }
        
    public function get_driver_vendors($data) {
        $this->db->where('vendor_code', $data);
        //$this->db->group_by('vendor_driver_name');
        return $this->db->get('m_driver_vendor')->result();
    }
    
     public function list_krani() {
        return $this->db->where('id_position', '6')->get('m_employee')->result();
    }


    
    public function get_nopol_vehichle($data) {
        $this->db->where('vendor_code', $data);
        //$this->db->group_by('vendor_vehicle_no');
        return $this->db->get('m_vehicle_vendor')->result();
    }

    public function get_last_no_po(){
		$query = $this->db->query("SELECT SUBSTR(MAX(vendor_order_index),-3) AS id  FROM t_purchase_order "); 
		return $query;
    }
    
    public function get_last_no_po_num(){
		$query = $this->db->query("SELECT SUBSTR(MAX(vendor_order_code),-3) AS id  FROM t_po_fix "); 
		return $query;
    }
    public function get_last_no(){
		$query = $this->db->query("SELECT SUBSTR(MAX(vendor_order_code),-3) AS id  FROM t_po_fix "); 
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
