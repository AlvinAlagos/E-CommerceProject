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
            if (!isset($_SESSION['profile_id'])) {
                header('Location: /Assignment2/Profile/create');
            }
            else {
                if(!isset($_POST['createPublication'])){
                    $this->view('Publication/createPublication');
                }
                else {
                    //getting profile from author id
                    $status = trim($_POST['status']);
                    if ($status != 1) {
                        $status = 0;
                    }
    
                    $data = [
                        'title' => trim($_POST['title']),
                        'profile_id' => $_SESSION['profile_id'],
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

        public function editPublication($publicationId) {
            $publication = $this->publicationModel->getPublication($publicationId);
            
            if(!isset($_POST['editPublication'])){
                $this->view('Publication/editPublication', $publication);
            }
            else {
                $status = trim($_POST['status']);
                if ($status != 1) {
                    $status = 0;
                }

                $data = [
                    'title' => trim($_POST['title']),
                    'text' => trim($_POST['text']),
                    'timestamp' => $publication->timestamp,
                    'status' => $status,
                    'profile_id' => $_SESSION['profile_id'],
                    'publication_id' => $publicationId
                ];

                if ($this->publicationModel->editPublication($data)) {
                    echo 'Editing publication...';
                    echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Profile">';
                }
            }
        }

        public function deletePublication($publicationId) {
            if ($this->publicationModel->deletePublication($publicationId)) {
                echo '<meta http-equiv="Refresh" content="0.5; url=/Assignment2/Profile">';
            }
        }

        public function makePublicationPublic($publicationId) {
            $publication = $this->publicationModel->getPublication($publicationId);
            $data = [
                'title' => $publication->publication_title,
                'text' => $publication->publication_text,
                'timestamp' => $publication->timestamp,
                'status' => '1',
                'profile_id' => $_SESSION['profile_id'],
                'publication_id' => $publicationId
            ];

            if ($this->publicationModel->editPublication($data)) {
                echo '<meta http-equiv="Refresh" content="0.5; url=/Assignment2/Profile">';
            }
        }

        public function makePublicationPrivate($publicationId) {
            $publication = $this->publicationModel->getPublication($publicationId);
            $data = [
                'title' => $publication->publication_title,
                'text' => $publication->publication_text,
                'timestamp' => $publication->timestamp,
                'status' => '0',
                'profile_id' => $_SESSION['profile_id'],
                'publication_id' => $publicationId
            ];

            if ($this->publicationModel->editPublication($data)) {
                echo '<meta http-equiv="Refresh" content="0.5; url=/Assignment2/Profile">';
            }
        }
    }
?>