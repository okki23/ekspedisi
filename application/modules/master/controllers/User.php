<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends Parent_Controller {
    
    protected $_column_order = array('id','indeks_quotation','customer_name','customer_code','npwp','office_address','office_email','office_phone','payment_type','top','customer_status','customer_date_registration');
    
    function __construct() {
        parent::__construct();
        $this->load->model('customer_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);
         
        //echo date('dmY');
        $data['list'] = $this->customer_m->get();
        $data['total_rows'] = $this->customer_m->total_rows();

        $list_cari = $this->customer_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['customers'] = $this->customer_m->get_no_search($per_page)->result();
            $data['total_rows'] = $this->customer_m->count_thread($search, $list_cari);
        } else {
            $data['customers'] = $this->customer_m->get_with_search($per_page, $list_cari)->result();
            $data['total_rows'] = $this->customer_m->count_thread($search, $list_cari);
        }
  $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $data['view'] = 'master/customer/view_customer';
        $this->load->view('main_template', $data);
    }

    function get_json_customer() {
        $list = $this->customer_m->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->customer_code;
            $row[] = $customers->customer_name;
            $row[] = $customers->top;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']),
            "recordsTotal" => $this->customer_m->count_all(),
            "recordsFiltered" => $this->customer_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function store() {
        $id = $this->uri->segment(4);
        
        if ($id != NULL || $id != '') {
            $data['list'] = $this->customer_m->get_data($id);
        } else {
            $data['list'] = $this->customer_m->get_new();
        }
        
          $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        //$data = $this->customer_m->get_new();
        $data['customer_date_registration'] = date('Y-m-d H:i:s');
        $data['form_url'] = 'master/customer/pro_store';
        $data['view'] = 'master/customer/store';
        $this->load->view('main_template', $data);
    }

    public function delete() {
        $this->load->helper("file");
       
        $id = $this->uri->segment(4);
        //var_dump($id);
        //die();
        
        
        $file = $this->customer_m->get_files_to_delete($id);
        //echo $file->npwp;
        if (count($file) > 0){
            //delete_files($path);
            if(unlink('upload_files/'.$file->npwp)){
                //echo 'bener bos!';
            }else{
                //echo 'zonk';
            }
            //delete_files(base_url('upload_files/'.$file->npwp));
        }else{
            
        }
        
        
        $this->customer_m->delete($id);

        redirect(base_url('master/customer'));
    }

    public function pro_store() {
        //$code = 'QC' . $getcode . $date
        $datapos = $this->customer_m->array_from_post($this->_column_order);
        $code = 'QC'.$datapos['customer_code'].date('dmY');
        $datapos['indeks_quotation'] = $code;
        $config['upload_path']	= "upload_files/";
        $config['allowed_types'] = 'rtf|doc|docx|jpg|jpeg|png|pdf';
        $config['max_size']  = 8000;
        $config['remove_spaces'] = TRUE;
    
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if($datapos['npwp'] != ''){
            $this->upload->do_upload('upload_npwp');
        }
        

        $id = isset($datapos['id']) ? $datapos['id'] : '';
        
        $save = $this->customer_m->save($datapos, $id);
        if ($save) {
            redirect(base_url('master/customer'));
        } else {
            echo "die!";
        }
    }

}
