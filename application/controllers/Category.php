<?php

	class Category extends CI_Controller{

		public function index(){

			$this->load->model('CategoryModel','cm');
			$data['categorydata']=$this->cm->list_category();
			$data['page']="Category/list_category.php";
			$this->load->view("template",$data);
		}

// ADD NEW Category

		public function add_category(){
			echo $sub_catid=$this->input->post('main_catid');
			echo $cat_name=$this->input->post('cat_name');

			if(!empty($_POST['cat_name'])){
			
			$this->load->model('CategoryModel','cm');
			$this->cm->add_main_category($cat_name,$sub_catid);
			$this->session->set_flashdata('CatSuccess','<p class="alert alert-success">Category ADDED Success...<p>');

			}else{
				$this->session->set_flashdata('Catnotsuccess','<p class="alert alert-danger">Category NOT ADDED try again...<p>');
			}
			
			redirect("Category/index");


		}

//Remove Category Here

		public function remove_catgory(){

				$cat_id=$this->uri->segment(3);
				$this->load->model('CategoryModel','cm');
				if($this->cm->remove_category($cat_id))
				{	
					$this->session->set_flashdata('CatRmSuccess','<p class="alert alert-success">Category Remove Success...<p>');
					redirect("Category/index");
				}



		}

// edit category here

		public function edit_category(){


			 $cat_id=$this->uri->segment(3);
			 $this->load->model('CategoryModel','cm');
			 $data['categorydata']=$this->cm->fetch_category($cat_id);

			
			$data['page']="Category/edit_category";
			$this->load->view("template",$data);

		}


		public function update_catrgory(){

			print_r($_POST);
		}




	}




?>