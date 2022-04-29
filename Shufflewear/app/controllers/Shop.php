<?php

class Shop extends Controller{

    public function __construct(){
        $this->loginModel = $this->model('loginModel');
        $this->cartModel = $this->model('cartModel');
        $this->wishlistModel = $this->model('wishlistModel');
        $this->itemModel = $this->model('itemModel');
        $this->listingModel = $this->model('listingModel');
    }

    public function index(){
        if(!isset($_POST['filter']) || !isset($_POST['Color'])){
            $data =[
                "listing" => $this->listingModel->getAllItems()
            ];
            $this->view('Clothes/shop', $data);
        }else{
            $color=$_POST['Color'];
            $data =[
                "listing" => $this->listingModel->getAllFilteredItems($color)
            ];

            $this->view('Clothes/shop', $data);
        }
        

    }

    public function description($listingId){
        if ((isset($_POST['cart']) || isset($_POST['wishlist'])) && !isset($_SESSION['user_id'])) {
            header('Location: /Shufflewear/Login/index');
        }

        $listing = $this->listingModel->getListing($listingId);

        if (isset($_POST['cart'])){
            $data = [
                'itemId' => $listing->itemId,
                'userId' => $_SESSION['user_id'],
                'size' => $_POST['size'],
                'quantity' => $_POST['quantity']
            ];

            if ($this->cartModel->addToCart($data)) {
                echo '<meta http-equiv="Refresh" content="0.5; url=/Shufflewear/Cart">';
            }
        }
        elseif (isset($_POST['wishlist'])){
            $data = [
                'itemId' => $listing->itemId,
                'userId' => $_SESSION['user_id']
            ];

            if ($this->wishlistModel->addToWishlist($data)) {
                echo '<meta http-equiv="Refresh" content="0.5; url=/Shufflewear/Wishlist">';
            }
        }
        else {
            $data = [
                'listInfo' => $listing
            ];
            
            $this->view('Clothes/itemDescription', $data);
        }
    }
}
?>  