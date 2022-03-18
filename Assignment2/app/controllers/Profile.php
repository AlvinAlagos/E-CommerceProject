<?php
    class Profile extends Controller{

        public function __construct()
        {
            //profile, publication, comment model,
            $this->publicationModel = $this->model('publicationModel');
            $this->profileModel = $this->model('profileModel');
            // $this->commentModel = $this->model('commentModel');
        }

        public function index(){
            //send over the data with publications comments and profile
            $data = [
                //"profile" => $this->profileModel->getProfile($_SESSION['author_id']),
                //"profile" => $this->profileModel->getProfile($_SESSION['author_id']),
                "publications" => $this->publicationModel->getPublications($_SESSION['author_id'])
            ];

            $this->view('Profile/index', $data);
        }
    }
?>