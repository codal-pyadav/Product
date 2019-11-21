<h1>
	

	Product List Here
</h1>

<a href="add_product" class="btn btn-primary">ADD NEW Product</a>

<table class="table"> 
	<thead>
		<tr>
			<td>SR NO</td>
			<td>Product Name</td>
			<td>Description</td>
			<td>Category Name</td>
			<td>Actions</td>

		</tr>
	</thead>
	<tbody>
		<?php

			
			foreach ($products as $rowdata) { ?>
			<tr>
				<td><?php echo $rowdata->p_id; ?></td>
				<td><?php echo $rowdata->p_name; ?></td>
				<td><?php echo $rowdata->p_desc; ?></td>
				<td><?php echo $rowdata->cat_name; ?></td>
				<td>
					<a class="btn btn-primary" href="<?php  echo base_url(); ?>index.php/Product/update_product/<?php echo $rowdata->p_id; ?>/<?php echo $rowdata->cat_id; ?>">Edit</a> &nbsp &nbsp
					<a class="btn btn-danger" href="<?php  echo base_url(); ?>index.php/Product/remove_product/<?php echo $rowdata->p_id; ?>">Remove</a>
				</td>
			</tr>


			<?php }

		?>




	</tbody>


</table>

