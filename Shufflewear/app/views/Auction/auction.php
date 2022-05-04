<?php require APPROOT . '/views/includes/header.php';
?>

<div style="height: 100%">
    <div class="filter-bar" style="width: 15%; height:100%; float:left;">
    </div>

    <div class="right-side" style="width: 85%; height: 100%; float:left; border-left: 2px solid rgba(0, 0, 0, 0.2); ">
        
        <div class="container">
            <?php
                if (isset($data['auctions'])) {
                    $currentDate = date('Y-m-d');

                    foreach($data['auctions'] as $auction){
                        if ($auction->endDate >= $currentDate && $auction->endDate != date("0000-00-00", 0) && $auction->startDate != date("0000-00-00", 0))
                            echo 
                            '<div style="border-bottom: 2px solid rgb(230,230,230);">
                                <div class="my-5" style="height: 250px;">
                                    <div style="width: 30%; float: left; text-align: center;">
                                        <a href="/Shufflewear/Auction/description/' . $auction->auctionId . '">
                                            <img src="' . URLROOT . '/public/img/' . $auction->img . '" style="object-fit: cover; height: 100%; border: 1px solid rgb(200,200,200); background-color: rgb(245,245,245);">
                                        </a>
                                    </div>

                                    <div style="width: 70%; float: right;">
                                        <h3 class="mb-5">
                                            '. $auction->itemName .'
                                        </h3>
                                        <div>
                                                '. ($auction->currentBid == 0 ? 'Starting at: $'. sprintf('%.2F', $auction->startingBid) : 'Current Bid: $'. sprintf('%.2F', $auction->currentBid)) .'
                                        </div>
                                        <div>
                                            Available until: '. $auction->endDate .'
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        
                    }
                }
            ?>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/includes/footer.php';
?>