<?php require APPROOT . '/views/includes/header.php';
?>
    <div class="container">
        <h1 class="display-1">Cart</h1>

        <table  class="table table-bordered">
            <tr>
                <td>Item</td>
                <td>Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Size</td>
                <td colspan="2" class="text-center">Actions</td>
            </tr>

            <?php
                foreach($data["cart"] as $item){
                    echo "<tr>";
                    echo '<td><div class="d-flex justify-content-center" style="height: 130px;"><img src="' . URLROOT . '/public/img/' . $item->img . '" width="120" style="object-fit: contain;"></div></td>';
                    echo "<td>$item->itemName</td>";
                    echo "<td >$$item->price</td>";
                    echo "<td>$item->cart_quantity</td>";
                    echo "<td>$item->size</td>";
                    echo "<td>
                    <a href='/Shufflewear/Cart/delete/$item->cartId'>Remove</a>
                    </td>";
                    echo"<td>
                    <a href='/Shufflewear/Cart/edit/$item->cartId'>Edit</a>
                    </td>";
                    echo"</tr>";

                }
            ?>
        </table>

        <?php
            if (!empty($data['error'])) {
                echo '<div class="alert alert-danger" role="alert">'.
                    $data['error'].'
                </div>';
            }
            else {
                echo '<a href="/Shufflewear/Checkout" class="m-t-10 waves-effect waves-dark btn btn-dark btn-md btn-rounded" data-abc="true" style="float:right;">Checkout</a>';
            }
        ?>
    </div>

<?php require APPROOT . '/views/includes/footer.php';
?>