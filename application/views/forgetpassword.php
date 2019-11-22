<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 class="text-center" style="margin-top: 50px;">Find Password</h1>

<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6" style="margin-top: 40px; padding: 40px 40px; border: 1px solid #666; border-radius: 5px; box-shadow: 0.5px 0.5px 3px 5px;">
	<?php 
		if($userError=$this->session->flashdata('emailWrong')){

			echo $userError;
		}

	 ?>
		<form method="post" action="<?php echo base_url('index.php/User/checkEmail');  ?>">
			<div class="form-group">
				<input type="email" name="uEmail" value="<?php echo set_value('uEmail') ?>" class="form-control" placeholder="Email ID"> 
				<span class="text-danger"><?php echo form_error('uEmail'); ?></span>
			</div>
			
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary" value="Send Email"> 
				
			</div>
			
		</form>
	</div>
	<div class="col-sm-3"></div>
</div>

	
</div>



</body>
</html>