<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_order extends Parent_Controller {

	 protected $_column_order = array('id','vendor_code','vendor_top','vendor_address','vendor_phone','vendor_name','purchase_order_code','id_pic_vendor','pic_vendor_phone','date_order','date_pickup_order','estimation_date_arrival','type_service','cubication','tonase','payment_type','delivery_type','delivery_point','order_create','id_traffic_name','traffic_phone','special_instruction','purchase_order_status','no_ba','no_cn','upload_ba','upload_cn','ppn','pph','ppn_val','pph_val','overnight_plus','amount_sales','amount_dp','amount_dp_date','amount_dp_debt','over_tonase','price_over_tonase','overnight','price_overnight','netto_sales','no_vehicle','id_krani');
		
    function __construct() {
        parent::__construct();
        $this->load->model('purchase_order_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);

        //echo date('dmY');
        //$data['list'] = $this->purchase_order_m->get();
       
        $data['list'] = $this->purchase_order_m->get_all();
        //echo $this->db->last_query();
        $data['total_rows'] = $this->purchase_order_m->total_rows();

        $list_cari = $this->purchase_order_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['purchase_order'] = $this->purchase_order_m->get_no_search($per_page)->result();
            //$data['total_rows'] = $this->purchase_order_m->count_thread($search, $list_cari);
        } else {
            $data['purchase_order'] = $this->purchase_order_m->get_with_search($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->purchase_order_m->count_thread($search, $list_cari);
        }
         

        $data['view'] = 'transaksi/purchase_order/view';
        $this->load->view('main_template', $data);
    }
    
    public function calculating_qpo(){
        $origin = $this->input->post('origin');
        $district = $this->input->post('district');
        $vehicle = $this->input->post('vehicle');
        $data = $this->purchase_order_m->calculating_qpo($origin,$district,$vehicle);
        //$hasil = $origin.'-'.$district.'-'.$vehicle;
        echo json_encode($data);
    }
    
    public function save_qc_of_po(){
        $data = array('id'=>$this->input->post('idsofix'),
                     'origin'=>$this->input->post('origin'),
                     'province'=>$this->input->post('province'),
                     'district'=>$this->input->post('district'),
                     'vehicle'=>$this->input->post('vehicle'),
                     'district_info'=>$this->input->post('district_info'),
                     'cubication'=>$this->input->post('cubication'),
                     'tonase'=>$this->input->post('tonase'),
                     'charge_option'=>$this->input->post('charge_option'),
                     'address'=>$this->input->post('address'),
                     'lead_time'=>$this->input->post('lead_time'),
                     'price'=>$this->input->post('price'),
                     'cust_code'=>$this->input->post('cust_code')
                     );
        
        $dataupt = array('origin'=>$data['origin'],
                         'province'=>$data['province'],
                         'district'=>$data['district'],
                         'vehicle'=>$data['vehicle'],
                         'district_info'=>$data['district_info'],
                         'cubication'=>$data['cubication'],
                         'tonase'=>$data['tonase'],
                         'charge_option'=>$data['charge_option'],
                         'address'=>$data['address'],
                         'lead_time'=>$data['lead_time'],
                         'price'=>$data['price'],
                         'cust_code'=>$data['cust_code']);
        
        if($data['id'] == '' || $data['id'] == NULL){
            $result = $this->purchase_order_m->save_so_fix($data);
        }
            $result = $this->purchase_order_m->update_so_fix($dataupt,$data['id']);
        if($result){
            echo json_encode('success:true');
        }else{
            echo json_encode('success:false');
        }
      
    }
    
    public function get_list_po_fix(){
        $query = $this->uri->segment(4);
        $data = $this->purchase_order_m->get_list_po_fix($query);
        //echo $this->db->last_query();
        //echo "<br>";
        //echo json_encode($data);
        //echo json_encode("data".$data);
        /* {"data":[{"id":"20","indeks_quotation":"QCADC17012017","customer_name":"PT.ANDICA CONSULTAN","customer_code":"ADC","npwp":"a.jpg","office_address":"Jl.Bintara","office_email":"info@adc.com","office_phone":"907872342","payment_type":"kredit","top":"45","customer_status":"en","customer_date_registration":"2017-01-17 08:03:29"}]} */
        //$list =  json_encode($data);

        $arpush = array();
        foreach ($data as $list) {
            $arrpushx = array( 
                'id' => $list->id,
                'origin' => $list->origin,
                'province' => $list->province,
                'district' => $list->district,
                'vehicle' => $list->vehicle,
                'district_info' => $list->district_info,
                'cubication' => $list->cubication,
                'tonase' => $list->tonase,
                'charge_option' => $list->charge_option,
                'address' => $list->address,
                'lead_time' => $list->lead_time,
                'price' => $list->price,
                'totalsub'=>$list->totalsub,
                'hasil'=>$list->hasil
            );
            array_push($arpush, $arrpushx);
        }
        $list = json_encode($arpush);
        echo "{\"data\":" . $list . "}";
    }
    
    function get_json_purchase_order() {
        $list = $this->purchase_order_m->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $purchase_orders) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $purchase_orders->purchase_order_code;
            $row[] = $purchase_orders->purchase_order_name;
            $row[] = $purchase_orders->top;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']),
            "recordsTotal" => $this->purchase_order_m->count_all(),
            "recordsFiltered" => $this->purchase_order_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function store() {
        $id = $this->uri->segment(4);
        
        if ($id != NULL || $id != '') {
            $data['list'] = $this->purchase_order_m->get_all($id);
            $data['purchase_order_code'] = $data['list']->purchase_order_code;
            $data['order_create'] = $data['list']->order_create;
            $data['pic_vendor_phone'] = '';
            
        } else {
            $data['list'] = $this->purchase_order_m->get_new();
            $data['purchase_order_code'] = "QC".date('dmy').$this->transaksi_id();
            $data['order_create'] =  $this->session->userdata('username');
            $data['pic_vendor_phone'] = $data['list']->pic_vendor_phone;
        }
        
        //var_dump($data['list']);
        $data['list_traffic'] = $this->purchase_order_m->list_traffic();
        $data['list_krani'] = $this->purchase_order_m->list_krani();
        $data['form_url'] = 'transaksi/purchase_order/store';
        $data['view'] = 'transaksi/purchase_order/store';
        $this->load->view('main_template', $data);
    }
    
   


    public function delete() {
        $id = $this->uri->segment(4);
          
        $this->purchase_order_m->delete($id);

        redirect(base_url('transaksi/purchase_order'));
    }

    public function pro_store() {
		$datapos = $this->purchase_order_m->array_from_post($this->_column_order);
       

        //dump($datapos);
        //die();
        $config['upload_path']	= "upload_files/";
        $config['allowed_types'] = 'rtf|doc|docx|jpg|jpeg|png|pdf';
        $config['max_size']  = 8000;
        $config['remove_spaces'] = TRUE;
    
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if($datapos['upload_cn'] != ''){
            $this->upload->do_upload('fupload_cn');
        }
        
        if($datapos['upload_ba'] != ''){
            $this->upload->do_upload('fupload_ba');
        }

        $id = isset($datapos['id']) ? $datapos['id'] : '';
        //echo $id;
        //die();
        $save = $this->purchase_order_m->save($datapos, $id);
        if ($save) {
            redirect(base_url('transaksi/purchase_order'));
        } else {
            echo "die!";
        }
    }
    
    public function get_origin(){
        $id = $this->uri->segment(4);
        $get = $this->purchase_order_m->get_origin($id);
        
        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";
   
        if($get > 0){
            foreach ($get as $list){
            echo "<option value=".$list->origin."> ".$list->origin." </option>";
            }
           
        }else{
             echo "<option value=''>  </option>";
        }
         
    }
    
    public function get_province(){
        $id = $this->uri->segment(4);
        $get = $this->purchase_order_m->get_province($id);
        
        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";
        if($get > 0){
            foreach ($get as $list){
            echo "<option value=".$list->province."> ".$list->province." </option>";
            }
           
        }else{
             echo "<option value=''>  </option>";
        }
         
    }
    
    public function get_vehicle(){
        $id = $this->uri->segment(4);
        $get = $this->purchase_order_m->get_vehicle($id);
        
        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";
        if($get > 0){
            foreach ($get as $list){
            echo "<option value=".$list->type_truck."> ".$list->type_truck." </option>";
            }
           
        }else{
             echo "<option value=''>  </option>";
        }
         
    }
    
    public function get_district(){
        $id = $this->uri->segment(4);
        $get = $this->purchase_order_m->get_district($id);
        
        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";
        if($get > 0){
            foreach ($get as $list){
            echo "<option value=".$list->category_destination."> ".$list->category_destination." </option>";
            }
           
        }else{
             echo "<option value=''>  </option>";
        }
         
    }
    
    
    public function get_po_code(){
        $code = $this->input->post('code');
        $postcode = "PO".$code.date('dmy').$this->transaksi_id();
        echo json_encode($postcode);
    }
    
    public function get_id_pic_vendor(){
        $id = $this->uri->segment(4);
        $get = $this->purchase_order_m->get_id_pic_vendor($id);
        
        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";
        if($get > 0){
            foreach ($get as $list){
            echo "<option value=".$list->vendor_pic_id."> ".$list->vendor_pic_name." </option>";
            }
          
             
        }else{
             echo "<option value=''>  </option>";
        }
        
        
        
    }

    public function get_vendor_name_json(){
        $query = $this->input->get('query');
        $date = date('dmy');
        $data = $this->purchase_order_m->get_vendor_name_json($query);
        $datax = array();
	        foreach ($data as $list) {
	        	$lists = array('vendor_name'=>$list->vendor_name,
	        				   'vendor_id'=>$list->id,
                               'vendor_code'=>$list->vendor_code
                              );
                array_push($datax,$lists);
	        }
            
            
	    echo json_encode($data);
    }
    
    public function get_traffic_phone(){
        $data = $this->uri->segment(4);
        $get = $this->purchase_order_m->get_traffic_phone($data);
         
        echo json_encode($get);   
    }
    
    public function get_no_vehicle(){
      $id = $this->uri->segment(4);
      $get = $this->purchase_order_m->get_no_vehicle($id);
        
        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";
        if($get > 0){
            foreach ($get as $list){
            echo "<option value=".$list->vendor_vehicle_no."> ".$list->vendor_vehicle_no." </option>";
            }
          
             
        }else{
             echo "<option value=''>  </option>";
        }
        
    }
    
    public function get_pic_phone(){
        $data = $this->uri->segment(4);
        $get = $this->purchase_order_m->get_pic_phone($data);
         
        echo json_encode($get);
    }
    
     public function get_val_pic_phone(){
        $data = $this->uri->segment(4);
        $get = $this->purchase_order_m->get_val_pic_phone($data);
         
        echo json_encode($get);
    }

    public function transaksi_id($param='') {
        $data = $this->purchase_order_m->get_last_no();
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
