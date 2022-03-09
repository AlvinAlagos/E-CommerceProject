<?php
    class Register extends Controller{

        public function __construct()
        {
            
        }

        public function index(){
            $this->view('Profile/register');
        }
    }
?>