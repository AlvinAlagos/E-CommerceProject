<?php require APPROOT . '/views/includes/header.php';
?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Piece</th>
      <th scope="col">Color</th>
      <th scope="col">Randomize</th>
    </tr>
  </thead>

  <?php
    if ($data != null) {
        $color1 = $data[0];
        $color2 = $data[1];
        $color3 = $data[2];
    }
  ?>
    
  <tbody>
    <tr>
      <th scope="row">Top</th>
      <td><div style="width:65px; height:65px; background-color:<?php echo $color1->hex; ?>"></div></td>
      <td>
        <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault1">
        <label class="form-check-label" for="flexCheckDefault">
            Keep Color
        </label>
      </td>
    </tr>
    <tr>
      <th scope="row">Bottom</th>
      <td><div style="width:65px; height:65px; background-color:<?php echo $color2->hex; ?>"></div></td>
      <td>
        <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault2">
        <label class="form-check-label" for="flexCheckDefault">
            Keep Color
        </label>
      </td>
    </tr>
    <tr>
      <th scope="row">Shoes</th>
      <td><div style="width:65px; height:65px; background-color:<?php echo $color3->hex; ?>"></div></td>
      <td>
        <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault3" name="checkbox3">
        <label class="form-check-label" for="flexCheckDefault">
            Keep Color
        </label>
      </td>
    </tr>
  </tbody>
</table>



</div>

<?php require APPROOT . '/views/includes/footer.php';
?>