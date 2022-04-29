<?php require APPROOT . '/views/includes/header.php';
?>

<div class="container mt-5">
    <?php
        if (!empty($data['msg'])) {
            echo    
            '<div class="alert alert-danger" role="alert">'
                . $data['msg'] .
            '</div>';
        }
    ?>
</div>

<section class="vh-100" style="background-color: #FFFFFF;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="https://images.pexels.com/photos/1868475/pexels-photo-1868475.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="login form" style="    border-radius: 1rem 0 0 1rem; object-fit: cover;   width: 100%; height: 100%;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form  method="post" action="">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Shufflewear</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="username" name="username"class="form-control form-control-lg" />
                                        <label class="form-label" for="username">Username</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="pass" name="pass"class="form-control form-control-lg" />
                                        <label class="form-label" for="pass">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="code" name="code"class="form-control form-control-lg" />
                                        <label class="form-label" for="code">2FA</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                          <button class="btn btn-dark btn-lg btn-block" type="submit" name="login">Login</button>   
                                    </div>

                                    <a class="small text-muted" href="#!">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="/Shufflewear/Login/register" style="color: #393f81;">Register here</a></p>
                                    <a href="#!" class="small text-muted">Terms of use.</a>
                                    <a href="#!" class="small text-muted">Privacy policy</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/includes/footer.php';
?>