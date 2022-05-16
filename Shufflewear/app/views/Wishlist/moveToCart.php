<?php 
    require APPROOT . '/views/includes/header.php';
    $wishlistItem = $data['wishlistItem'];
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card text-black">
                    <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                    <?php echo '<img src="' . URLROOT . '/public/img/' . $wishlistItem->img . '" class="card-img-top" alt="Apple Computer"/>'; ?>
                    <div class="card-body">
                        <div class="text-center">
                            <?php echo '<h5 class="card-title">' . $wishlistItem->itemName . '</h5>';
                            echo '<p class="text-muted mb-4">' . $wishlistItem->description . '</p>';
                            ?>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Quantity</span><span>' . $wishlistItem->quantity . '</span>' ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Price</span><span>' . sprintf('%.2F', $wishlistItem->price) . '</span>' ?>
                            </div>
                        </div>

                        <form action='' method='post'>
                            <div class="form-group mb-5">
                                <label for="sizes">Size</label>
                                <select class="form-control" id="sizes" name="size" <?php if ($wishlistItem->quantity == 0) {echo 'disabled'; } ?>>
                                    <option>X-small</option>
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                    <option>X-Large</option>
                                </select>

                                <label for="quantity">Amount</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="<?php echo $wishlistItem->quantity; ?>"<?php if ($wishlistItem->quantity == 0) {echo 'disabled'; } ?>>
                                
                            </div>
                        
                            <div class="pt-1 mb-2">
                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="move" <?php if ($wishlistItem->quantity == 0) {echo 'disabled'; } ?> >Move to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/includes/footer.php';
?>