<?php require APPROOT . '/views/includes/header.php';
?>

<form method='post' action=''style="width: 75%; position:center; margin:auto; margin-top:5%;"  enctype="multipart/form-data" >
  <div class="form-group">
    <label for="itemName">Item Name</label>
    <input type="text" name="itemName" class="form-control" id="itemName" placeholder="Item Name">
  </div>
  <div class="form-group">
    <label for="quantity">Color</label>
    <input type="text" class="form-control" name="color" id="color" placeholder="Color">
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="img">Item Image</label>
    <input type="file" name="img" class="form-control-file" id="img">
  </div>

  <div class="pt-1 mb-4">
    <button class="btn btn-dark btn-lg btn-block" type="submit" name="add">Add Item</button>
  </div>

</form>

<?php require APPROOT . '/views/includes/footer.php';
?>