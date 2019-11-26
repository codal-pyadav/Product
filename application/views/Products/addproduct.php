<h1>ADD New Product</h1>




<form method="post" action="verification_product" enctype="multipart/form-data">
	<div class="form-group">
		<select class="form-control" name="cat_id">
			<option value="">SELECT Category</option>
<?php

foreach ($catdata as $catdd) {?>
				<option value="<?php echo $catdd->cat_id; ?>"><?php echo $catdd->cat_name; ?></option>
<?php	}

?>
		</select>
		<?php echo form_error('cat_id'); ?>
	</div>

	<div class="form-group">
		<input type="text" name="p_name" class="form-control" placeholder="Enter Product Name">
		<?php echo form_error('p_name'); ?>
		</div>

	<div class="form-group">

		<textarea class="form-control" name="p_desc" rows="5" id="comment"  placeholder="Enter Product Description"></textarea>
		<?php echo form_error('p_desc'); ?>
	</div>


	<div class="form-group">
		<input type="file" name="myfile" class="form-control">
	</div>

	<input type="submit" name="" class="btn btn-primary">


</form>
