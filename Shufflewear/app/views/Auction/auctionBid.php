<?php 
    require APPROOT . '/views/includes/header.php';

    $auction = $data['auction'];

    $available = (date('Y-m-d') <= $auction->endDate && $auction->currentBid != $auction->buyNowPrice);
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card text-black">
                    <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                    <?php echo '<img src="' . URLROOT . '/public/img/' . $auction->img . '" class="card-img-top" alt="Apple Computer"/>'; ?>
                    <div class="card-body">
                        <div class="text-center">
                            <?php echo '<h5 class="card-title">' . $auction->itemName . '</h5>';
                            echo '<p class="text-muted mb-4">' . $auction->description . '</p>';
                            ?>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Ending Date</span><span>' . $auction->endDate . '</span>' ?>
                            </div>

                            <?php if ($auction->currentBid == 0) { ?>
                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Starting At</span><span>$' . sprintf('%.2F', $auction->startingBid) . '</span>' ?>
                            </div>

                            <?php } else { ?>

                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Current Bid</span><span>$' . sprintf('%.2F', $auction->currentBid) . '</span>' ?>
                            </div>

                            <?php } ?>

                            <div class="d-flex justify-content-between">
                                <?php echo '<span>Buy Now</span><span>$' . sprintf('%.2F', $auction->buyNowPrice) . '</span>' ?>
                            </div>
                        </div>

                        <form action='' method='post'>
                            <div class="form-group mb-5">
                                <!-- ENTER BID -->
                                <label for="newBid">Enter Bid</label>
                                <input type="number" class="form-control" id="newBid" name="newBid" step="0.01" 
                                    value="<?php if ($available) { echo ($auction->currentBid != 0) ? sprintf('%.2F', $auction->currentBid + 0.01) : sprintf('%.2F', $auction->startingBid); } ?>" 
                                    min="<?php echo ($auction->currentBid != 0) ? ($auction->currentBid + 0.01) : $auction->startingBid; ?>" 
                                    max="<?php $auction->buyNowPrice ?>" <?php if (!$available) {echo 'disabled'; } ?>>
                            </div>
                        
                            <div class="pt-1 mb-2">
                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="bid" <?php if (!$available) {echo 'disabled'; } ?> >Bid</button>
                            </div>
                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="buyNow" <?php if (!$available) {echo 'disabled'; } ?> >Buy Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
    require APPROOT . '/views/includes/footer.php';
?>