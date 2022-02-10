<?php
class Header extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('includes/header');
    }
}