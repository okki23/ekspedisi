<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_acara extends Parent_Controller {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model('berita_acara_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);

        //echo date('dmY');
        $data['list'] = $this->berita_acara_m->get();
        $data['total_rows'] = $this->berita_acara_m->total_rows();

        $list_cari = $this->berita_acara_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['berita_acaras'] = $this->berita_acara_m->get_no_search($per_page)->result();
            //$data['total_rows'] = $this->berita_acara_m->count_thread($search, $list_cari);
        } else {
            $data['berita_acaras'] = $this->berita_acara_m->get_with_search($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->berita_acara_m->count_thread($search, $list_cari);
        }

        $data['view'] = 'master/berita_acara/view';
        $this->load->view('main_template', $data);
    }

    public function store() {
        $id = $this->uri->segment(4);

        if ($id != NULL || $id != '') {
            $data['list'] = $this->berita_acara_m->get($id);
        } else {
            $data['list'] = $this->berita_acara_m->get_new();
        }

        //var_dump($data['list']);
        $data['form_url'] = 'master/berita_acara/pro_store';
        $data['view'] = 'master/berita_acara/store';
        $this->load->view('main_template', $data);
    }
    
    public function pro_store() {
        // Merubah data postingan menjadi array
        $post = $this->berita_acara_m->array_from_post(array('id', 'berita_acara_name','berita_acara_status'));
        
        $id = isset($post['id']) ? $post['id'] : '';
        
        $save = $this->berita_acara_m->save($post, $id);
        if ($save) {
            redirect(base_url('master/berita_acara'));
        } else {
            echo "die!";
        }
    }

    public function delete() {
        $id = $this->uri->segment(4);
        $this->berita_acara_m->erase($id);

        redirect(base_url('master/berita_acara'));
    }

    

}
