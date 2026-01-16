<?php

require_once __DIR__ . "/../core/database.php";

class User {
 
  private  $db;
  private $first_name;
  private $last_name;
  private $email;
  private $password;
  private $age;


  public function __construct (){
  // $this->first_name = $first_name ;
  // $this->last_name = $last_name ;
  // $this->email = $email ;
  // $this->password = $password ;
  // $this->age = $age ;
  $database = new database();
  $this->db = $database->connection();
  }

  private function hashPassword(){
     return password_hash($password , PASSWORD_DEFAULT);
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public  function getEmail(){
   $stmt = $this->db->prepare("SELECT id , password , email FROM users where email = ?");
   $stmt->execute([$this->email]);
   return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  
  public function setUser ($first_name,$last_name,$email,$password,$age){
  $stmt =$this->db->prepare("INSERT INTO users (first_name , last_name , email , password , age) VALUES (?,?,?,?,?)");
  return  $stmt->execute([$first_name , $last_name, $email,$this->hashPassword($password) , $this->age]);
  }

  public function login($password){
  
   $userInfo = $this->getEmail();
   $pass_verify = password_verify($password,$userInfo['password']); 
   if($pass_verify){
    return true;
   }else{
    return false;
   }

  }

}