<?php

class Shop extends Controller{

    public function __construct(){
        $this->loginModel = $this->model('loginModel');
    }

    public function index(){
       
        $data =[
            "inventory" => $this->loginModel->getAllItems()
        ];

        $this->view('Clothes/shop', $data);
    }

    public function description($itemId){

        $item = $this->loginModel->getItem($itemId);

        
        $this->view('Clothes/itemDescription', $item);
    }


}
?>  