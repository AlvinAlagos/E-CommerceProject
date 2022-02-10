<?php
class Timeline extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('Timeline/timeline');
    }
}