<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends Parent_Controller {

    protected $_column_order = array('id', 'indeks_quotation', 'vendor_code', 'vendor_name', 'vendor_address', 'vendor_email', 'vendor_phone', 'vendor_info', 'npwp', 'id_bank', 'account_no', 'payment_type', 'top', 'type_service', 'vendor_status', 'vendor_date_registration');

    function __construct() {
        parent::__construct();
        $this->load->model('vendor_m');
        $this->load->model('position_m');
        $this->load->model('Pic_driver_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);

        //echo date('dmY');
        $data['list'] = $this->vendor_m->get();
        $data['total_rows'] = $this->vendor_m->total_rows();

        $list_cari = $this->vendor_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['vendors'] = $this->vendor_m->get_no_search($per_page)->result();
            //$data['total_rows'] = $this->vendor_m->count_thread($search, $list_cari);
        } else {
            $data['vendors'] = $this->vendor_m->get_with_search($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->vendor_m->count_thread($search, $list_cari);
        }
        $data['title'] = $this->data['meta_title'];
        $data['favicon'] = $this->data['favicon'];
        $data['view'] = 'vendor/view';
        $this->load->view('main_template', $data);
    }

    function pic_vendor_json() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : 0;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : 0;
        $sort = $this->input->post('sort');

        $vendor_code = $this->uri->segment(4);

        $this->load->model('Pic_vendor_m');

        if (isset($_GET['climit'])) {
            if ($_GET['climit'] > 10) {
                $lmt = $_GET['climit'];
            } else {
                $lmt = 10;
            }
        } else {
            $lmt = 10;
        }


        $boot['current'] = isset($_GET['cOffset']) > 0 ? $_GET['cOffset'] : 0;
        $boot['rowCount'] = $lmt;

        $dt = "a.vendor_pic_name, a.vendor_code, b.position_name, a.vendor_pic_phone, a.vendor_pic_email";

        $filter = array(
            "join" => array("m_position b" => "b.id=a.vendor_pic_position"),
            "where" => array('a.vendor_code' => $vendor_code),
            "order_by" => array($sort),
            "limit" => $lmt,
            "offset" => (int) $boot['current']
        );

        if ($searchField <> 0 || $searchField <> "all") {
            switch ($searchField) {
                case 'position_name':
                    $filter['like'] = array('b.'.$searchField => $searchValue);
                    break;
                default:
                    $filter['like'] = array('a.' . $searchField => $searchValue);
                    break;
            }
        }

        $query = $this->Pic_vendor_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Pic_vendor_m->total_rows($filter);

        echo json_encode($boot);
    }

    function driver_vendor_json() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : 0;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : 0;
        $sort = $this->input->post('sort');

        $vendor_code = $this->uri->segment(4);



        if (isset($_GET['climit'])) {
            if ($_GET['climit'] > 10) {
                $lmt = $_GET['climit'];
            } else {
                $lmt = 10;
            }
        } else {
            $lmt = 10;
        }


        $boot['current'] = isset($_GET['cOffset']) > 0 ? $_GET['cOffset'] : 0;
        $boot['rowCount'] = $lmt;

        $dt = "vendor_driver_name, vendor_driver_phone";

        $filter = array(
            //"join" => array("m_position b" => "b.id=a.vendor_pic_position"),
            "where" => array('vendor_code' => $vendor_code),
            "order_by" => array($sort),
            "limit" => $lmt,
            "offset" => (int) $boot['current']
        );

        if ($searchField <> 0 || $searchField <> "all") {
            $filter['like'] = array($searchField => $searchValue);
        }

        $query = $this->Pic_driver_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Pic_driver_m->total_rows($filter);

        echo json_encode($boot);
    }

    function vehicle_vendor_json() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : 0;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : 0;
        $sort = $this->input->post('sort');

        $vendor_code = $this->uri->segment(4);

        $this->load->model('Pic_vehicle_m');

        if (isset($_GET['climit'])) {
            if ($_GET['climit'] > 10) {
                $lmt = $_GET['climit'];
            } else {
                $lmt = 10;
            }
        } else {
            $lmt = 10;
        }


        $boot['current'] = isset($_GET['cOffset']) > 0 ? $_GET['cOffset'] : 0;
        $boot['rowCount'] = $lmt;


        $dt = "a.vendor_vehicle_no, a.vendor_vehicle_type, b.name_vehicle, a.vendor_vehicle_cubication, a.vendor_vehicle_tonase";

        $filter = array(
            "join" => array("m_vehicle b" => "b.id=a.id_vehicle_type"),
            "where" => array('a.vendor_code' => $vendor_code),
            "order_by" => array($sort),
            "limit" => $lmt,
            "offset" => (int) $boot['current']
        );

        if ($searchField <> 0 || $searchField <> "all") {
            $filter['like'] = array($searchField => $searchValue);
        }

        $query = $this->Pic_vehicle_m->get_data_sapTable($dt, $filter);
        //echo $this->db->last_query();
        $boot['rows'] = $query;
        $boot['total'] = $this->Pic_vehicle_m->total_rows($filter);

        echo json_encode($boot);
    }

    public function get_data_vendor_pic() {
        $dtpost = $this->input->post();
        $this->load->model('Pic_vendor_m');
        $result = $this->Pic_vendor_m->get_data_pic_vendor($dtpost);
        echo json_encode($result);
    }

    public function get_data_driver_vendor() {
        $dtpost = $this->input->post();
        $this->load->model('Pic_driver_m');
        $result = $this->Pic_driver_m->get_data_driver_vendor($dtpost);
        echo json_encode($result);
    }

    public function get_data_vehicle_vendor() {
        $dtpost = $this->input->post();
        $this->load->model('Pic_vehicle_m');
        $result = $this->Pic_vehicle_m->get_data_vehicle_vendor($dtpost);
        echo json_encode($result);
    }

    /*
      public function ajax_upload_files(){
      echo $_FILES['file_license']['name'];
      //die();

      if(!empty($_FILES)){
      $config['upload_path'] =  'upload_files/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|pdf|rar|zip|exe|iso';

      $this->load->library('upload',$config);
      if($this->upload->do_upload('myfile')){
      echo json_encode("success:true");
      }else{
      echo json_encode("success:false");
      }
      }
      /
      }
     */

    function ajax_upload_files() {
        $this->load->library('upload');

        if (isset($_FILES["myfile"])) {
            $config['upload_path'] = "upload_files/";
            $config['upload_url'] = "upload_files/";
            $config['allowed_types'] = '*';

            $this->upload->initialize($config);
            if ($this->upload->do_upload('myfile')) {
                $data = array('upload_data' => $this->upload->data());
            } else {
                $data = array('error' => $this->upload->display_errors());
            }

            echo json_encode($data);
        }
    }

    function ajax_upload_files_id() {
        $this->load->library('upload');

        if (isset($_FILES["myfile_id"])) {
            $config['upload_path'] = "upload_files/";
            $config['upload_url'] = "upload_files/";
            $config['allowed_types'] = '*';

            $this->upload->initialize($config);
            if ($this->upload->do_upload('myfile_id')) {
                $data = array('upload_data' => $this->upload->data());
            } else {
                $data = array('error' => $this->upload->display_errors());
            }

            echo json_encode($data);
        }
    }

    function ajax_upload_files_pink_slip() {
        $this->load->library('upload');

        if (isset($_FILES["myfile_pink_slip"])) {
            $config['upload_path'] = "upload_files/";
            $config['upload_url'] = "upload_files/";
            $config['allowed_types'] = '*';

            $this->upload->initialize($config);
            if ($this->upload->do_upload('myfile_pink_slip')) {
                $data = array('upload_data' => $this->upload->data());
            } else {
                $data = array('error' => $this->upload->display_errors());
            }

            echo json_encode($data);
        }
    }

    function ajax_upload_files_tax() {
        $this->load->library('upload');

        if (isset($_FILES["myfile_tax"])) {
            $config['upload_path'] = "upload_files/";
            $config['upload_url'] = "upload_files/";
            $config['allowed_types'] = '*';

            $this->upload->initialize($config);
            if ($this->upload->do_upload('myfile_tax')) {
                $data = array('upload_data' => $this->upload->data());
            } else {
                $data = array('error' => $this->upload->display_errors());
            }

            echo json_encode($data);
        }
    }

    function ajax_upload_files_infraction() {
        $this->load->library('upload');

        if (isset($_FILES["myfile_infraction"])) {
            $config['upload_path'] = "upload_files/";
            $config['upload_url'] = "upload_files/";
            $config['allowed_types'] = '*';

            $this->upload->initialize($config);
            if ($this->upload->do_upload('myfile_infraction')) {
                $data = array('upload_data' => $this->upload->data());
            } else {
                $data = array('error' => $this->upload->display_errors());
            }

            echo json_encode($data);
        }
    }

    function ajax_upload_files_kir() {
        $this->load->library('upload');

        if (isset($_FILES["myfile_kir"])) {
            $config['upload_path'] = "upload_files/";
            $config['upload_url'] = "upload_files/";
            $config['allowed_types'] = '*';

            $this->upload->initialize($config);
            if ($this->upload->do_upload('myfile_kir')) {
                $data = array('upload_data' => $this->upload->data());
            } else {
                $data = array('error' => $this->upload->display_errors());
            }

            echo json_encode($data);
        }
    }

    function ajax_upload_files_sipa() {
        $this->load->library('upload');

        if (isset($_FILES["myfile_sipa"])) {
            $config['upload_path'] = "upload_files/";
            $config['upload_url'] = "upload_files/";
            $config['allowed_types'] = '*';

            $this->upload->initialize($config);
            if ($this->upload->do_upload('myfile_sipa')) {
                $data = array('upload_data' => $this->upload->data());
            } else {
                $data = array('error' => $this->upload->display_errors());
            }

            echo json_encode($data);
        }
    }

    function ajax_upload_files_ibm() {
        $this->load->library('upload');

        if (isset($_FILES["myfile_ibm"])) {
            $config['upload_path'] = "upload_files/";
            $config['upload_url'] = "upload_files/";
            $config['allowed_types'] = '*';

            $this->upload->initialize($config);
            if ($this->upload->do_upload('myfile_ibm')) {
                $data = array('upload_data' => $this->upload->data());
            } else {
                $data = array('error' => $this->upload->display_errors());
            }

            echo json_encode($data);
        }
    }

    function ajax_upload_files_kiu() {
        $this->load->library('upload');

        if (isset($_FILES["myfile_kiu"])) {
            $config['upload_path'] = "upload_files/";
            $config['upload_url'] = "upload_files/";
            $config['allowed_types'] = '*';

            $this->upload->initialize($config);
            if ($this->upload->do_upload('myfile_kiu')) {
                $data = array('upload_data' => $this->upload->data());
            } else {
                $data = array('error' => $this->upload->display_errors());
            }

            echo json_encode($data);
        }
    }

    public function store() {
        $id = $this->uri->segment(4);

        if ($id != NULL || $id != '') {
            $data['list'] = $this->vendor_m->get($id);
        } else {
            $data['list'] = $this->vendor_m->get_new();
        }

        $data['title'] = $this->data['meta_title'];
        $data['favicon'] = $this->data['favicon'];

        $data['vendor_date_registration'] = date('Y-m-d H:i:s');
        $data['list_bank'] = $this->vendor_m->get_bank();
        $data['list_vehicle'] = $this->vendor_m->get_vehicle();
        $data['list_position'] = $this->position_m->get();
        //var_dump($data['list_vehicle']);
        $data['form_url'] = 'vendor/pro_store';
        $data['view'] = 'vendor/store';
        $this->load->view('main_template', $data);
    }

    public function pro_store() {
        //$code = 'QC' . $getcode . $date
        $datapos = $this->vendor_m->array_from_post($this->_column_order);

        $code = 'QC' . $datapos['vendor_code'] . date('dmY');
        $datapos['indeks_quotation'] = $code;
        //var_dump($datapos);
        //die();
        $config['upload_path'] = "upload_files/";
        $config['allowed_types'] = 'rtf|doc|docx|jpg|jpeg|png|pdf';
        $config['max_size'] = 8000;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($datapos['npwp'] != '') {
            $this->upload->do_upload('upload_npwp');
        }


        $id = isset($datapos['id']) ? $datapos['id'] : '';

        $save = $this->vendor_m->save($datapos, $id);
        if ($save) {
            redirect(base_url('master/vendor'));
        } else {
            echo "die!";
        }
    }

    public function pro_store_vendor_pic() {
        $post = $this->input->post('dtpost');
        $vendor_code = $this->input->post('vendor_code');


        $this->load->model('Pic_vendor_m');

        $dtpost = $this->Pic_vendor_m->array_to_object_save($post);
        $dtpost['vendor_code'] = $vendor_code;
        //$dtpost['vendor_driver_license'] = str_replace("[]{}", $post['upload_file_license']);
        //echo json_encode($dtpost);

        if ($dtpost['vendor_pic_id'] <> "") {
            $save = $this->Pic_vendor_m->save($dtpost, $dtpost['vendor_pic_id']);
        } else {
            $save = $this->Pic_vendor_m->save($dtpost);
        }

        if ($save <> 0) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    public function pro_store_vendor_drv() {
        $post = $this->input->post('dtpost');
        $vendor_code = $this->input->post('vendor_code');


        $this->load->model('Pic_driver_m');

        $dtpost = $this->Pic_driver_m->array_to_object_save($post);
        $dtpost['vendor_code'] = $vendor_code;
        //$dtpost['vendor_driver_license'] = str_replace("[]{}", $post['upload_file_license']);
        //echo json_encode($dtpost);

        if ($dtpost['vendor_driver_id'] <> "") {
            $save = $this->Pic_driver_m->save($dtpost, $dtpost['vendor_driver_id']);
        } else {
            $save = $this->Pic_driver_m->save($dtpost);
        }

        if ($save <> 0) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    public function pro_store_vendor_vhc() {
        $post = $this->input->post('dtpost');
        $vendor_code = $this->input->post('vendor_code');


        $this->load->model('Pic_vehicle_m');

        $dtpost = $this->Pic_vehicle_m->array_to_object_save($post);
        $dtpost['vendor_code'] = $vendor_code;
        //$dtpost['vendor_driver_license'] = str_replace("[]{}", $post['upload_file_license']);
        //echo json_encode($dtpost);

        if ($dtpost['vendor_vehicle_id'] <> "") {
            $save = $this->Pic_vehicle_m->save($dtpost, $dtpost['vendor_vehicle_id']);
        } else {
            $save = $this->Pic_vehicle_m->save($dtpost);
        }

        if ($save <> 0) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    public function pro_update_vendor_pic() {
        $post = $this->input->post('dtpost');
        $codeCust = $this->input->post('custCode');


        $this->load->model('Pic_vendor_m');

        $dtpost = $this->Pic_vendor_m->array_to_object_save($post);
        $dtpost['code_vendor'] = $codeCust;

        //echo json_encode($dtpost);

        if ($dtpost['vendor_pic_id'] <> "") {
            $save = $this->Pic_vendor_m->save($dtpost, $dtpost['vendor_pic_id']);
        } else {
            $save = $this->Pic_vendor_m->save($dtpost);
        }

        if ($save <> 0) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    function pro_delete_vendor_pic() {
        $dtpost = $this->input->post();

        $this->load->model('Pic_vendor_m');
        $result = $this->Pic_vendor_m->delete_pic_vendor($dtpost);
        //echo $this->db->last_query();
        //die();

        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => true));
        }
    }

    function pro_delete_vendor_driver() {
        $dtpost = $this->input->post();

        $this->load->model('Pic_driver_m');
        $result = $this->Pic_driver_m->delete_driver_vendor($dtpost);
        //echo $this->db->last_query();
        //die();

        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => true));
        }
    }

    function pro_delete_vendor_vehicle() {
        $dtpost = $this->input->post();

        $this->load->model('Pic_vehicle_m');
        $result = $this->Pic_vehicle_m->delete_vehicle_vendor($dtpost);
        //echo $this->db->last_query();
        //die();

        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => true));
        }
    }

    public function delete() {
        $this->load->helper("file");

        $id = $this->uri->segment(4);
        //var_dump($id);
        //die();


        $file = $this->vendor_m->get_files_to_delete($id);
        //echo $file->npwp;
        if (count($file) > 0) {
            //delete_files($path);
            if (unlink('upload_files/' . $file->npwp)) {
                //echo 'bener bos!';
            } else {
                //echo 'zonk';
            }
            //delete_files(base_url('upload_files/'.$file->npwp));
        } else {
            
        }


        $this->vendor_m->delete($id);

        redirect(base_url('master/vendor'));
    }

}
