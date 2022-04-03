<?php require APPROOT . '/views/includes/header.php';
?>

<div class="form-group" style="width: 75%; position:center; margin:auto; margin-top:5%;">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3"><?php echo $data->description?></textarea>
    <a href="/Shufflewear/Profile/index" class="m-t-10 waves-effect waves-dark btn btn-dark btn-md btn-rounded" data-abc="true" style="margin-top: 10px;" >Back</a>
  </div>

<?php require APPROOT . '/views/includes/footer.php';
?>