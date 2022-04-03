<?php require APPROOT . '/views/includes/header.php';
?>


<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card text-black">
                    <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                    <?php echo '<img src="' . URLROOT . '/public/img/' . $data->img . '" class="card-img-top" alt="Apple Computer"/>'; ?>
                    <div class="card-body">
                        <div class="text-center">
                            <?php echo '<h5 class="card-title">' . $data->itemName . '</h5>';
                            echo '<p class="text-muted mb-4">' . $data->description . '</p>';
                            ?>
                        </div>

                        <div>
                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Quantity</span><span>' . $data->quantity . '</span>' ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Price</span><span>' . $data->price . '</span>' ?>
                            </div>
                            <div class="form-group">
                                <label for="sizes">Size</label>
                                <select class="form-control" id="sizes" name="size">
                                    <option>X-small</option>
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                    <option>X-Large</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit" name="add">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/includes/footer.php';
?>