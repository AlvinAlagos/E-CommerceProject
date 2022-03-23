<?php

class Login extends Controller
{

    public function __construct()
    {
        $this->loginModel = $this->model('loginModel');
    }

    public function index()
    {
        if (!isset($_POST['login'])) {
            $this->view('Login/index');
        } else {
            $user = $this->loginModel->getUser($_POST['username']);
            if (!$user == null) {
                $hashed_pass = $user->password_hash;
                $password = $_POST['pass'];
                
                if (password_verify($password, $hashed_pass)) {
                    $this->createSession($user);

                    echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Home/">';
                } else {
                    echo 'Do not match ' .$hashed_pass;
                }
            }
        }
    }
 

    public function register()
    {

        if (!isset($_POST['signup'])) {
            $this->view('Login/register');
        } else {
            $user = $this->loginModel->getuser($_POST['username']);
            if ($user == null) {
                $data = [
                    'username' => trim($_POST['username']),
                    'password_hash' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
                    'firstname' => trim($_POST['firstname']),
                    'lastname' => trim($_POST['lastname']),
                    'email' => trim($_POST['email']),
                ];

                if ($this->loginModel->createUser($data)) {
                    echo 'Please wait creating the account for ' . trim($_POST['username']);
                    echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Login/">';
                }
            } else {
                $data = [
                    'msg' => "User " . $_POST['username'] . " already exists!",
                ];

                $this->view('Login/register', $data);
            }
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_username']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url=/Shufflewear/">';
    }

    public function createSession($user){
        $_SESSION['user_id'] = $user->userId;
        $_SESSION['user_username'] = $user->username;
    }
}

?>