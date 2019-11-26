 <div id="container">
        <!-- insert the page content here -->
        <h1>EDIT Category Data</h1>
    <form method="get" action="abc.php">

            <div class="form-group">
           <input type="hidden" name="cat_id" value="<?php echo $categorydata->cat_id; ?>">
            </div>
            <div class="form-group">
                <input type="name" name="cat_name" value="<?php echo $categorydata->cat_name; ?>" class="form-control" placeholder="ADD Catehory">
            </div>

      </div>

      <button type="submit" class="btn btn-primary" >Update</button>

      </div>
    </div>
</form>







  </div>
</div>

      </div>

