<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 class="text-center" style="margin-top: 50px;">User Login</h1>

<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6" style="margin-top: 40px; padding: 40px 40px; border: 1px solid #666; border-radius: 5px; box-shadow: 0.5px 0.5px 3px 5px;">
	<?php 
		if($userError=$this->session->flashdata('invalideUser')){

			echo $userError;

		}

	 ?>
		<form method="post" action="<?php echo base_url('index.php/User/loginUser');  ?>">
			<div class="form-group">
				<input type="text" name="userName" value="<?php echo set_value('userName') ?>" class="form-control" placeholder="User Name"> 
				<span class="text-danger"><?php echo form_error('userName'); ?></span>
			</div>
			<div class="form-group">
				<input type="password" name="userPass"    class="form-control" placeholder="Password"> 
				<span class="text-danger"><?php echo form_error('userPass'); ?></span>
			</div>

			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary" value="Login"> 
				<a href="<?php echo base_url("index.php/User/forgetPassword"); ?>"> &nbsp &nbsp Forget Password</a> &nbsp &nbsp/ <a href="#"> &nbsp &nbsp Registration</a>
			</div>
			
		</form>
	</div>
	<div class="col-sm-3"></div>
</div>

	
</div>



</body>
</html>