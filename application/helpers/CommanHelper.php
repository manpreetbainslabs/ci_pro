<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('getadminbyid')){
	
    function getadminbyid($id){
       $CI = get_instance();
       $CI->load->model('CommanModel');
       return $CI->CommanModel->fetchdata('config_user_data','user_id',$id);
    }   
}

// if(!function_exists('getcontentbyid')){
    // function getcontentbyid($id){
       // $CI = get_instance();
       // $CI->load->model('CommanModel');
       // return $CI->CommanModel->fetchdata('config_content_data','c_id',$id);
    // }   
// }

