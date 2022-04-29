<?php 
    require APPROOT . '/views/includes/header.php';
    //$item = $data['item'];
    $listInfo = $data['listInfo'];
    //print_r($listInfo);
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card text-black">
                    <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                    <?php echo '<img src="' . URLROOT . '/public/img/' . $listInfo->img . '" class="card-img-top" alt="Apple Computer"/>'; ?>
                    <div class="card-body">
                        <div class="text-center">
                            <?php echo '<h5 class="card-title">' . $listInfo->itemName . '</h5>';
                            echo '<p class="text-muted mb-4">' . $listInfo->description . '</p>';
                            ?>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Quantity</span><span>' . $listInfo->quantity . '</span>' ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Price</span><span>' . sprintf('$%.2F', $listInfo->price) . '</span>' ?>
                            </div>
                        </div>

                        <form action='' method='post'>
                            <div class="form-group mb-5">
                                <label for="sizes">Size</label>
                                <select class="form-control" id="sizes" name="size" <?php if ($item->quantity == 0) {echo 'disabled'; } ?>>
                                    <option>X-small</option>
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                    <option>X-Large</option>
                                </select>

                                <label for="quantity">Amount</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="<?php echo $listInfo->quantity; ?>"<?php if ($listInfo->quantity == 0) {echo 'disabled'; } ?>>
                                
                            </div>
                        
                            <div class="pt-1 mb-2">
                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="cart" <?php if ($listInfo->quantity == 0) {echo 'disabled'; } ?> >Add to cart</button>
                            </div>
                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="wishlist">Add to wishlist</button>
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