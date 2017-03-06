<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Vendor_quotation_m extends Parent_Model {

    //put your code here

    protected $_table_name = 't_vendor_quotation';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_table_name_lefjo = 't_vendor_quotation a';
    protected $_column_order = array('id','id_pic_vendor','vendor_code','quotation_code','payment_type','top','type_service','vendor_quotation_status','date_created');
    protected $_column_search = array('id','id_pic_vendor','vendor_code','vendor_name','quotation_code','payment_type','top','type_service','vendor_quotation_status','date_created');
    protected $_table_status = 'vendor_quotation_status';
    protected $_order_by = array('id' => 'desc');

    function __construct() {
        parent::__construct();
    }
     public function get_all_with_join() {
        $this->db->select('a.*,b.vendor_name');
        $this->db->from('t_vendor_quotation a');
        $this->db->join('m_vendor b', 'b.vendor_code = a.vendor_code', 'left');
        $query = $this->db->get()->result();
        return $query;
    }
    
    function insertDataTemp($data){
        $this->db->insert_batch('t_quotation_vendor_detail',$data);
        return true;
    }
    
    public function get_update($id){
        $this->db->select('a.*,b.vendor_name');
        $this->db->from('t_vendor_quotation a');
        $this->db->join('m_vendor b','b.vendor_code=a.vendor_code','left');
        $this->db->where('a.id',$id);
        
        return $this->db->get()->row();
        
    }
     public function get_no_searchx($limit) {
        $offset = $this->uri->segment(4);
        //$this->db->where($this->_table_status . " <> ", 'de');
          $this->db->select('a.*,b.vendor_name');
        $this->db->from($this->_table_name.' a');
        $this->db->join('m_vendor b','b.vendor_code=a.vendor_code','left');
        $this->db->order_by('id', 'desc');
        return $this->db->limit($limit, $offset)->get();
    }
    
    public function get_with_searchx($limit, $search) {
        $offset = $this->uri->segment(4);
        $this->db->select('a.*,b.vendor_name');
        $this->db->from($this->_table_name.' a');
        $this->db->join('m_vendor b','b.vendor_code=a.vendor_code','left');
        $this->db->like($search['search_param'], $search['search']);
        //$this->db->where($this->_table_status . " <> ", 'de');
        $this->db->order_by('a.id', 'desc');
        return $this->db->limit($limit, $offset)->get();
    }
    public function get_excel_init($id){
        $this->db->where('id',$id);
        return $this->db->get('t_vendor_quotation')->row();
    }
    
    public function get_excel_list($data){
        $this->db->where('vendor_code',$data);
        return $this->db->get('t_quotation_vendor_detail')->result();
        
    }

    public function get_new() {

       $setting = new StdClass();

        foreach ($this->_column_search as $key => $column_order) {
            $setting->$column_order = '';
        }
         
        return $setting;
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
    
    public function get_temp_qc($query){
        $this->db->where('vendor_code',$query);
        return $this->db->get('t_quotation_vendor_detail_temp')->result();
    }

    
    function get_vendor_name_json($query){
        $this->db->like('vendor_name',$query);
        $query = $this->db->get('m_vendor')->result();
        return $query;
    }
    public function get_last_no(){
		$query = $this->db->query("SELECT SUBSTR(MAX(quotation_code),-3) AS id  FROM t_vendor_quotation");
	       
		return $query;
		}
        
    public function save_vq($data, $id = NULL) {
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        $idprimary = "";

        if ($id === NULL || $id === "") {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $idprimary = $this->db->insert_id();
        } else {
            $filter = $this->_primary_filter;
            $idprimary = $id;
            
            /*id
id_pic_vendor
vendor_code
quotation_code
payment_type
top
type_service
vendor_quotation_status
date_created
*/
            $set = array('id_pic_vendor'=>$data['id_pic_vendor'],'vendor_code'=>$data['vendor_code'],'quotation_code'=>$data['quotation_code'],'payment_type'=>$data['payment_type'],'top'=>$data['top'],'type_service'=>$data['type_service']);
            $this->db->set($set);
            $this->db->where($this->_primary_key, $idprimary);
            $this->db->update($this->_table_name);
        }
        return $idprimary;
    }

}
