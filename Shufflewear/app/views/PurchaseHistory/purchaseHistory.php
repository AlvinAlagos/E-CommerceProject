<?php require APPROOT . '/views/includes/header.php';
?>


<div class="container" style="margin-top: 5%;">
    <table class="table table-bordered">
        <tr>
            <td>Item</td>
            <td>Name</td>
            <td>Quantity</td>
            <td>Date</td>
            
        </tr>

        <?php
        foreach ($data["purchase"] as $item) {
            echo "<tr>";
            echo '<td><div class="d-flex justify-content-center" style="height: 130px;"><img src="' . URLROOT . '/public/img/' . $item->img . '" width="120" style="object-fit: contain;"></div></td>';
            echo "<td>$item->itemName</td>";
            echo "<td >$$item->purchase_quantity</td>";
            echo "<td>$item->purchaseDate</td>";
            
        }
        ?>
    </table>
</div>

<?php require APPROOT . '/views/includes/footer.php';
?>