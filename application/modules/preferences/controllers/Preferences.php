<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Preferences extends Parent_Controller {
    
    protected $_column_order = array('id','apps_name','apps_desc','apps_url','apps_favicon','company_name','company_phone','preferences_status');
    
    function __construct() {
        parent::__construct();
        $this->load->model('preferences_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);
         
        //echo date('dmY');
        //$data['list'] = $this->preferences_m->get();
        $data['total_rows'] = $this->preferences_m->total_rows();

        $list_cari = $this->preferences_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['preferencess'] = $this->preferences_m->get_no_search($per_page)->result();
            //$data['total_rows'] = $this->preferences_m->count_thread($search, $list_cari);
        } else {
            $data['preferencess'] = $this->preferences_m->get_with_search($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->preferences_m->count_thread($search, $list_cari);
        }
        
        $data['list'] = $this->preferences_m->get_pref();
         $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];

        $data['view'] = 'preferences/preferences/store';
        $this->load->view('main_template', $data);
    }

    function get_json_preferences() {
        $list = $this->preferences_m->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $preferencess) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $preferencess->preferences_code;
            $row[] = $preferencess->preferences_name;
            $row[] = $preferencess->top;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']),
            "recordsTotal" => $this->preferences_m->count_all(),
            "recordsFiltered" => $this->preferences_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function store() {
        $id = $this->uri->segment(4);
        //$data['list'] = $this->preferences_m->get_pref();
        //var_dump($data['list']);
        
        if ($id != NULL || $id != '') {
            $data['list'] = $this->preferences_m->get($id);
        } else {
            $data['list'] = $this->preferences_m->get_new();
        }
          
        //$data = $this->preferences_m->get_new();
        $data['preferences_date_registration'] = date('Y-m-d H:i:s');
         $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        //$data['form_url'] = 'master/preferences/pro_store';
        //$data['view'] = 'master/preferences/store';
        $this->load->view('main_template', $data);
    }

    public function delete() {
     
        $id = $this->uri->segment(4);
        
        
        $this->preferences_m->delete($id);

        redirect(base_url('master/preferences'));
    }

    public function pro_store() {
        //$code = 'QC' . $getcode . $date
        $datapos = $this->preferences_m->array_from_post($this->_column_order);
        

        $id = isset($datapos['id']) ? $datapos['id'] : '';
          $config['upload_path']	= "upload_files/";
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|gif|ico';
        $config['max_size']  = 8000;
        $config['remove_spaces'] = TRUE;
    
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if($datapos['apps_favicon'] != ''){
            $this->upload->do_upload('apps_faviconf');
        }
        
        $save = $this->preferences_m->save($datapos, $id);
        if ($save) {
             echo "<script type='text/javascript'> 
            alert('Preferences saved!');  
            window.location='". base_url('preferences')."'
            </script>";
 
            // $this->session->set_flashdata('pesan', "<div class='alert alert-success'>Data $nama Sudah Tersimpan </div>");
            //echo "<script='text/javascript'> alert(Your Preferences Has Been Saved!) window.location = ".base_url('preferences')."</script>";
            //redirect(base_url('preferences'));  
        } else {
            echo "die!";
        }
    }

}
