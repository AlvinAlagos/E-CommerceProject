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
}

?>