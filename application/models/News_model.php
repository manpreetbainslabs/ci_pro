<?php
class News_model extends CI_Model {

	public function __construct(){
					$this->load->database();
	}

	public function get_news($slug = FALSE){
		if ($slug === FALSE)
		{
						$query = $this->db->get('news');
						return $query->result_array();
		}
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}
	public function set_news($img)
	{

		$this->load->helper('url');
		$img_url = '';
		if(!empty($img)){
			$img_url = '/ci_pro/uploads/'.$img['file_name'];
		}
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
		$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text'),
				'img_url' => $img_url
		);
		return $this->db->insert('news', $data);
	}
	public function api_set_news($data)
	{
		$title = $data['Title'];
		$Description = $data['Description'];
		$slug = url_title($title, 'dash', TRUE);
		$save_data = array(
				'title' => $title,
				'slug' => $slug,
				'text' => $Description,
				'img_url' => ''
		);
		if($this->db->insert('news', $save_data)){
			return json_encode(array('status' => True,
															'title' => $title,
															'slug' => $slug));
		}else{
			return json_encode(array('status' => False,));
		}
	}
}