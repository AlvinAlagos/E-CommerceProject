<?php require APPROOT . '/views/includes/header.php';
?>
<!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>
        .cascading-right {
            margin-right: -50px;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }
    </style>

    <!-- Jumbotron -->
    <div class="container py-4">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card cascading-right" style="
                   background: hsla(0, 0%, 100%, 0.55);
                   backdrop-filter: blur(30px);
                   ">
                    <div class="card-body p-5 shadow-5 text-center">
                        <h2 class="fw-bold mb-5">Sign up now</h2>
                        <form  method="post"  action="">

                            <div class="form-outline mb-4 ">
                                <input type="text" id="username" name="username" class="form-control <?php echo (!empty($data['username_error'])) ? 'is-invalid' : ''; ?>" />
                                <label class="form-label" for="username">Username</label>
                                <span class="invalid-feedback" role="alert"><?php echo $data['username_error']; ?></span>
                            </div>

                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="firstname" name="firstname"class="form-control <?php echo (!empty($data['firstName_error'])) ? 'is-invalid' : ''; ?>" />
                                        <label class="form-label" for="firstname">First name</label>
                                        <span class="invalid-feedback" role="alert"><?php echo $data['firstName_error']; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="lastname" name="lastname" class="form-control <?php echo (!empty($data['lastName_error'])) ? 'is-invalid' : ''; ?>" />
                                        <label class="form-label" for="lastname">Last name</label>
                                        <span class="invalid-feedback" role="alert"><?php echo $data['lastName_error']; ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" />
                                <label class="form-label" for="email">Email address</label>
                                <span class="invalid-feedback" role="alert"><?php echo $data['email_error']; ?></span>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="pass" name="pass" class="form-control  <?php echo (!empty($data['password_len_error'])) ? 'is-invalid' : ''; ?>">
                                <label class="form-label" for="pass">Password</label>
                                <span class="invalid-feedback" role="alert"><?php echo $data['password_len_error']; ?></span>
                            </div>
                            
                            <!-- Submit button -->
                            <button type="submit" name='signup' class="btn btn-primary btn-block mb-4">
                                Sign up
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="https://images.pexels.com/photos/1868471/pexels-photo-1868471.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="w-100 rounded-4 shadow-4" alt=""/>
            </div>
        </div>

        <?php
            if (!empty($data['msg'])) {
                echo '<div class="alert alert-danger mt-5" role="alert">'.
                    $data['msg'].'
                </div>';
            }
        ?>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->



<?php require APPROOT . '/views/includes/footer.php';
?>