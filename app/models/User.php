<?php

require_once __DIR__ . "/../core/database.php";

class User {
 
  private  $db;
  private $first_name;
  private $last_name;
  private $email;
  private $password;


  public function __construct ($first_name,$last_name,$email,$password){
  $this->first_name = $first_name ;
  $this->last_name = $last_name ;
  $this->email = $email ;
  $this->password = $password ;
  $database = new database();
  $this->db = $database->connection();
  }

  private function hashPassword(){
     return $hashing  = password_hash($this->password , PASSWORD_DEFAULT);
  }

  public  function getEmail(){
  $stmt = $this->db->prepare("SELECT email FROM users where email = ?");
  $stmt->execute([$this->email]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
  }










}

