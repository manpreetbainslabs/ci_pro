<?php
class News extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          $this->load->model('news_model');
          $this->load->helper('url_helper');
        }

        public function index()
        {
          $data['news'] = $this->news_model->get_news();
          $data['title'] = 'News archive';
          $this->load->view('templates/header', $data);
          $this->load->view('news/index', $data);
          $this->load->view('templates/footer');          
        }

        public function view($slug = NULL)
        {          
          $data['news_item'] = $this->news_model->get_news($slug);
          if (empty($data['news_item']))
          {
                show_404();
          }
          $data['title'] = $data['news_item']['title'];
          $this->load->view('templates/header', $data);
          $this->load->view('news/view', $data);
          $this->load->view('templates/footer');
        }
        public function create()
        {
          $this->load->helper( 'url','form');
          $this->load->library('form_validation');
          $data['title'] = 'Create a news item';
          $this->form_validation->set_rules('title', 'Title', 'required');
          $this->form_validation->set_rules('text', 'Text', 'required');

          if ($this->form_validation->run() === FALSE)
          {
             $this->load->view('templates/header', $data);
             $this->load->view('news/create');
             $this->load->view('templates/footer');
          }
          else
          {
                $config = array(
                        'upload_path' => "./uploads/",
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => TRUE,
                        'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        'max_height' => "768",
                        'max_width' => "1024"
                );
                $this->load->library('upload', $config);
                $data_img = array();
                if ($this->upload->do_upload('upload')) {
                        $data_img = array('image_metadata' => $this->upload->data());
                }

                $this->news_model->set_news($data_img['image_metadata']);
                $this->load->view('news/success');
          }
        }
        public function api_create_news()
        {
                $user = $_SERVER['PHP_AUTH_USER'];
                $pass = $_SERVER['PHP_AUTH_PW'];
                // $headers = apache_request_headers();
                // print_r($headers);
                if($user == 'developer' && $pass == 'developer@123'){
                        $data = $this->input->post();
                        echo $this->news_model->api_set_news($data);
                        exit;
                }else{
                        echo json_encode(array('status' => False,'Error' => 'Unauthorized User Restrict'));
                        exit;
                }

        }
}