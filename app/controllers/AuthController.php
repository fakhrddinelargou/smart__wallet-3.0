<?php


class AuthController{
 
  private $first_name;
  private $last_name;
  private $email;
  private $password;


  public function __construct ($first_name,$last_name,$email,$password){
  $this->first_name = $first_name ;
  $this->last_name = $last_name ;
  $this->email = $email ;
  $this->password = $password ;
  }

  public function login(){
    
  }



}