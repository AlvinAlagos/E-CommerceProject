<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Profile.css">
<?php require APPROOT . '/views/includes/header.php';
?>

<form method="post" action="">
    <div class="padding" style=" margin-left:auto; margin-right:auto;">
        <!-- <div class="col-md-8"> -->
        <!-- Column -->
        <div class="card"> <img class="card-img-top" src="data:image/jpeg;base64,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" alt="Card image cap">
            <div class="card-body little-profile text-center">
                <?php
                $user = $data['user'];

                echo '<div class="pro-img"> <img src="' . URLROOT . '/public/img/' . $user->img . '" alt="user"></div>';
                echo "<h3 class= m-b-0> $user->firstName $user->lastName </h3>";
                echo "<h3 class= m-b-0> $user->email </h3>";
                ?>

                <a href="/Shufflewear/Profile/editProfile" class="m-t-10 waves-effect waves-dark btn btn-dark btn-md btn-rounded" data-abc="true" name="edit">Edit</a>
                <div class="row text-center m-t-20">
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">0</h3><small>Items</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">

                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <?php
                        if (!isSeller()) {
                            echo '<a href="/Shufflewear/Profile/registerSeller " class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Become a seller</a>';
                        } else {
                            echo '<a href="/Shufflewear/Profile/addItem" class="m-t-10 waves-effect waves-dark btn btn-dark btn-md btn-rounded" data-abc="true">Add item</a>';
                            echo '<button type="button" class="m-t-10 waves-effect waves-dark btn btn-dark btn-md btn-rounded btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Dissmis as seller
                          </button>
                          
                          <!-- Modal -->
                          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="deleteModalLabel">Confirm</h5>
                                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p> Are you sure you want to no longer particpate as seller on 
                                  Shufflewear? All items in your inventory will be deleted along with your listed and aunctioned items.</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                  <a href="/Shufflewear/Profile/removeSeller" class="btn btn-primary">Yes</a>
                                </div>
                              </div>
                            </div>
                          </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- </div> -->
    </div>
    </div>
    </div>
</form>

<?php
if (isSeller()) {
?>

<h4 class="text-center">Inventory</h4>
<table class="table table-bordered" style="width: 50%; margin-left:auto; margin-right:auto;">
    <tr>
        <td>Item</td>
        <td>Color</td>
        <td colspan="5" class="text-center"> Actions</td>
    </tr>
    <?php
    if(isset($_SESSION['seller_id'])){

    foreach ($data["inventory"] as $inventory) {
        echo "<tr>";
        echo '<td>
                <div class="d-flex align-items-center"><img class="rounded-circle" src="' . URLROOT . '/public/img/' . $inventory->img . '" width="30"><span class="ml-2">' . $inventory->itemName . '</span></div>
            </td>';

        echo "<td>$inventory->color</td>";
        echo "<td>
                <a href='/Shufflewear/Profile/getDetails/$inventory->itemId'>Details</a>
                </td>";
        echo "<td>
                <a href='/Shufflewear/Profile/updateItem/$inventory->itemId'>Update</a>
                </td>";
        echo "<td>
                <a href='/Shufflewear/Profile/deleteItem/$inventory->itemId'>Delete</a>
                </td>";

        if($inventory->isListed == 0){
            echo "<td>
            <a href='/Shufflewear/Profile/addToListing/$inventory->itemId'> List for sale</a>
            </td>";
        }else{
            echo "<td>
            <a href='/Shufflewear/Profile/removeFromListing/$inventory->itemId'>Remove Item for sale</a>
            </td>";
        }

        echo "<td>
                <a href='/Shufflewear/Auction/addToAuction/$inventory->itemId'>Auction</a>
                </td>";
        echo "</tr>";
        }
    }
    ?>
</table>

<!-- add table for listings -->



<!-- add table for auctions -->
<h4 class="text-center">Auctions</h4>
<table class="table table-bordered" style="width: 50%; margin-left:auto; margin-right:auto;">
    <tr>
        <td>Item</td>
        <td colspan="3" class="text-center"> Actions</td>
    </tr>
    <?php
    if(isset($_SESSION['seller_id'])){

        foreach ($data["auctions"] as $auction) {
            echo "<tr>";
            echo '<td>
                    <div class="d-flex align-items-center"><img class="rounded-circle" src="' . URLROOT . '/public/img/' . $auction->img . '" width="30"><span class="ml-2">' . $auction->itemName . '</span></div>
                </td>';

            echo "<td>
                    <a href='/Shufflewear/Auction/getDetails/$auction->auctionId'>Details</a>
                    </td>";
            echo "<td>
                    <a href='/Shufflewear/Auction/updateAuction/$auction->auctionId'>Update</a>
                    </td>";
            echo "<td>
                    <a href='/Shufflewear/Auction/deleteAuction/$auction->auctionId'>Delete</a>
                    </td>";
        }
    }
    ?>
</table>    



<?php 

}
require APPROOT . '/views/includes/footer.php';
?>