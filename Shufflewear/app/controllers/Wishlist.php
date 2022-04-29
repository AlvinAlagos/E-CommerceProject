<?php
    class Wishlist extends Controller{

        public function __construct()
        {
            $this->wishlistModel = $this->model('wishlistModel');
            $this->cartModel = $this->model('cartModel');

            if (!isset($_SESSION['user_id'])) {
                header('Location: /Shufflewear/Login/index');
            }
        }

        public function index()
        {
            $user = [
                'userId' => $_SESSION["user_id"]
            ];

            $data = [
                'wishlist' => $this->wishlistModel->getWishlistItems($user)
            ];

            $this->view('Wishlist/index', $data);
        }

        public function delete($wishlistId) {
            $data=[
                'wishlistId' => $wishlistId
            ];
            if($this->wishlistModel->deleteFromWishlist($data)){
                echo 'Removing item from wishlist...';
                echo '<meta http-equiv="Refresh" content="0.5; url=/Shufflewear/wishlist/index">';
            }
        }

        public function moveToCart($wishlistId) {
            $data = [
                'wishlistId' => $wishlistId
            ];

            $wishListItem = $this->wishlistModel->getWishlistItem($data);
            
            if (isset($_POST['move'])) {
                $data = [
                    'itemId' => $wishListItem->itemId,
                    'userId' => $_SESSION['user_id'],
                    'size' => $_POST['size'],
                    'quantity' => $_POST['quantity']
                ];

                if ($this->cartModel->addToCart($data)) {
                    echo 'Adding item to cart from wishlist...';
    
                    $data=[
                        'wishlistId' => $wishlistId
                    ];
    
                    if($this->wishlistModel->deleteFromWishlist($data)){
                        echo 'Removing item from wishlist...';
                        echo '<meta http-equiv="Refresh" content="0.5; url=/Shufflewear/Cart">';
                    }
                }
            }
            else {
                $data = [
                    'wishlistItem' => $wishListItem
                ];
                
                $this->view('Wishlist/moveToCart', $data);
            }
        }
    }
?>