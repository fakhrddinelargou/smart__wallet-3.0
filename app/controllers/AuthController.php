<?php

require_once __DIR__ . "/../models/User.php";

class AuthController extends Controller{
 
  private $first_name;
  private $last_name;
  private $email;
  private $password;


  // public function __construct ($first_name,$last_name,$email,$password){
  // $this->first_name = $first_name ;
  // $this->last_name = $last_name ;
  // $this->email = $email ;
  // $this->password = $password ;
  // }

    public function index(){
   $this->view("auth/login");
  }

  public function register(){
   $this->view("auth/register");
  } 
   
  public function login(){
   $this->view("auth/login");
  }
  public function store(){
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $storeUser = new User();
    $existingEmail = $storeUser->setEmail($email);
    $existingEmail = $storeUser->getEmail();
    if(!$existingEmail){
    $existingEmail = $storeUser->setUser($first_name,$last_name,$email,$password,$age);
    header("Location: /?path=auth/login");
    exit;
    }else{
      $_SESSION['mode'] = "email";
    header("Location: /?path=auth/register");
    }
  }

  public function connect(){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginUser = new User();
    $setEmail = $loginUser->setEmail($email);
    $existingEmail = $loginUser->getEmail();
    if($existingEmail){
       
     $verification = $loginUser->login($password);
     echo $verification;
     if($verification){
      $_SESSION['user_id'] = $existingEmail['id'];
      header("Location: /?path=layout/app");
      exit;
     }else{
      $_SESSION['mode'] = "password";
      header("Location: /?path=auth/login");
      exit;
     }
 
  }else{
       $_SESSION['mode'] = "errorEmail";
      header("Location: /?path=auth/login");
      exit;
  }

  }


}