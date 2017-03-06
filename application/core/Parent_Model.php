<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Parent_Model extends CI_Model {

    protected $_table_name = '';
    protected $_table_name_alias = '';
    protected $_primary_key = 'id';
    protected $_table_name_lefjo = '';
    protected $_primary_filter = 'intval';
    protected $_column_search = array();
    protected $_column_order = array();
    protected $_table_status = false;
    protected $_order_by = array();
    public $_rules = array();
    protected $_timestamps = FALSE;

    public function __construct() {
        parent::__construct();

        $this->db->protect_identifiers(FALSE);
    }

    // Digunakan untuk merubah searializeArray ke dalam array yang support untuk insert table
    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        //$data[$this->_table_status] = 'en';
        return $data;
    }

    public function array_to_object_save($data) {
        $result = array();
        foreach ($data as $dt) {
            $result[$dt['name']] = $dt['value'];
        }
        return $result;
    }

    // Menampilkan data keseluruhan tanpa filter dan data yang difilter dengan id saja
    public function get($id = NULL) {
        /*
        if ($this->_table_status == true) {
            //$this->db->where("u_status <> ", 'de');
        }
         * 
         */
        if ($id != NULL) {
            $this->db->where('id', $id);
            return $this->db->get($this->_table_name)->row();
        } else {
            return $this->db->get($this->_table_name)->result();
        }
    }

    // Menampilkan data keseluruhan tanpa filter dan data yang difilter dengan id saja
    public function geto($id = NULL) {
        if ($this->_table_status == true) {
            $this->db->where($this->_table_status . " <> ", 'de');
        }
        if ($id != NULL) {
            $this->db->where('id', $id);
            return $this->db->get($this->_table_name);
        } else {
            return $this->db->get($this->_table_name);
        }
    }

    // Digunakan untuk menampilkan data dengan filter yang memiliki satu record hasil
    public function get_by($where) {
        if ($this->_table_status == true) {
            $this->db->where("u_status <> ", 'de');
        }
        $this->db->where($where);
        $this->db->limit(1);
        $this->db->order_by($this->_order_by);

        //return $this->db->get($this->_table_name)->row();
        $query = $this->db->get($this->_table_name);
        switch ($query->num_rows()) {
            case 0:
                $hasil = false;
                break;
            case 1:
                $hasil = $query->row();
                break;
            default:
                $hasil = $query->result();
                break;
        }
        return $hasil;
    }

    public function get_rows_by($where) {
        
        $this->db->where($where);
        $this->db->order_by($this->_order_by);

        $query = $this->db->get($this->_table_name_alias);
        return $query;
    }

    public function get_data_many($data, $filter = NULL, $join = "left") {

        $this->db->select($data, false);

        $this->db->from($this->_table_name);

        // Filter pemilihan fungsi CI dari Join / Like / Where
        if (is_array($filter)) {
            foreach ($filter as $key => $dtfilter) {
                switch ($key) {
                    case "join":
                        if (is_array($dtfilter)) {
                            foreach ($dtfilter as $kunci => $nilai) {
                                $this->db->$key($kunci, $nilai, $join);
                            }
                        } else {
                            $this->db->where($key, $dtfilter);
                        }
                        break;
                    case "limit":
                    case "offset":
                        $this->db->$key($dtfilter);
                        break;
                    default:
                        if (is_array($dtfilter)) {
                            foreach ($dtfilter as $kunci => $nilai) {
                                $this->db->$key($kunci, $nilai);
                            }
                        } else {
                            $this->db->where($key, $dtfilter);
                        }
                        break;
                }
            }
        }

        $query = $this->db->get();

        switch ($query->num_rows()) {
            case 0:
                $hasil = false;
                break;
            case 1:
                $hasil = $query->row();
                break;
            default:
                $hasil = $query->result();
                break;
        }
        return $hasil;
    }

    /* Start for standar table codeigniter */

    public function get_no_search($limit) {
        $offset = $this->uri->segment(4);
        //$this->db->where($this->_table_status . " <> ", 'de');
        $this->db->order_by('id', 'desc');
        return $this->db->limit($limit, $offset)->get($this->_table_name);
    }

    public function get_with_search($limit, $search) {
        $offset = $this->uri->segment(4);
        $this->db->like($search['search_param'], $search['search']);
        //$this->db->where($this->_table_status . " <> ", 'de');
        $this->db->order_by('id', 'desc');
        return $this->db->limit($limit, $offset)->get($this->_table_name);
    }

    /* ENd for Standar Table Codeigniter */

    public function get_data_many_bootgrid($data, $filter = NULL, $join = "left") {

        $this->db->select($data, false);

        $this->db->from($this->_table_name);

        // Filter pemilihan fungsi CI dari Join / Like / Where
        if (is_array($filter)) {
            foreach ($filter as $key => $dtfilter) {
                switch ($key) {
                    case "join":
                        if (is_array($dtfilter)) {
                            foreach ($dtfilter as $kunci => $nilai) {
                                $this->db->$key($kunci, $nilai, $join);
                            }
                        } else {
                            $this->db->where($key, $dtfilter);
                        }
                        break;
                    case "limit":
                    case "offset":
                        $this->db->$key($dtfilter);
                        break;
                    default:
                        if (is_array($dtfilter)) {
                            foreach ($dtfilter as $kunci => $nilai) {
                                $this->db->$key($kunci, $nilai);
                            }
                        } else {
                            $this->db->where($key, $dtfilter);
                        }
                        break;
                }
            }
        }

        $query = $this->db->get();

        switch ($query->num_rows()) {
            case 0:
                $hasil = false;
                break;
            default:
                $hasil = $query->result();
                break;
        }
        return $hasil;
    }

    // Untuk Memanggil Data Json sapTable
    public function get_data_sapTable($data, $filter = NULL, $join = "left") {

        $this->db->select($data, false);

        $this->db->from($this->_table_name);

        // Filter pemilihan fungsi CI dari Join / Like / Where
        if (is_array($filter)) {
            foreach ($filter as $key => $dtfilter) {
                switch ($key) {
                    case "join":
                        if (is_array($dtfilter)) {
                            foreach ($dtfilter as $kunci => $nilai) {
                                $this->db->$key($kunci, $nilai, $join);
                            }
                        } else {
                            $this->db->where($key, $dtfilter);
                        }
                        break;
                    case "limit":
                    case "offset":
                        $this->db->$key($dtfilter);
                        break;
                    default:
                        if (is_array($dtfilter)) {
                            foreach ($dtfilter as $kunci => $nilai) {
                                $this->db->$key($kunci, $nilai);
                            }
                        } else {
                            $this->db->where($key, $dtfilter);
                        }
                        break;
                }
            }
        }

        $query = $this->db->get();

        switch ($query->num_rows()) {
            case 0:
                $hasil = false;
                break;
            default:
                $hasil = $query->result();
                break;
        }
        return $hasil;
    }

    public function total_rows($filter = null, $join = "left") {
        // Jika ada data yang difilter
        if (is_array($filter)) {
            foreach ($filter as $key => $dtfilter) {
                switch ($key) {
                    case "join":
                        if (is_array($dtfilter)) {
                            foreach ($dtfilter as $kunci => $nilai) {
                                $this->db->$key($kunci, $nilai, $join);
                            }
                        } else {
                            $this->db->where($key, $dtfilter);
                        }
                        break;
                    case "limit":
                    case "offset":

                        break;
                    default:
                        if (is_array($dtfilter)) {
                            foreach ($dtfilter as $kunci => $nilai) {
                                $this->db->$key($kunci, $nilai);
                            }
                        } else {
                            $this->db->where($key, $dtfilter);
                        }
                        break;
                }
            }
        }

        return $this->db->get($this->_table_name)->num_rows();
    }

    public function save($data, $id = NULL) {
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        $idprimary = "";

        if ($id === NULL || $id === "") {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name_alias);
            $idprimary = $this->db->insert_id();
        } else {
            $filter = $this->_primary_filter;
            $idprimary = $id;
            $this->db->set($data);
            $this->db->where($this->_primary_key, $idprimary);
            $this->db->update($this->_table_name_alias);
        }
        return $idprimary;
    }

    public function delete($id) {
        $filter = $this->_primary_filter;
        $id = $filter($id);

        if (!$id) {
            return FALSE;
        }

        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $hapus = $this->db->delete($this->_table_name_alias);
        return $hapus;
    }

    public function delete_custom($id) {
        var_dump($id);
        die();
        $filter = $this->_primary_filter;
        $id = $filter($id);

        if (!$id) {
            return FALSE;
        }

        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $hapus = $this->db->delete($this->_table_name);
        return $hapus;
    }

    public function erase($id) {
        $filter = $this->_primary_filter;
        $id = $filter($id);

        if (!$id) {
            return FALSE;
        }

        $this->db->where($this->_primary_key, $id);
        $this->db->set($this->_table_status, 'de');
        $erase = $this->db->update($this->_table_name);
        return $erase;
    }

    /*
     * Start Using DataTables Processing DB
     */

    private function _get_datatables_query() {

        $this->db->from($this->_table_name);

        $i = 0;

        foreach ($this->_column_search as $item) { // loop column 
            if (isset($_POST['search']['value'])) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->_column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->_column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $this->_get_datatables_query();
        if (isset($_POST['length']) != -1)
            $this->db->limit(isset($_POST['length']), isset($_POST['start']));
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->_table_name);
        return $this->db->count_all_results();
    }

    /*
     * End Processing DataTables DB
     */
}
