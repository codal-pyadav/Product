	<?php


	class User extends CI_Controller{

		public function index()
		{
			$this->load->view('loginView');
		}

		private function checkLogin() 
		{
			if (isset($_SESSION['userName']))
			{

			} else {
				edirect(base_url()."index.php/User/index");
			}
		}

		public function loginUser(){
			if (isset($_SESSION['userName']))
			{
				redirect(base_url()."index.php/Product/index");
			}

			if (isset ($_REQUEST['submit']) && $_REQUEST['submit']=='Login')
			{
				$this->form_validation->set_rules('userName','User Name','required');
				$this->form_validation->set_rules('userPass','Password','required');
				if ($this->form_validation->run())
				{
					$userName=$this->input->post('userName');
					$userPass=$this->input->post('userPass');

					$this->load->model('UserModel','um');
					if ($this->um->loginUser($userName,$userPass))
					{		
						$this->session->set_userdata('userName',$userName);
						redirect(base_url()."index.php/Product/index");

					} else {
						$this->session->set_flashdata('invalideUser','<div class="text-danger" style="margin-top:20px; margin-bottom:20px;">Invailde User Name & Password Try Again</div>');
						$this->load->view('loginView');
					}
				} else {
					$this->load->view('loginView');
				}					
			}
		}
		public function userLogout()
		{
			$this->session->unset_userdata('userName');
     		$this->session->sess_destroy();
     		$this->load->view('loginView');
		}
		public function forgetPassword() 
		{
			$this->load->view('forgetpassword');
		}

		public function checkEmail()
		{
			if (isset($_POST['submit']))
			{

				$this->form_validation->set_rules('uEmail','Email ID','required|valid_email');

				if ($this->form_validation->run())
				{
					
					$uEmail=$this->input->post('uEmail');
					$this->load->model("UserModel",'um');
					if ($this->um->checkEmailValid($uEmail))
					{
						$upassword=$this->um->fatchLastPassword($uEmail);

							echo $upassword->upassword;

							$this->load->library('email');
							$this->email->from('yadav.yadav.pankaj@gmail.com', 'Identification');
							$this->email->to('pyadav@codal.com');
							$this->email->subject('OLD Password Is Here');
							$this->email->message('Here Is Your Last Password : $upassword->upassword');
							$this->email->send();

							echo "mail send here";
					} else {
						$this->session->set_flashdata("emailWrong",'<p>Email Id is not Exist </p>');
						$this->load->view('forgetpassword');

					}

				} else {

					$this->load->view('forgetpassword');
				}

			}

		}

		public function userRegistration()
		{

			$this->load->view('registration');
		}

		public function regValidation()
		{
			$this->form_validation->set_rules('userName', 'User Name', 'required');
			$this->form_validation->set_rules('userFName', 'First Name', 'required');
			$this->form_validation->set_rules('userLName', 'Last Name', 'required');
			$this->form_validation->set_rules('userEmail', 'Email ID', 'required');
			$this->form_validation->set_rules('userPass', 'Password', 'required');
			$this->form_validation->set_rules('userCPass', 'Conf-Password', 'required');


			if ($this->form_validation->run()) 
			{
				$userName = $this->input->post('userName');
				$userFName = $this->input->post('userFName');
				$userLName = $this->input->post('userLName');
				$userPass = $this->input->post('userPass');
				$userEmail = $this->input->post('userEmail');
				echo $userImg=$_FILES['userImg']['name'];
				if (isset($_FILES['userImg']['tmp_name'])) 
				{
					
					echo $userImg = $_FILES['userImg']['name'];
					
					$data = array (
						'uname' => $userName,
						'upassword' => $userPass,
						'uemail' => $userEmail,
						'ufname' => $userFName,
						'ulname' => $userLName,
						'uimage' => $userImg
					);

					move_uploaded_file($_FILES["userImg"]["tmp_name"], "./upload/".$userImg);
					$this->load->model('UserModel', 'um');
					$this->um->userRegistered($data);
					$this->session->set_flashdata("regSuccess", "User Registered Successful, Login here with your User Name & Password");
					redirect( base_url('index.php/User/index'));

				}else{

					$this->session->set_flashdata("errorImg", 'Image Not Uploaded');
					$this->load->view('registration');
					

				}

			} else {
				$this->session->set_flashdata("errorImg", 'Image Not Uploaded');
				
				$this->load->view('registration');
				

			}
			


		}

	}


	?>