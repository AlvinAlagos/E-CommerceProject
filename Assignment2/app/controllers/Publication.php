<?php
    class Publication extends Controller{

        public function __construct()
        {
            $this->publicationModel = $this->model('publicationModel');
            $this->profileModel = $this->model('profileModel');
        }

        public function index(){
            $this->view('Home/home');
        }

        //get the publication, using get (html url)
        public function getPublication($publicationId) {
            $data = [
                "publication" => $this->publicationModel->getPublication($publicationId)
            ];

            $this->view('Publication/publication', $data);
        }

        public function createPublication() {
            if(!isset($_POST['createPublication'])){
                $this->view('Publication/createPublication');
            }
            else {
                //getting profile from author id
                $profile = $this->profileModel->getAuthorProfile($_SESSION['author_id']);
                $profileId = $profile->profile_id;

                $status = trim($_POST['status']);
                if ($status != 1) {
                    $status = 0;
                }

                $data = [
                    'title' => trim($_POST['title']),
                    'profile_id' => $profileId,
                    'text' => trim($_POST['text']),
                    'status' => $status
                ];

                if ($this->publicationModel->createPublication($data)) {
                    echo 'Publishing...';
                    echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Home">';
                }
            }

        }
    }
?>