<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->publicationModel = $this->model('publicationModel');
    }

    public function index()
    {
        $publications = $this->publicationModel->getPublications();

        $data = [
            "publications" => $publications
        ];

        $this->view('Home/home', $data);
    }
}