<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->publicationModel = $this->model('publicationModel');
    }

    public function index()
    {
        //if user has not searched for anything
        if( !isset($_POST['searchTitle']) && !isset($_POST['searchContent']) && !isset($_POST['searchAuthor']) ) {
            $publications = $this->publicationModel->getPublications();
            
            $data = [
                "publications" => $publications
            ];

            $this->view('Home/home', $data);
        }
        else {

        }
    }
}