<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Customer_quotation extends Parent_Controller {

    protected $_column_order = array('id', 'id_pic_customer', 'customer_code', 'payment_type', 'top', 'quotation_code', 'type_service', 'customer_quotation_status', 'date_created');

    function __construct() {
        parent::__construct();
        $this->load->model('customer_quotation_m');
        $this->load->library("phpexcel/PHPExcel");
        $this->load->library("phpexcel/PHPExcel/IOFactory");
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);

        //echo date('dmY');
        $data['list'] = $this->customer_quotation_m->get_all_with_join();
        //echo $this->db->last_query();
        //var_dump($data['list']);
        $data['total_rows'] = $this->customer_quotation_m->total_rows();

        $list_cari = $this->customer_quotation_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['customer_quotations'] = $this->customer_quotation_m->get_no_searchx($per_page)->result();
            //echo $this->db->last_query();
            //$data['total_rows'] = $this->customer_quotation_m->count_thread($search, $list_cari);
        } else {
            $data['customer_quotations'] = $this->customer_quotation_m->get_with_searchx($per_page, $list_cari)->result();
            //echo $this->db->last_query();
            //$data['total_rows'] = $this->customer_quotation_m->count_thread($search, $list_cari);
        }
        $data['title'] = $this->data['meta_title'];
        $data['favicon'] = $this->data['favicon'];
        $data['view'] = 'transaksi/customer_quotation/view';
        $this->load->view('main_template', $data);
    }

    public function get_customer_code_json() {
        $data = $this->customer_quotation_m->get_customer_code_json();
        echo json_encode($data);
    }

    public function get_excel_quotation() {
        $id = $this->uri->segment(4);

        $code = $this->customer_quotation_m->get_excel_init($id);

        $list_excel = $this->customer_quotation_m->get_excel_list($code->customer_code);
        if (count($list_excel) > 0) {
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                    ->setCreator("PT.STI") //creator
                    ->setTitle("Sapta Tech Indonesia");  //file title

            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object

            $objget->setTitle('Sample Sheet'); //sheet title

            $objget->getStyle("A1:V1")->applyFromArray(
                    array(
                        'fill' => array(
                            'type' => PHPExcel_Style_Fill::FILL_SOLID,
                            'color' => array('rgb' => '92d050')
                        ),
                        'font' => array(
                            'color' => array('rgb' => '000000')
                        )
                    )
            );

            //table header
            $cols = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V");
            /*
              id
              customer_code
              origin
              province
              destination_city
              category_destination
              island
              lead_time
              uom
              trip_mode
              service_mode
              customer
              type_truck
              top
              price
              mdjsc
              mdjdc
              mdssc
              mdsdc
              ot_java
              ot_sumatera
              on_java
              on_sumatera
              date_effective
             */
            $val = array("Origin ", "Province", "Destination City", "Category Destination", "Island", "Lead Time", "UOM", "Trip Mode", "Service Mode", "Customer", "Type Truck", "TOP", "Price", "Multidrop Java Same City", "Multidrop Java Different City", "Multidrop Sumatera Same City", "Multidrop Sumatera Different City", "Over Tonase Java", "Over Tonase Sumatera", "Over Night Java", "Over Night Sumatera", "Date Effective");

            for ($a = 0; $a < 22; $a++) {
                $objset->setCellValue($cols[$a] . '1', $val[$a]);

                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25);



                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a] . '1')->applyFromArray($style);
            }

            $baris = 2;
            foreach ($list_excel as $frow) {

                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A" . $baris, $frow->origin);
                $objset->setCellValue("B" . $baris, $frow->province);
                $objset->setCellValue("C" . $baris, $frow->destination_city);
                $objset->setCellValue("D" . $baris, $frow->category_destination);
                $objset->setCellValue("E" . $baris, $frow->island);
                $objset->setCellValue("F" . $baris, $frow->lead_time);
                $objset->setCellValue("G" . $baris, $frow->uom);
                $objset->setCellValue("H" . $baris, $frow->trip_mode);
                $objset->setCellValue("I" . $baris, $frow->service_mode);
                $objset->setCellValue("J" . $baris, $frow->customer);
                $objset->setCellValue("K" . $baris, $frow->type_truck);
                $objset->setCellValue("L" . $baris, $frow->top);
                $objset->setCellValue("M" . $baris, $frow->price);
                $objset->setCellValue("N" . $baris, $frow->mdjsc);
                $objset->setCellValue("O" . $baris, $frow->mdjdc);
                $objset->setCellValue("P" . $baris, $frow->mdssc);
                $objset->setCellValue("Q" . $baris, $frow->mdsdc);
                $objset->setCellValue("R" . $baris, $frow->ot_java);
                $objset->setCellValue("S" . $baris, $frow->ot_sumatera);
                $objset->setCellValue("T" . $baris, $frow->on_java);
                $objset->setCellValue("U" . $baris, $frow->on_sumatera);
                $objset->setCellValue("V" . $baris, $frow->date_effective);


                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('A1:V' . $baris)->getNumberFormat()->setFormatCode('0');

                $baris++;
            }

            $objPHPExcel->getActiveSheet()->setTitle('Data Export');

            $objPHPExcel->setActiveSheetIndex(0);
            $filename = "expport_quotation_fix_from " . $code->customer_code . "-" . date("Y-m-d H:i:s") . ".xls";

            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache

            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
        } else {
            echo "<script type='text/javascript'> 
            alert('Quotation kosong atau belum pernah di upload');  
            window.location='" . base_url('transaksi/customer_quotation') . "'
            </script>";
        }
        //var_dump($list_excel);
    }

    public function upload_quotation() {
        //date_default_timezone_set("Asia/Jakarta");
        $isian = isset($_POST['isi']) ? $_REQUEST['isi'] : '';
        //echo json_encode($isian);
        ///exit();

        $folder = "excel";
        if (!is_dir('./assets/' . $folder)) {
            mkdir('./assets/' . $folder, 0777, TRUE);
        }
        $fileName = $_FILES['excel_file']['name'];

        $config['upload_path'] = "./assets/" . $folder;
        $config['upload_url'] = "./assets/" . $folder;
        $config['file_name'] = date('YmdHis') . "-" . $fileName;
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size'] = '20000';
        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('excel_file')) {
            $media = $this->upload->data();
        }

        $inputFileName = "./assets/" . $folder . "/" . $media['file_name'];
        //echo $inputFileName;
        //exit();

        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }
        $this->db->where('customer_code', $isian);
        $this->db->delete('t_quotation_customer_detail_temp');
        //  Get worksheet dimensions
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        //  Loop through each row of the worksheet in turn
        for ($row = 2; $row <= $highestRow; $row++) { //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            //insert new motor type if not existing
            //  Insert row data array into your database of choice here
            $data = array(
                "customer_code" => $isian,
                "origin" => $rowData[0][0],
                "province" => $rowData[0][1],
                "destination_city" => $rowData[0][2],
                "category_destination" => $rowData[0][3],
                "island" => $rowData[0][4],
                "lead_time" => $rowData[0][5],
                "uom" => $rowData[0][6],
                "trip_mode" => $rowData[0][7],
                "service_mode" => $rowData[0][8],
                "customer" => $rowData[0][9],
                "type_truck" => $rowData[0][10],
                "top" => $rowData[0][11],
                "price" => $rowData[0][12],
                "mdjsc" => $rowData[0][13],
                "mdjdc" => $rowData[0][14],
                "mdssc" => $rowData[0][15],
                "mdsdc" => $rowData[0][16],
                "ot_java" => $rowData[0][17],
                "ot_sumatera" => $rowData[0][18],
                "on_java" => $rowData[0][19],
                "on_sumatera" => $rowData[0][20],
                "date_effective" => rubah_tanggal_excel_to_sql($rowData[0][21])
            );

            //var_dump($data);
            //exit();
            //$this->db->insert("penerimaan_motor_temp", $data); 
            $sql = $this->db->insert_string('t_quotation_customer_detail_temp', $data);
            $this->db->query($sql);
        }
        return true;
    }

    public function datatable_bulk_save() {
        $id_array = $this->input->post('data_ids');
        $codecustomers = $this->input->post('codecustomers');
        $this->db->where_in('id', $id_array);
        $query = $this->db->get('t_quotation_customer_detail_temp')->result_array();
        $dt = array();
        foreach ($query as $kQuery => $vQuery) {
            $dt[] = array(
                'customer_code' => $vQuery['customer_code'],
                'origin' => $vQuery['origin'],
                'province' => $vQuery['province'],
                'destination_city' => $vQuery['destination_city'],
                'category_destination' => $vQuery['category_destination'],
                'island' => $vQuery['island'],
                'lead_time' => $vQuery['lead_time'],
                'uom' => $vQuery['uom'],
                'trip_mode' => $vQuery['trip_mode'],
                'service_mode' => $vQuery['service_mode'],
                'customer' => $vQuery['customer'],
                'type_truck' => $vQuery['type_truck'],
                'top' => $vQuery['top'],
                'price' => $vQuery['price'],
                'mdjsc' => $vQuery['mdjsc'],
                'mdjdc' => $vQuery['mdjdc'],
                'mdssc' => $vQuery['mdssc'],
                'mdsdc' => $vQuery['mdsdc'],
                'ot_java' => $vQuery['ot_java'],
                'ot_sumatera' => $vQuery['ot_sumatera'],
                'on_java' => $vQuery['on_java'],
                'on_sumatera' => $vQuery['on_sumatera'],
                'date_effective' => $vQuery['date_effective']
            );
        }
        //var_dump($dt);
        //exit();
        //
        $this->db->where('customer_code', $codecustomers);
        $this->db->delete('t_quotation_customer_detail');
        $this->customer_quotation_m->insertDataTemp($dt);
        $this->db->where_in('id', $id_array);
        $this->db->delete('t_quotation_customer_detail_temp');
        return true;
    }

    public function datatable_bulk_delete() {
        $id_array = $this->input->post('data_ids');
        $codecustomers = $this->input->post('codecustomers');
        $this->db->where_in('id', $id_array);
        $query = $this->db->delete('t_quotation_customer_detail_temp');

        return true;
    }

    public function get_temp_qc() {
        $query = $this->uri->segment(4);
        $data = $this->customer_quotation_m->get_temp_qc($query);
        //echo json_encode("data".$data);
        /* {"data":[{"id":"20","indeks_quotation":"QCADC17012017","customer_name":"PT.ANDICA CONSULTAN","customer_code":"ADC","npwp":"a.jpg","office_address":"Jl.Bintara","office_email":"info@adc.com","office_phone":"907872342","payment_type":"kredit","top":"45","customer_status":"en","customer_date_registration":"2017-01-17 08:03:29"}]} */
        //$list =  json_encode($data);

        $arpush = array();
        foreach ($data as $list) {
            $arrpushx = array(
                'id' => $list->id,
                'customer_code' => $list->customer_code,
                'origin' => $list->origin,
                'province' => $list->province,
                'destination_city' => $list->destination_city,
                'category_destination' => $list->category_destination,
                'island' => $list->island,
                'lead_time' => $list->lead_time,
                'uom' => $list->uom,
                'trip_mode' => $list->trip_mode,
                'service_mode' => $list->service_mode,
                'customer' => $list->customer,
                'type_truck' => $list->type_truck,
                'top' => $list->top,
                'price' => $list->price,
                'mdjsc' => $list->mdjsc,
                'mdjdc' => $list->mdjdc,
                'mdssc' => $list->mdssc,
                'mdsdc' => $list->mdsdc,
                'ot_java' => $list->ot_java,
                'ot_sumatera' => $list->ot_sumatera,
                'on_java' => $list->on_java,
                'on_sumatera' => $list->on_sumatera,
                'date_effective' => $list->date_effective,
            );
            array_push($arpush, $arrpushx);
        }
        $list = json_encode($arpush);
        echo "{\"data\":" . $list . "}";
    }

    function autocomplete_customer() {
        $query = $this->input->get('query');
        $data = $this->customer_quotation_m->get_customer_autocomplete($query);
        //echo $this->db->last_query();
        echo json_encode($data);
    }

    function load_transaction_by_codecust() {
        $id_customer = $this->input->post('id_customer');

        $result = $this->customer_quotation_m->getdata_transaction_by_codecust($id_customer);

        echo json_encode($result);
    }

    function get_json_customer_quotation() {
        $list = $this->customer_quotation_m->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $customer_quotations) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customer_quotations->customer_quotation_code;
            $row[] = $customer_quotations->customer_quotation_name;
            $row[] = $customer_quotations->top;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']),
            "recordsTotal" => $this->customer_quotation_m->count_all(),
            "recordsFiltered" => $this->customer_quotation_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function store() {
        $id = $this->uri->segment(4);
        //var_dump($id);
        //exit();
        //var_dump($data['lastid']);
        if ($id != NULL || $id != '') {
            $data['list'] = $this->customer_quotation_m->get_update($id);

            $data['quotation_code'] = $data['list']->quotation_code;
        } else {
            $data['list'] = $this->customer_quotation_m->get_new();
            $data['quotation_code'] = "QC" . date('dmy') . $this->transaksi_id();
        }
        //$data = $this->customer_quotation_m->get_new();
        $data['title'] = $this->data['meta_title'];
        $data['favicon'] = $this->data['favicon'];
        $data['customer_quotation_date_registration'] = date('Y-m-d H:i:s');
        $data['form_url'] = 'transaksi/customer_quotation/pro_store';
        $data['view'] = 'transaksi/customer_quotation/store';
        $this->load->view('main_template', $data);
    }

    public function delete() {

        $id = $this->uri->segment(4);

        $this->customer_quotation_m->delete($id);

        redirect(base_url('transaksi/customer_quotation'));
    }

    public function pro_store() {
        //$code = 'QC' . $getcode . $date
        $datapos = $this->customer_quotation_m->array_from_post($this->_column_order);
        //var_dump($datapos);
        //exit();

        $id = isset($datapos['id']) ? $datapos['id'] : '';

        $save = $this->customer_quotation_m->save($datapos, $id);
        if ($save) {
            redirect(base_url('transaksi/customer_quotation'));
        } else {
            echo "die!";
        }
    }

    public function get_customer_name_json() {
        $query = $this->input->get('query');

        $data = $this->customer_quotation_m->get_customer_name_json($query);
        $datax = array();
        foreach ($datax as $list) {
            $lists = array('customer_name' => $list->customer_name,
                'customer_id' => $list->id,
                'customer_code' => $list->customer_code);
            array_push($datax, $list);
        }
        echo json_encode($data);
    }

    public function get_id_pic_customer() {
        $id = $this->uri->segment(4);
        $get = $this->customer_quotation_m->get_id_pic_customer($id);
        //var_dump($get);

        if ($get > 0) {
            foreach ($get as $list) {
                echo "<option value=" . $list->customer_pic_id . "> " . $list->customer_pic_name . " </option>";
            }
        } else {
            echo "<option value=''>  </option>";
        }
    }

    public function transaksi_id($param = '') {
        $data = $this->customer_quotation_m->get_last_no();
        $lastid = $data->row();
        $idnya = $lastid->id;


        if ($idnya == '') { // bila data kosong
            $ID = $param . "001";
            //00000001
        } else {
            $MaksID = $idnya;
            $MaksID++;

            if ($MaksID < 10)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }

}
