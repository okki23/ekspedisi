<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consignment_note extends Parent_Controller {
    
    protected $_column_order = array('id','indeks_quotation','consignment_note_name','consignment_note_code','npwp','office_address','office_email','office_phone','payment_type','top','consignment_note_status','consignment_note_date_registration');
    
    function __construct() {
        parent::__construct();
        $this->load->model('consignment_note_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);
         
        //echo date('dmY');
        $data['list'] = $this->consignment_note_m->get();
        $data['total_rows'] = $this->consignment_note_m->total_rows();

        $list_cari = $this->consignment_note_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['consignment_notes'] = $this->consignment_note_m->get_no_search($per_page)->result();
            $data['total_rows'] = $this->consignment_note_m->count_thread($search, $list_cari);
        } else {
            $data['consignment_notes'] = $this->consignment_note_m->get_with_search($per_page, $list_cari)->result();
            $data['total_rows'] = $this->consignment_note_m->count_thread($search, $list_cari);
        }

        $data['view'] = 'master/consignment_note/view_consignment_note';
        $this->load->view('main_template', $data);
    }

    function get_json_consignment_note() {
        $list = $this->consignment_note_m->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $consignment_notes) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $consignment_notes->consignment_note_code;
            $row[] = $consignment_notes->consignment_note_name;
            $row[] = $consignment_notes->top;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']),
            "recordsTotal" => $this->consignment_note_m->count_all(),
            "recordsFiltered" => $this->consignment_note_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function store() {
        $id = $this->uri->segment(4);
        
        if ($id != NULL || $id != '') {
            $data['list'] = $this->consignment_note_m->get_data($id);
        } else {
            $data['list'] = $this->consignment_note_m->get_new();
        }
        //$data = $this->consignment_note_m->get_new();
        $data['consignment_note_date_registration'] = date('Y-m-d H:i:s');
        $data['form_url'] = 'master/consignment_note/pro_store';
        $data['view'] = 'master/consignment_note/store';
        $this->load->view('main_template', $data);
    }

    public function delete() {
        $this->load->helper("file");
       
        $id = $this->uri->segment(4);
        //var_dump($id);
        //die();
        
        
        $file = $this->consignment_note_m->get_files_to_delete($id);
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
        
        
        $this->consignment_note_m->delete($id);

        redirect(base_url('master/consignment_note'));
    }

    public function pro_store() {
        //$code = 'QC' . $getcode . $date
        $datapos = $this->consignment_note_m->array_from_post($this->_column_order);
        $code = 'QC'.$datapos['consignment_note_code'].date('dmY');
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
        
        $save = $this->consignment_note_m->save($datapos, $id);
        if ($save) {
            redirect(base_url('master/consignment_note'));
        } else {
            echo "die!";
        }
    }

}
