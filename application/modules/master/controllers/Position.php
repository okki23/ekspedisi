<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends Parent_Controller {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model('position_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);

        //echo date('dmY');
        $data['list'] = $this->position_m->get();
        $data['total_rows'] = $this->position_m->total_rows();

        $list_cari = $this->position_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['positions'] = $this->position_m->get_no_search($per_page)->result();
            //$data['total_rows'] = $this->position_m->count_thread($search, $list_cari);
        } else {
            $data['positions'] = $this->position_m->get_with_search($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->position_m->count_thread($search, $list_cari);
        }
  $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $data['view'] = 'master/position/view';
        $this->load->view('main_template', $data);
    }

    public function store() {
        $id = $this->uri->segment(4);

        if ($id != NULL || $id != '') {
            $data['list'] = $this->position_m->get($id);
        } else {
            $data['list'] = $this->position_m->get_new();
        }
  $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        //var_dump($data['list']);
        $data['form_url'] = 'master/position/pro_store';
        $data['view'] = 'master/position/store';
        $this->load->view('main_template', $data);
    }
    
    public function pro_store() {
        // Merubah data postingan menjadi array
        $post = $this->position_m->array_from_post(array('id', 'position_name','position_status'));
        
        $id = isset($post['id']) ? $post['id'] : '';
        
        $save = $this->position_m->save($post, $id);
        if ($save) {
            redirect(base_url('master/position'));
        } else {
            echo "die!";
        }
    }

    public function delete() {
        $id = $this->uri->segment(4);
        $this->position_m->erase($id);

        redirect(base_url('master/position'));
    }

    

}
