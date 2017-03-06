<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Langit-Biru
 */
class Login extends CI_Controller {

    //put your code here

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('index');
    }

    function signin() {
        $data = array('username'=>$this->input->post('username'),'password'=>$this->input->post('password'));
        if($data['username'] == 'admin' && $data['password'] == 'admin'){
            $active = array('username'=>'admin');
            $this->session->set_userdata($active);
            redirect(base_url('dashboard'));
            
        }else{
            redirect(base_url('login'));
        }
    }

    function signout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function forgotpass() {
        $post = $this->input->post();
        print_r($post);
    }

}
