<?php require APPROOT . '/views/includes/header.php';
?>


<!-- <div class="container" style="width: 100%; height: 100%; margin-left:0; margin-right:-10px;"> -->
<div class="filter-bar" style="width: 15%; height:100%; float:left; border-right: 2px solid black;">
</div>

<div class="right-side" style="width: 85%; height:100%; float:left;">

    <div class="container" style="margin-top: 5%;">
        <div class="row row-cols-3">
            <?php
                foreach($data['inventory'] as $inventory){
                    echo '<div class="col mb-5"><a href="/Shufflewear/Shop/description/'. $inventory->itemId . '"><img src="' . URLROOT . '/public/img/' . $inventory->img . '" width="60%"></a> <h4>'. $inventory->itemName .'</h4>';
                    //echo '<h4>hello</h4>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>  
</div>


<!-- </div> -->





<?php require APPROOT . '/views/includes/footer.php';
?>