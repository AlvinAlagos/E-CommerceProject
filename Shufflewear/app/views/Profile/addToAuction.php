<?php require APPROOT . '/views/includes/header.php';
?>

<form method='post' action=''style="width: 75%; position:center; margin:auto; margin-top:5%;"  enctype="multipart/form-data" >
  
    <div class="form-group">
        <label for="startingBid">Starting Bid</label>
        <input type="number" step="0.01" class="form-control" name="startingBid" id="startingBid" placeholder="0.00">
    </div>

    <div class="form-group">
        <label for="buyNowPrice">Buy Now Price</label>
        <input type="number" step="0.01" class="form-control" name="buyNowPrice" id="buyNowPrice" placeholder="0.00">
    </div>

    <div class="form-group">
        <label for="startDate">Starting Date</label>
        <input type="date" name="startDate" class="form-control" id="startDate">
    </div>
    
    <div class="form-group">
        <label for="endDate">Ending Date</label>
        <input type="date" name="endDate" class="form-control" id="endDate">
    </div>

    <div class="pt-1 mb-4">
        <button class="btn btn-dark btn-lg btn-block" type="submit" name="auction">Auction Item</button>
    </div>
</form>


<?php require APPROOT . '/views/includes/footer.php';
?>