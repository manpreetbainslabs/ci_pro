<?php 

defined('BASEPATH') OR exit('No direct script access allowed'); 

class Dashboard extends BackendController { 
	function __construct() { 
		parent::__construct(); 
		
		if (!$this->session->userdata('admin_id')){ 			
		   redirect('/admin/login');
		}
	} 
	public function index() { 
		$this->load->view('admin/index');
	}
}