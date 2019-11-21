<?php


class ProductModel extends CI_Model{

	public function list_product(){

		$this->db->select('product_table.p_id,product_table.p_name,product_table.p_desc,product_table.cat_id,category.cat_name');
		$this->db->from('product_table');
		$this->db->join('category','category.cat_id=product_table.cat_id');
		$this->db->order_by("p_id",'DESC');
		$res=$this->db->get();

		//$this->db->order_by("p_id", "desc");
		//$res=$this->db->get('product_table');
		return $res->result();
	}

	public function add_product($data){

		if($this->db->insert('product_table',$data)){
			return true;

		}
		return false;
	}


// Remove Product From Prouct Table


	public function remove_product($p_id){

		$this->db->where('p_id',$p_id);
		if($this->db->delete('product_table')){
			return true;
		}else{
			return false;
		}

	}

// Single Product Fetch 

	public function single_product($p_id){

		$this->db->where('p_id',$p_id);
		$res=$this->db->get('product_table')->row();
		return $res;
	}
// Single Category Fetch 

	public function single_category($cat_id){


		$this->db->where('cat_id',$cat_id);
		$res=$this->db->get('category')->row();
		return $res;
	}

// Update Product data Here

	public function Updatedetails($p_id,$data){
		
		print_r($data);

		$this->db->where('p_id',$p_id);
		if($this->db->update('product_table',$data)){
			
		return true;

		}

	}

}




?>