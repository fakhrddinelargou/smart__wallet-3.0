<?php


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
  // public function login(){
    
  // }



}