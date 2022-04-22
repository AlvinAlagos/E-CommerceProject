<?php require APPROOT . '/views/includes/header.php';
?>

<!-- <div class="container" style="width: 100%; height: 100%; margin-left:0; margin-right:-10px;"> -->
<div class="filter-bar" style="width: 15%; height:100%; float:left; border-right: 2px solid black;">
</div>

<div class="right-side" style="width: 85%; height:100%; float:left;">

    <div class="container" style="margin-top: 5%;">
        <div class="row row-cols-3"> 
            <?php //change the $listing->itemId to listing id, ill put a really long line here to remember ok pls tyty <3 aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                //also check if there are any listings set
                foreach($data['listing'] as $listing) {
                    echo '<div class="col mb-5 text-center" style="height: 350px;">
                            <a href="/Shufflewear/Shop/description/'. $listing->itemId . '"><img src="' . URLROOT . '/public/img/' . $listing->img . '" width="60%" style="object-fit: contain; height: 300px; border: 1px solid rgb(200,200,200); background-color: rgb(245,245,245);"></a>
                            <h4 class="mt-3">'. $listing->itemName .'</h4>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>  
</div> 

<?php require APPROOT . '/views/includes/footer.php';
?>