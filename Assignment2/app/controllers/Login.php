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
            // print_r("Hello");

            $user = $this->loginModel->getAuthor($_POST['username']);

            if ($user != null) {
                $hashed_pass = $user->password_hash;
                $password = $_POST['password'];
                if (password_verify($password, $hashed_pass)) {
                    $this->createSession($user);
                    $data = ['msg' => "Welcome, $user->username!",];
                    $this->view('Home/home', $data);
                } else {
                    $data = ['msg' => "Password incorrect! for $user->username",];
                    $this->view('Login/index', $data);
                }
            } else {
                $data = ['msg' => "User: " . $_POST['username'] . " does not exists",];
                $this->view('Login/login', $data);
            }
        }
    }

    public function registerAuthor()
    {
        if (!isset($_POST['signup'])) {
            $this->view('Login/register');
        } else {
               // print_r("Hello");
               $user = $this->loginModel->getAuthor($_POST['username']);
               if($user == null){
               
                   $data = [
                       'username' => trim($_POST['username']),
                       'password_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                   ];

                   if($this->loginModel->registerAuthor($data)){
                    echo 'Please wait creating the account for '.trim($_POST['username']);
                
                   $author = $this->loginModel->getAuthor($_POST['username']);

                   $authorId = $author->author_id;
                    
                   $info = [
                    'authorId' => $authorId,
                    'firstname' => trim($_POST['fname']),
                    'middlename' => trim($_POST['mname']),
                    'lastname' => trim($_POST['lname']),
                    
                ];
                echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Login/">';
                   $this->loginModel->createProfile($info);
                   }
               }
               else{
                $data = [
                    'msg' => "User: ". $_POST['username'] ." already exists",
                ];
                $this->view('Login/register',$data);
            }

           
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url=/Assignment2/">';
    }

    public function createProfile($info)
    {
        $username = $info['username'];
        $authorId = $this->loginModel->getAuthorId($username);
        $this->loginModel->createProfile($info, $username);
    }

    public function createSession($user)
    {
        $_SESSION['user_id'] = $user->author_id;
        $_SESSION['user_username'] = $user->username;
    }
}
