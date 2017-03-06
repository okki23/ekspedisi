<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends Parent_Controller {

    protected $_column_order = array('id','id_position','employee_name','employee_domicile','employee_email','employee_phone','employee_status','place_of_birth','date_of_birth','identity_card','family_card','police_certificate','photo','tax_id','last_education');

    function __construct() {
        parent::__construct();
        $this->load->model('employee_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);

        //echo date('dmY');
        $data['list'] = $this->employee_m->get();
       
        //$data['list'] = '';
        $data['total_rows'] = $this->employee_m->total_rows();

        $list_cari = $this->employee_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['employees'] = $this->employee_m->get_no_search($per_page)->result();
            //$data['total_rows'] = $this->employee_m->count_thread($search, $list_cari);
        } else {
            $data['employees'] = $this->employee_m->get_with_search($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->employee_m->count_thread($search, $list_cari);
        }
           $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];

        $data['view'] = 'master/employee/view';
        $this->load->view('main_template', $data);
    }

    function get_json_employee() {
        $list = $this->employee_m->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $employees) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $employees->employee_code;
            $row[] = $employees->employee_name;
            $row[] = $employees->top;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']),
            "recordsTotal" => $this->employee_m->count_all(),
            "recordsFiltered" => $this->employee_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function store() {
        $id = $this->uri->segment(4);
        
        if ($id != NULL || $id != '') {
            $data['list'] = $this->employee_m->get($id);
        } else {
            $data['list'] = $this->employee_m->get_new();
        }
        
        $this->load->model('position_m');
        $data['list_position'] = $this->position_m->get();
  $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        //var_dump($data['list_position']);
        $data['form_url'] = 'master/employee/pro_store';
        $data['view'] = 'master/employee/store';
        $this->load->view('main_template', $data);
    }

    public function delete() {
        $id = $this->uri->segment(4);
        
         $file = $this->employee_m->get_files_to_delete($id);
        
            if($file->identity_card != '' || $file->identity_card != NULL){
                unlink('upload_files/'.$file->identity_card);
            }
            
            if($file->family_card != '' || $file->family_card != NULL){
                unlink('upload_files/'.$file->family_card);
            }
                
            if($file->police_certificate != '' || $file->police_certificate != NULL){
                unlink('upload_files/'.$file->police_certificate);
            }
                
            if($file->photo != '' || $file->photo != NULL){
               unlink('upload_files/'.$file->photo);
            }
               
            if($file->tax_id != '' || $file->tax_id != NULL){
                unlink('upload_files/'.$file->tax_id);
            } 
 
        
        $this->employee_m->delete($id);

        redirect(base_url('master/employee'));
    }

    public function pro_store() {
        $post = $this->employee_m->array_from_post($this->_column_order);
        
        $config['upload_path']	= "upload_files/";
        $config['allowed_types'] = 'rtf|doc|docx|jpg|jpeg|png|pdf';
        $config['max_size']  = 8000;
        $config['remove_spaces'] = TRUE;
    
        $this->load->library('upload');
        $this->upload->initialize($config);
          
        
        if($post['identity_card'] != ''){
            $this->upload->do_upload('upload_identity_card');
        }
        
        if($post['family_card'] != ''){
            $this->upload->do_upload('upload_family_card');
        }
        
        if($post['police_certificate'] != ''){
            $this->upload->do_upload('upload_police_certificate');
        }
        
        if($post['photo'] != ''){
            $this->upload->do_upload('upload_photo');
        }
        
        if($post['tax_id'] != ''){
            $this->upload->do_upload('upload_tax_id');
        }
        
         
        $id = isset($post['id']) ? $post['id'] : '';
         
        $save = $this->employee_m->save($post, $id);
        if ($save) {
            redirect(base_url('master/employee'));
        } else {
            echo "die!";
        }
    }

}
