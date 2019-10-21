<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CommanModel extends CI_Model{
	
	public function fetchdata($table,$field1="",$val1="",$field2="",$val2=""){
		
		if($field1!="" && $val1!=""){
			$array=array($field1=>$val1);
			$this->db->where($array);
		}
		if($field1!="" && $val1!="" && $field2!="" && $val2!=""){
			$array=array($field1=>$val1,$field2=>$val2);
			$this->db->where($array);
		}
		$this->db->select('*');
		$query = $this->db->get($table);
		 return $query->result_array();
		
	}
	
	public function insertdata($table,$array=array()){
		$this->db->insert($table,$array);
		return $this->db->insert_id();
	}
	
	public function updatedata($table,$field,$val,$array=array()){
		
		$this->db->where($field,$val);
		if($this->db->update($table,$array)){
			return true;
		}else{
			return false;
		}
	}
	public function deletedata($table,$field,$val){
		$this->db->where($field, $val);
		$this->db->delete($table);
	}
	
	
}