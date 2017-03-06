<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Parent_Controller {

	 
	public function index()
	{
        $data['title'] =  $this->data['meta_title'];
        $data['favicon'] =  $this->data['favicon'];
        //var_dump($data['favicon']);
		$this->load->view('view_dashboard',$data);
	}
}
