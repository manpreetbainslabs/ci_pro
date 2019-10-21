<?php 

defined('BASEPATH') OR exit('No direct script access allowed'); 

class Login extends BackendController { 
	function __construct() { 
		parent::__construct(); 
		if ($this->session->userdata('admin_id')){ 
		   redirect('admin/dashboard');
		}
	}
	public function index(){
	  $this->load->view('admin/login');
	}
	public function userlogin(){
		if ($this->input->server('REQUEST_METHOD') != 'POST'){
			$this->session->set_flashdata('error', 'Something went wrong.Please try again');
			redirect('admin/login');
			die();
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/login');
			die();
		}
		
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		
		
		$aid = $this->CommanModel->fetchdata('config_user_data','e_mail',$email,'pass_word',$password);
		
		if(count($aid)!=0){
			
			$admin_id=$aid[0]['user_id'];
			$this->session->set_userdata('admin_id', $admin_id);
			redirect('admin/dashboard');
			die();
			
		}else{			
			$this->session->set_flashdata('error', 'Email or Password incorrect.Please try again');
			redirect('admin/login');
			die();
		}
	}

	public function logout(){
		$this->session->unset_userdata('admin_id');
	 	$this->session->sess_destroy();
	 	redirect('login');
	 	die();
	}
}