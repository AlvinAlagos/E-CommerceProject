<?php

class Auction extends Controller{

    public function __construct()
    {
        $this->auctionModel = $this->model('auctionModel');
    }

    public function index()
    {
        $data =[
            'auctions' => $this->auctionModel->getAllAuctions()
        ];

        $this->view('Auction/auction');
    }

    public function addToAuction($itemId) {
        if (!isset($_POST['auction'])) {
            $this->view('Profile/addToAuction');
        }
        else {
            $data = [
                'startingBid' => trim($_POST['startingBid']),
                'currentBid' => 0, //no bids have been made
                'buyNowPrice' => trim($_POST['buyNowPrice']),
                'startDate' => trim($_POST['startDate']),
                'endDate' => trim($_POST['endDate']),
                'itemId' => trim($itemId)
            ];

            //var_dump($data);
            if ($this->auctionModel->addToAuction($data)) {
                echo 'Your item has been put on auction successfully!';

                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Profile/">';
            }
        }
    }

    public function updateAuction($auctionId) {
        $auction = $this->auctionModel->getAuction($auctionId);

        if (!isset($_POST['updateAuction'])) {
            $this->view('Profile/updateAuction', $auction);
        }
        else {
            $data = [
                'auctionId' => $auctionId,
                'startingBid' => trim($_POST['startingBid']),
                'currentBid' => $auction->currentBid, //seller cannot adjust current bid
                'buyNowPrice' => trim($_POST['buyNowPrice']),
                'startDate' => trim($_POST['startDate']),
                'endDate' => trim($_POST['endDate']),
                'currentBidder' => $auction->currentBidder, //cannot change bidder
                'itemId' => $auction->itemId //item must stay the same to avoid fraud
            ];

            //var_dump($data);
            if ($this->auctionModel->updateAuction($data)) {
                echo 'Your item has been put on auction successfully!';

                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Profile/">';
            }
        }
    }

    public function deleteAuction($auctionId) {
        if ($this->auctionModel->deleteAuction($auctionId)) {
            echo 'Your auction has been deleted successfully!';

            echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Profile/">';
        }
    }
}

?>