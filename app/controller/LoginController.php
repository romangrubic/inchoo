<?php

class LoginController extends Controller
{
    protected $email;
    protected $message;

    public function __construct()
    {
        parent::__construct();

        $this->email = '';

        $this->message = new stdClass();
        $this->message->email='';
        $this->message->password='';

    }

    public function index()
    {
        return $this->view->render('login', [
            'email' => $this->email,
            'message' => $this->message,
        ]);
    }

    public function authorize()
    {
        if (!$this->validateLogin()) {
            $this->index();
        }

        $user = Login::authorize($_POST['email'], $_POST['password']);


        if($user == null){
            $this->message->password = 'Neispravna kombinacija emaila i lozinke';
            $this->email = $_POST['email'];
            header('Location:' . App::config('url'). 'login');
        }

        $_SESSION['authorized'] = $user;

        header('Location:' . App::config('url'));
    }

    public function logout()
    {
        unset($_SESSION['authorized']);
        session_destroy();

        header('Location:' . App::config('url'));
    }

//    Login data validation
    private function validateLogin()
    {
        if(!isset($_POST['email']) || !isset($_POST['password'])){
            return false;
        }

        if(strlen(trim($_POST['email'])) === 0){
            $this->message->email = 'Email obavezan';
            return false ;
        }

        if(strlen(trim($_POST['password']))===0){
            $this->message->password = 'Lozinka obavezna';
            $this->email = $_POST['email'];
            return false;
        }
        return true;
    }
}