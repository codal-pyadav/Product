<?php

	class UserModel extends CI_Model{

		public function loginUser($uName,$uPassword){

			$this->db->where('uname',$uName);
			$this->db->where('upassword',$uPassword);
			$res=$this->db->get('user_table');
			if($res->num_rows() >= 1){
				return true;
			}else{
				return false;
			}
		}

		public function checkEmailValid($uemail){
			$this->db->where('uemail',$uemail);
			$res=$this->db->get("user_table");

			if($res->num_rows()>=1){
				return true;
			}else{
				return false;
			}

		}

		public function fatchLastPassword($uemail){
			$this->db->where('uemail',$uemail);
			$res=$this->db->get("user_table")->row();
			return $res;

		}


	}

?>