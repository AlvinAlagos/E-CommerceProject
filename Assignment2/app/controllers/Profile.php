<?php
    class Profile extends Controller{

        public function __construct()
        {
            //profile, publication, comment model
            $this->profileModel = $this->model('profileModel');
            $this->publicationModel = $this->model('publicationModel');
            $this->commentModel = $this->model('commentModel');
        }

        public function index(){
            accountCreationRedirect();
            //send over the data with publications comments and profile
            $data = [
                "profile" => $this->profileModel->getProfile($_SESSION['profile_id']),
                "publications" => $this->publicationModel->getPublicationsByProfile($_SESSION['profile_id']),
                "comments" => $this->commentModel->getCommentsByProfile($_SESSION['profile_id'])
            ];

            $this->view('Profile/index', $data);
        }

        public function create() {
            if(!isset($_POST['createProfile'])){
                $this->view('Profile/create');
            }
            else {
                $data = [
                    'authorId' => $_SESSION['author_id'],
                    'firstname' => trim($_POST['fname']),
                    'middlename' => trim($_POST['mname']),
                    'lastname' => trim($_POST['lname']),
                    'fname_error' => '',
                    'lname_error' => ''
                ];
                if ($this->validate($data)) {
                    $this->view('Profile/create', $data);
                }
                else {
                    if ($this->profileModel->createProfile($data)) {
                        echo 'Please wait creating profile for '.trim($_SESSION['user_username']);
                        $this->updateSession();
                        echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Profile/index">';
                    }
                }
            }
        }

        public function editProfile() {
            $profile = $this->profileModel->getProfile($_SESSION['profile_id']);

            if(!isset($_POST['editProfile'])){
                $this->view('Profile/editProfile', $profile);
            }
            else {
                $data = [
                    'profileId' => $_SESSION['profile_id'],
                    'authorId' => $_SESSION['author_id'],
                    'firstname' => trim($_POST['fname']),
                    'middlename' => trim($_POST['mname']),
                    'lastname' => trim($_POST['lname']),
                    'fname_error' => '',
                    'lname_error' => ''
                ];
                if ($this->validate($data)) {
                    $this->view('Profile/editProfile', $data);
                }
                else {
                    if ($this->profileModel->editProfile($data)) {
                        echo 'Updating profile for '.trim($_SESSION['user_username']);
                        echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Profile/index">';
                    }
                }
            }
        }

        public function validate($data) {
            if (empty($data['firstname'])) {
                $data['fname_error'] = 'First name cannot be empty!';
            }
            if (empty($data['lastname'])) {
                $data['lname_error'] = 'Last name cannot be empty!';
            }
    
            if (empty($data['fname_error']) && empty($data['lname_error'])) {
                return true;
            }
            
            return false;
        }

        public function updateSession() {
            $profile = $this->profileModel->getAuthorProfile($_SESSION['author_id']);
            $_SESSION['profile_id'] = $profile->profile_id;
        }
    }
?>