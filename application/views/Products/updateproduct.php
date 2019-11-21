<h1>Update Product Details</h1>



	


<form method="post" action="<?php echo base_url("index.php/Product/update_products"); ?>" enctype="multipart/form-data">

	<input type="hidden" name="p_id" value="<?php echo $product->p_id; ?>">
	<div class="form-group">
		<select class="form-control" name="cat_id">
			<option value="<?php echo $catgory->cat_id; ?>"><?php echo $catgory->cat_name; ?></option>

			<?php

			foreach ($allcategory as $catdd) { ?>
				<option value="<?php echo $catdd->cat_id; ?>"><?php echo $catdd->cat_name; ?></option>
			<?php	}

			?>
		</select>
		<?php echo form_error('cat_id'); ?>
	</div>

	<div class="form-group">
		<input type="text" name="p_name" class="form-control" value="<?php echo $product->p_name; ?>" placeholder="Enter Product Name">
		<?php echo form_error('p_name'); ?>
		</div>

	<div class="form-group">
	
		<textarea class="form-control" name="p_desc" rows="5" id="comment"   placeholder="Enter Product Description"><?php echo $product->p_desc; ?>
		</textarea>
		<?php echo form_error('p_desc'); ?>
	</div>


	<div class="form-group">
		<input type="file" name="myfile" class="form-control">
	</div>

	<input type="submit" name="" class="btn btn-primary">


</form>
