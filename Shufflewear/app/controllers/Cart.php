<?php
    class Cart extends Controller{

        public function __construct()
        {
            $this->cartModel = $this->model('cartModel');
            $this->itemModel = $this->model('itemModel');
            

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
                'cart' => $this->cartModel->getCartItems($user)
            ];

            $this->view('Cart/index', $data);
        }

        public function delete($cartId) {
            $data=[
                'cartId' => $cartId
            ];

            if($this->cartModel->deleteFromCart($data)){
                echo 'Removing item from cart...';
                echo '<meta http-equiv="Refresh" content="0.5; url=/Shufflewear/Cart/index">';
            }
        }

        public function edit($cartId) {
            $data = [
                'cartId' => $cartId
            ];

            $item = $this->cartModel->getCartItem($data);

            if (isset($_POST['update'])){
                $data = [
                    'cartId' => $cartId,
                    'size' => $_POST['size'],
                    'quantity' => $_POST['quantity']
                ];
                
                if ($this->cartModel->editCartItem($data)) {
                    echo 'Updating cart item...';
                    echo '<meta http-equiv="Refresh" content="0.5; url=/Shufflewear/Cart">';
                }
            }
            else {
                $data = [
                    'item' => $this->itemModel->getItem($item->itemId)
                ];
                
                $this->view('Clothes/edit', $data);
            }
        }
    }
?>