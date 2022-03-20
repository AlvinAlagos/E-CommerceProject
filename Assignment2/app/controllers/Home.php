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

    public function searchPublication() {
        if (isset($_POST['searchTitle'])) {
            $search = $_POST['search'];

            $publications = $this->publicationModel->searchPublicationTitle($search);

            $data = [
                "publications" => $publications,
                "filter" => "Titles similar to $search"
            ];

            $this->view('Home/searchPublication', $data);
        }
        elseif (isset($_POST['searchContent'])) {

        }
        elseif (isset($_POST['searchAuthor'])) {

        }
        else {
            $publications = $this->publicationModel->getPublications();

            $data = [
                "publications" => $publications,
                "filter" => 'All publications'
            ];

            $this->view('Home/searchPublication', $data);
        }
    }
}