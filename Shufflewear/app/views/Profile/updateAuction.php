<?php require APPROOT . '/views/includes/header.php';
?>

<form method='post' action=''style="width: 75%; position:center; margin:auto; margin-top:5%;"  enctype="multipart/form-data" >
    <div class="form-group">
        <label for="quantity">Color</label>
        <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="<?php echo $data->color ?>" disabled>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" disabled><?php echo $data->description?></textarea>
    </div>

    <div class="form-group">
        <label for="startingBid">Starting Bid</label>
        <input type="number" step="0.01" class="form-control" name="startingBid" id="startingBid" placeholder="0.00" value="<?php echo sprintf('%.2F', $data->startingBid) ?>">
    </div>

    <div class="form-group">
        <label for="currentBid">Current Bid</label>
        <input type="number" step="0.01" class="form-control" name="currentBid" id="currentBid" value="<?php echo sprintf('%.2F', $data->currentBid) ?>" disabled>
    </div>

    <div class="form-group">
        <label for="buyNowPrice">Buy Now Price</label>
        <input type="number" step="0.01" class="form-control" name="buyNowPrice" id="buyNowPrice" placeholder="0.00" value="<?php echo sprintf('%.2F', $data->buyNowPrice) ?>">
    </div>

    <div class="form-group">
        <label for="startDate">Starting Date</label>
        <input type="date" name="startDate" class="form-control" id="startDate" value="<?php echo $data->startDate ?>">
    </div>
    
    <div class="form-group">
        <label for="endDate">Ending Date</label>
        <input type="date" name="endDate" class="form-control" id="endDate" value="<?php echo $data->endDate ?>">
    </div>

    <div class="pt-1 mb-4">
        <button class="btn btn-dark btn-lg btn-block" type="submit" name="updateAuction">Update Auction</button>
    </div>
</form>


<?php require APPROOT . '/views/includes/footer.php';
?>