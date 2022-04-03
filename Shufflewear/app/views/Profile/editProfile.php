<?php require APPROOT . '/views/includes/header.php';
?>

<form method='post' action=''style="width: 75%; position:center; margin:auto; margin-top:5%;"  enctype="multipart/form-data" >
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo $data->username?>">
  </div>
  <div class="form-group">
    <label for="firstName">First Name</label>
    <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name" value="<?php echo $data->firstName?>">
  </div>
  <div class="form-group">
    <label for="lastName">LastName</label>
    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" value="<?php echo $data->lastName?>">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $data->email?>">
  </div>
  <div class="form-group">
    <label for="img">Profile Picture</label>
    <input type="file" name="img" class="form-control-file" id="img" value="<?php echo $data->img?>">
  </div>

  <div class="pt-1 mb-4">
    <button class="btn btn-dark btn-lg btn-block" type="submit" name="edit">Edit Profile</button>
  </div>

</form>


<?php require APPROOT . '/views/includes/footer.php';
?>