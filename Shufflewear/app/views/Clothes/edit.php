<?php 
    require APPROOT . '/views/includes/header.php';
    $item = $data['item'];
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card text-black">
                    <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                    <?php echo '<img src="' . URLROOT . '/public/img/' . $item->img . '" class="card-img-top" alt="Apple Computer"/>'; ?>
                    <div class="card-body">
                        <div class="text-center">
                            <?php echo '<h5 class="card-title">' . $item->itemName . '</h5>';
                            echo '<p class="text-muted mb-4">' . $item->description . '</p>';
                            
                            ?>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Quantity</span><span>' . $item->quantity . '</span>' ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Price</span><span>' . sprintf('%.2F', $item->price) . '</span>' ?>
                            </div>
                        </div>

                        <form action='' method='post'>
                            <div class="form-group mb-5">
                                <label for="sizes">Size</label>
                                <select class="form-control" id="sizes" name="size"<?php if ($item->quantity == 0) {echo 'disabled'; } ?>>
                                    <option <?php if ($item->size == "X-small") echo "selected";?>>X-small</option>
                                    <option <?php if ($item->size == "Small") echo "selected";?>>Small</option>
                                    <option <?php if ($item->size == "Medium") echo "selected";?>>Medium</option>
                                    <option <?php if ($item->size == "Large") echo "selected";?>>Large</option>
                                    <option <?php if ($item->size == "X-Large") echo "selected";?>>X-Large</option>
                                </select>

                                <label for="quantity">Amount</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $item->cart_quantity ?>" min="1" max="<?php echo $item->quantity; ?>"<?php if ($item->quantity == 0) {echo 'disabled'; } ?>>
                                
                            </div>
                        
                            <div class="pt-1 mb-2">
                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="update" <?php if ($item->quantity == 0) {echo 'disabled'; } ?> >Update item</button>
                            </div>
                        </form>
                        <?php
                            if (isset($data['error'])) {
                                echo 
                                    '<div class="alert alert-danger" role="alert">'.
                                        $data['error'].'
                                    </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/includes/footer.php';
?>