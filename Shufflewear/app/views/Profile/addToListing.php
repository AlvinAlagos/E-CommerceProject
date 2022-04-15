<?php require APPROOT . '/views/includes/header.php';
?>

<form method='post' action=''style="width: 75%; position:center; margin:auto; margin-top:5%;"  enctype="multipart/form-data" >
  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="quantity">
  </div>
  <div class="form-group">
    <label for="price">price</label>
    <input type="text" class="form-control" name="price" id="price" placeholder="Price">
  </div>

  <div class="pt-1 mb-4">
    <button class="btn btn-dark btn-lg btn-block" type="submit" name="list">List Item</button>
  </div>

</form>


<?php require APPROOT . '/views/includes/footer.php';
?>