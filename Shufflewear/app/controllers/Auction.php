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

        $this->view('Auction/auction', $data);
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

    public function description($auctionId) {
        $auction = $this->auctionModel->getAuction($auctionId);

        if (isset($_POST['bid']) || isset($_POST['buyNow'])) {
            if (!isset($_SESSION['user_id'])) {
                header('Location: /Shufflewear/Login/index');
            }

            if (isset($_POST['bid'])) {
                $bid = $_POST['newBid'];
            }
            else {
                $bid = $auction->buyNowPrice;
            }
            
            $data = [
                'auctionId' => $auction->auctionId,
                'startingBid' => $auction->startingBid,
                'currentBid' => $bid,
                'buyNowPrice' => $auction->buyNowPrice,
                'startDate' => $auction->startDate,
                'endDate' => $auction->endDate,
                'currentBidder' => $_SESSION['user_id'],
                'itemId' => $auction->itemId
            ];

            if ($this->auctionModel->updateAuction($data)) {
                echo 'Raising bid to ' . sprintf('%.2F', $bid);
                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Auction/description/'. $auctionId .'">';
            }
        }
        else {
            $data =[
                'auction' => $auction
            ];
    
            $this->view('Auction/auctionBid', $data);
        }
    }

    public function getDetails($auctionId) {
        $auction = $this->auctionModel->getAuction($auctionId);

        $currentDate = date('Y-m-d');
        if ($auction->currentBidder != null && $currentDate > $auction->endDate || $auction->currentBid == $auction->buyNowPrice && $auction->buyNowPrice != 0) {
            $auction = $this->auctionModel->getAuctionWinner($auctionId);
        }
        
        $this->view('Auction/auctionDetails', $auction);
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