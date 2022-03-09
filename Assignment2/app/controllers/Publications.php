<?php
    class Publications extends Controller{

        public function __construct()
        {
            
        }

        public function index(){
            $this->view('Publication/publications');
        }
    }

?>