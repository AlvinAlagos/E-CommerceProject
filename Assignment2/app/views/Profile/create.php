<?php require APPROOT . '/views/includes/header.php'; 
?>

<form class="vh-100" method="post" action="" style="background-color: #FFFFFF ;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Create Profile</h3>

            <div class="form-outline mb-4">
              <input type="text" id="fname" name="fname" class="form-control form-control-lg <?php echo (!empty($data['fname_error'])) ? 'is-invalid' : ''; ?>" placeholder="First Name" />
              <label class="form-label" for="fname">First Name</label>
              <span class="invalid-feedback"><?php echo $data['fname_error']; ?> </span>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="mname" name="mname" class="form-control form-control-lg" placeholder="Middle Name" />
              <label class="form-label" for="mname">Middle Name</label>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="lname" name="lname" class="form-control form-control-lg <?php echo (!empty($data['lname_error'])) ? 'is-invalid' : ''; ?>" placeholder="Last Name" />
              <label class="form-label" for="lname">Last Name</label>
              <span class="invalid-feedback"><?php echo $data['lname_error']; ?> </span>
            </div>

            <div class="form-outline mb-4">
                <button type="submit" name="createProfile" class="btn btn-primary">Create Profile</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<?php require APPROOT . '/views/includes/footer.php'; ?>