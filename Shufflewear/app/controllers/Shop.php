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
        $data =[
            "listing" => $this->listingModel->getAllItems()
        ];

        $this->view('Clothes/shop', $data);
    }

    public function description($itemId){
        if ((isset($_POST['cart']) || isset($_POST['wishlist'])) && !isset($_SESSION['user_id'])) {
            header('Location: /Shufflewear/Login/index');
        }

        if (isset($_POST['cart'])){
            $data = [
                'itemId' => $itemId,
                'userId' => $_SESSION['user_id'],
                'size' => $_POST['size'],           //only include if putting size in cart, then check quantity of all
                'quantity' => $_POST['quantity']
            ];

            if ($this->cartModel->addToCart($data)) {
                echo '<meta http-equiv="Refresh" content="0.5; url=/Shufflewear/Cart">';
            }
        }
        elseif (isset($_POST['wishlist'])){
            $data = [
                'itemId' => $itemId,
                'userId' => $_SESSION['user_id']
            ];

            if ($this->wishlistModel->addToWishlist($data)) {
                echo '<meta http-equiv="Refresh" content="0.5; url=/Shufflewear/Wishlist">';
            }
        }
        else {
            $data = [
                'item' => $this->itemModel->getItem($itemId),
                'listInfo' => $this->listingModel->getItem($itemId)
            ];
            
            $this->view('Clothes/itemDescription', $data);
        }
    }
}
?>  