<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Profile.css">
<?php require APPROOT . '/views/includes/header.php';
?>

<form method="post" action="">
    <div class="padding">
        <div class="col-md-8">
            <!-- Column -->
            <div class="card"> <img class="card-img-top" src="https://i.imgur.com/K7A78We.jpg" alt="Card image cap">
                <div class="card-body little-profile text-center">
                    <?php
                    $user = $data['user'];

                    echo '<div class="pro-img"> <img src="https://i.imgur.com/8RKXAIV.jpg" alt="user"></div>';
                    echo "<h3 class= m-b-0> $user->firstName $user->lastName </h3>";
                    echo "<h3 class= m-b-0> $user->email </h3>";
                    ?>

                    <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Edit</a>
                    <div class="row text-center m-t-20">
                        <div class="col-lg-4 col-md-4 m-t-20">
                            <h3 class="m-b-0 font-light">0</h3><small>Items</small>
                        </div>
                        <div class="col-lg-4 col-md-4 m-t-20">

                        </div>
                        <div class="col-lg-4 col-md-4 m-t-20">
                            <!-- Button trigger modal -->
                            <button href="/Shufflewear/Profile/registerSeller"type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Become a seller
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="button" class="btn btn-primary" name="seller">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require APPROOT . '/views/includes/footer.php';
?>