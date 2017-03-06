<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Vendor_quotation extends Parent_Controller {

    protected $_column_order = array('id', 'id_pic_vendor', 'vendor_code', 'quotation_code', 'payment_type', 'top', 'type_service', 'vendor_quotation_status', 'date_created');

    function __construct() {
        parent::__construct();
         $this->load->library("phpexcel/PHPExcel");
        $this->load->library("phpexcel/PHPExcel/IOFactory");
        $this->load->model('vendor_quotation_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);
        $dataku = $this->db->get('t_vendor_quotation')->result();

        //echo date('dmY');
        $data['list'] = $this->vendor_quotation_m->get_all_with_join();
        $data['total_rows'] = $this->vendor_quotation_m->total_rows();

        $list_cari = $this->vendor_quotation_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['vendor_quotations'] = $this->vendor_quotation_m->get_no_searchx($per_page)->result();
            //$data['total_rows'] = $this->vendor_quotation_m->count_thread($search, $list_cari);
        } else {
            $data['vendor_quotations'] = $this->vendor_quotation_m->get_with_searchx($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->vendor_quotation_m->count_thread($search, $list_cari);
        }
  $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $data['view'] = 'vendor_quotation/view';
        $this->load->view('main_template', $data);
    }

    function pic_vendor_quotation_json() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : 0;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : 0;
        $sort = $this->input->post('sort');

        $vendor_quotation_code = $this->uri->segment(4);

        $this->load->model('Pic_vendor_quotation_m');

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

        $dt = "a.vendor_quotation_pic_name, a.vendor_quotation_code, b.position_name, a.vendor_quotation_pic_phone, a.vendor_quotation_pic_email";

        $filter = array(
            "join" => array("m_position b" => "b.id=a.vendor_quotation_pic_position"),
            "where" => array('a.vendor_quotation_code' => $vendor_quotation_code),
            "order_by" => array($sort),
            "limit" => $lmt,
            "offset" => (int) $boot['current']
        );

        if ($searchField <> 0 || $searchField <> "all") {
            $filter['like'] = array($searchField => $searchValue);
        }

        $query = $this->Pic_vendor_quotation_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Pic_vendor_quotation_m->total_rows($filter);

        echo json_encode($boot);
    }
    
    public function datatable_bulk_delete() {
        $id_array = $this->input->post('data_ids');
        $codecustomers = $this->input->post('codecustomers');
        $this->db->where_in('id', $id_array);
        $query = $this->db->delete('t_quotation_vendor_detail_temp');
         
        return true;
    }
     public function get_excel_quotation(){
        $id = $this->uri->segment(4);
         
        $code = $this->vendor_quotation_m->get_excel_init($id);
        
        $list_excel = $this->vendor_quotation_m->get_excel_list($code->vendor_code);
        if(count($list_excel)>0){
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
            $cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V");
            
            $val = array("Origin ","Province","Destination City","Category Destination","Island","Lead Time","UOM","Trip Mode","Service Mode","Vendor","Type Truck","TOP","Price","Multidrop Java Same City","Multidrop Java Different City","Multidrop Sumatera Same City","Multidrop Sumatera Different City","Over Tonase Java","Over Tonase Sumatera","Over Night Java","Over Night Sumatera","Date Effective");
             
            for ($a=0;$a<22; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                 
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
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
             
            $baris  = 2;
            foreach ($list_excel as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $frow->origin); 
                $objset->setCellValue("B".$baris, $frow->province); 
                $objset->setCellValue("C".$baris, $frow->destination_city);  
                $objset->setCellValue("D".$baris, $frow->category_destination); 
                $objset->setCellValue("E".$baris, $frow->island); 
                $objset->setCellValue("F".$baris, $frow->lead_time);
                $objset->setCellValue("G".$baris, $frow->uom); 
                $objset->setCellValue("H".$baris, $frow->trip_mode); 
                $objset->setCellValue("I".$baris, $frow->service_mode);
                $objset->setCellValue("J".$baris, $frow->vendor); 
                $objset->setCellValue("K".$baris, $frow->type_truck); 
                $objset->setCellValue("L".$baris, $frow->top); 
                $objset->setCellValue("M".$baris, $frow->price); 
                $objset->setCellValue("N".$baris, $frow->mdjsc); 
                $objset->setCellValue("O".$baris, $frow->mdjdc); 
                $objset->setCellValue("P".$baris, $frow->mdssc); 
                $objset->setCellValue("Q".$baris, $frow->mdsdc); 
                $objset->setCellValue("R".$baris, $frow->ot_java);
                $objset->setCellValue("S".$baris, $frow->ot_sumatera);
                $objset->setCellValue("T".$baris, $frow->on_java);
                $objset->setCellValue("U".$baris, $frow->on_sumatera);
                $objset->setCellValue("V".$baris, $frow->date_effective);
                
                 
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('A1:V'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++;
            }
             
            $objPHPExcel->getActiveSheet()->setTitle('Data Export');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = "expport_quotation_fix_from ".$code->vendor_code."-".date("Y-m-d H:i:s").".xls";
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }else{
            echo "<script type='text/javascript'> 
            alert('Quotation kosong atau belum pernah di upload');  
            window.location='". base_url('transaksi/vendor_quotation')."'
            </script>";
 
        }
        //var_dump($list_excel);
    }

    public function upload_quotation() {
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

        $this->db->empty_table('t_quotation_vendor_detail_temp');
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
                "vendor_code" => $isian,
                "origin" => $rowData[0][0],
                "province" => $rowData[0][1],
                "destination_city" => $rowData[0][2],
                "category_destination" => $rowData[0][3],
                "island" => $rowData[0][4],
                "lead_time" => $rowData[0][5],
                "uom" => $rowData[0][6],
                "trip_mode" => $rowData[0][7],
                "service_mode" => $rowData[0][8],
                "vendor" => $rowData[0][9],
                "type_truck" => $rowData[0][10],
                "top" => $rowData[0][11],
                "price"=> $rowData[0][12],
                "mdjsc"=> $rowData[0][13],
                "mdjdc"=> $rowData[0][14],
                "mdssc"=> $rowData[0][15],
                "mdsdc"=> $rowData[0][16],
                "ot_java"=> $rowData[0][17],
                "ot_sumatera"=> $rowData[0][18],
                "on_java"=> $rowData[0][19],
                "on_sumatera"=> $rowData[0][20],
                "date_effective"=> rubah_tanggal_excel_to_sql($rowData[0][21]) 
            );
            
            //$this->db->insert("penerimaan_motor_temp", $data); 
            $sql = $this->db->insert_string('t_quotation_vendor_detail_temp', $data);
            $this->db->query($sql);
        }
        return true;
    }

    public function datatable_bulk_save() {
        $id_array = $this->input->post('data_ids');
        $codevendors = $this->input->post('codevendors');
        $this->db->where_in('id', $id_array);
        $query = $this->db->get('t_quotation_vendor_detail_temp')->result_array();
        $dt = array();
        foreach ($query as $kQuery => $vQuery) {
            $dt[] = array(
                'vendor_code' => $vQuery['vendor_code'],
                'origin' => $vQuery['origin'],
                'province' => $vQuery['province'],
                'destination_city' => $vQuery['destination_city'],
                'category_destination' => $vQuery['category_destination'],
                'island' => $vQuery['island'],
                'lead_time' => $vQuery['lead_time'],
                'uom' => $vQuery['uom'],
                'trip_mode' => $vQuery['trip_mode'],
                'service_mode' => $vQuery['service_mode'],
                'vendor' => $vQuery['vendor'],
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
         
        $this->db->where('vendor_code',$codevendors);
        $this->db->delete('t_quotation_vendor_detail');
        $this->vendor_quotation_m->insertDataTemp($dt);
        $this->db->where_in('id', $id_array);
        $this->db->delete('t_quotation_vendor_detail_temp');
        return true;
    }

    public function get_temp_qc() {
        $query = $this->uri->segment(4);
        $data = $this->vendor_quotation_m->get_temp_qc($query);
        //echo json_encode("data".$data);
        /* {"data":[{"id":"20","indeks_quotation":"QCADC17012017","vendor_name":"PT.ANDICA CONSULTAN","vendor_code":"ADC","npwp":"a.jpg","office_address":"Jl.Bintara","office_email":"info@adc.com","office_phone":"907872342","payment_type":"kredit","top":"45","vendor_status":"en","vendor_date_registration":"2017-01-17 08:03:29"}]} */
        //$list =  json_encode($data);

        $arpush = array();
        foreach ($data as $list) {
            $arrpushx = array(
                'id' => $list->id,
                'vendor_code' => $list->vendor_code,
                'origin' => $list->origin,
                'province' => $list->province,
                'destination_city' => $list->destination_city,
                'category_destination' => $list->category_destination,
                'island' => $list->island,
                'lead_time' => $list->lead_time,
                'uom' => $list->uom,
                'trip_mode' => $list->trip_mode,
                'service_mode' => $list->service_mode,
                'vendor' => $list->vendor,
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

    function driver_vendor_quotation_json() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : 0;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : 0;
        $sort = $this->input->post('sort');

        $vendor_quotation_code = $this->uri->segment(4);



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

        $dt = "vendor_quotation_driver_name, vendor_quotation_driver_phone";

        $filter = array(
            //"join" => array("m_position b" => "b.id=a.vendor_quotation_pic_position"),
            "where" => array('vendor_quotation_code' => $vendor_quotation_code),
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

    function vehicle_vendor_quotation_json() {
        $searchField = isset($_GET['field']) ? $_GET['field'] : 0;
        $searchValue = isset($_GET['value']) ? $_GET['value'] : 0;
        $sort = $this->input->post('sort');

        $vendor_quotation_code = $this->uri->segment(4);

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


        $dt = "a.vendor_quotation_vehicle_no, a.vendor_quotation_vehicle_type, b.name_vehicle, a.vendor_quotation_vehicle_cubication, a.vendor_quotation_vehicle_tonase";

        $filter = array(
            "join" => array("m_vehicle b" => "b.id=a.id_vehicle_type"),
            "where" => array('a.vendor_quotation_code' => $vendor_quotation_code),
            "order_by" => array($sort),
            "limit" => $lmt,
            "offset" => (int) $boot['current']
        );

        if ($searchField <> 0 || $searchField <> "all") {
            $filter['like'] = array($searchField => $searchValue);
        }

        $query = $this->Pic_vehicle_m->get_data_sapTable($dt, $filter);

        $boot['rows'] = $query;
        $boot['total'] = $this->Pic_vehicle_m->total_rows($filter);

        echo json_encode($boot);
    }

    public function get_data_vendor_quotation_pic() {
        $dtpost = $this->input->post();
        $this->load->model('Pic_vendor_quotation_m');
        $result = $this->Pic_vendor_quotation_m->get_data_pic_vendor_quotation($dtpost);
        echo json_encode($result);
    }

    public function get_data_driver_vendor_quotation() {
        $dtpost = $this->input->post();
        $this->load->model('Pic_driver_m');
        $result = $this->Pic_driver_m->get_data_driver_vendor_quotation($dtpost);
        echo json_encode($result);
    }

    public function get_data_vehicle_vendor_quotation() {
        $dtpost = $this->input->post();
        $this->load->model('Pic_vehicle_m');
        $result = $this->Pic_vehicle_m->get_data_vehicle_vendor_quotation($dtpost);
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
        //var_dump($id);
        //exit();
        //var_dump($data['lastid']);
        if ($id != NULL || $id != '') {
            $data['list'] = $this->vendor_quotation_m->get_update($id);
            //var_dump($data['list']);
            $data['quotation_code'] = $data['list']->quotation_code;
        } else {
            $data['list'] = $this->vendor_quotation_m->get_new();
            $data['quotation_code'] = "QC" . date('dmy') . $this->transaksi_id();
        }
        //$data = $this->vendor_quotation_m->get_new();
          $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        $data['vendor_quotation_date_registration'] = date('Y-m-d H:i:s');
        $data['form_url'] = 'transaksi/vendor_quotation/pro_store';
        $data['view'] = 'transaksi/vendor_quotation/store';
        $this->load->view('main_template', $data);
    }

    public function pro_store() {
        //$code = 'QC' . $getcode . $date
        $datapos = $this->vendor_quotation_m->array_from_post($this->_column_order);
        //var_dump($datapos);
        //exit();

        $id = isset($datapos['id']) ? $datapos['id'] : '';


        $save = $this->vendor_quotation_m->save_vq($datapos, $id);
        if ($save) {
            redirect(base_url('transaksi/vendor_quotation'));
        } else {
            echo "die!";
        }
    }

    public function pro_store_vendor_quotation_pic() {
        $post = $this->input->post('dtpost');
        $vendor_quotation_code = $this->input->post('vendor_quotation_code');


        $this->load->model('Pic_vendor_quotation_m');

        $dtpost = $this->Pic_vendor_quotation_m->array_to_object_save($post);
        $dtpost['vendor_quotation_code'] = $vendor_quotation_code;
        //$dtpost['vendor_quotation_driver_license'] = str_replace("[]{}", $post['upload_file_license']);
        //echo json_encode($dtpost);

        if ($dtpost['vendor_quotation_pic_id'] <> "") {
            $save = $this->Pic_vendor_quotation_m->save($dtpost, $dtpost['vendor_quotation_pic_id']);
        } else {
            $save = $this->Pic_vendor_quotation_m->save($dtpost);
        }

        if ($save <> 0) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    public function pro_store_vendor_quotation_drv() {
        $post = $this->input->post('dtpost');
        $vendor_quotation_code = $this->input->post('vendor_quotation_code');


        $this->load->model('Pic_driver_m');

        $dtpost = $this->Pic_driver_m->array_to_object_save($post);
        $dtpost['vendor_quotation_code'] = $vendor_quotation_code;
        //$dtpost['vendor_quotation_driver_license'] = str_replace("[]{}", $post['upload_file_license']);
        //echo json_encode($dtpost);

        if ($dtpost['vendor_quotation_driver_id'] <> "") {
            $save = $this->Pic_driver_m->save($dtpost, $dtpost['vendor_quotation_driver_id']);
        } else {
            $save = $this->Pic_driver_m->save($dtpost);
        }

        if ($save <> 0) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    public function pro_store_vendor_quotation_vhc() {
        $post = $this->input->post('dtpost');
        $vendor_quotation_code = $this->input->post('vendor_quotation_code');


        $this->load->model('Pic_vehicle_m');

        $dtpost = $this->Pic_vehicle_m->array_to_object_save($post);
        $dtpost['vendor_quotation_code'] = $vendor_quotation_code;
        //$dtpost['vendor_quotation_driver_license'] = str_replace("[]{}", $post['upload_file_license']);
        //echo json_encode($dtpost);

        if ($dtpost['vendor_quotation_vehicle_id'] <> "") {
            $save = $this->Pic_vehicle_m->save($dtpost, $dtpost['vendor_quotation_vehicle_id']);
        } else {
            $save = $this->Pic_vehicle_m->save($dtpost);
        }

        if ($save <> 0) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    public function pro_update_vendor_quotation_pic() {
        $post = $this->input->post('dtpost');
        $codeCust = $this->input->post('custCode');


        $this->load->model('Pic_vendor_quotation_m');

        $dtpost = $this->Pic_vendor_quotation_m->array_to_object_save($post);
        $dtpost['code_vendor_quotation'] = $codeCust;

        //echo json_encode($dtpost);

        if ($dtpost['vendor_quotation_pic_id'] <> "") {
            $save = $this->Pic_vendor_quotation_m->save($dtpost, $dtpost['vendor_quotation_pic_id']);
        } else {
            $save = $this->Pic_vendor_quotation_m->save($dtpost);
        }

        if ($save <> 0) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    function pro_delete_vendor_quotation_pic() {
        $dtpost = $this->input->post();

        $this->load->model('Pic_vendor_quotation_m');
        $result = $this->Pic_vendor_quotation_m->delete_pic_vendor_quotation($dtpost);
        //echo $this->db->last_query();
        //die();

        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => true));
        }
    }

    function pro_delete_vendor_quotation_driver() {
        $dtpost = $this->input->post();

        $this->load->model('Pic_driver_m');
        $result = $this->Pic_driver_m->delete_driver_vendor_quotation($dtpost);
        //echo $this->db->last_query();
        //die();

        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => true));
        }
    }

    function pro_delete_vendor_quotation_vehicle() {
        $dtpost = $this->input->post();

        $this->load->model('Pic_vehicle_m');
        $result = $this->Pic_vehicle_m->delete_vehicle_vendor_quotation($dtpost);
        //echo $this->db->last_query();
        //die();

        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => true));
        }
    }

    public function delete() {

        $id = $this->uri->segment(4);
        //var_dump($id);
        //die();



        $this->vendor_quotation_m->delete($id);

        redirect(base_url('transaksi/vendor_quotation'));
    }

    public function get_vendor_name_json() {
        $query = $this->input->get('query');

        $data = $this->vendor_quotation_m->get_vendor_name_json($query);
        $datax = array();
        foreach ($datax as $list) {
            $lists = array('vendor_name' => $list->vendor_name,
                'vendor_id' => $list->id,
                'vendor_code' => $list->vendor_code);
            array_push($datax, $list);
        }
        echo json_encode($data);
    }

    public function get_id_pic_vendor() {
        $id = $this->uri->segment(4);
        $get = $this->vendor_quotation_m->get_id_pic_vendor($id);
        //var_dump($get);

        if ($get > 0) {
            foreach ($get as $list) {

                echo "<option value=" . $list->vendor_pic_id . "> " . $list->vendor_pic_name . " </option>";
            }
        } else {
            echo "<option value=''> </option>";
        }
    }

    public function transaksi_id($param = '') {
        $data = $this->vendor_quotation_m->get_last_no();
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
