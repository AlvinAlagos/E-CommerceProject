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
            $search = $_POST['search'];

            $publications = $this->publicationModel->searchPublicationContent($search);

            $data = [
                "publications" => $publications,
                "filter" => "Content containing $search"
            ];

            $this->view('Home/searchPublication', $data);
        }
        elseif (isset($_POST['searchAuthor'])) {
            $search = $_POST['search'];

            $publications = $this->publicationModel->searchPublicationAuthor($search);

            $data = [
                "publications" => $publications,
                "filter" => "Author similar to $search"
            ];

            $this->view('Home/searchPublication', $data);
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