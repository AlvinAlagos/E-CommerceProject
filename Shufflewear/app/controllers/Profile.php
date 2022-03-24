<?php

class Profile extends Controller{

    public function __construct()
    {
        $this->loginModel = $this->model('loginModel');
    }

    public function index(){
        
        $data =[
            "user" => $this->loginModel->getUser($_SESSION['user_username'])
        ];

        $this->view('Profile/index', $data);
        
    }

    public function registerSeller(){

        if(!isset($_POST['seller'])){
            $this->view('Profile/index');
        }
        else{
            echo 'Success!';
        }
    }
}

