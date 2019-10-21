<?php
class TempConvert extends CI_Controller {

    public function __construct()
    {
      parent::__construct();        
      $this->load->helper('url_helper');
    }
    public function index()
    {
     	$this->load->view('tempconvert/index');
    }
    public function convert()
    {
      $type = $this->input->post('ctype');
      $temp = $this->input->post('temp');
      
      $client = new SoapClient('https://www.w3schools.com/xml/tempconvert.asmx?WSDL');
      //$client = new SoapClient('https://www.w3schools.com/xml/tempconvert.asmx?WSDL',array('abc' => 'abc'));

      echo '<pre>';
      print_r($client);
      die();

      if($type=='ctof')
      {
          $data['result']=$client->CelsiusToFahrenheit(array('Celsius' => $temp))->CelsiusToFahrenheitResult;
          $this->load->view('tempconvert/index',$data);
      }
      else{
          $data['result']=$client->FahrenheitToCelsius(array('Fahrenheit' => $temp))->FahrenheitToCelsiusResult;
          $this->load->view('tempconvert/index',$data);
      }

    }
    public function convert_dmv()
    {

      $data = array('FIRST-PARTNER-ID' => '',
                    'REG-PLATE-NUMBER' => '',
                    'SECOND-PARTNER-ID' => '',
                    'TN-DATE' => '');
      $client = new SoapClient('https://158.96.135.35:9443/VirtualClerk/services/RegistrationServices?wsdl');

  
      $data = $client->RetrievePriorTransactionRequest($data)->CelsiusToFahrenheitResult;
      print_r($data);
      die();
    }


}