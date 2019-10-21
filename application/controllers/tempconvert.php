<?php
class TempConvert extends CI_Controller {

    public function __construct()
    {
      parent::__construct();        
    }
    public function index()
    {
     	$this->load->view('tempconvert/index');
    }
    public function convert()
    {   
    	echo 'hrererer';
    	die();	
     	// echo $type = $this->input->post('ctype');
     	// echo '<br>';
     	// echo $temp = $this->input->post('temp');
     	// die();
     	// $client = new SoapClient('https://www.w3schools.com/webservices/tempconvert.asmx?WSDL');
     	// echo '<pre>';
     	// print_r($client);
     	// die();
    }

}