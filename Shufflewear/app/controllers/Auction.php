<?php

class Auction extends Controller{

    public function __construct()
    {
        
    }

    public function index()
    {
        $this->view('Auction/auction');
    }
}

?>