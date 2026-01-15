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
    echo $email ."/". $first_name ."/". $last_name ."/" . $age."/" . $password;
    // $storeUser = new User();
    $storeUser = new User($first_name,$last_name,$email,$password,$age);
    $existingEmail = $storeUser->getEmail();
    if(!$existingEmail){
    $existingEmail = $storeUser->setUser();
    header("Location: /?path=auth/login");
    exit;
    }else{
      $_SESSION['mode'] = "email";
    header("Location: /?path=auth/register");
    }
  }



}