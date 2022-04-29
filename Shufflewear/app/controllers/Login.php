<?php
    include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
    include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
    include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
    include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

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
        } 
        else {
            $user = $this->loginModel->getUser($_POST['username']);
            
            if (!$user == null) {
                $hashed_pass = $user->password_hash;
                $password = $_POST['pass'];
                $secret = $user->secret;
                $code = $_POST['code'];
                
                if (password_verify($password, $hashed_pass)) {
                    if ($user->secret != null) {
                        if (!empty($code)) {
                            if ($this->check($secret, $code)) {
                                $this->createSession($user);
                                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Home/">';
                            }
                            else {
                                $data = [
                                    'msg' => "Incorrect or expired code."
                                ];
                                $this->view('Login/index', $data); 
                            }
                        }
                        else {
                            $data = [
                                'msg' => "Please enter the 2FA code."
                            ];
                            $this->view('Login/index', $data); 
                        }
                    }
                    else {
                        $this->createSession($user);
                        echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Home/">';
                    }
                } 
                else {
                    $data = [
                        'msg' => "Incorrect password."
                    ];
                    $this->view('Login/index', $data);
                }
            }
            else {
                $data = [
                    'msg' => $_POST['username'] ." does not exist.",
                ];
                $this->view('Login/index', $data);
            }
        }
    }
 

    public function register()
    {
        if (!isset($_POST['signup'])) {
            $this->view('Login/register');
        } else {
            $user = $this->loginModel->getUser($_POST['username']);
            if ($user == null) {
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['pass']),
                    'password_hash' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
                    'firstname' => trim($_POST['firstname']),
                    'lastname' => trim($_POST['lastname']),
                    'email' => trim($_POST['email']),
                    'username_error' => '',
                    'firstName_error' => '',
                    'lastName_error' => '',
                    'password_len_error' => '',
                    'msg' => '',
                    'email_error' => ''
                ];

                $isInvalid = $this->validateData($data);

                if ($isInvalid){
                    $this->view('Login/register', $isNotValid);
                }
                else {
                    if ($this->loginModel->createUser($data)) {
                        echo 'Please wait creating the account for ' . trim($_POST['username']);
                        echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Login/">';
                    }
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
        unset($_SESSION['seller_id']);
        unset($_SESSION['secret']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url=/Shufflewear/">';
    }

    public function validateData($data){
        if(empty($data['username'])){
            $data['username_error'] = 'Username can not be empty';
        }
        if(empty($data['firstname'])){
            $data['firstName_error'] = 'First Name can not be empty';
        }
        if(empty($data['lastname'])){
            $data['lastName_error'] = 'Last Name can not be empty';
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_error'] = 'Please check your email and try again';
        }
        if(empty($data['password']) || strlen($data['password']) < 5){
            $data['password_len_error'] = 'Password can not be less than 5 characters';
        }
      
        if(empty($data['username_error']) && empty($data['firstName_error']) && empty($data['lastName_error']) && empty($data['email_error']) && empty($data['password_len_error'])){
            return false;
        }
        else{
            return $data;
        }
    }

    public function createSession($user){
        $_SESSION['user_id'] = $user->userId;
        $_SESSION['user_username'] = $user->username;

        $seller = $this->loginModel->getSeller($_SESSION['user_id']);
        if($seller != null){
            $_SESSION['seller_id'] = $seller->sellerId;
        }
        
        $user = $this->loginModel->getUser($_SESSION['user_username']);
        
        //user without code
        if ($user->secret == null) {
            $_SESSION['secret'] = $this->generateSecret();
        }
        //user with code
        else {
            $_SESSION['secret'] = $user->secret;
        }
    }

    function generateSecret() {
        $g = new \Google\Authenticator\GoogleAuthenticator();
        $secret = $g->generateSecret();

        return $secret;
    }

    function check($secret, $code) {
        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        
        if ($g->checkCode($secret, $code)) {
            return true;
        }
        else {
            return false;
        }
    }
}

?>