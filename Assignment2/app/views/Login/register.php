<?php require APPROOT . '/views/includes/header.php'; 
?>

<form class="vh-100" method="post" action="" style="background-color: #FFFFFF ;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Register</h3>

            <div class="form-outline mb-4">
              <input type="text" id="username" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_error'])) ? 'is-invalid' : ''; ?>" placeholder="Username" />
              <label class="form-label" for="username">Username</label>
              <span class="invalid-feedback"><?php echo $data['username_error']; ?> </span>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_len_error'])) ? 'is-invalid' : ''; ?>" placeholder="Password" />
              <label class="form-label" for="password">Password</label>
              <span class="invalid-feedback"><?php echo $data['password_len_error']; ?> </span>
            </div>
            <div class="form-outline mb-4">
              <input type="password" id="passwordconfirm" name="passwordconfirm" class="form-control form-control-lg <?php echo (!empty($data['password_match_error'])) ? 'is-invalid' : ''; ?>" placeholder="Password" />
              <label class="form-label" for="passwordconfirm">Confirm Password</label>
              <span class="invalid-feedback"><?php echo $data['password_match_error']; ?> </span>
            </div>
            <div class="form-outline mb-4">
                <button type="submit" name="signup" class="btn btn-primary">Sign up</button>
            </div>
            
            <?php
                if(!empty($data['msg'])){
                    echo '<div class="alert alert-danger" role="alert">'.
                        $data['msg'].'
                    </div>';
                }
            ?>

            <div class="container">
                <a href='/Assignment2/Login/index'>Already have an account?</a>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
  
</form>



<?php require APPROOT . '/views/includes/footer.php'; ?>