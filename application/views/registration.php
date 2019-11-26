<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 class="text-center" style="margin-top: 50px;">User Registration</h1>

<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6" style="margin-top: 40px; padding: 40px 40px; border: 1px solid #666; border-radius: 5px; box-shadow: 0.5px 0.5px 3px 5px;">
	<?php
if ($userError = $this->session->flashdata('invalideUser')) {
    echo $userError;
}
?>

		<form method="post" action="<?php echo base_url('index.php/User/regValidation'); ?>" enctype="multipart/form-data">
		<div class="form-group">
				<input type="text" name="userName" value="<?php echo set_value('userName') ?>" class="form-control" placeholder="User Name">
				<span class="text-danger"><?php echo form_error('userName'); ?></span>
			</div>
			<div class="form-group">
				<input type="text" name="userFName" value="<?php echo set_value('userFName') ?>" class="form-control" placeholder="First Name">
				<span class="text-danger"><?php echo form_error('userFName'); ?></span>
			</div>
			<div class="form-group">
				<input type="text" name="userLName" value="<?php echo set_value('userLName') ?>" class="form-control" placeholder="Last Name">
				<span class="text-danger"><?php echo form_error('userLName'); ?></span>
			</div>
			<div class="form-group">
				<input type="email" name="userEmail" value="<?php echo set_value('userEmail') ?>" class="form-control" placeholder="Email ID">
				<span class="text-danger"><?php echo form_error('userEmail'); ?></span>
			</div>
			<div class="form-group">
				<input type="Password" name="userPass" value="<?php echo set_value('userPass') ?>" class="form-control" placeholder="Password">
				<span class="text-danger"><?php echo form_error('userPass'); ?></span>
			</div>
			<div class="form-group">
				<input type="Password" name="userCPass" value="<?php echo set_value('userCPass') ?>" class="form-control" placeholder="Conf-Password">
				<span class="text-danger"><?php echo form_error('userCPass'); ?></span>
			</div>
			<div class="form-group">
				<input type="file" name="userImg"  class="form-control" placeholder="User Image">
				<span class="text-danger">
					<?php
if ($errorImg = $this->session->flashdata('errorImg')) {
    echo $errorImg;
}
?>
				</span>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary" value="Submit">
			</div>

		</form>
	</div>
	<div class="col-sm-3"></div>
</div>


</div>



</body>
</html>