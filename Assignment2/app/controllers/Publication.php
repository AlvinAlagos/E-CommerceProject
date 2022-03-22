<?php
    class Publication extends Controller{

        public function __construct()
        {
            $this->publicationModel = $this->model('publicationModel');
            $this->commentModel = $this->model('commentModel');
        }

        public function index(){
            header('Location: /Assignment2/Home');
        }

        public function getPublication($publicationId) {
            $publication = $this->publicationModel->getPublication($publicationId);

            //make sure publication is public, if not then check if user is writer 
            //(writer can see if private, but not anyone else)
            if ($publication->publication_status == 1 || $publication->profile_id == $_SESSION['profile_id']) {
                $data = [
                    "publication" => $publication,
                    "comments" => $this->commentModel->getCommentsByPublication($publicationId)
                ];
    
                $this->view('Publication/publication', $data);
            }
            else {
                echo 'Unable to access publication.';
                echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Home">';
            }
        }

        public function createPublication() {
            accountCreationRedirect();
            
            if(!isset($_POST['createPublication'])){
                $this->view('Publication/createPublication');
            }
            else {
                if (isset($_POST['status'])) {
                    $status = $_POST['status'];
                }
                else {
                    $status = '0';
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

        public function editPublication($publicationId) {
            $publication = $this->publicationModel->getPublication($publicationId);
            
            //verify if same user
            if ($publication->profile_id != $_SESSION['profile_id']) {
                echo 'Unable to access publication.';
                echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Home">';
            }
            elseif(!isset($_POST['editPublication'])){
                $this->view('Publication/editPublication', $publication);
            }
            else {
                if (isset($_POST['status'])) {
                    $status = $_POST['status'];
                }
                else {
                    $status = '0';
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
                    echo '<meta http-equiv="Refresh" content="0.5; url=/Assignment2/Publication/getPublication/'.$publicationId.'">';
                }
            }
        }

        public function makePublicationPublic($publicationId) {
            $publication = $this->publicationModel->getPublication($publicationId);

            //verify if same user
            if ($publication->profile_id != $_SESSION['profile_id']) {
                echo 'Unable to access publication.';
                echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Home">';
            }
            else {
                $data = [
                    'title' => $publication->publication_title,
                    'text' => $publication->publication_text,
                    'timestamp' => $publication->timestamp,
                    'status' => '1',
                    'profile_id' => $_SESSION['profile_id'],
                    'publication_id' => $publicationId
                ];
    
                if ($this->publicationModel->editPublication($data)) {
                    echo '<meta http-equiv="Refresh" content="0.5; url=/Assignment2/Publication/getPublication/'.$publicationId.'">';
                }
            }
        }

        public function makePublicationPrivate($publicationId) {
            $publication = $this->publicationModel->getPublication($publicationId);

            //verify if same user
            if ($publication->profile_id != $_SESSION['profile_id']) {
                echo 'Unable to access publication.';
                echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Home">';
            }
            else { 
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
                    echo '<meta http-equiv="Refresh" content="0.5; url=/Assignment2/Publication/getPublication/'.$publicationId.'">';
                }
            }
        }

        public function deletePublication($publicationId) {
            $publication = $this->publicationModel->getPublication($publicationId);

            //verify if same user
            if ($publication->profile_id != $_SESSION['profile_id']) {
                echo 'Unable to access publication.';
                echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Home">';
            }
            elseif ($this->publicationModel->deletePublication($publicationId)) {
                echo '<meta http-equiv="Refresh" content="0.5; url=/Assignment2/Profile">';
            }
        }
    }
?>