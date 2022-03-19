<?php
    class Profile extends Controller{

        public function __construct()
        {
            //profile, publication, comment mode
            $this->publicationModel = $this->model('publicationModel');
            $this->profileModel = $this->model('profileModel');
            // $this->commentModel = $this->model('commentModel');
        }

        public function index(){
            if (!isset($_SESSION['author_id'])) {
                header('Location: /Assignment2/Login/');
            }
            elseif (!isset($_SESSION['profile_id'])) {
                header('Location: /Assignment2/Profile/create');
            }
            else {
                //send over the data with publications comments and profile
                $data = [
                    //"profile" => $this->profileModel->getProfile($_SESSION['profile_id']),
                    "publications" => $this->publicationModel->getPublicationsByProfile($_SESSION['profile_id'])
                    //"comments" => $this->commentModel->getComments($_SESSION['profile_id']),
                ];

                $this->view('Profile/index', $data);
            }
        }

        public function create() {
            if(!isset($_POST['createProfile'])){
                $this->view('Profile/create');
            }
            else {
                $this->view('Profile/create');

                $data = [
                    'authorId' => $_SESSION['author_id'],
                    'firstname' => trim($_POST['fname']),
                    'middlename' => trim($_POST['mname']),
                    'lastname' => trim($_POST['lname'])
                ];
                
                if ($this->profileModel->createProfile($data)) {
                    echo 'Please wait creating profile for '.trim($_POST['username']);
                    updateSession();
                    echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Profile/index">';
                }
            }
        }

        public function updateSession() {
            $profile = $this->profileModel->getAuthorProfile($_SESSION['author_id']);
            $_SESSION['profile_id'] = $profile->profile_id;
        }
    }
?>