<?php require APPROOT . '/views/includes/header.php';
?>
    <div class="container">
        <h1 class="display-1">Wishlist</h1>

        <?php
            if (isset($data['error'])) {
                echo 
                    '<div class="alert alert-danger" role="alert">'.
                        $data['error'].'
                    </div>';
            }
        ?>

        <table  class="table table-bordered">
        <tr>
            <td>Item</td>
            <td>Name</td>
            <td>Price</td>
            <td>Available</td>
            <td>Size</td>
            <td colspan="2" class="text-center">Actions</td>
        </tr>

        <?php
            foreach($data["wishlist"] as $item){
                echo "<tr>";
                echo '<td><div class="d-flex justify-content-center"><img src="' . URLROOT . '/public/img/' . $item->img . '" width="120"></div></td>';
                echo "<td>$item->itemName</td>";
                echo "<td >$$item->price</td>";
                echo "<td>$item->quantity</td>";
                echo "<td>$item->size</td>";
                echo "<td>
                <a href='/Shufflewear/Wishlist/delete/$item->wishlistId'>Remove</a>
                </td>";
                echo"<td>
                <a href='/Shufflewear/Wishlist/moveToCart/$item->wishlistId'>Move to Cart</a>
                </td>";
                echo"</tr>";

            }
        ?>
    </table>

    </div>

<?php require APPROOT . '/views/includes/footer.php';
?>