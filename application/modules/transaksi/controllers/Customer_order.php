<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_order extends Parent_Controller {

    protected $_column_order = array('id', 'customer_code', 'customer_top', 'customer_address', 'customer_phone', 'customer_name', 'customer_order_index', 'id_pic_customer', 'pic_customer_phone', 'date_order', 'date_pickup_order', 'estimation_date_arrival', 'type_service', 'payment_type', 'delivery_type', 'delivery_point', 'order_create', 'id_traffic_name', 'traffic_phone', 'special_instruction', 'sales_order_status', 'ppn', 'pph', 'ppn_val', 'pph_val', 'amount_sales', 'amount_dp', 'amount_dp_date', 'amount_dp_debt', 'customer_over_weight', 'customer_orver_price_weight', 'overnight', 'price_overnight', 'overnight_plus', 'netto_sales');

    function __construct() {
        parent::__construct();
        $this->load->model('customer_order_m');
    }

    public function index() {
        $data['limit'] = 10;
        $per_page = 10;
        $data['url'] = $this->uri->segment(3);

        //echo date('dmY');
        //$data['list'] = $this->customer_order_m->get();

        $data['list'] = $this->customer_order_m->get_all();
        $data['total_rows'] = $this->customer_order_m->total_rows();

        $list_cari = $this->customer_order_m->array_from_post(array('url', 'search_param', 'search'));

        $search = $this->input->post('search');
        if ($search == '') {
            $data['customer_order'] = $this->customer_order_m->get_no_search($per_page)->result();
            //$data['total_rows'] = $this->customer_order_m->count_thread($search, $list_cari);
        } else {
            $data['customer_order'] = $this->customer_order_m->get_with_search($per_page, $list_cari)->result();
            //$data['total_rows'] = $this->customer_order_m->count_thread($search, $list_cari);
        }

        $data['title'] = $this->data['meta_title'];
        $data['favicon'] = $this->data['favicon'];
        $data['view'] = 'transaksi/customer_order/view';
        $this->load->view('main_template', $data);
    }
    
    /*
     public function get_so_code() {
        $code = $this->input->post('code');
        $postcode = "PO" . $code . date('dmy') . $this->transaksi_id();
        echo json_encode($postcode);
    }
     * 
     */
    public function get_print_all_so_fields() {
        header("Content-Type: application/force-download");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
        header("content-disposition: attachment;filename=customer_order_All_Customer" . date('dmY') . ".xls");

        $origin = $this->input->post('origin');
        echo $origin;
        $konten = $_POST['params'];
        $listparams = array('id');

        //echo $this->db->last_query();

        echo"<table border=1 style='width:100%;' cellpadding=3 cellspacing=0>";
        echo "<tr>";
        foreach ($konten as $k => $v) {
            switch ($v) {
                case 'a.id':
                    echo "<td style='width:10%;'>ID</td>";
                    break;

                case 'a.sales_order_code':
                    echo "<td style='width:10%;'>Sales Order Code</td>";
                    break;

                case 'b.customer_name':
                    echo "<td style='width:10%;'>Customer Name</td>";
                    break;

                case 'a.origin':
                    echo "<td style='width:10%;'>Origin</td>";
                    break;

                case 'a.province':
                    echo "<td style='width:10%;'>Province</td>";
                    break;

                case 'a.district':
                    echo "<td style='width:10%;'>District</td>";
                    break;

                case 'a.island_single':
                    echo "<td style='width:10%;'>Island</td>";
                    break;

                case 'a.charge_option':
                    echo "<td style='width:10%;'>Charge Option</td>";
                    break;

                case 'a.address':
                    echo "<td style='width:10%;'>Address</td>";
                    break;

                case 'a.price':
                    echo "<td style='width:10%;'>Price</td>";
                    break;

                default:
                    break;
            }
        }
        echo "</tr>";
        echo "</table>";


        echo"<table border=1 style='width:100%;' cellpadding=3 cellspacing=0>";



        $vs = implode(",", $konten);

        //$this->db->select($vs);
        //$this->db->from('t_so_fix a');
        //$this->db->join('m_customer b', 'b.customer_code=a.cust_code');
        $dataparent = $this->customer_order_m->get_list_parent_so_print($vs);

        foreach ($dataparent as $you) {
            $fieldName = explode(",", $vs);

            echo "<tr>";
            $datachild = array();
            foreach ($fieldName as $fname) {
                $parsing = explode(".", $fname);
                echo "<td style='width:10%;' >" . $you->$parsing[1] . "</td>";

                if ($parsing[1] == 'sales_order_code') {
                    $datachild = $this->customer_order_m->get_list_child_so_print($you->$parsing[1]);
                }
            }
            echo "</tr>";

            foreach ($datachild as $dchild) {
                echo "<tr>";

                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>" . $dchild['origin'] . "</td>";
                echo "<td>" . $dchild['province'] . "</td>";
                echo "<td>" . $dchild['district'] . "</td>";
                echo "<td>" . $dchild['island_multi'] . "</td>";
                echo "<td>" . $dchild['charge_option'] . "</td>";
                echo "<td>" . $dchild['address'] . "</td>";
                echo "<td>" . $dchild['price'] . "</td>";
                //print_r($dchild);
                //echo br(2);
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    public function get_last_id_post() {
        $data = $this->db->query('select max(id) as last_id_post from t_so_fix')->row();
        $cek = count($data);
        if ($cek < 0 || $data->last_id_post == NULL || $data->last_id_post == '') {
            $datalast = 1;
        } else {
            $datalast = $data->last_id_post + 1;
        }


        //$data = $this->db->get('t_so_fix')->row();
        echo json_encode($datalast);
    }

    public function cek_child_so($cust_code) {
        $this->db->where('sales_order_code', $cust_code);
        return $this->db->get('t_so_fix_sub');
    }

    public function print_all_so() {
        header("Content-Type: application/force-download");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
        header("content-disposition: attachment;filename=customer_order_All_Customer" . date('dmY') . ".xls");

        //$data = $this->customer_order_m->print_all_so();
        $this->db->select('a.*,b.customer_name');
        $this->db->from('t_so_fix a');
        $this->db->join('m_customer b', 'b.customer_code=a.cust_code');

        $data = $this->db->get()->result();
        echo "<table border='1' cellpadding='1' cellspacing='0'> 
                <tr style='font-weight:bold;' > 
                    <td> ID </td>
                    <td> Sales Order Code </td>
                    <td> Customer Name </td>
                    <td> Origin </td>
                    <td> Province </td>
                    <td> District </td>
                    <td> Island </td>
                    <td> Charge Option </td>
                    <td> Address </td>
                    <td> Price </td>
                </tr>";
        foreach ($data as $k => $v) {
            echo "<tr>
                   <td>" . $v->id . "</td>
                   <td>" . $v->sales_order_code . "</td>
                   <td>" . $v->customer_name . "</td>
                   <td>" . $v->origin . "</td>
                   <td>" . $v->province . "</td>
                   <td>" . $v->district . "</td>
                   <td>" . $v->island_single . "</td>
                   <td>" . ucfirst($v->charge_option) . "</td>
                   <td>" . $v->address . "</td>
                   <td> Rp. " . $v->price . "</td>
                   </tr>";
            $this->db->where('so_primary', $v->sales_order_code);
            $dataset = $this->db->get('t_so_fix_sub')->result();
            if (count($dataset) > 0) {
                foreach ($dataset as $ky => $vl) {
                    echo "<tr>
                   <td> - </td>
                   <td> - </td>
                   <td> - </td>
                    <td> - </td>
                   <td>" . $vl->province . "</td>
                   <td>" . $vl->district . "</td>
                   <td>" . $vl->island_multi . "</td>
                   <td>" . ucfirst($v->charge_option) . "</td>
                       <td>" . $v->address . "</td>
                   <td> Rp. " . $vl->price . "</td>
                   </tr> 
                    ";
                }
            }
        }
        echo " </table>";
    }

    public function print_so_by_id($id) {
        $get_so_code = $this->customer_order_m->get_so_code($id);
        //echo $this->db->last_query();
        //exit();
        header("Content-Type: application/force-download");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
        header("content-disposition: attachment;filename=customer_order'" . $get_so_code->customer_code . "'.xls");


        /*
          $this->db->select('a.*,b.customer_name');
          $this->db->from('t_so_fix a');
          $this->db->join('m_customer b','b.customer_code=>a.cust_code');
          $this->db->where('id',$id);
         * 
         */
        $this->db->where('cust_code', $get_so_code->customer_code);
        //$getfirst = $this->db->get('t_so_fix')->row();
        //$data = $this->customer_order_m->print_all_so();
        $data = $this->db->get('t_so_fix')->result();
        //echo $this->db->last_query();
        echo "<table border='1' cellpadding='1' cellspacing='0'> 
                <tr style='font-weight:bold;' > 
                    <td> ID </td>
                    <td> Sales Order Code </td>
                    <td> Customer Name </td>
                    <td> Origin </td>
                    <td> Province </td>
                    <td> District </td>
                    <td> Island </td>
                    <td> Charge Option </td>
                    <td> Address </td>
                    <td> Price </td>
                </tr>";
        foreach ($data as $k => $v) {
            echo "<tr>
                   <td>" . $v->id . "</td>
                   <td>" . $v->sales_order_code . "</td>
                   <td>" . $get_so_code->customer_name . "</td>
                   <td>" . $v->origin . "</td>
                   <td>" . $v->province . "</td>
                   <td>" . $v->district . "</td>
                   <td>" . $v->island_single . "</td>
                   <td>" . ucfirst($v->charge_option) . "</td>
                   <td>" . $v->address . "</td>
                   <td> Rp. " . $v->price . "</td>
                   </tr>";
            $this->db->where('id_primary_so', $v->id);
            $dataset = $this->db->get('t_so_fix_sub')->result();
            if (count($dataset) > 0) {
                foreach ($dataset as $ky => $vl) {
                    echo "<tr>
                   <td> - </td>
                   <td> - </td>
                   <td> - </td>
                   <td> - </td>
                   <td>" . $vl->province . "</td>
                   <td>" . $vl->district . "</td>
                   <td>" . $vl->island_multi . "</td>
                   <td>" . ucfirst($v->charge_option) . "</td>
                       <td>" . $v->address . "</td>
                   <td> Rp. " . $vl->price . "</td>
                   </tr> 
                    ";
                }
            }
        }
        echo " </table>";
    }

    public function print_so_final($id) {
        $data['title'] = $this->data['meta_title'];
        $data['favicon'] = $this->data['favicon'];
        $data['view'] = 'transaksi/customer_order/so_final';
        $data['idprint'] = $id;
        $data['list_a'] = $this->customer_order_m->get_list_utama_final_a($id);
        //echo $this->db->last_query();
                
        //var_dump($data['list_a']);
        $data['list_b'] = $this->customer_order_m->get_list_utama_final_b($data['list_a']->customer_code);
        //$data['list_c'] = $this->customer_order_m->get_list_utama_final_c($id);

        $this->load->view('main_template', $data);
        //$this->load->view('transaksi/customer_order/so_final');
    }

    public function so_final_pdf($id) {

        $this->load->library("pdf");
        $data['judul'] = 'Customer Order Print';
        $data['idprint'] = $id;
        $data['list_a'] = $this->customer_order_m->get_list_utama_final_a($id);
        $data['list_b'] = $this->customer_order_m->get_list_utama_final_b($data['list_a']->customer_code);
        $this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(true, 'aku', 'kau');
        $this->pdf->SetHeaderData("", "", 'Judul Header', "codedb.co");
        $this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // set auto page breaks
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // add a page
        $this->pdf->AddPage("P", "A4");
        // set font
        $this->pdf->SetFont("helvetica", "", 9);
        $html = $this->load->view('transaksi/customer_order/pdf_so', $data, true);

        $this->pdf->writeHTML($html, true, false, true, false, "");
        $this->pdf->Output("Customer Order Information.pdf", "I");
    }

    public function get_val_ltl() {
        $origin = $this->input->post('origin');
        $uom = $this->input->post('uom');
        $island = $this->input->post('island');
        $category_destination = $this->input->post('category_destination');
        $province = $this->input->post('province');
        $service_mode = $this->input->post('service_mode');
        $trip_mode = $this->input->post('trip_mode');
        /* kons: kons,
          island_single:island_single,
          origin: origin,
          district:district,
          province:province,
          service_mode:kons service_mode,
          moda:moda, */
        $this->db->select('price');
        $this->db->from('t_quotation_customer_detail');
        $this->db->where('origin', $origin);
        $this->db->where('uom', $uom);
        $this->db->where('island', $island);
        $this->db->where('category_destination', $category_destination);
        $this->db->where('province', $province);
        $this->db->where('service_mode', $service_mode);
        $this->db->where('trip_mode', $trip_mode);
        $res = $this->db->get()->row();
        //echo $this->db->last_query();
        echo json_encode($res);
    }

    public function get_call_ltl() {
        $origin = $this->input->post('origin');
        $custcode = $this->input->post('custcode');
        $uom = $this->input->post('uom');
        $tot_satuan = $this->input->post('tot_satuan');
        $island = $this->input->post('island');
        $category_destination = $this->input->post('category_destination');
        $province = $this->input->post('province');
        $service_mode = $this->input->post('service_mode');
        $trip_mode = $this->input->post('trip_mode');
        /* kons: kons,
          island_single:island_single,
          origin: origin,
          district:district,
          province:province,
          service_mode:kons service_mode,
          moda:moda, */
        $this->db->select('price');
        $this->db->from('t_quotation_customer_detail');
        $this->db->where('customer_code', $custcode);
        $this->db->where('origin', $origin);
        $this->db->where('uom', $uom);
        $this->db->where('island', $island);
        $this->db->where('category_destination', $category_destination);
        $this->db->where('province', $province);
        $this->db->where('service_mode', $service_mode);
        $this->db->where('trip_mode', $trip_mode);
        $res = $this->db->get()->row();
        echo json_encode($res->price * $tot_satuan);
        /*
          $set = ($res->price) * ($tot_satuan);
          echo $this->db->last_query()."<br>";
          echo "price : ".$res->price."<br>";
          echo "tot : ".$tot_satuan."<br>";
          echo "res : ".$set."<br>";
          echo json_encode($set);
         * 
         */
    }

    public function get_qc_for_so() {
        $query = $this->uri->segment(4);
        $data = $this->customer_order_m->get_qc_for_so($query);
        //echo json_encode("data".$data);
        /* {"data":[{"id":"20","indeks_quotation":"QCADC17012017","vendor_name":"PT.ANDICA CONSULTAN","vendor_code":"ADC","npwp":"a.jpg","office_address":"Jl.Bintara","office_email":"info@adc.com","office_phone":"907872342","payment_type":"kredit","top":"45","vendor_status":"en","vendor_date_registration":"2017-01-17 08:03:29"}]} */
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

    function get_mdjsc() {

        $custcode = $this->input->post('custcode');
        $vehicle_params = $this->input->post('vehicle_params');
        $island_multi = $this->input->post('island_multi');
        $districtsub = $this->input->post('districtsub');

        $this->db->where('customer_code', $custcode);
        $this->db->where('island', $island_multi);
        $this->db->where('category_destination', $districtsub);
        $this->db->where('type_truck', $vehicle_params);
        $parse = $this->db->get('t_quotation_customer_detail')->row();

        echo json_encode($parse);
    }

    function get_mdjdc() {

        $custcode = $this->input->post('custcode');
        $vehicle_params = $this->input->post('vehicle_params');
        $island_multi = $this->input->post('island_multi');
        $districtsub = $this->input->post('districtsub');

        $this->db->where('customer_code', $custcode);
        $this->db->where('island', $island_multi);
        $this->db->where('category_destination', $districtsub);
        $this->db->where('type_truck', $vehicle_params);
        $parse = $this->db->get('t_quotation_customer_detail')->row();

        echo json_encode($parse);
    }

    function get_mdssc() {

        $custcode = $this->input->post('custcode');
        $vehicle_params = $this->input->post('vehicle_params');
        $island_multi = $this->input->post('island_multi');
        $districtsub = $this->input->post('districtsub');

        $this->db->where('customer_code', $custcode);
        $this->db->where('island', $island_multi);
        $this->db->where('category_destination', $districtsub);
        $this->db->where('type_truck', $vehicle_params);
        $parse = $this->db->get('t_quotation_customer_detail')->row();

        echo json_encode($parse);
    }

    function get_mdsdc() {

        $custcode = $this->input->post('custcode');
        $vehicle_params = $this->input->post('vehicle_params');
        $island_multi = $this->input->post('island_multi');
        $districtsub = $this->input->post('districtsub');

        $this->db->where('customer_code', $custcode);
        $this->db->where('island', $island_multi);
        $this->db->where('category_destination', $districtsub);
        $this->db->where('type_truck', $vehicle_params);
        $parse = $this->db->get('t_quotation_customer_detail')->row();

        echo json_encode($parse);
    }

    function get_json_customer_order() {
        $list = $this->customer_order_m->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $customer_orders) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customer_orders->sales_order_code;
            $row[] = $customer_orders->customer_order_name;
            $row[] = $customer_orders->top;
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']),
            "recordsTotal" => $this->customer_order_m->count_all(),
            "recordsFiltered" => $this->customer_order_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function store() {
        $id = $this->uri->segment(4);

        if ($id != NULL || $id != '') {
            $data['list'] = $this->customer_order_m->get_all($id);
            //var_dump($data['list']);
            $data['sales_order_code'] = $data['list']->customer_order_index;
            $data['order_create'] = $data['list']->order_create;
            $data['pic_customer_phone'] = '';
        } else {
            $data['list'] = $this->customer_order_m->get_new();
            $data['sales_order_code'] = "QC" . date('dmy') . $this->transaksi_id();
            $data['order_create'] = $this->session->userdata('username');
            $data['pic_customer_phone'] = $data['list']->pic_customer_phone;
        }

        //$this->load->model('position_m');
        //$data['list_position'] = $this->position_m->get();
        //var_dump($data['list']);
        //$data['idpos'] = $this->get_last_id_post();
        $data['title'] = $this->data['meta_title'];
        $data['favicon'] = $this->data['favicon'];
        $data['list_traffic'] = $this->customer_order_m->list_traffic();
        $data['form_url'] = 'transaksi/customer_order/store';
        $data['view'] = 'transaksi/customer_order/store';
        $this->load->view('main_template', $data);
    }

    public function delete() {
        $id = $this->uri->segment(4);

        $this->customer_order_m->delete($id);

        redirect(base_url('transaksi/customer_order'));
    }

    public function pro_store() {
        $datapos = $this->customer_order_m->array_from_post($this->_column_order);
                
        //var_dump($this->_column_order);
        //var_dump($datapos);
        //exit();
        /*
          $datapos = array('id'=>$this->input->post('id'),
          'customer_code'=>$this->input->post('customer_code'),
          'customer_top'=>$this->input->post('customer_top'),
          'customer_address'=>$this->input->post('customer_address'),
          'customer_phone'=>$this->input->post('customer_phone'),
          'customer_name'=>$this->input->post('customer_name'),
          'sales_order_code'=>$this->input->post('sales_order_code'),
          'id_pic_customer'=>$this->input->post('id_pic_customer'),
          'pic_customer_phone'=>$this->input->post('pic_customer_phone'),
          'date_order'=>$this->input->post('date_order'),
          'date_pickup_order'=>$this->input->post('date_pickup_order'),
          'estimation_date_arrival'=>$this->input->post('estimation_date_arrival'),
          'type_service'=>$this->input->post('type_service'),
          'payment_type'=>$this->input->post('payment_type'),
          'delivery_type'=>$this->input->post('delivery_type'),
          'delivery_point'=>$this->input->post('delivery_point'),
          'order_create'=>$this->input->post('order_create'),
          'id_traffic_name'=>$this->input->post('id_traffic_name'),
          'traffic_phone'=>$this->input->post('traffic_phone'),
          'special_instruction'=>$this->input->post('special_instruction'),
          'sales_order_status'=>$this->input->post('sales_order_status'),
          'ppn'=>$this->input->post('ppn'),
          'pph'=>$this->input->post('pph'),
          'ppn_val'=>$this->input->post('ppn_val'),
          'pph_val'=>$this->input->post('pph_val'),
          'amount_sales'=>$this->input->post('amount_sales'),
          'amount_dp'=>$this->input->post('amount_dp'),
          'amount_dp_date'=>$this->input->post('amount_dp_date'),
          'amount_dp_debt'=>$this->input->post('amount_dp_debt'),
          'customer_over_weight'=>$this->input->post('customer_over_weight'),
          'customer_orver_price_weight'=>$this->input->post('customer_orver_price_weight'),
          'overnight'=>$this->input->post('overnight'),
          'price_overnight'=>$this->input->post('price_overnight'),
          'overnight_plus'=>$this->input->post('overnight_plus'),
          'netto_sales'=>$this->input->post('netto_sales'));
          //dump($datapos);
          //die();
         */
        $id = isset($datapos['id']) ? $datapos['id'] : '';
        //echo $id;
        //die();
        $save = $this->customer_order_m->save($datapos, $id);
        //echo $this->db->last_query();
        //exit();
        if ($save) {
            redirect(base_url('transaksi/customer_order'));
        } else {
            echo "die!";
        }
    }

    public function get_so_code() {
        $prefix = 'SO';
        $code = $prefix . $this->input->post('code');
        $date = date('dmy');
        $colaborate = $prefix . $code . $date;
        $postcode = $code . date('dmy') . $this->transaksi_id();
        echo json_encode($postcode);
    }
    
    public function get_coi_code() {
        $prefix = 'CO';
        $code = $prefix . $this->input->post('code');
        $date = date('dmy');
        $colaborate = $prefix . $code . $date;
        $postcode = $code . date('dmy') . $this->transaksi_id_index();
        echo json_encode($postcode);
    }

    public function get_id_pic_customer() {
        $id = $this->uri->segment(4);
        $get = $this->customer_order_m->get_id_pic_customer($id);

        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";
        if ($get > 0) {
            foreach ($get as $list) {
                echo "<option value=" . $list->customer_pic_id . "> " . $list->customer_pic_name . " </option>";
            }
        } else {
            echo "<option value=''>  </option>";
        }
    }

    public function get_origin() {
        $id = $this->uri->segment(4);
        $get = $this->customer_order_m->get_origin($id);

        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";

        if ($get > 0) {
            foreach ($get as $list) {
                echo "<option value='" . $list->origin . "'> " . $list->origin . " </option>";
            }
        } else {
            echo "<option value=''>  </option>";
        }
    }

    public function get_province() {
        $id = $this->uri->segment(4);
        $get = $this->customer_order_m->get_province($id);

        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";
        if ($get > 0) {
            foreach ($get as $list) {
                echo "<option value='" . $list->province . "'> " . $list->province . " </option>";
            }
        } else {
            echo "<option value=''>  </option>";
        }
    }

    public function get_vehicle() {
        $id = $this->uri->segment(4);
        $get = $this->customer_order_m->get_vehicle($id);

        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";
        if ($get > 0) {
            foreach ($get as $list) {
                echo "<option value='" . $list->type_truck . "'> " . $list->type_truck . " </option>";
            }
        } else {
            echo "<option value=''>  </option>";
        }
    }

    public function get_district() {
        $id = $this->uri->segment(4);
        $get = $this->customer_order_m->get_district($id);

        //var_dump($get);
        echo "<option value=''>--Pilih--</option>";
        if ($get > 0) {
            foreach ($get as $list) {
                echo "<option value='" . $list->category_destination . "'> " . $list->category_destination . " </option>";
            }
        } else {
            echo "<option value=''>  </option>";
        }
    }

    public function get_detail_so_fix() {
        $query = $this->uri->segment(4);
        $data = $this->customer_order_m->get_detail_so_fix($query);



        foreach ($data as $list) {
            $arrpushx = array(
                'id' => $list->id,
                'origin' => $list->origin,
                'province' => $list->province,
                'district' => $list->district,
                'vehicle' => $list->vehicle,
                'type_service' => $list->type_service,
                'sales_order_code' => $list->sales_order_code,
                'district_info' => $list->district_info,
                'cubication' => $list->cubication,
                'tonase' => $list->tonase,
                'charge_option' => $list->charge_option,
                'address' => $list->address,
                'lead_time' => $list->lead_time,
                'price' => $list->price,
                'totalsub' => $list->totalsub,
                'hasil' => $list->hasil
            );
        }
        $list = json_encode($arrpushx);
        echo $list;
        //echo "{\"data\":" . $list . "}";
    }

    public function get_list_so_fix() {
        $query = $this->uri->segment(4);
        $data = $this->customer_order_m->get_list_so_fix($query);
        //echo $this->db->last_query();
        //echo $this->db->last_query();
        //echo "<br>";
        //echo json_encode($data);
        //echo json_encode("data".$data);
        /* {"data":[{"id":"20","indeks_quotation":"QCADC17012017","customer_name":"PT.ANDICA CONSULTAN","customer_code":"ADC","npwp":"a.jpg","office_address":"Jl.Bintara","office_email":"info@adc.com","office_phone":"907872342","payment_type":"kredit","top":"45","customer_status":"en","customer_date_registration":"2017-01-17 08:03:29"}]} */
        //$list =  json_encode($data);

        $arpush = array();
        foreach ($data as $list) {
            $arrpushx = array(
                'id' => $list->id,
                'origin' => $list->origin,
                'province' => $list->province,
                'sales_order_code' => $list->sales_order_code,
                'sales_order_status' => strtoupper($list->sales_order_status),
                'date_order' => $list->date_order,
                'district' => $list->district,
                'vehicle' => $list->vehicle,
                'type_service' => strtoupper($list->type_service),
                'district_info' => $list->district_info,
                'cubication' => $list->cubication,
                //'tonase' => $list->tonase,
                'charge_option' => ucwords($list->charge_option),
                //'address' => $list->address,
                //'lead_time' => $list->lead_time,
                //'price' => $list->price,
                //'totalsub'=>$list->totalsub,
                'hasil' => $list->hasil
            );
            array_push($arpush, $arrpushx);
        }
        $list = json_encode($arpush);
        echo "{\"data\":" . $list . "}";
    }

    public function get_list_so_fix_multi() {
        $query = $this->uri->segment(4);
        $data = $this->customer_order_m->get_list_so_fix_multi($query);
        //echo json_encode("data".$data);
        /* {"data":[{"id":"20","indeks_quotation":"QCADC17012017","customer_name":"PT.ANDICA CONSULTAN","customer_code":"ADC","npwp":"a.jpg","office_address":"Jl.Bintara","office_email":"info@adc.com","office_phone":"907872342","payment_type":"kredit","top":"45","customer_status":"en","customer_date_registration":"2017-01-17 08:03:29"}]} */
        //$list =  json_encode($data);

        $arpush = array();
        foreach ($data as $list) {
            $arrpushx = array(
                'id' => $list->id,
                'origin' => $list->origin,
                'province' => $list->province,
                'district' => $list->district,
                'vehicle' => $list->vehicle,
                'district_info' => $list->district_info,
                'island_multi' => $list->island_multi,
                'cubication' => $list->cubication,
                'tonase' => $list->tonase,
                'charge_option' => $list->charge_option,
                'address' => $list->address,
                'lead_time' => $list->lead_time,
                'price' => $list->price,
            );
            array_push($arpush, $arrpushx);
        }
        $list = json_encode($arpush);
        echo "{\"data\":" . $list . "}";
    }

    public function calculating_qso() {
        $origin = $this->input->post('origin');
        $district = $this->input->post('district');
        $vehicle = $this->input->post('vehicle');
        $data = $this->customer_order_m->calculating_qso($origin, $district, $vehicle);
        //$hasil = $origin.'-'.$district.'-'.$vehicle;
        echo json_encode($data);
    }

    public function calculating_qso_ftl() {
        $origin = $this->input->post('origin');
        $custcode = $this->input->post('custcode');
        $district = $this->input->post('district');
        $service_mode = $this->input->post('service_mode');
        $vehicle = $this->input->post('vehicle');
        $data = $this->customer_order_m->calculating_qso_ftl($custcode, $origin, $district, $vehicle, $service_mode);
        //$hasil = $origin.'-'.$district.'-'.$vehicle;
        echo json_encode($data);
    }

    public function calculating_qso_ltl() {
        $origin = $this->input->post('origin');
        $custcode = $this->input->post('custcode');
        $district = $this->input->post('district');
        $vehicle = $this->input->post('vehicle');
        $service_mode = $this->input->post('service_mode');
        $uom = $this->input->post('uom');
        $trip_mode = $this->input->post('uom');

        $data = $this->customer_order_m->calculating_qso_ltl($origin, $district, $vehicle);
        //$hasil = $origin.'-'.$district.'-'.$vehicle;
        echo json_encode($data);
    }

    public function calculating_qso_multi() {
        $origin_sub = $this->input->post('origin_sub');
        $district_sub = $this->input->post('district_sub');
        $vehicle_sub = $this->input->post('vehicle_sub');
        $data = $this->customer_order_m->calculating_qso_multi($origin_sub, $district_sub, $vehicle_sub);
        //$hasil = $origin.'-'.$district.'-'.$vehicle;
        echo json_encode($data);
    }

    public function save_qc_of_so() {
        $data = array('id' => $this->input->post('idsofix'),
            'origin' => $this->input->post('origin'),
            'province' => $this->input->post('province'),
            'island_single' => $this->input->post('island_single'),
            'sales_order_code' => $this->input->post('sales_order_code'),
            'sales_order_status' => $this->input->post('sales_order_status'),
            'date_order' => $this->input->post('date_order'),
            'district' => $this->input->post('district'),
            'vehicle' => $this->input->post('vehicle'),
            'type_service' => $this->input->post('type_service'),
            'sc' => $this->input->post('sc'),
            'moda' => $this->input->post('moda'),
            'district_info' => $this->input->post('district_info'),
            'cubication' => $this->input->post('cubication'),
            'tonase' => $this->input->post('tonase'),
            'charge_option' => $this->input->post('charge_option'),
            'address' => $this->input->post('address'),
            'lead_time' => $this->input->post('lead_time'),
            'price' => $this->input->post('price'),
            'cust_code' => $this->input->post('cust_code'),
            'service_mode' => $this->input->post('service_mode'),
            'tot_satuan' => $this->input->post('tot_satuan')
        );

        $dataupt = array('origin' => $data['origin'],
            'province' => $data['province'],
            'island_single' => $data['island_single'],
            'district' => $data['district'],
            'sales_order_code' => $data['sales_order_code'],
            'date_order' => $data['date_order'],
            'sales_order_status' => $data['sales_order_status'],
            'vehicle' => $data['vehicle'],
            'type_service' => $data['type_service'],
            'sc' => $data['sc'],
            'service_mode' => $data['service_mode'],
            'tot_satuan' => $data['tot_satuan'],
            'moda' => $data['moda'],
            'district_info' => $data['district_info'],
            'cubication' => $data['cubication'],
            'tonase' => $data['tonase'],
            'charge_option' => $data['charge_option'],
            'address' => $data['address'],
            'lead_time' => $data['lead_time'],
            'price' => $data['price'],
            'cust_code' => $data['cust_code']);
        if ($data['id'] == '' || $data['id'] == NULL) {
            $result = $this->customer_order_m->save_so_fix($data);
        } else {
            $result = $this->customer_order_m->update_so_fix($dataupt, $data['id']);
        }
        //echo $this->db->last_query();
        /*
          if($data['id'] == '' || $data['id'] == NULL){
          $result = $this->customer_order_m->save_so_fix($data);
          }
          $result = $this->customer_order_m->update_so_fix($dataupt,$data['id']);
          //echo $this->db->last_query();
         */
        if ($result) {
            echo json_encode('success:true');
        } else {
            echo json_encode('success:false');
        }
    }

    function get_island_single() {
        $datapos = $this->input->post('data');
        $this->db->where('province', $datapos);
        $show = $this->db->get('t_quotation_customer_detail')->row();
        echo json_encode($show);
    }

    public function save_qc_of_so_multi() {
        $data = array('id' => $this->input->post('idsosub'),
            'id_primary_so' => $this->input->post('soparent'),
            'origin' => $this->input->post('origin_sub'),
            'so_primary' => $this->input->post('soprimary'),
            'province' => $this->input->post('province_sub'),
            'district' => $this->input->post('district_sub'),
            'vehicle' => $this->input->post('vehicle_sub'),
            'district_info' => $this->input->post('district_info_sub'),
            'island_multi' => $this->input->post('island_multi'),
            'cubication' => $this->input->post('cubication_sub'),
            'tonase' => $this->input->post('tonase_sub'),
            'charge_option' => $this->input->post('charge_option_sub'),
            'address' => $this->input->post('address_sub'),
            'lead_time' => $this->input->post('lead_time_sub'),
            'price' => $this->input->post('price_sub'),
            'cust_code' => $this->input->post('cust_code')
        );

        $dataupt = array('origin' => $data['origin'],
            'id_primary_so' => $data['id_primary_so'],
            'province' => $data['province'],
            'so_primary' => $data['so_primary'],
            'district' => $data['district'],
            'vehicle' => $data['vehicle'],
            'district_info' => $data['district_info'],
            'cubication' => $data['cubication'],
            'tonase' => $data['tonase'],
            'island_multi' => $data['island_multi'],
            'charge_option' => $data['charge_option'],
            'address' => $data['address'],
            'lead_time' => $data['lead_time'],
            'price' => $data['price'],
            'cust_code' => $data['cust_code']);

        if ($data['id'] == '' || $data['id'] == NULL) {
            $result = $this->customer_order_m->save_so_fix_multi($data);
        }
        $result = $this->customer_order_m->update_so_fix_multi($dataupt, $data['id'], $data['id_primary_so']);
        if ($result) {
            echo json_encode('success:true');
        } else {
            echo json_encode('success:false');
        }
    }

    public function get_delete_so_fix() {
        $query = $this->input->post('query');
        $data = $this->customer_order_m->get_delete_so_fix($query);
        if ($data) {
            echo json_encode('status:true');
        } else {
            echo json_encode('status:fakse');
        }
    }

    public function get_edit_so_fix() {
        $query = $this->uri->segment(4);
        $data = $this->customer_order_m->get_edit_so_fix($query);
        echo json_encode($data);
    }

    public function get_params_multidp() {
        $query = $this->uri->segment(4);
        $data = $this->customer_order_m->get_params_multidp($query);
        echo json_encode($data);
    }

    public function get_delete_so_fix_multi() {
        $query = $this->uri->segment(4);
        $data = $this->customer_order_m->get_delete_so_fix_multi($query);
        if ($data) {
            echo json_encode('status:true');
        } else {
            echo json_encode('status:fakse');
        }
    }

    public function get_edit_so_fix_multi() {
        $query = $this->uri->segment(4);
        $data = $this->customer_order_m->get_edit_so_fix_multi($query);
        echo json_encode($data);
    }

    public function get_customer_name_json() {
        $query = $this->input->get('query');
        $date = date('dmy');
        $data = $this->customer_order_m->get_customer_name_json($query);
        $datax = array();
        foreach ($data as $list) {
            $lists = array('customer_name' => $list->customer_name,
                'customer_id' => $list->id,
                'customer_code' => $list->customer_code,
                'oki' => 'ok');
            array_push($datax, $lists);
        }


        echo json_encode($data);
    }

    public function get_traffic_phone() {
        $data = $this->uri->segment(4);
        $get = $this->customer_order_m->get_traffic_phone($data);

        echo json_encode($get);
    }

    public function get_pic_phone() {
        $data = $this->uri->segment(4);
        $get = $this->customer_order_m->get_pic_phone($data);

        echo json_encode($get);
    }

    public function get_val_pic_phone() {
        $data = $this->uri->segment(4);
        $get = $this->customer_order_m->get_val_pic_phone($data);

        echo json_encode($get);
    }

    public function transaksi_id() {
        $data = $this->customer_order_m->get_last_no();
        $lastid = $data->row();
        $idnya = $lastid->id;

        $param = '';
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
    
    public function transaksi_id_index() {
        $data = $this->customer_order_m->get_last_no_index();
        $lastid = $data->row();
        $idnya = $lastid->id;

        $param = '';
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
