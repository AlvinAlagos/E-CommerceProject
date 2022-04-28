<?php require APPROOT . '/views/includes/header.php';
?>


<div class="container" style="margin-top: 5%;">
    <table class="table table-bordered">
        <tr>
            <td>Item</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Size</td>
            <td colspan="2" class="text-center">Actions</td>
        </tr>

        <?php
        foreach ($data["cart"] as $item) {
            echo "<tr>";
            echo '<td><div class="d-flex justify-content-center" style="height: 130px;"><img src="' . URLROOT . '/public/img/' . $item->img . '" width="120" style="object-fit: contain;"></div></td>';
            echo "<td>$item->itemName</td>";
            echo "<td >$$item->price</td>";
            echo "<td>$item->cart_quantity</td>";
            echo "<td>$item->size</td>";
            echo "<td>
                <a href='/Shufflewear/Cart/delete/$item->cartId'>Remove</a>
                </td>";
            echo "<td>
                <a href='/Shufflewear/Cart/edit/$item->cartId'>Edit</a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<?php require APPROOT . '/views/includes/footer.php';
?>