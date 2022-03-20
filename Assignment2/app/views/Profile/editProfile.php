<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="container"> 
        <h1>Edit Profile</h1>

        <form action='' method='post' enctype="multipart/form-data">
            <div class="form-outline mb-3">
              <label class="form-label" for="fname">First Name</label>
              <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" value="<?php echo $data->first_name; ?>" />
            </div>

            <div class="form-outline mb-3">
              <label class="form-label" for="mname">Middle Name</label>
              <input type="text" id="mname" name="mname" class="form-control" placeholder="Middle Name" value="<?php echo $data->middle_name; ?>" />
            </div>

            <div class="form-outline mb-5">
              <label class="form-label" for="lname">Last Name</label>
              <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $data->last_name; ?>" />
            </div> 

            <button type="submit" name='editProfile' class="btn btn-primary">Submit Changes</button>
        </form>
    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>