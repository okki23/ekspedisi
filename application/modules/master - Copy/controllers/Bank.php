<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends Parent_Controller {
    
    protected $_column_order = array('id','bank_name','bank_info','bank_status');
    
    function __construct() {
        parent::__construct();
        $this->load->model('bank_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);
         
        //echo date('dmY');
        $data['list'] = $this->bank_m->get();
        $data['total_rows'] = $this->bank_m->total_rows();

        $list_cari = $this->bank_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['banks'] = $this->bank_m->get_no_search($per_page)->result();
            //$data['total_rows'] = $this->bank_m->count_thread($search, $list_cari);
        } else {
            $data['banks'] = $this->bank_m->get_with_search($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->bank_m->count_thread($search, $list_cari);
        }
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $data['view'] = 'master/bank/view';
        $this->load->view('main_template', $data);
    }

    function get_json_bank() {
        $list = $this->bank_m->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $banks) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $banks->bank_code;
            $row[] = $banks->bank_name;
            $row[] = $banks->top;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']),
            "recordsTotal" => $this->bank_m->count_all(),
            "recordsFiltered" => $this->bank_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function store() {
        $id = $this->uri->segment(4);
        
        if ($id != NULL || $id != '') {
            $data['list'] = $this->bank_m->get($id);
        } else {
            $data['list'] = $this->bank_m->get_new();
        }
        //$data = $this->bank_m->get_new();
        $data['bank_date_registration'] = date('Y-m-d H:i:s');
        $data['form_url'] = 'master/bank/pro_store';
        $data['view'] = 'master/bank/store';
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $this->load->view('main_template', $data);
    }

    public function delete() {
     
        $id = $this->uri->segment(4);
        
        
        $this->bank_m->delete($id);

        redirect(base_url('master/bank'));
    }

    public function pro_store() {
        //$code = 'QC' . $getcode . $date
        $datapos = $this->bank_m->array_from_post($this->_column_order);
        

        $id = isset($datapos['id']) ? $datapos['id'] : '';
        
        $save = $this->bank_m->save($datapos, $id);
        if ($save) {
            redirect(base_url('master/bank'));
        } else {
            echo "die!";
        }
    }

}
