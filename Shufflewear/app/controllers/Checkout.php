<?php

class Checkout extends Controller{

    public function __construct()
    {
            $this->cartModel = $this->model('cartModel');
            $this->loginModel = $this->model('loginmodel');
            $this->listingModel = $this->model('listingModel');
            $this->itemModel = $this->model('itemModel');
            $this->purchaseModel = $this->model('purchaseModel');
    }
    public function index()
    {
        $user = [
            'userId' => $_SESSION["user_id"]
        ];

        if(!isset($_POST['payment'])){
            $data = [
                'cart' => $this->cartModel->getCartItems($user),
                'user' => $this->loginModel->getUser($_SESSION['user_username'])
            ];

            $this->view('Checkout/index', $data);
            
        }else{
            $data = [
                'cart' => $this->cartModel->getCartItems($user),
                'user' => $this->loginModel->getUser($_SESSION['user_username']),
                'address' => trim($_POST['address']),
                'number' => trim($_POST['number']),
                'cardNumber' => trim($_POST['cardNumber']),
                'cardName' => trim($_POST['cardName']),
                'expDate' => trim($_POST['expDate']),
                'code' => trim($_POST['code']),
                'address_error' => '',
                'number_error' => '',
                'cardNumber_error' => '',
                'cardName_error' => '',
                'expDate_error' => '',
                'code_error' => ''
            ];

            if($this->validateData($data)){
                $user = [
                    'userId' => $_SESSION['user_id']
                ];
                $items = [
                    'cart' => $this->cartModel->getCartItems($user)
                ];
               
                foreach($items['cart'] as $item){
                    $listingQuantity = $this->listingModel->getQuantity($item->itemId);
                    $updatedQuantity = $listingQuantity->quantity - $item->cart_quantity;
                    $info = [
                        'itemId' => $item->itemId,
                        'userId' => $_SESSION['user_id'],
                        'date' => date('Y/m/d'),
                        'quantity' => $item->cart_quantity,
                        'updatedQuantity' =>$updatedQuantity
                    ];

                    $this->purchaseModel->addPurchase($info);
                    $this->listingModel->updateQuantity($info);
                }
                
                $this->cartModel->clearUserCart($_SESSION['user_id']);
                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Checkout/succesfulPayment">';
            }
        }
    }

    public function succesfulPayment(){
        $this->view('Checkout/Success');
    }

    public function validateData($data){
        if(empty($data['address'])){
            $data['address_error'] = 'Address can not be empty';
        } 
        if(empty($data['number'])){
            $data['number_error'] = 'Phone Number can not be empty';
        }
        if(empty($data['cardNumber'])){
            $data['cardNumber_error'] = 'Card Number can not be empty';
        }
        if(empty($data['cardName'])){
            $data['cardName_error'] = 'Cardholder can not be empty';
        }
        if(empty($data['expDate'])){
            $data['expDate_error'] = 'Exipration Date can not be empty';
        }
        if(empty($data['code'])){
            $data['code_error'] = 'CVV code can not be empty';
        }

        if(empty($data['address_error']) && 
                empty($data['number_error']) && 
                empty($data['cardNumber_error']) && 
                empty($data['cardName_error']) && 
                empty($data['expDate_error']) && 
                empty($data['code_error']))
        {
            return true;
        }
        else {
            $this->view('Checkout/index', $data);
        }
    }

    
}

?>