<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rbac extends Parent_Controller {

    //put your code here

    public function __construct($status = 0) {
        parent::__construct($status);

        $this->load->model('Flist_m');
        $this->load->model('Object_m');
        $this->load->model('Menu_m');
        $this->load->model('Divisi_m');
        $this->load->model('Glist_m');
        $this->load->model('Uac_m');
        
    }

    function call_function_list() {
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $data['view'] = 'rbac/function_list/view';
        $this->load->view('main_template', $data);
    }

    function json_flist() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : NULL;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : NULL;
        $sort = $this->input->post('sort');

        if ($this->input->get('climit')) {
            if ($this->input->get('climit') > 0) {
                $lmt = $this->input->get('climit');
            } else {
                $lmt = 0;
            }
        } else {
            $lmt = 10;
        }

        $boot['current'] = isset($_GET['cOffset']) > 0 ? $_GET['cOffset'] : 0;
        $boot['rowCount'] = $lmt;

        // Offset didapat setelah mendapat nilai dari $boot['current'] dan $lmt
        $offset = ((int) $boot['current']);

        $dt = "a.id,a.u_object_id, a.parent_id,a.u_function_name,a.u_module,a.u_function,a.u_params,"
                . "a.u_create,a.u_modif,a.created_at, a.updated_at,a.u_status,b.nama_object,"
                . "b.alias_object,c.u_function_name as parent_function";

        $filter['join'] = array("u_objects b" => "b.id=a.u_object_id", "u_function_lists c" => "c.id=a.parent_id");

        if ($searchField <> NULL and $searchField <> "" and $searchField <> "all") {
            switch ($searchField) {
                case 'parent_function':
                    $filter['like'] = array('c.u_function_name' => $searchValue);
                    break;
                case 'u_function_name':
                    $filter['like'] = array('a.' . $searchField => $searchValue);
                    break;
                case 'nama_object':
                    $filter['like'] = array('b.' . $searchField => $searchValue);
                    break;
                default:
                    $filter['like'] = array('a.' . $searchField => $searchValue);
                    break;
            }
        }

        $filter['limit'] = $lmt;
        $filter['offset'] = $offset;

        if ($sort <> NULL) {
            $filter['order_by'] = $sort;
        } else {
            $filter['order_by'] = array('a.id' => 'desc');
        }

        $query = $this->Flist_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Flist_m->total_rows($filter);

        echo json_encode($boot);
    }

    function parent_content_json() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : NULL;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : NULL;
        $sort = $this->input->post('sort');

        if ($this->input->get('climit')) {
            if ($this->input->get('climit') > 0) {
                $lmt = $this->input->get('climit');
            } else {
                $lmt = 0;
            }
        } else {
            $lmt = 10;
        }

        $boot['current'] = isset($_GET['cOffset']) > 0 ? $_GET['cOffset'] : 0;
        $boot['rowCount'] = $lmt;

        // Offset didapat setelah mendapat nilai dari $boot['current'] dan $lmt
        $offset = ((int) $boot['current']);

        $dt = "a.id,a.u_object_id, a.parent_id,a.u_function_name,a.u_module,a.u_function,a.u_params,"
                . "a.u_create,a.u_modif,a.created_at, a.updated_at,a.u_status,b.nama_object,"
                . "b.alias_object,c.u_function_name as parent_function";

        $filter['join'] = array("u_objects b" => "b.id=a.u_object_id", "u_function_lists c" => "c.id=a.parent_id");
        $filter['where'] = array("b.nama_object" => "Content");

        if ($searchField <> NULL and $searchField <> "" and $searchField <> "all") {
            switch ($searchField) {
                case 'parent_function':
                    $filter['like'] = array('c.u_function_name' => $searchValue);
                    break;
                case 'u_function_name':
                    $filter['like'] = array('a.' . $searchField => $searchValue);
                    break;
                case 'nama_object':
                    $filter['like'] = array('b.' . $searchField => $searchValue);
                    break;
                default:
                    $filter['like'] = array('a.' . $searchField => $searchValue);
                    break;
            }
        }

        $filter['limit'] = $lmt;
        $filter['offset'] = $offset;

        if ($sort <> NULL) {
            $filter['order_by'] = $sort;
        } else {
            $filter['order_by'] = array('a.id' => 'desc');
        }

        $query = $this->Flist_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Flist_m->total_rows($filter);

        echo json_encode($boot);
    }

    function store_functionlist() {
        $id = $this->uri->segment(3);

        if ($id > 0 or $id <> "") {
            $data['list'] = $this->Flist_m->geto($id)->row_array();
        } else {
            $dtcolumn = array('id', 'u_function_name', 'u_module', 'u_function', 'u_params', 'u_object_id', 'parent_id', 'u_status');
            $data['list'] = array_from_post($dtcolumn);
        }

        $data['dtobjects'] = $this->Object_m->geto()->result();

        $data['aksiform'] = base_url($this->router->fetch_class() . '/process_store_functionlist');
        
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $data['sub_template'] = "function_list/store";
        $this->load->view('template', $data);
    }

    function process_store_functionlist() {
        $dtpost = $this->input->post();
        $dtAssoc = assoc_from_post($dtpost);

        if ($dtpost['id'] == "") {
            $fSave = $this->Flist_m->save($dtAssoc);
        } else {
            $fSave = $this->Flist_m->save($dtAssoc, $dtpost['id']);
        }
        redirect(base_url($this->router->fetch_class() . '/call_function_list'));
    }

    function delete_functionlist() {
        $id = $this->uri->segment(3);
        $query = $this->Flist_m->delete($id);
        if ($query) {
            redirect(base_url($this->router->fetch_class() . '/call_function_list'));
        } else {
            echo "Can't Delete Data With ID {$id} !";
        }
    }

    function view_functionlist_content() {
        $this->load->view('function_list/parent_content');
    }

    /*
     * START MENU LIST
     */

    function call_menulist() {
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        
        $data['view'] = 'rbac/menu_list/view';
        $this->load->view('main_template', $data);
    }

    function json_mlist() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : NULL;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : NULL;
        $sort = $this->input->post('sort');

        if ($this->input->get('climit')) {
            if ($this->input->get('climit') > 0) {
                $lmt = $this->input->get('climit');
            } else {
                $lmt = 0;
            }
        } else {
            $lmt = 10;
        }

        $boot['current'] = isset($_GET['cOffset']) > 0 ? $_GET['cOffset'] : 0;
        $boot['rowCount'] = $lmt;

        // Offset didapat setelah mendapat nilai dari $boot['current'] dan $lmt
        $offset = ((int) $boot['current']);

        $dt = "a.*,b.u_menu as menu_parent,c.u_function_name as function_name";

        $filter['join'] = array("u_menus b" => "b.id=a.id_menu_parent", "u_function_lists c" => "c.id=a.u_function_list_id");

        if ($searchField <> NULL and $searchField <> "" and $searchField <> "all") {
            switch ($searchField) {
                case 'function_name':
                    $filter['like'] = array('c.u_function_name' => $searchValue);
                    break;
                case 'menu_parent':
                    $filter['like'] = array('b.u_menu' => $searchValue);
                    break;
                default:
                    $filter['like'] = array('a.' . $searchField => $searchValue);
                    break;
            }
        }

        $filter['limit'] = $lmt;
        $filter['offset'] = $offset;

        if ($sort <> NULL) {
            $filter['order_by'] = $sort;
        } else {
            $filter['order_by'] = array('a.id' => 'desc');
        }

        $query = $this->Menu_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Menu_m->total_rows($filter);

        echo json_encode($boot);
    }

    function store_menulist() {
        $id = $this->uri->segment(3);

        if ($id > 0 or $id <> "") {
            //$data['list'] = $this->Menu_m->geto($id)->row_array();

            $dtmenu = "a.*,b.u_menu as menu_parent,c.u_function_name as u_function";
            $fmenu = array("join" => array("u_menus b" => "b.id=a.id_menu_parent", "u_function_lists c" => "c.id=a.u_function_list_id"), "where" => array("a.id" => $id));
            $data['list'] = assoc_from_post($this->Menu_m->get_data_many($dtmenu, $fmenu));
            $id = array('id' => $id);
            $data['list'] = array_merge($data['list'], $id);
        } else {
            $dtcolumn = array('id', 'id_category_menu', 'id_menu_parent', 'u_menu', 'u_menu_desc', 'u_menu_index', 'u_jenis_kategori', 'u_function_list_id', 'u_group', 'u_status', 'menu_parent', 'u_function');
            $data['list'] = array_from_post($dtcolumn);
        }
        
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];

        $data['sub_template'] = "menu_list/store";
        $this->load->view('template', $data);
    }

    function view_mlist_content() {
        $this->load->view('menu_list/parent_menu_content');
    }

    function view_flist_content() {
        $this->load->view('menu_list/parent_content_function');
    }

    function parent_mlist_json() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : NULL;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : NULL;
        $sort = $this->input->post('sort');

        if ($this->input->get('climit')) {
            if ($this->input->get('climit') > 0) {
                $lmt = $this->input->get('climit');
            } else {
                $lmt = 0;
            }
        } else {
            $lmt = 10;
        }

        $boot['current'] = isset($_GET['cOffset']) > 0 ? $_GET['cOffset'] : 0;
        $boot['rowCount'] = $lmt;

        // Offset didapat setelah mendapat nilai dari $boot['current'] dan $lmt
        $offset = ((int) $boot['current']);

        $dt = "a.*,b.u_menu as menu_parent";

        $filter['join'] = array("u_menus b" => "b.id=a.id_menu_parent");

        if ($searchField <> NULL and $searchField <> "" and $searchField <> "all") {
            switch ($searchField) {
                case 'menu_parent':
                    $filter['like'] = array('b.u_menu' => $searchValue);
                    break;
                default:
                    $filter['like'] = array('a.' . $searchField => $searchValue);
                    break;
            }
        }

        $filter['limit'] = $lmt;
        $filter['offset'] = $offset;

        if ($sort <> NULL) {
            $filter['order_by'] = $sort;
        } else {
            $filter['order_by'] = array('a.id' => 'desc');
        }

        $query = $this->Menu_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Menu_m->total_rows($filter);

        echo json_encode($boot);
    }

    function process_store_menulist() {
        $dtpost = $this->input->post();
        $dtAssoc = assoc_from_post($dtpost);
        //print_r($dtAssoc);die();

        if ($dtpost['id'] == "") {
            $fSave = $this->Menu_m->save($dtAssoc);
        } else {
            $fSave = $this->Menu_m->save($dtAssoc, $dtpost['id']);
        }
        redirect(base_url($this->router->fetch_class() . '/call_menulist'));
    }

    function delete_menulist() {
        $id = $this->uri->segment(3);
        $query = $this->Menu_m->delete($id);
        if ($query) {
            redirect(base_url($this->router->fetch_class() . '/call_menulist'));
        } else {
            echo "Can't Delete Data With ID {$id}!";
        }
    }

    /*
     * START DIVISI LIST
     */

    function call_divisilist() {
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        
        $data['view'] = 'rbac/divisi/view';
        $this->load->view('main_template', $data);
    }

    function json_dlist() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : NULL;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : NULL;
        $sort = $this->input->post('sort');

        if ($this->input->get('climit')) {
            if ($this->input->get('climit') > 0) {
                $lmt = $this->input->get('climit');
            } else {
                $lmt = 0;
            }
        } else {
            $lmt = 10;
        }

        $boot['current'] = isset($_GET['cOffset']) > 0 ? $_GET['cOffset'] : 0;
        $boot['rowCount'] = $lmt;

        // Offset didapat setelah mendapat nilai dari $boot['current'] dan $lmt
        $offset = ((int) $boot['current']);

        $dt = "*";

        if ($searchField <> NULL and $searchField <> "" and $searchField <> "all") {
            $filter['like'] = array($searchField => $searchValue);
        }

        $filter['limit'] = $lmt;
        $filter['offset'] = $offset;

        if ($sort <> NULL) {
            $filter['order_by'] = $sort;
        } else {
            $filter['order_by'] = array('id' => 'desc');
        }

        $query = $this->Divisi_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Divisi_m->total_rows($filter);

        echo json_encode($boot);
    }

    function store_divisilist() {
        $id = $this->uri->segment(3);

        if ($id > 0 or $id <> "") {
            $data['list'] = $this->Divisi_m->geto($id)->row_array();
        } else {
            $dtcolumn = array('id', 'divisi', 'ket_divisi', 'access_divisi', 'u_status');
            $data['list'] = array_from_post($dtcolumn);
        }

        //print_r($data['list']);die();
        $where = array('id_menu_parent' => 0);
        $data['json_tree'] = $this->Menu_m->get_rows_by($where)->result_array();
        //print_r(assoc_from_post($data['json_tree']));die();

        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        
        $data['sub_template'] = "divisi/store";
        $this->load->view('template', $data);
    }

    function process_store_divisilist() {
        $dtpost = $this->input->post();
        $dtAssoc = assoc_from_post($dtpost);

        $dtInput = object_from_post($dtpost['dtinput']);
        $dtfor_post = object_for_save($dtpost['dtinput']);
        $dtcheck = array('access_divisi' => $dtAssoc['dtcheck']);

        $inputDt = array_merge($dtInput, $dtcheck);

        if (isset($dtInput['id']) == "") {
            $fSave = $this->Divisi_m->save($inputDt);
        } else {
            $fSave = $this->Divisi_m->save($inputDt, $dtInput['id']);
        }

        if ($fSave <> false or $fSave > 0) {
            echo json_encode(array('success' => true, 'wUrl' => base_url($this->router->fetch_class() . '/call_divisilist'), 'data' => $inputDt));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    function delete_divisilist() {
        $id = $this->uri->segment(3);
        $query = $this->Divisi_m->delete($id);
        if ($query) {
            redirect(base_url($this->router->fetch_class() . '/call_divisilist'));
        } else {
            echo "Can't Delete Data With ID {$id} !";
        }
    }

    /*
     * START DIVISI LIST
     */
    function call_grouplist() {
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        
        $data['view'] = 'rbac/group/view';
        $this->load->view('main_template', $data);
    }

    function json_glist() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : NULL;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : NULL;
        $sort = $this->input->post('sort');

        if ($this->input->get('climit')) {
            if ($this->input->get('climit') > 0) {
                $lmt = $this->input->get('climit');
            } else {
                $lmt = 0;
            }
        } else {
            $lmt = 10;
        }

        $boot['current'] = isset($_GET['cOffset']) > 0 ? $_GET['cOffset'] : 0;
        $boot['rowCount'] = $lmt;

        // Offset didapat setelah mendapat nilai dari $boot['current'] dan $lmt
        $offset = ((int) $boot['current']);

        $dt = "a.*, b.divisi";

        $filter['join'] = array('u_divisi b' => 'b.id = a.u_divisi');

        if ($searchField <> NULL and $searchField <> "" and $searchField <> "all") {
            switch ($searchField) {
                case 'divisi':
                    $filter['like'] = array('b.divisi' => $searchValue);
                    break;
                default:
                    $filter['like'] = array($searchField => $searchValue);
                    break;
            }
        }

        $filter['limit'] = $lmt;
        $filter['offset'] = $offset;

        if ($sort <> NULL) {
            $filter['order_by'] = $sort;
        } else {
            $filter['order_by'] = array('a.id' => 'desc');
        }

        $query = $this->Glist_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Glist_m->total_rows($filter);

        echo json_encode($boot);
    }

    function store_grouplist() {
        $id = $this->uri->segment(3);

        if ($id > 0 or $id <> "") {
            $data['list'] = $this->Glist_m->geto($id)->row_array();
        } else {
            $dtcolumn = array('id', 'u_divisi', 'u_group', 'u_group_desc', 'access_group', 'u_status');
            $data['list'] = array_from_post($dtcolumn);
        }

        $where_div = array('u_status' => 'A');
        $data['json_div'] = $this->Divisi_m->get_rows_by($where_div)->result_array();


        $where = array('id_menu_parent' => 0);
        $data['json_tree'] = $this->Menu_m->get_rows_by($where)->result_array();
        //print_r(assoc_from_post($data['json_tree']));die();
        
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];

        $data['sub_template'] = "group/store";
        $this->load->view('template', $data);
    }

    function process_store_grouplist() {
        $dtpost = $this->input->post();
        $dtAssoc = assoc_from_post($dtpost);

        $dtInput = object_from_post($dtpost['dtinput']);
        $dtfor_post = object_for_save($dtpost['dtinput']);
        $dtcheck = array('access_group' => $dtAssoc['dtcheck']);

        $inputDt = array_merge($dtInput, $dtcheck);

        if (isset($dtInput['id']) == "") {
            $fSave = $this->Glist_m->save($inputDt);
        } else {
            $fSave = $this->Glist_m->save($inputDt, $dtInput['id']);
        }

        if ($fSave <> false or $fSave > 0) {
            echo json_encode(array('success' => true, 'wUrl' => base_url($this->router->fetch_class() . '/call_grouplist'), 'data' => $inputDt));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    function delete_grouplist() {
        $id = $this->uri->segment(3);
        $query = $this->Glist_m->delete($id);
        if ($query) {
            redirect(base_url($this->router->fetch_class() . '/call_grouplist'));
        } else {
            echo "Can't Delete Data With ID {$id} !";
        }
    }
    
    function get_access_divisi() {
        $id = $this->input->post('id');
        $where_div = array('id' => $id);
        $data = $this->Divisi_m->get_rows_by($where_div)->row_array();
        
        echo json_encode($data);
    }
    
    /*
     * START User Acccount (UAC)
     */
    function call_uac() {
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        
        $data['view'] = 'rbac/uac/view';
        $this->load->view('main_template', $data);
    }

    function json_uac() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : NULL;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : NULL;
        $sort = $this->input->post('sort');

        if ($this->input->get('climit')) {
            if ($this->input->get('climit') > 0) {
                $lmt = $this->input->get('climit');
            } else {
                $lmt = 0;
            }
        } else {
            $lmt = 10;
        }

        $boot['current'] = isset($_GET['cOffset']) > 0 ? $_GET['cOffset'] : 0;
        $boot['rowCount'] = $lmt;

        // Offset didapat setelah mendapat nilai dari $boot['current'] dan $lmt
        $offset = ((int) $boot['current']);

        $dt = "a.*,b.divisi,b.access_divisi,c.u_group,c.access_group";

        $filter['join'] = array('u_divisi b' => 'b.id = a.id_divisi','u_group c' => 'c.id=a.id_group');
        $filter['where'] = array("a.u_status" => "A");

        if ($searchField <> NULL and $searchField <> "" and $searchField <> "all") {
            switch ($searchField) {
                case 'divisi':
                    $filter['like'] = array('b.divisi' => $searchValue);
                    break;
                case 'u_group':
                    $filter['like'] = array('c.u_group' => $searchValue);
                    break;
                default:
                    $filter['like'] = array($searchField => $searchValue);
                    break;
            }
        }

        $filter['limit'] = $lmt;
        $filter['offset'] = $offset;

        if ($sort <> NULL) {
            $filter['order_by'] = $sort;
        } else {
            $filter['order_by'] = array('a.id' => 'desc');
        }

        $query = $this->Uac_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Uac_m->total_rows($filter);

        echo json_encode($boot);
    }

    function store_uac() {
        $id = $this->uri->segment(3);

        if ($id > 0 or $id <> "") {
            $data['list'] = $this->Uac_m->geto($id)->row_array();
            //print_r($data['list']);
        } else {
            $dtcolumn = array('id', 'username','password','id_divisi', 'u_group', 'u_date_expired', 'access_group', 'u_status');
            $data['list'] = array_from_post($dtcolumn);
        }

        $where_div = array('u_status' => 'A');
        $data['json_div'] = $this->Divisi_m->get_rows_by($where_div)->result_array();


        $where = array('id_menu_parent' => 0);
        $data['json_tree'] = $this->Menu_m->get_rows_by($where)->result_array();
        //print_r(assoc_from_post($data['json_tree']));die();
        
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];

        $data['sub_template'] = "uac/store";
        $this->load->view('template', $data);
    }

    function process_store_uac() {
        $dtpost = $this->input->post();
        $dtAssoc = assoc_from_post($dtpost);
        
        //echo json_encode(array('success' => false, 'dtAssoc' => $dtAssoc, 'dtpost' => $dtpost));
        
        if (isset($dtpost['id']) == "") {
            $dtAssoc['u_create'] = 1;
            $dtAssoc['u_date_create'] = date('Y-m-d H:i:s');
            $fSave = $this->Uac_m->save($dtAssoc);
        } else {
            $dtAssoc['u_modif'] = 1;
            $dtAssoc['u_date_modif'] = date('Y-m-d H:i:s');
            $fSave = $this->Uac_m->save($dtAssoc, $dtpost['id']);
        }

        if ($fSave <> false or $fSave > 0) {
            echo json_encode(array('success' => true, 'wUrl' => base_url($this->router->fetch_class() . '/call_uac'), 'data' => $dtpost));
        } else {
            echo json_encode(array('success' => false, 'dataHsl' => $dtpost));
        }
        
    }
    
    function get_group_by_divisi(){
        $idDivisi = $this->input->post('id_divisi');
        
        $where = array('u_divisi' => $idDivisi);
        $json_group = $this->Glist_m->get_rows_by($where)->result_array();
        
        echo json_encode($json_group);
    }
    
    function get_access_group(){
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $json_group = $this->Glist_m->get_rows_by($where)->row();
        
        echo json_encode($json_group);
    }

    function delete_uac() {
        $id = $this->uri->segment(3);
        $query = $this->Uac_m->delete($id);
        if ($query) {
            redirect(base_url($this->router->fetch_class() . '/call_uac'));
        } else {
            echo "Can't Delete Data With ID {$id} !";
        }
    }

}
