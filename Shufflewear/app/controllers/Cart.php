<?php
    class Cart extends Controller{

        public function __construct()
        {
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
    }
?>