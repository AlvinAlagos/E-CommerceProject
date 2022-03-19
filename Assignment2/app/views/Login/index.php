<?php require APPROOT . '/views/includes/header.php'; ?>

<form class="vh-100" method="post" action="" style="background-color: #FFFFFF ;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username" />
              <label class="form-label" for="username">Username</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
              <label class="form-label" for="password">Password</label>
            </div>
            <div class="form-outline mb-4">
                <button type="submit" name="login" class="btn btn-primary">Sign in</button>
            </div>
            <div class="container">
                <a href='/Assignment2/Login/register'>Don't have an account?</a>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
  
</form>



<?php require APPROOT . '/views/includes/footer.php'; ?>