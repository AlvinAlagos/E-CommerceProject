<?php
class Login extends Controller
{
    public function __construct()
    {
        $this->authorModel = $this->model('authorModel');
        $this->profileModel = $this->model('profileModel'); //used to check if author has profile
    }

    public function index()
    {
        if (!isset($_POST['login'])) {
            $this->view('Login/index');
        } 
        else {
            $user = $this->authorModel->getAuthor($_POST['username']);

            if ($user != null) {
                $hashed_pass = $user->password_hash;
                $password = $_POST['password'];
                if (password_verify($password, $hashed_pass)) {
                    $this->createSession($user);

                    echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Home/">';

                } else {
                    $data = ['msg' => "Incorrect password for $user->username.",];
                    $this->view('Login/index', $data);
                }
            } 
            else {
                $data = ['msg' => "User " . $_POST['username'] . " does not exist.",];
                $this->view('Login/index', $data);
            }
        }
    }

    public function register()
    {
        if (!isset($_POST['signup'])) {
            $this->view('Login/register');
        } 
        else {
            $user = $this->authorModel->getAuthor($_POST['username']);
            if($user == null){
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'password_confirm' => $_POST['passwordconfirm'],
                    'password_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'msg' => '',
                    'username_error' => '',
                    'password_match_error' => '',
                    'password_len_error' => ''
                ];

                if ($this->validate($data)) {
                    if($this->authorModel->createAuthor($data)) {
                        echo 'Please wait creating the account for '.trim($_POST['username']);
                        echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Login/">';
                    }
                }
            }
            else {
                $data = [
                    'msg' => "User ". $_POST['username'] ." already exists!",
                ];

                $this->view('Login/register', $data);
            }
        }
    }

    public function validate($data) {
        if (empty($data['username'])) {
            $data['username_error'] = 'Username cannot be empty!';
        }
        if (strlen($data['password']) < 5) {
            $data['password_len_error'] = 'Password has to be at least 5 characters.';
        }
        if ($data['password'] != $data['password_confirm']) {
            $data['password_match_error'] = 'Passwords do not match.';
        }

        if (empty($data['username_error']) && empty($data['password_len_error']) && empty($data['password_match_error'])){
            return true;
        }
        else {
            $this->view('Login/register', $data);
        }
    }

    public function logout() {
        unset($_SESSION['author_id']);
        unset($_SESSION['profile_id']);
        unset($_SESSION['user_username']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url=/Assignment2/">';
    }

    public function createSession($user)
    {
        $_SESSION['author_id'] = $user->author_id;
        $_SESSION['user_username'] = $user->username;

        //set profile id if exists
        $profile = $this->profileModel->getAuthorProfile($user->author_id);
        if ($profile) {
            $_SESSION['profile_id'] = $profile->profile_id;
        }
    }
}
