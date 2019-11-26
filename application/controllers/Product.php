<?php

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("ProductModel", 'pm');
        $this->load->library("pagination");
    }

    private function checkLogin()
    {
        if (isset($_SESSION['userName'])) {

        } else {
            redirect(base_url() . "index.php/User/index");
        }
    }

    public function index()
    {
        $this->checkLogin();

        $config = array();
        $config["base_url"] = base_url() . "index.php/Product/index/";
        $config["total_rows"] = $this->pm->get_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();

        $data['products'] = $this->pm->list_product($config["per_page"], $page);

        //$data['products']=$this->pm->list_product();
        $data['page'] = 'Products/listproduct';
        $this->load->view('template', $data);
    }

    public function add_product()
    {
        $this->checkLogin();
        $this->load->model('CategoryModel', 'cm');
        $data['catdata'] = $this->cm->list_category();
        $data['page'] = 'Products/addproduct';
        $this->load->view('template', $data);
    } //end of add product

    public function verification_product()
    {
        $this->checkLogin();
        $this->form_validation->set_rules('cat_id', 'Category Name', 'required');
        $this->form_validation->set_rules('p_name', 'Product Name', 'required');
        $this->form_validation->set_rules('p_desc', 'Product Description', 'required');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        if ($this->form_validation->run()) {
            $cat_id = $this->input->post('cat_id');
            $p_name = $this->input->post('p_name');
            $p_desc = $this->input->post('p_desc');
            $data = array(
                'p_name' => $p_name,
                'p_desc' => $p_desc,
                'cat_id' => $cat_id);

            $this->load->model("ProductModel", 'pm');
            if ($this->pm->add_product($data)) {
                redirect('Product/index');
            }
        } else {
            $this->add_product();
        }
    } //end of verification product

    public function remove_product()
    {
        $this->checkLogin();
        $p_id = $this->uri->segment(3);
        $this->load->model("ProductModel", 'pm');

        if ($this->pm->remove_product($p_id)) {
            $this->index();
        } else {
            echo "try again";
        }
    } //end of remove product

    public function update_product()
    {
        $this->checkLogin();
        echo $p_id = $this->uri->segment(3);
        echo $cat_id = $this->uri->segment(4);
        $this->load->model("ProductModel", 'pm');

        $data['product'] = $this->pm->single_product($p_id);
        $data['catgory'] = $this->pm->single_category($cat_id);
        $this->load->model('CategoryModel', 'cm');
        $data['allcategory'] = $this->cm->list_category();

        $data['page'] = 'Products/updateproduct';
        $this->load->view('template', $data);
    } //end of update product in db

    public function update_products()
    {
        $this->checkLogin();
        $p_id = $this->input->post('p_id');
        $cat_id = $this->input->post('cat_id');
        $p_name = $this->input->post('p_name');
        $p_desc = $this->input->post('p_desc');
        $data = array(
            'p_name' => $p_name,
            'p_desc' => $p_desc,
            'cat_id' => $cat_id,
        );

        $this->load->model("ProductModel", 'pm');
        $this->pm->Updatedetails($p_id, $data);
        $this->index();
    } //end of verification update product

} //end of  Product class
