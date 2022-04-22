<?php require APPROOT . '/views/includes/header.php';
?>

<!-- <div class="container" style="width: 100%; height: 100%; margin-left:0; margin-right:-10px;"> -->
<div class="filter-bar" style="width: 15%; height:100%; float:left; border-right: 2px solid black;">
</div>

<div class="right-side" style="width: 85%; height:100%; float:left;">
    
    <div class="container">
        <?php //dont forget to add the link in the thing later
            if (isset($data['auction'])) {
                foreach($data['auction'] as $auction){
                    echo 
                    '<div style="border-bottom: 1px solid rgb(240,240,240);">
                        <div class="my-5" style="height: 250px;">
                            <div style="width: 30%; float: left; ">
                                <a href="/Shufflewear/Auction/description/' . $auction->auctionId . '">
                                    <img src="' . URLROOT . '/public/img/' . '624ba6a19eaa2.jpg' . '" style="object-fit: cover; height: 100%; border: 1px solid rgb(200,200,200); background-color: rgb(245,245,245);">
                                </a>
                            </div>

                            <div style="width: 70%; float: right;">
                            aaaa
                            </div>
                        </div>
                    </div>';
                }
            }
        ?>
    </div>
</div>


<?php require APPROOT . '/views/includes/footer.php';
?>