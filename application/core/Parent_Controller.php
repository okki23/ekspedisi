<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Parent_Controller extends CI_Controller {

    //put your code here
    public $params_1;
    public $params_2;
    public $params_3;
    public $acc_dt;
    public $data = array();

    //put your code here
    public function __construct($status = 0) {
        parent::__construct();

        $this->params_1 = $this->uri->segment(1);
        $this->params_2 = $this->uri->segment(2);
        $this->params_3 = $this->uri->segment(3);
        $this->acc_dt = "";

        if ($status == 1) {
            $user_id = $this->session->userdata('user_id');
            $this->cek_permission($user_id);
        }

        $this->data['meta_title'] = $this->Main_model->get_setting()->apps_name;
        $this->data['favicon'] = $this->Main_model->get_setting()->apps_favicon;
        
        //var_dump($this->data['meta_title']);
    }

}
