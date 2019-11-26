 <div id="container">
        <!-- insert the page content here -->
        <h1>User Profile</h1>

        <form method="post" action="<?php echo base_url('index.php/user/userprofileUpdate'); ?>"  enctype="multipart/form-data">

            <input type="hidden" name="uid" value="<?php echo $userData->uid; ?>">
            <div class="form-group">
                <label>User Name</label>
                <input type="text" value="<?php echo $userData->uname; ?>" name="userName" class="form-control">
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" value = "<?php echo $userData->ufname; ?>"  name="userFName" class="form-control">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" value = "<?php echo $userData->ulname; ?>" name="userLName" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" value = "<?php echo $userData->upassword; ?>" name="userPass" class="form-control">
            </div>
            <div class="form-group">
                <label>Email ID</label>
                <input type="text" value = "<?php echo $userData->uemail; ?>" name="userEmail" class="form-control">
            </div>
            <div class="form-group">
            <?php
if (!empty($userData->uimage)) {?>
                    <img width="200" height="250" src="<?php echo base_url(); ?>/upload/<?php echo $userData->uimage; ?>">
                    <a href="<?php echo base_url("index.php/user/removeUserPic/$userData->uid/$userData->uimage"); ?>" class="btn btn-danger">Remove Picture</a>

              <?php } else {

    echo '<label class="text-primary">Profile Pic Not Updated</label>';

}
?>


            </div>
            <div class="form-group">
                <label>Profile Image</label>
                <input type="file" value="" name="userFile" class="form-control">
            </div>
            <input type="submit" name="Update" value="Update Profile" class="btn btn-primary">



        </form>



</div>

