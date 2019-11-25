<?php


class Pages extends CI_Controller{

	public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->model('PageModel');
        $this->load->library("pagination");
    }

	public function index(){

		$config = array();
        $config["base_url"] = base_url() . "index.php/Pages/index/";
        $config["total_rows"] = $this->PageModel->get_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 2;

         $this->pagination->initialize($config);
         $page = ($this->uri->segment(2)) ? $this->uri->segment(3) : 0;
         $data["links"] = $this->pagination->create_links();

        $data['authors'] = $this->PageModel->allProducts($config["per_page"], $page);

		$this->load->view("Dashboard",$data);

	}


}



?>