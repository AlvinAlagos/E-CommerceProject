<?php require APPROOT . '/views/includes/header.php';
    $total = 0;
    $user = $data['user'];
?>
<form method="post" action="">
  <div class="row" style="width:70%; margin-left:auto; margin-right:auto; margin-top: 5%;">
  <div class="col-md-8 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Biling details</h5>
      </div>
      <div class="card-body">
        
          <!-- 2 column grid layout with text inputs for the first and last names -->
          
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <h6>Name</h6>
                <label class="form-label" for="form7Example1"><?php echo $user->firstName . " " . $user->lastName;?></label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <h6>Email</h6>
                <label class="form-label" for="form7Example2"><?php echo $user->email;?></label>
              </div>
            </div>
          </div>
        
          <!-- Text input -->
          <div class="form-outline mb-4">
            <input type="text" id="address" class="form-control" />
            <label class="form-label" for="address">Address</label>
          </div>

          <!-- Number input -->
          <div class="form-outline mb-4">
            <input type="number" id="number" class="form-control" />
            <label class="form-label" for="number">Phone Number</label>
          </div>

          <h5 style="border-bottom: 1px solid black;">Payment Method</h5>
          <div class="form-outline mb-4">
            <input type="text" id="cardNumber" class="form-control" />
            <label class="form-label" for="cardNumber">Card Number</label>
          </div>

          <div class="form-outline mb-4">
            <input type="text" id="cardName" class="form-control" />
            <label class="form-label" for="cardName">Name on card</label>
          </div>

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" id="expDate" class="form-control" />
                <label class="form-label" for="expDate">Exp. Date</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" id="code" class="form-control" />
                <label class="form-label" for="code">Security code</label>
              </div>
            </div>
          </div>

        
      </div>
    </div>

  </div>

  <!-- Right side -->
  <div class="col-md-4 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Summary</h5>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
            <?php
            foreach($data["cart"] as $items){
                echo ' <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                 ' . $items->itemName . '
                <span>'. $items->price  . 'x' . $items->quantity . '</span>
              </li>';

              $total+=$items->price * $items->quantity;
            }
         
            ?>
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
            <div>
              <strong>Total amount</strong>
              <strong>
                <p class="mb-0">(including VAT)</p>
              </strong>
            </div>
            <span><strong><?php echo $total;?></strong></span>
          </li>
        </ul>

        <button type="submit" id="checkout" class="btn btn-primary btn-lg btn-block">
          Make purchase
        </button>
      </div>
    </div>
  </div>

  
</div>
</form>
<?php require APPROOT . '/views/includes/footer.php';
?>