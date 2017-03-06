<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends Parent_Controller {
    
    protected $_column_order = array('id','satuan_name','satuan_status');
    
    function __construct() {
        parent::__construct();
        $this->load->model('satuan_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);
         
        //echo date('dmY');
        $data['list'] = $this->satuan_m->get();
        $data['total_rows'] = $this->satuan_m->total_rows();

        $list_cari = $this->satuan_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['satuans'] = $this->satuan_m->get_no_search($per_page)->result();
            //$data['total_rows'] = $this->satuan_m->count_thread($search, $list_cari);
        } else {
            $data['satuans'] = $this->satuan_m->get_with_search($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->satuan_m->count_thread($search, $list_cari);
        }
  $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $data['view'] = 'master/satuan/view';
        $this->load->view('main_template', $data);
    }

    function get_json_satuan() {
        $list = $this->satuan_m->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $satuans) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $satuans->satuan_code;
            $row[] = $satuans->satuan_name;
            $row[] = $satuans->top;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']),
            "recordsTotal" => $this->satuan_m->count_all(),
            "recordsFiltered" => $this->satuan_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function store() {
        $id = $this->uri->segment(4);
        
        if ($id != NULL || $id != '') {
            $data['list'] = $this->satuan_m->get($id);
        } else {
            $data['list'] = $this->satuan_m->get_new();
        }
        
          $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        //$data = $this->satuan_m->get_new();
        $data['satuan_date_registration'] = date('Y-m-d H:i:s');
        $data['form_url'] = 'master/satuan/pro_store';
        $data['view'] = 'master/satuan/store';
        $this->load->view('main_template', $data);
    }

    public function delete() {
        $this->load->helper("file");
       
        $id = $this->uri->segment(4);
        //var_dump($id);
        //die();
        
        
        $this->satuan_m->delete($id);

        redirect(base_url('master/satuan'));
    }

    public function pro_store() {
        //$code = 'QC' . $getcode . $date
        $datapos = $this->satuan_m->array_from_post($this->_column_order);
       
         
        

        $id = isset($datapos['id']) ? $datapos['id'] : '';
        
        $save = $this->satuan_m->save($datapos, $id);
        if ($save) {
            redirect(base_url('master/satuan'));
        } else {
            echo "die!";
        }
    }

}
