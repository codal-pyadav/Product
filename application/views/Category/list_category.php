 <div id="container">
        <!-- insert the page content here -->
        <h1>List Of All Categorys</h1>

        <div class="container" style="marker-start: 100px;">
<?php

if ($addcat_msg = $this->session->flashdata('CatSuccess')) {

    echo $addcat_msg;
}
if ($addnotcat_msg = $this->session->flashdata('Catnotsuccess')) {

    echo $addnotcat_msg;
}

if ($CatRmSuccess = $this->session->flashdata('CatRmSuccess')) {

    echo $CatRmSuccess;
}

?>
        </div>

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Category</button>

        <table class="table">
        	<thead>
        		<tr>
        			<td>ID</td>
        			<td>Parent Category </td>
        			<td>SUB Category</td>
        			<td>Actions</td>
        		</tr>
        	</thead>
<?php

foreach ($categorydata as $cat_rows) {?>
        		<tr>
        			<td><?php echo $cat_rows->cat_id; ?></td>
        			<td><?php echo $cat_rows->cat_name; ?></td>
        			<td><?php echo $cat_rows->cat_parent; ?></td>
        			<td><a style="text-decoration: none;" class="btn btn-primary" href="<?php echo base_url("index.php/Category/edit_category/$cat_rows->cat_id"); ?>">EDIT</a> &nbsp &nbsp
        			 	<a style="text-decoration: none;"  class="btn btn-danger confirmation" href="<?php echo base_url("index.php/Category/remove_catgory/$cat_rows->cat_id"); ?>">REMOVE</a> </td>
        		</tr>

<?php }

?>


        </table>
        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">ADD New Category </h2>
      </div>
      <div class="modal-body">
        <form method="post" action="add_category">

        	<div class="form-group">
        	<select class="form-control" name="main_catid">
        		<option value="">Select Parent Category</option>
<?php
foreach ($categorydata as $cat_rows) {?>
        			<option value="<?php echo $cat_rows->cat_id; ?>">
        				<?php echo $cat_rows->cat_name; ?>
        			</option>

<?php }

?>


        	</select>
        	</div>
        	<div class="form-group">
        		<input type="name" name="cat_name" class="form-control" placeholder="ADD Catehory">
        	</div>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" >ADD</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>

      </div>

    <script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure you want to remove Category?');
    });
</script>
