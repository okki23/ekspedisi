<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends Parent_Controller {

	protected $_column_order = array('id', 'branch_name', 'branch_address');
		
    function __construct() {
        parent::__construct();
        $this->load->model('branch_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);

        //echo date('dmY');
        $data['list'] = $this->branch_m->get();
       
        //$data['list'] = '';
        $data['total_rows'] = $this->branch_m->total_rows();

        $list_cari = $this->branch_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['branch'] = $this->branch_m->get_no_search($per_page)->result();
            //$data['total_rows'] = $this->branch_m->count_thread($search, $list_cari);
        } else {
            $data['branch'] = $this->branch_m->get_with_search($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->branch_m->count_thread($search, $list_cari);
        }
         
  $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $data['view'] = 'master/branch/view';
        $this->load->view('main_template', $data);
    }

    function get_json_branch() {
        $list = $this->branch_m->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $branchs) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $branchs->branch_code;
            $row[] = $branchs->branch_name;
            $row[] = $branchs->top;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']),
            "recordsTotal" => $this->branch_m->count_all(),
            "recordsFiltered" => $this->branch_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function store() {
        $id = $this->uri->segment(4);
        
        if ($id != NULL || $id != '') {
            $data['list'] = $this->branch_m->get($id);
        } else {
            $data['list'] = $this->branch_m->get_new();
        }
          $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $this->load->model('position_m');
        $data['list_position'] = $this->position_m->get();

        //var_dump($data['list']);
        $data['form_url'] = 'master/branch/pro_store';
        $data['view'] = 'master/branch/store';
        $this->load->view('main_template', $data);
    }
 
	
	public function delete() {
        $id = $this->uri->segment(4);
          
        $this->branch_m->delete($id);

        redirect(base_url('master/branch'));
    }

    public function pro_store() {
		$datapos = $this->branch_m->array_from_post($this->_column_order);
       

        //dump($datapos);
        //die();

        $id = isset($datapos['id']) ? $datapos['id'] : '';
        //echo $id;
        //die();
        $save = $this->branch_m->save($datapos, $id);
        if ($save) {
            redirect(base_url('master/branch'));
        } else {
            echo "die!";
        }
    }

}
