<?php

class Checkout extends Controller{

    public function __construct()
    {
        $this->cartModel = $this->model('cartModel');
            $this->loginModel = $this->model('loginmodel');
            $this->itemModel = $this->model('itemModel');
    }
    public function index()
    {
        $user = [
            'userId' => $_SESSION["user_id"]
        ];

        $data = [
            'cart' => $this->cartModel->getCartItems($user),
            'user' => $this->loginModel->getUser($_SESSION['user_username'])
        ];

      
        $this->view('Checkout/index', $data);
    }

    public function makePayment(){
        if(!isset($_POST['payment'])){
            $this->view('Checkout/index');
        }else{
            $data = [
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
        }
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
       
        else{
            $this->view('Login/create',$data);
        }
    }

    
}

?>